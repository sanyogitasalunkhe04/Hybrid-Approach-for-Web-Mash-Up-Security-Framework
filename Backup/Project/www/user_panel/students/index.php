<?php 
session_start();
require_once('../../configuration.php');
if(isset($_SESSION['user']) && isset($_SESSION['user_id']))
{
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Student list</title>
		<?php
			require_once('../../configuration.php');
			require_once(LIB.'db.php');
    		include_once(LAYOUT.'stylesheet.php');
     		include_once(LAYOUT.'javascript.php');
			//include_once(LIB.'rbac.php');
		?>
	</head>
	<body style="background-color: #222; color: #ffffff;">
		 <div class="container-fluid">
			<!-- Header -->
			<div class="row-fluid">
				<?php include_once(LAYOUT.'header.php'); ?>
			</div>

			<div class="row-fluid grid_960_system">
				<div class="span12">
					<div class="row-fluid">
						<div class="span12">
				 			<h4><i class="fa fa-user"></i>&nbsp;&nbsp;Student list</h4>
							<hr class="horizontal-rule"/>
						</div>
					<div class="row-fluid">
							<div class="span12">
								<table class="table table-bordered">
									<tr>
										<th style="text-align: center">Sr. No.</th>
										<th style="text-align: center">Name</th>
										<th style="text-align: center">E-mail</th>
										<th style="text-align: center">Contact No</th>
										<th style="text-align: center">Address</th>
										<th style="text-align: center">Action</th>
									</tr>
									<?php
						
										$sql_students = "SELECT * FROM students";
										$res_students= $db->fetchQuery($sql_students);

										$count=1;
										if(!empty($res_students))
										{
											foreach($res_students as $key => $value)
											{
										?>
										<tr>
											<td style="text-align: center"><?php echo $count; ?></td>
											<td style="text-align: center"><?php echo $value['student_name']; ?></td>
											<td style="text-align: center"><?php echo $value['student_email']; ?></td>
											<td style="text-align: center"><?php echo $value['student_contact_no']; ?></td>
											<td style="text-align: center"><?php echo $value['student_address']; ?></td>
											<td style="text-align: center">
														<a title="edit" href="<?php echo DOMAIN; ?>/user_panel/students/edit.php?id=<?php echo $value['id']; ?>"><i class="fa fa-edit"></i></a>
														<a title="delete" id="delete_<?php echo $value['id']; ?>"><i class="fa fa-trash-o"></i></a>	
											</td>
									  	 </tr>
										<?php 
											$count++; 
											} // foreach ends
										} // if ends
										else
										{
										?>
											<tr>
												<td colspan="8"><center><strong>We are sorry, But something went wrong.</strong></center></td>
											</tr>
										<?php
										}
										?>		
								</table>
							</div>
						</div>
						<div class="row-fluid" style="height: 30px;">
							<a class="btn btn-primary" href="<?php echo DOMAIN; ?>/user_panel/students/create.php">User registration</a>&nbsp;&nbsp;&nbsp;&nbsp;</span><a class="btn btn-primary" href="<?php echo DOMAIN; ?>/user_panel/dashboard.php"><i class="fa fa-reply"></i>&nbsp;&nbsp;Back</a>
						</div>
					</div>
				</div>
			</div>
			
			<div class="row-fluid">
				<?php include_once(LAYOUT.'footer.php'); ?>
			</div>
		</div>
		<script type="text/javascript">
			$(document).ready(function(){
				// delete script
				$("a[id^='delete_']").live("click", function(){
				var $id = this.id;
				var $delete_id = $id.substr(7);
				if (confirm('Are you sure want delete.')) {
					 $.ajax({    
				    		url: '<?php echo DOMAIN."/user_panel/commons/delete_row.php"; ?>',
				    		type:'DELETE',
				    		dataType: 'json',
				    		data: {
					    		id: $delete_id,
								entity: "students"
				    		},
				    		success: function(data) {
							if(data.status == true)
								location.reload();
						}
					 });
				}
				});
			});
		</script>
	</body>
</html>
<?php
}
else
{
	header("Location:".DOMAIN."/user_panel/index.php");	
}
?>
