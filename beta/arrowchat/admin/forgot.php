<?php

	/*
	|| #################################################################### ||
	|| #                             ArrowChat                            # ||
	|| # ---------------------------------------------------------------- # ||
	|| #    Copyright ©2010-2012 ArrowSuites LLC. All Rights Reserved.    # ||
	|| # This file may not be redistributed in whole or significant part. # ||
	|| # ---------------- ARROWCHAT IS NOT FREE SOFTWARE ---------------- # ||
	|| #   http://www.arrowchat.com | http://www.arrowchat.com/license/   # ||
	|| #################################################################### ||
	*/

	// ########################## INCLUDE BACK-END ###########################
	require_once(dirname(dirname(__FILE__)) . DIRECTORY_SEPARATOR . "bootstrap.php");
	
	$email = "";
	$error = "";
	$msg = "";
	
	if (var_check('email')) 
	{
		$result = $db->execute("
			SELECT email, password, username
			FROM arrowchat_admin
			ORDER BY id ASC
			LIMIT 1
		");
		
		$email = get_var('email');
		
		if ($result AND $db->count_select() > 0)
		{
			$row = $db->fetch_array($result);
			
			$password = $row['password'];
			
			$activate_link = str_replace('forgot.php', 'activate.php?id=' . $password, $_SERVER['REQUEST_URI']);
			$actual_link = "http://" . $_SERVER['HTTP_HOST'] . $activate_link;
			
			if (strtolower($email) == strtolower($row['email']))
			{
				$to = $row['email'];
				$username = $row['username'];

				// Your subject
				$subject="ArrowChat Reset Admin Password";

				// Your message
				$message="<html><body>Hi ArrowChat User!<br /><br />";
				$message.="Someone has requested that your password be reset for the administration panel.  You can click on the link below to begin the reset proccess.<br /><br />";
				$message.="Your username is " . $username . "<br />";
				$message.= '<a href="' . $actual_link .'" target="_blank">' . $actual_link . '</a><br /><br />';
				$message.="Best Regards,<br />";
				$message.="ArrowChat Team</body></html>";

				$headers  = 'MIME-Version: 1.0' . "\r\n";
				$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
				$headers .= 'To: '.$to.'' . "\r\n";
				$headers .= "X-Mailer: php";
				
				mail($to, $subject, $message, $headers);
				
				$msg = "The password reset link has been sent to your email.";
			}
			else
			{
				$error = "That is not the correct email address.";
			}
		}
		else
		{
			$error = "There was a database error. Please reinstall ArrowChat.";
		}
	}

	require(dirname(__FILE__) . DIRECTORY_SEPARATOR . "layout/pages_forgot.php");
	
?>