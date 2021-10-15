<?php 

session_start(); 
require_once('../configuration.php');
if(isset($_SESSION['user']) && isset($_SESSION['user_id']))
{
	header("Location:".DOMAIN."/user_panel/dashboard.php");
}
else
{
$token= md5(uniqid());
$_SESSION['user_token'] = $token;
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Login</title>
		<?php
		     require_once(LIB.'db.php');
		     include_once(LAYOUT.'stylesheet.php');
		     include_once(LAYOUT.'javascript.php');
		?>
	</head>
	<body style="background-color: #222; color: #ffffff;">
		<div class="container-fluid">
			<div class="row-fluid">
				<?php include_once(LAYOUT.'header.php'); ?>
			</div>
			
			<div class="row-fluid" style="margin-top: 40px; margin-bottom: 40px">
				<div class="span12">
					<?php
					if(isset($_GET['login']))
					{
						if($_GET['login'] == 'false')
						{
							echo '<div class="small_alert alert alert-error">';
							echo '<button type="button" class="close" data-dismiss="alert">&times;</button>';
							echo '<strong>Username or password incorrect</strong>';
							echo '</div>';
						}
						else if($_GET['login'] == 'blank')
						{
							echo '<div class="small_alert alert alert-error">';
							echo '<button type="button" class="close" data-dismiss="alert">&times;</button>';
							echo '<strong>Username or password should not be blank</strong>';
							echo '</div>';
						}
						else if($_GET['login'] == 'logout')
						{
							echo '<div class="small_alert alert alert-success">';
							echo '<button type="button" class="close" data-dismiss="alert">&times;</button>';
							echo '<strong>logout successfully</strong>';
							echo '</div>';
						}
						else if($_GET['login'] == 'block')
						{
							echo '<div class="small_alert alert alert-error">';
							echo '<button type="button" class="close" data-dismiss="alert">&times;</button>';
							echo '<strong>User get blocked. Please contact to admin.</strong>';
							echo '</div>';
						}
						else if($_GET['login'] == 'invalid_token')
						{
							echo '<div class="small_alert alert alert-error">';
							echo '<button type="button" class="close" data-dismiss="alert">&times;</button>';
							echo '<strong>Invalid token</strong>';
							echo '</div>';
						}
						else
						{
							echo '<div class="small_alert alert">';
							echo '<button type="button" class="close" data-dismiss="alert">&times;</button>';
							echo '<strong>We are sorry but something went wrong!</strong>';
							echo '</div>';
						}
					}
			
				 	/*if(isset($_SESSION['user']) && isset($_SESSION['user_id']))
					{
						header("Location:".DOMAIN."/user_panel/dashboard.php");
					}
					else
					{*/
					?>
					<form style="margin: 0px auto;" action="<?php echo DOMAIN.'/lib/auth.php'; ?>" method="post">
						<input type="hidden" name="token" value="<?php echo $_SESSION['user_token']; ?>" />
						<div class="modalbox" style="width: 560px; color: black;">
							<div class="modal-header">
			 					<h3><i class="fa fa-signin"></i>&nbsp;&nbsp;login</h3>
							</div>
							<div class="modal-body">
								<center>
									<table>
										<tr>
											<td>Username :</td>
											<td><input type="text" name="username"></td>
										</tr>
										<tr>
											<td>Password :</td>
											<td><input type="Password" name="password"></td>
										</tr>
									</table>
								</center>
							</div>
							<div class="modalbox-footer">
								<input type="submit" name="submit" value="Submit" class="btn btn-primary"  style="margin-left: 390px;"/>
								<input type="reset" value="Clear" class="btn" />
							</div>
						</div>
					</form>
					<?php
					//}
					?>
				</div>
			 </div>
			<div class="row-fluid">
				<?php include_once(LAYOUT.'footer.php'); ?>
			</div>
    	 </div>
	</body>
</html>
<?php 
}
?>
