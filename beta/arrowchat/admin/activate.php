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
	
	$id = get_var('id');
	$error = "";
	$msg = "";
	
	$result = $db->execute("
		SELECT password
		FROM arrowchat_admin
		ORDER BY id ASC
		LIMIT 1
	");
	
	if ($result AND $db->count_select() > 0)
	{
		$row = $db->fetch_array($result);
		
		if ($row['password'] == $id)
		{
			if (var_check('password')) 
			{
				if ($_POST['password'] != $_POST['confirm_password'])
					$error = "Your confirmation password does not match your password.";
			
				if (empty($_POST['password']))
					$error = "Your password cannot be empty.";
					
				if (empty($_POST['confirm_password']))
					$error = "Your password confirmation cannot be empty.";
					
				if (empty($error))
				{
					$new_password = md5($_POST['password']);
					
					$result = $db->execute("
						UPDATE arrowchat_admin
						SET password = '" . $db->escape_string($new_password) . "'
						WHERE password = '" . $db->escape_string($id) . "'
					");
					
					if ($result)
					{
						$msg = "Your password was successfully changed.";
					}
					else
					{
						$error = "There was a database error. You may need to reinstall ArrowChat.";
					}
				}
			}
		}
		else
		{
			die('The activation link is not correct.');
		}
	}
	else
	{
		die('We were unable to verify your activation link.');
	}

	require(dirname(__FILE__) . DIRECTORY_SEPARATOR . "layout/pages_activate.php");
	
?>