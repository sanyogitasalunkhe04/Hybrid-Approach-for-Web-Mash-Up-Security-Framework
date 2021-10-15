<!DOCTYPE html>
<html>
	<head>
		<title>Hybrid Approach for Web Mash Up Security</title>
		<?php
		     require_once('configuration.php');
		     //require_once(LIB.'db.php');
		     include_once(LAYOUT.'stylesheet.php');
		     include_once(LAYOUT.'javascript.php');
		?>
		<script type="text/javascript">
			jQuery(function(){		
				jQuery('#camera_wrap_1').camera({
					thumbnails: false,
					fx: 'scrollRight',
					loader: 'pie',
					loaderColor: '#FE642E',
					loaderBgColor: '#000000',
					pauseOnClick: true,
					height: '35%',
					time: 700
				});
				//jQuery('#camera_wrap_1').camera();
				$(".home").addClass("active");
			});
		</script>
	</head>
	<!--body style="background-color: #222;"-->
	
	<frameset rows="40%, 40%">
		<frame src="<?php echo DOMAIN; ?>/frames/top.php"></frame>
		<frame src="<?php echo DOMAIN; ?>/frames/bottom.php"></frame>
	</frameset>
</html>
