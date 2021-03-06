
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
				if(isset($_POST['name']) && !empty($_POST['name']) && isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['gender']) && !empty($_POST['gender']) && isset($_POST['contact']) && !empty($_POST['contact']) && isset($_POST['address']) && !empty($_POST['address']))
				{
					//$date = date("Y-m-d", strtotime($_POST['dob']));

					$sql = "UPDATE users SET user_name = :user_name, user_email = :user_email, user_contact_no = :user_contact_no, user_gender = :user_gender, user_address = :user_address, is_active = :is_active, updated_at = now() WHERE id = :id";

					$flag = $db->queryPrepared($sql, array(':user_name'=>$_POST['name'], ':user_email'=>$_POST['email'], ':user_contact_no'=>$_POST['contact'], ':user_gender' => $_POST['gender'], ':user_address'=>$_POST['address'], ':is_active' => $_POST['user_is_active'], ':id'=>$_GET['id']))->rowcount();

					if($flag != 0)
					{
							$flash_notice = "alert-success";
							$flash_msg = "Data updated successfully.";	
					}
					else
					{
						$flash_notice = "";
					  	$flash_msg = "We are sorry.But something went wrong";
					}
				}
				else
				{
				  	$flash_notice = "alert-error";
				 	$flash_msg = "All feilds are compulsary.";
				}
	     	}
		?>
	</head>
	<body  style="background-color: #222; color: #ffffff;">
		 <div class="container-fluid">
			<!-- Header -->
    			<div class="row-fluid">
				<?php include_once(LAYOUT.'header.php'); ?>
				</div>

			<!-- Content -->
			<div class="row-fluid grid_960_system">
				<div class="span12">
					<?php
						if(isset($_GET['id']) && $_GET['id'] != "")
						{
							$sql_edit = "SELECT user_name, user_email, user_gender, user_contact_no, user_address, is_active FROM users WHERE users.id = :id";
							$result_edit = $db->fetchQueryPrepared($sql_edit, array(':id' => $_GET['id']));
						}
						else
						{
							header("Location:".DOMAIN."/user_panel/users/index.php");
						}

						if(isset($flash_notice) && isset($flash_msg))
						{
					?>
							<div class=" small_alert alert <?php echo $flash_notice; ?>">
								<button type="button" class="close" data-dismiss="alert">&times;</button>
								<?php echo $flash_msg; ?>
							</div>
					<?php
						}
					?>
					<form method="post" enctype="multipart/form-data" id="frm_registration" name="frm_registration">
						<div class="row-fluid">
							<div class="span12">
					 			<h4><i class="fa fa-user"></i>&nbsp;&nbsp;Edit User registeration</h4>
								<hr class="horizontal-rule" />
							</div>
							<div class="row-fluid">
								<div class="span12">
									<div class="span9">
										<div class="row-fluid">
											<div class = "span3">
												<label for="txt_name">Name :</label>
											</div>
											<div class="span9">
												<input type="text" name="name" value="<?php echo $result_edit['0']['user_name']; ?>">
											</div>
										</div>
										<div class="row-fluid">
											<div class = "span3">
												<label for="txt_email">E-Mail / username :</lable>
											</div>
											<div class="span9">
												<input type="text" name="email" value="<?php echo $result_edit['0']['user_email']; ?>">
											</div>
										</div>
										
										<div class="row-fluid">
											<div class = "span3">
												<label for="txt_gender">Gender :</label>
											</div>
											<div class="span2">
												<label class="radio"><input type="radio" name="gender" id="gender" value="Male" <?php echo $select = ($result_edit['0']['user_gender'] == "Male") ? "checked=checked" : null;  ?>>Male</label>
											</div>
											<div class="span7">
												<label class="radio"><input type="radio" name="gender" id="gender" value="Female" <?php echo $select = ($result_edit['0']['user_gender'] == "Female") ? "checked=checked" : null;  ?>>Female</label>
											</div>
										</div>
										<div class="row-fluid">
											<div class = "span3">
												<label for="txt_contactno">Contact No. :</lable>
											</div>
											<div class="span9">
												<input type="text" name="contact" id="contact" value="<?php echo $result_edit['0']['user_contact_no']; ?>"></td>
											</div>
										</div>
										
										<div class="row-fluid">
											<div class = "span3">
												<label for="txt_name">Address :</lable>
											</div>
											<div class="span9">
												<textarea rows="3" name="address"><?php echo $result_edit['0']['user_address']; ?></textarea></td>
											</div>
										</div>
										
										<div class="row-fluid">
											<div class="span3">
												<label for="user_is_active">Is active :</label>
											</div>
											<div class="span9">
												<select name="user_is_active" id="user_is_active">
													<option value="1" <?php echo $select = ($result_edit['0']['is_active'] == 1) ? "selected=selected" : null;  ?>>Active</option>
													<option value="0" <?php echo $select = ($result_edit['0']['is_active'] == 0) ? "selected=selected" : null;  ?>>In active</option>
												</select>
											</div>
										</div>

									</div>
									
								</div>
							</div>
							<div class="row-fluid"  style="margin-top: 10px">
								<div class="span9">
									<div class="span9 offset3">
										<input type="submit" value="Update" name="submit" class="btn btn-primary">
										<a class="btn btn-primary" href="<?php echo DOMAIN; ?>/user_panel/users/index.php""><i class="fa fa-reply"></i>&nbsp;&nbsp;Back</a>
									</div>
								</div>
							</div>
						</div>
				</form>
				</div>
			</div>
			
			<!-- Footer -->
			<div class="row-fluid">
				<?php include_once(LAYOUT.'footer.php'); ?>
			</div>
		</div>

	</body>
</html>

