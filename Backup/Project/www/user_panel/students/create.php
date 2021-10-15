<?php
 session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<title>User registration | Education</title>
		<?php
			require_once('../../configuration.php');
			require_once(LIB.'db.php');
	    		include_once(LAYOUT.'stylesheet.php');
	     		include_once(LAYOUT.'javascript.php');

			if(isset($_POST['submit']))
			{
				// csrf if start
				if ($_POST['token'] == $_SESSION['user_token']) 
				{
					if(isset($_POST['name']) && $_POST['name'] != "" && isset($_POST['email']) && $_POST['email'] != "" && isset($_POST['gender']) && $_POST['gender'] != "" && isset($_POST['contact']) && $_POST['contact'] != "" && isset($_POST['address']) && $_POST['address'])
					{	
							$sql_student = "INSERT INTO students(id, student_name, student_email, student_gender, student_contact_no, student_address, is_active,created_at, updated_at) VALUES ('', :student_name, :student_email, :student_gender, :student_contact_no, :student_address, :is_active, now(), now())";
							
						  	$flag = $db->queryPrepared($sql_student, array(':student_name' => htmlspecialchars($_POST['name']), ':student_email' => htmlspecialchars($_POST['email']), ':student_gender' => htmlspecialchars($_POST['gender']), ':student_contact_no' => $_POST['contact'], ':student_address' => htmlspecialchars($_POST['address']), ':is_active' => $_POST['is_active']))->rowcount();
						  
							if($flag != 0)
							{
								$flash_type = "alert-success";
							  	$flash_message = "Data inserted successfully.";
							}
							else
							{
								$flash_type = "";
							  	$flash_message = "We are sorry.But something went wrong";  
							}
					}
					else
					{
					  $flash_type = "alert-error";
					  $flash_message = "All feilds are compulsary.";
					}
				}// csrf if ends
				else
				{
					$flash_type = "alert-error";
					$flash_message = "Invalid token";
				}
		     }
		     else
		     {
			 	$token= md5(uniqid());
				$_SESSION['user_token'] = $token;
			 }	
		?>
		
	</head>
	<body style="background-color: #222; color: #ffffff;">
		 <div class="container-fluid">
			<!-- Header -->
    			<div class="row-fluid">
				<?php include_once(LAYOUT.'header.php'); ?>
			</div>

			<!-- Content -->
			<div class="row-fluid grid_960_system">
				
					<div class="row-fluid">
						<div class="span12">
				 			<h4><i class="fa fa-user"></i>&nbsp;&nbsp;Student registeration</h4>
							<hr class="horizontal-rule" />
						</div>
					</div>
					<div class="row-fluid">
									<div class="span12">
										<?php
											if(isset($flash_type) && isset($flash_message))
											{
										?>
												<div class=" small_alert alert <?php echo $flash_type; ?>">
													<button type="button" class="close" data-dismiss="alert">&times;</button>
													<?php echo $flash_message; ?>
												</div>
										<?php
											}
										?>
									</div>
								</div>

					<form method = "post" enctype = "multipart/form-data" id = "frm_student" name = "frm_student">
						<input type="hidden" name="token" value="<?php echo $_SESSION['user_token']; ?>" />
						<div class="row-fluid">
							<div class="span9">
								<div class="row-fluid">
									<div class = "span3">
										<label for="txt_name">Name :</label>
									</div>
									<div class="span9">
										<input type="text" name="name" id="name" autofocus="autofocus">
									</div>
								</div>
								
								<div class="row-fluid">
									<div class = "span3">
										<label for="txt_users_name">E-Mail / username :</label>
									</div>
									<div class="span9">
										<input type="text" name="email" id="email" />
									</div>
								</div>
								
								<div class="row-fluid">
									<div class = "span3">
										<label for="txt_users_name">Gender :</label>
									</div>
									<div class="span2">
										<label class="radio"><input type="radio" name="gender" id="gender" value="Male" checked="checked">Male</label>
									</div>
									<div class="span7">
										<label class="radio"><input type="radio" name="gender" id="gender" value="Female" >Female</label>
									</div>
								</div>
					
								<div class="row-fluid">
									<div class = "span3">
										<label for="txt_users_name">Contact No :</label>
									</div>
									<div class="span9">
										<input type="text" name="contact" id="contact"/>
									</div>
								</div>
				
								<div class="row-fluid">
									<div class = "span3">
										<label for="txt_users_name">Address :</label>
									</div>
									<div class="span9">
										<textarea rows="3" name="address" id="address"></textarea>
									</div>
								</div>
								
								<div class="row-fluid">
									<div class="span3">
										<label for="cast_is_active">Is active :</label>
									</div>
									<div class="span9">
										<select name="is_active" id="is_active">
											<option value="1">Active</option>
											<option value="0">In active</option>
										</select>
									</div>
								</div>			
								
							</div>					

						</div>
						
						<div class="row-fluid" style="margin-top: 10px">
							<div class="span9">
								<div class="span9 offset3">
						
									<input type="submit" value="Create" name="submit" class="btn btn-primary">
									<input type="reset" value="Clear" class="btn  btn-primary" />
									<a class="btn btn-primary" href="<?php echo DOMAIN; ?>/user_panel/students/index.php"><i class="fa fa-reply"></i>&nbsp;&nbsp;Back</a>
								</div>
							</div>
						</div>
					</form>
			</div>
				
			
			
			<!-- Footer -->
			<div class="row-fluid">
				<?php include_once(LAYOUT.'footer.php'); ?>
			</div>
		</div>

	</body>
</html>

