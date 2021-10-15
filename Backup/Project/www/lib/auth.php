<?php
     session_start();
     require_once('../configuration.php');
     require_once(LIB.'db.php');
     if (!isset($_SESSION['user_id']))
     {
     	 // csrf if start
		 if ($_REQUEST['token'] == $_SESSION['user_token']) 
		 {
	         $uname = $_REQUEST['username'];
	         $pass = md5($_REQUEST['password']);
	         if($uname != '' && $pass != '')
	         {
	            	
	            	$sql = "SELECT * FROM users WHERE user_email = :uname AND user_password = :pass AND is_active = true";
	            	$result = $db->fetchQueryPrepared($sql, array(':uname'=>$uname,':pass'=>$pass));
		            if(!empty($result))
		            {
				        $_SESSION['user'] = $result['0']['user_email'];
				        $_SESSION['user_id'] = $result['0']['id'];
				        header("Location:".DOMAIN."/user_panel/dashboard.php");
		            }
		            else
	            	{
	            	  // three attempts Logic
	            	  $sql_chk = "SELECT user_email, id FROM users WHERE user_email = :uname AND is_active = true";
            		  $result_sql_chk = $db->fetchQueryPrepared($sql_chk, array(':uname'=>$uname));

            		  if(!empty($result_sql_chk))
            		  {
						  	if(isset($_SESSION['user_attempt']) && isset($_SESSION['user']) && $_SESSION['user'] == $uname)
						  	{
				
								$_SESSION['user_attempt'] = $_SESSION['user_attempt'] + 1;
							}
							else
							{
								$_SESSION['user_attempt'] = 1;
								$_SESSION['user'] = $uname;
							}
							if(isset($_SESSION['user_attempt']) && $_SESSION['user_attempt'] > 3)
							{
								session_destroy();
								#TODO in active user
								$sql_inactive_user = "UPDATE users SET is_active = false WHERE id = :id";
								$db->queryPrepared($sql_inactive_user, array(':id' => $result_sql_chk['0']['id']));
								$login="block";
		              					header("Location:".DOMAIN."/user_panel/index.php?login=$login");
							}
							else
							{
								$login="false";
		              					header("Location:".DOMAIN."/user_panel/index.php?login=$login");
							}
					  }
					  else
					  {
					  	$login="false";
		                		header("Location:".DOMAIN."/user_panel/index.php?login=$login");
					  }
	            	}   
	       	}
	       	else
	        {
	             $login="blank";
	             header("Location:".DOMAIN."/user_panel/index.php?login=$login");
	        }
		}// csrf if ends
		else
		{
			$login="invalid_token";
	        header("Location:".DOMAIN."/user_panel/index.php?login=$login");
		}
    }
    else
    {
         if(isset($_GET['login']))
         {
           $login = $_GET['login'];
           if($login == 'logout')
           {
             session_destroy();
             header("Location:".DOMAIN."/user_panel/index.php?logout=true");
           }
         }
    }
?>
