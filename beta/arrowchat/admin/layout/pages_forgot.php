<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr"> 
<head profile="http://gmpg.org/xfn/11"> 
 
	<title>ArrowChat - Administrator Panel Forgot Password</title> 
	
	<link rel="stylesheet" type="text/css" href="includes/css/login-style.css"> 
	
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script> 
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.7.3/jquery-ui.min.js"></script>
	<script type="text/javascript" src="includes/js/scripts.js"></script>
	
	<script type="text/javascript">
		$(document).ready(function() {
			var emitter;
			$('.fwdbutton').click(function() {
				document.forms['login'].submit();
			});
			$(document).keypress(function(e) {
				if(e.keyCode == 13) {
					document.forms['login'].submit();
				}
			});
		});
	</script>
	
</head>
<body>
	<div style="margin: 0 auto; width: 550px; text-align: center; padding-top: 100px;">
		<div id="logo" style="width: 521px; height: 69px;">
			<a href="http://www.arrowchat.com" target="_blank"><img id="logo2" src="./images/img-logo.png" alt="ArrowChat Logo" border="0" /></a>
		</div>
		<div class="login-form">
			<form autocomplete="off" action="./forgot.php" id="login" method="post"> 
				<div class="admin-panel-text" style="line-height:1.6em;">You can reset your password by entering the email for the admin user. You can change your email in the database (arrowchat_admin table) or reinstall ArrowChat.</div>
				<?php
					if (!empty($error))
					{
				?>
				<div class="login-error">
					<?php echo $error; ?>
				</div>
				<?php
					}
				?>
				<?php
					if (!empty($msg))
					{
				?>
				<div class="login-msg">
					<?php echo $msg; ?>
				</div>
				<?php
					}
				?>
				<div style="clear: both;"></div>
				<div class="input-text">Email</div>
				<div class="input-box">
					<input autocomplete="off" class="text" id="email" name="email" value="<?php if (!empty($email)) echo $email; ?>" type="text" />
				</div>
				<div style="clear: both;"></div>
				<div class="button_container float">
					<div class="floatr">
						<a class="fwdbutton">
							<span>Send Password</span>
						</a>
					</div>
					<div class="forgot">
						<a href="./">Login</a>
					</div>
				</div>
				<div style="clear: both;"></div>
			</form> 
		</div>
	</div>
	<div class="install-footer">
		<a href="https://www.arrowchat.com/support/" target="_blank">Get Help</a> | <a href="https://www.facebook.com/ArrowChat/" target="_blank">Like us on Facebook</a><br />
		ArrowChat Software
	</div>
	<script type="text/javascript">
		document.getElementById("email").focus();
	</script>
</body>
</html>