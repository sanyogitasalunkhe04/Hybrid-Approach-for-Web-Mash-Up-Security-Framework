<?php 
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Online Shopping</title>
	<?php
	     require_once('../../configuration.php');
	     require_once(LIB.'db.php');
	     include_once(LAYOUT.'stylesheet.php');
	     include_once(LAYOUT.'javascript.php');
	//insert product_id and user_id
	if(isset($_POST['submit']))
			{
				$sql_buy = "INSERT INTO `transactions`(`id`, `user_id`, `product_id`, `buy_date`) VALUES ('', :user_id, :product_id, now())";
			  	$flag = $db->queryPrepared($sql_buy, array(':user_id' => $_SESSION['user_id'], ':product_id' => $_GET['id']))->rowcount();
			  
				if($flag != 0)
				{
					$flash_type = "alert-success";
				  	$flash_message = "Books added in cart.";
				}
				else
				{
					$flash_type = "";
				  	$flash_message = "We are sorry.But something went wrong";  
				}
		     }
		     
	//insert product_id and user_id	     
	if(isset($_POST['submit_review']))
			{
				$sql_buy = "INSERT INTO `reviews`(`id`, `product_id`, `reviews`, `created_at`, `updated_at`) VALUES ('', :product_id, :reviews, now(), now())";
				$review_string = preg_replace("/<iframe.*?>(.*)?<\/iframe>/im","", $_POST['review']);
			  	$flag = $db->queryPrepared($sql_buy, array(':product_id' => $_GET['id'], ':reviews' => $review_string))->rowcount();
			  
				if($flag != 0)
				{
					$flash_type = "alert-success";
				  	$flash_message = "Review added succussfully.";
				}
				else
				{
					$flash_type = "";
				  	$flash_message = "We are sorry. But something went wrong";  
				}
		     }
		     
	     
	$sql = "SELECT * FROM products WHERE id = :id";
	$result = $db->fetchQueryPrepared($sql, array(':id' => $_GET['id']));
	
	$sql_rev = "SELECT * FROM reviews WHERE product_id = :id";
	$result_rev = $db->fetchQueryPrepared($sql_rev, array(':id' => $_GET['id']));
	
	?>
</head>
	<body style="background-color: #222; color: #ffffff;">
	<div class="row-fluid">
				<?php include_once(LAYOUT.'header.php'); ?>
			</div>
	    <div class="container-fluid" style="width: 960px; margin: 0px auto;">
    		
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
		<div style="margin-top: 10px; border: 1px solid; padding: 30px 0px 30px 30px;">
				<div class="row-fluid">
					<div class="span5">
						<img src="<?php echo $result['0']['product_image_url']; ?>"/>
					</div>
					<div class="span7">
						<form method = "post" action="" name="product">
						<h3><?php echo $result['0']['product_name']; ?></h3>
						<p>Rs.&nbsp;<?php echo $result['0']['product_price']; ?></p>
						<input type = "submit" value = "Buy Now" name = "submit" class = "btn btn-primary" />
						</form>
						<br/><br/>
						<form method = "post" action="" name="review">
						<textarea rows = "3" name = "review" id = "review" class = "input-xlarge" placeholder = "e.g. best book.."></textarea><br/>
						<input type = "submit" value = "Add review" name="submit_review" class = "btn btn-primary" />
						</form>
					</div>
				</div>
    	</div>
    	<br/>
    	<div class="row-fluid">
					<h3>Reviews</h3> 	
			
		</div>
		<?php

		foreach($result_rev as $key => $value)
		{
		?>
			<div class="row-fluid">
					<?php echo $value['reviews']; ?>
					<hr/>
			</div>
		<?php		
		}
		?>
    	</div>
    	<div class="row-fluid">
				<!-- footer section -->
				<div class="span12">
					<?php include_once(LAYOUT.'footer.php'); ?>
				</div>
		</div>
	</body>
</html>
