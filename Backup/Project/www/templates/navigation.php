<div class="row-fluid  grid_960_system">
<div class="span10">
	<div class="main_menu">
		<ul id="menu">
			<li class="sub_menu home">
				<a class="home" href="<?php echo DOMAIN; ?>/index.php">&nbsp;Home</a>
			</li>
			<li class="sub_menu contact">
				<a class="contact" href="<?php echo DOMAIN; ?>/includes/about_project.php">About project</a>
			</li>
			<li class="sub_menu about">
				<a class="about" href="<?php echo DOMAIN; ?>/includes/contact_us.php">Contact us</a>
			</li>
			<?php if(!isset($_SESSION['user_id'])) { ?>
			<li class="sub_menu about">
				<a class="about" href="<?php echo DOMAIN; ?>/user_panel/index.php">Log In</a>
			</li>
			<?php } ?>
			<li class="sub_menu about">
				<a class="about" href="<?php echo DOMAIN; ?>/user_panel/books/index.php">Book</a>
			</li>
			<li class="sub_menu about">
				<a class="about" href="<?php echo DOMAIN; ?>/user_panel/news/index.php">News</a>
			</li>
		  </ul>
	</div>
</div>
</div>

