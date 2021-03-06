<?php 
session_start();
require_once('../../configuration.php');
if(isset($_SESSION['user']) && isset($_SESSION['user_id']))
{
?>
<html>
<head>
	<title>Books</title>
	<?php
	    // require_once('../../configuration.php');
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

		<?php
			$sql = "SELECT * FROM products";
			$result = $db->fetchQuery($sql);
			
		?>
			<div class="row-fluid"  style="width: 960px; margin: 0px auto;">
				<div class="span12" style="border-bottom: 1px solid #FF9900;"><h4>Books</h4></div>
			</div>
			<div class="row-fluid"  style="width: 960px; margin: 0px auto; color:black">
			<?php
				if(!empty($result))
				{
					$count=0;
					foreach($result as $category => $value)
					{
							if($count==0)
							{
			?>
						<ul class="thumbnails">
						<?php
							}
						?>
						  	<li class="span4" style="margin-top: 10px; background: #FDFDFD; border: 1px solid; border-radius:10px">
						    		<div class="thumbnail">
									<center>
										<img src="<?php echo $value['product_image_url']; ?>" style="width:250px; height:250px;" />
										<h4><?php echo $value['product_name']; ?></h4>
										<p>Rs.&nbsp;<?php echo $value['product_price']; ?></p>
										<a href="../books/cart.php?id=<?php echo $value['id']; ?>" class="btn">Add to cart</a>
									</center>
						    		</div>
						  	</li>
					<?php
							
						$count++;
						if($count==3)
						{
							echo "</ul>";
							$count=0;
						}
					} // foreach end
				} // if end
				else
				{
			?>
				<h6>Coming soon...</h6>
			<?php
				}
				echo "</div>";
			?>
			<div class="row-fluid"  style="width: 960px; margin: 0px auto;">
				<div class="span12" style="border-top: 1px solid #FF9900;"></div>
			</div>
			</div>
			</div>
		<div class="row-fluid">
			<!-- footer section -->
			<div class="span12">
				<?php include_once(LAYOUT.'footer.php'); ?>
			</div>
		</div>
    	    
	</body>
</html>
<?php
}
else
{
	header("Location:".DOMAIN."/user_panel/index.php");	
}
?>
