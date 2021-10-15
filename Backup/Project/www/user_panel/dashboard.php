<?php session_start(); ?>
<!DOCTYPE html>
<html>
	<head>
		<title>Dashboard | Education</title>
		<?php
			require_once('../configuration.php');
 		    include_once(LAYOUT.'stylesheet.php');
     		include_once(LAYOUT.'javascript.php');
			//include_once(LIB.'rbac.php');
			
		?>
	</head>
	<body  style="background-color: #222; color: #ffffff;">
		 <div class="container-fluid">
			<div class="row-fluid">
				<?php include_once(LAYOUT.'header.php'); ?>
			</div>

			<div class="row-fluid grid_960_system">
				<div class="span12">
					<div class="modalbox"  style="margin-top: 40px; margin-bottom: 40px">
						<div class="modal-header"  style="color: black;">
				 			<h3><i class="fa fa-dashboard"></i>&nbsp;&nbsp;Dashboard</h3>
						</div>
						<div class="modal-body">
							
								<div class="thumbnail aaa span4" style="height: 80px; ">
									<center>
									<a href="<?php echo DOMAIN; ?>/user_panel/users/"><i class="fa fa-user dashboard_icon" style="color: #000000;"></i><br/>
									User list</a>
									</center>
								</div>
							
								<div class="thumbnail aaa span4" style="height: 80px; ">
									<center>
									<a href="<?php echo DOMAIN; ?>/user_panel/students/"><i class="fa fa-user dashboard_icon" style="color: #000000;"></i><br/>
									Students List</a>
									</center>
								</div>
								
							
								<div class="thumbnail aaa span4" style="height: 80px; ">
									<center>
									<a href="<?php echo DOMAIN; ?>/lib/auth.php?login=logout"><i class="fa fa-power-off dashboard_icon" style="color: #000000;"></i><br/>
									Logout</a>
									</center>
								</div>
						</div>
						<div class="modalbox-footer" style="height: 20px;">
						</div>
					</div>
				</div>
			</div>
			
			<div class="row-fluid">
				<?php include_once(LAYOUT.'footer.php'); ?>
			</div>
		</div>
	</body>
</html>

