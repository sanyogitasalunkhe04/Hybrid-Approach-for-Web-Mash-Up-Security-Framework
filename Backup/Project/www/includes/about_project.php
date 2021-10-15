<?php session_start(); ?>
<!DOCTYPE html>
<html>
	<head>
		<title>About Project</title>
		<?php
		     require_once('../configuration.php');
		     //require_once(LIB.'db.php');
		     include_once(LAYOUT.'stylesheet.php');
		     include_once(LAYOUT.'javascript.php');
		?>
	</head>
	<body style="background-color: #222;">
	
		<div class="container-fluid">
			<div class="row-fluid">
				<?php include_once(LAYOUT.'header.php'); ?>
			</div>
		
			<div class="row-fluid grid_960_system" style="margin-top: 25px;">
				<div class="row-fluid grid_960_system" style="color: #FE642E">
					<h2>About Project</h2>
				</div>
				
				<div class="row-fluid grid_960_system">
					<div class="span12"><hr></hr></div>
				</div>
				
				<div class="span12" style="color: #CCC;">
					<h3>User input security</h3>
					<br/>
					<p style="text-align:left">Many intrusion vulnerabilities such as SQL injection, CSRF, and XSS are preventable using a comprehensive input-validation framework. A mashup server-side validation framework and a client-side mashup validation framework should complement each other in the manner they process input data. Because client-side validation can be circumvented quite easily, a comprehensive and complementary server-side validation provides another crucial component for protecting data and processes. 
					</p>
					<ul>
					For an input-validation framework to be effective, it should:
					</ul>
					<li>Define a list of finite values to which input data should be constrained</li>
					<li>Validate input data types, data lengths, data ranges, and data formats</li>
					<li>Use regular expressions at the client and at the server to facilitate a consistent validation model</li>
					<li>Sanitize input data for invalid characters</li>
					<br/>
					<ol>
					<b>Advantages:-</b>
					<li>Prevents unexpected failure of application.</li>
					<li>Sanitize input data at client level by using JavaScript and also at server level.</li>
					<li>Prevent SQL injection</li>
					<li>Restrict user to correct data.</li>
					</ol>
					
				</div>
				<div class="row-fluid grid_960_system">
					<div class="span12"><hr></hr></div>
				</div>
				
				<div class="span12" style="color: #CCC;">
					<h3>Avoiding on-demand scripting exploits (XSS)</h3>
					<br/>
					<p style="text-align:left">
					One technique used in many mashups is to embed JavaScript snippets that are dynamicall downloaded and interpreted on demand. On-demand scripts can include malicious code aimed at exploiting security vulnerabilities such as XSS. We can prevent this vulnerability by ensuring that on-demand scripts are validated and that content generated from the scripts is encoded properly to prevent execution of malicious code.</p>
					<p>We can explain it by following example.</p> 
					<p>
					&lt;div&gt;<br/>
					This is example.<br/>
					&lt;/div&gt;
					</p>
					<p>Above code shows the unencoded script. While requesting this kind of code need to be encoding these scripts. By following way.</p>
					<code>"&lt;div&gt; This is example.&lt;/div&gt;"</code>
					<p>As shown above, mashup pages using scripts generated dynamically must ensure that the data the scripts generated is validated and encoded to avoid interpretation of the data by the browser 
as HTML markup or scripting code. This inadvertent interpretation can lead to malicious code execution and possible security violations.
					</p>
					<p>Data that is not validated and encoded runs the risk of exploiting the following vulnerabilities:		</p>
					<ul>
					<li>Compromised data integrity</li>
					<li>Intruders creating or accessing cookies</li>
					<li>Intruders intercepting and accessing user input</li>
					<li>Execution of malicious scripts within a trusted domain or context</li>
					</ul>
					<p>
					An intelligent analysis of each context interpreted should be made so that only characters that could cause problems within each particular context are addressed.
					</p>
				</div>
				<div class="row-fluid grid_960_system">
					<div class="span12"><hr></hr></div>
				</div>
				<div class="span12" style="color: #CCC;">
					<h3>Preventing session fixation</h3>
					<br/>
					<p style="text-align:left">Authenticating a user at the server without first invalidating existing sessions can lead to what is termed session fixation. Session fixation allows intruders to intercept authenticated sessions or to create new sessions and to capture the session identifier. The session identifier can then be used maliciously when a legitimate user creates a session with the same session identifier.</p>
					<p>Here we have used pseudo code to preventing session fixation by authenticating a client request without first invalidating the existing session.
					<br/>
						private boolean authenticateUser(HttpServletRequest req)<br/>
						 {<br/>
						 // session.invalidate() should have been called prior to this<br/>
						 // to invalidate an existing session<br/>
						 HttpSession session = req.getSession(false);<br/>
						 if (null != session)<br/>
						 {<br/>
						 // existing session assumed valid<br/>
						 return true;<br/>
						 }<br/>
						 if (authenticateRequest(req) == true)<br/>
						 {<br/>
						 // create a new session<br/>
						 req.getSession();<br/>
						 return true;<br/>
						 }<br/>
						 return false;<br/>
						 }</p>
					<p>In this an existing session has not been invalidated and is therefore assumed to be valid for the current request. This situation may be exploited when a new user provides authentication 
credentials to the server, which allows the originator of the existing session to record and possibly 
exploit data as long as the session is valid.</p>
					<p>This type of attack can be prevented by using following techniques –</p>
					<ul>
						<li>Specifying session timeouts</li>
						<li>Promoting session invalidation using explicit logout UI controls</li>
						<li>Forcing users to re enter credentials whenever privacy is essential</li>
						<li>Regenerating session identifiers with each request</li>
					</ul>
				</div>

				<div class="row-fluid grid_960_system">
					<div class="span12"><hr></hr></div>
				</div>
			
			
				<div class="span12" style="color: #CCC;">
					
					<h3>Preventing CSRF attacks</h3>
					<br/>
					<p style="text-align:left">CSRF attacks originate from malicious code from an intruder site that tricks a browser into transmitting unprovoked requests to a trusted site. A browser's same-origin policy (SOP) does not thwart requests being transmitted from a site of different origin, but only requests being transmitted to a site of different origin. Therefore, the SOP will not prevent CSRF attacks. 
					</p>
					<p>CSRF attacks depend on a server assuming that all requests transmitted from the browser that originally started an authenticated session are valid. Typical authentication mechanisms such as user name/password, cookies, and SSL certificates are not sufficient for protecting against CSRF attacks, because these mechanisms depend on authenticating sessions between a browser and the server, not between each individual request and the server. </p>
				</div>
				<div class="row-fluid grid_960_system">
					<div class="span12"><hr></hr></div>
				</div>
				<div class="span12" style="color: #CCC;">
					<h3>Brute force attack</h3>
					<br/>
					<p style="text-align:left">A password and cryptography attack that does not attempt to decrypt any information, but continue to try a list of different passwords, words, or letters. For example, a simple brute-force attack may have a dictionary of all words or commonly used passwords and cycle through those words until it gains access to the account. A more complex brute-force attack involves trying every key combination in an effort to find the correct password that will unlock the encryption. Due to the number of possible combinations of letters, numbers and symbols, a brute force attack can take a long time to complete. The higher the type of encryption used (64-bit, 128-bit or 256-bit encryption), the longer it can take.</p>
					<p style="text-align:left">Although a brute-force attack may be able to gain access to an account eventually, these attacks can take several hours, days, months, and even years to run. The amount of time it takes to complete these attacks is dependent on the complexity of the password, the strength of the encryption, how well the attacker knows the target, and the strength of the computer(s) being used to conduct the attack.</p>
					<p>To help prevent dictionary brute-force attacks many systems will only allow a user to make a mistake in entering their username or password three or four times. If the user exceeds these attempts, the system will either lock them out of the system or prevent any future attempts for a set amount of time.</p>
				</div>
		</div>
		<div class="row-fluid">
				<?php include_once(LAYOUT.'footer.php'); ?>
		</div>	
	</body>
</html>
