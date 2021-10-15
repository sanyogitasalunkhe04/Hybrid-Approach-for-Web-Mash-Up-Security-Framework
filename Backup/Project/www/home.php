<?php session_start(); ?>
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
	<body style="background-color: #222;">
	
		<div class="container-fluid">
			<div class="row-fluid">
				<?php include_once(LAYOUT.'header.php'); ?>
			</div>
			<div class="row-fluid grid_960_system">
				<div class="span12">
					<div class="camera_wrap camera_orange_skin" id="camera_wrap_1"  style="margin-top: 10px; width: 100%">
						<div data-thumb="../img/1.jpg" data-src="../img/1.jpg">
							<div class="camera_caption fadeFromBottom">
							    Security
							</div>
					    	</div>
					    	<div data-thumb="../img/2.jpg" data-src="../img/2.jpg">
							<div class="camera_caption fadeFromBottom">
							    Security
							</div>
					    	</div>
					    	<div data-thumb="../img/3.jpg" data-src="../img/3.jpg">
							<div class="camera_caption fadeFromBottom">
							    Security
							</div>
					    	</div>
					</div>
				</div>
			</div>
			
			<div class="row-fluid grid_960_system">
				<div class="span4" style="color: #CCC;">
					<center>
					<font size="5">User input security</font></p>
					<i class="fa fa-clock-o fa-4x dashboard_icon"></i><br/>
					<p style="text-align:left">Many intrusion vulnerabilities such as SQL injection, CSRF, and XSS are preventable using a comprehensive input-validation framework. A mashup server-side validation framework and a client-side mashup validation framework should complement each other in the manner they process input data. Because client-side validation can be circumvented quite easily, a comprehensive and complementary server-side validation provides another crucial component for protecting data and processes. 
					</p>
					</center>
				</div>
				<div class="span4" style="color: #CCC;">
					<center>
					<font size="5">Avoiding on-demand scripting exploits</font></p>
					<i class="fa fa-cogs fa-4x dashboard_icon"></i><br/>
					<p style="text-align:left">One technique used in many mashups is to embed JavaScript snippets that are dynamically downloaded and interpreted on demand. On-demand scripts can include malicious code aimed at exploiting security vulnerabilities such as XSS. We can prevent this vulnerability by ensuring that on-demand scripts are validated and that content generated from the scripts is encoded properly to prevent execution of malicious code</p>
					</center>
				</div>
				<div class="span4" style="color: #CCC;">
					<center>
					<font size="5">Preventing session fixation</font></p>
					<i class="fa fa-thumbs-o-up fa-4x dashboard_icon"></i><br/>
					<p style="text-align:left">Authenticating a user at the server without first invalidating existing sessions can lead to what is termed session fixation. Session fixation allows intruders to intercept authenticated sessions or to create new sessions and to capture the session identifier. The session identifier can then be 
used maliciously when a legitimate user creates a session with the same session identifier.</p>
					</center>
				</div>
			</div>
			<div class="row-fluid grid_960_system">
				<div class="span12"><hr></hr></div>
			</div>
			<div class="row-fluid grid_960_system">
				<div class="span4" style="color: #CCC;">
					<center>
					<font size="5">Preventing CSRF attacks</font></p>
					<i class="fa fa-clock-o fa-4x dashboard_icon"></i><br/>
					<p style="text-align:left">CSRF attacks originate from malicious code from an intruder site that tricks a browser into transmitting unprovoked requests to a trusted site. A browser's same-origin policy (SOP) does not thwart requests being transmitted from a site of different origin, but only requests being transmitted to a site of different origin. Therefore, the SOP will not prevent CSRF attacks. 
					</p>
					</center>
				</div>
				<div class="span4" style="color: #CCC;">
					<center>
					<font size="5">Brute force attack</font></p>
					<i class="fa fa-cogs fa-4x dashboard_icon"></i><br/>
					<p style="text-align:left">A password and cryptography attack that does not attempt to decrypt any information, but continue to try a list of different passwords, words, or letters. For example, a simple brute-force attack may have a dictionary of all words or commonly used passwords and cycle through those words until it gains access to the account. A more complex brute-force attack involves trying every key combination in an effort to find the correct password that will unlock the encryption. Due to the number of possible combinations of letters, numbers and symbols, a brute force attack can take a long time to complete. The higher the type of encryption used (64-bit, 128-bit or 256-bit encryption), the longer it can take.
</p>
					</center>
				</div>
				<div class="span4" style="color: #CCC;">
					<center>
					<font size="5">iframe security</font></p>
					<i class="fa fa-thumbs-o-up fa-4x dashboard_icon"></i><br/>
					<p style="text-align:left">Mashup widgets are often embodied as embedded inline frames (iframes). iframes are HTML elements regarded as separate entities by a browser within a page. Because content placed inside an iframe cannot manipulate any part of a browser's DOM outside of the containing iframe, iframes are often used as mashup widgets and other UI artifacts to isolate potentially malicious content within a mashup page.</p>
					</center>
				</div>
			</div>
			<div class="row-fluid grid_960_system">
				<div class="span12"><hr></hr></div>
			</div>
			<div class="row-fluid grid_960_system" style="margin-top: 10px;">
				<div class="span12">
					<marquee onmouseover="this.scrollAmount = 0" onmouseout="this.scrollAmount = 5" style="color: #CCC;">Hybrid Approach for Web Mash Up Security.</marquee>
				</div>
			</div>

			<div class="row-fluid">
				<?php include_once(LAYOUT.'footer.php'); ?>
			</div>	
		</div>
	</body>
</html>
