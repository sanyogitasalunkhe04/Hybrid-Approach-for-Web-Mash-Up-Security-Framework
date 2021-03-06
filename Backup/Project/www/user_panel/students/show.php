<!DOCTYPE html>
<html>
	<head>
		<title>Users</title>
		<?php
			require_once('../../configuration.php');
			require_once(LIB.'db.php');
	    		include_once(LAYOUT.'stylesheet.php');
	     		include_once(LAYOUT.'javascript.php');
			include_once(LIB.'rbac.php');
			
			if(isset($_GET['id']) && $_GET['id'] != "")
			{
				$sql_show = "SELECT users.user_name, users.user_email, users.user_gender, users.user_contact_no, users.user_dob, users.user_address, users.user_designation, users.user_photo_path, users.user_photo_name, roles.role_name FROM users INNER JOIN roles ON users.roles_id = roles.id WHERE users.id = :id";

				$result_show = $db->fetchQueryPrepared($sql_show, array(':id' => $_GET['id']));
			}
			else
			{
				header("Location:".DOMAIN."/user_panel/users/index.php");
			}
		?>
	</head>
	<body>
		 <div class="container-fluid">
    			<!-- Header -->
    			<div class="row-fluid">
				<?php include_once(LAYOUT.'header.php'); ?>
			</div>

			<div class="row-fluid grid_960_system">
				<div class="span12">
					<form method="post">
						<div class="row-fluid">
							<div class="span12">
					 			<h3><i class="fa fa-eye"></i>&nbsp;&nbsp;USER INFORMATION</h3>
								<hr class="horizontal-rule" />
							</div>
							<div class="row-fluid">
								<div class="row-fluid">
									<div class="span6">
										<table border="0" align="left" cellpadding="10">
											<tr>
												<td><b>Name</b></td>
												<td><b>:</b></td>
												<td><?php echo $result_show[0]['user_name']; ?></td>
											</tr>

											<tr>
												<td><b>E-mail</b></td>
												<td><b>:</b></td>
												<td><?php echo $result_show[0]['user_email']; ?></td>
											</tr>
											
											<tr>
												<td><b>Gender</b></td>
												<td><b>:</b></td>
												<td><?php echo $result_show[0]['user_gender']; ?></td>
											</tr>
											
											<tr>
												<td><b>Contact No</b></td>
												<td><b>:</b></td>
												<td><?php echo $result_show[0]['user_contact_no']; ?></td>
											</tr>

											<tr>
												<td><b>Date of birth</b></td>
												<td><b>:</b></td>
												<td><?php echo $result_show[0]['user_dob']; ?></td>
											</tr>

											<tr>
												<td><b>Address</b></td>
												<td><b>:</b></td>
												<td><?php echo $result_show[0]['user_address']; ?></td>
											</tr>

											<tr>
												<td><b>Designation</b></td>
												<td><b>:</b></td>
												<td><?php echo $result_show[0]['user_designation']; ?></td>
											</tr>

											<tr>
												<td><b>User role</b></td>
												<td><b>:</b></td>
												<td><?php echo $result_show[0]['role_name']; ?></td>
											</tr>
											
											<tr>
												<?php if(userHasPrivileges("USER_EDIT")) { ?><td  colspan="3">
									<a class="btn btn-primary" href="<?php echo DOMAIN; ?>/user_panel/users/edit.php?id=<?php echo $_GET['id']; ?>">Edit</a><?php } ?>
												
												<a class="btn" href="<?php echo DOMAIN; ?>/user_panel/users/index.php"><i class="fa fa-reply"></i>&nbsp;&nbsp;Back</a></td>
											</tr>
										</table>
									</div>
									<div class="span6">
										<center><b>Photo</b>
										<img class="thumbnail" src="<?php echo $result_show[0]['user_photo_path']. $result_show[0]['user_photo_name']; ?>" /></center>
									</div>
								</div>
							</div>
							
						</div>
					</form>		
				</div>
			</div>
			
			<div class="row-fluid">
				<?php include_once(LAYOUT.'footer.php'); ?>
			</div>
		</div>

	</body>
</html>

