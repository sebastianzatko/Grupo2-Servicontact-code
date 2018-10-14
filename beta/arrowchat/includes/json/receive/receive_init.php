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
	require_once (dirname(dirname(dirname(dirname(__FILE__)))) . DIRECTORY_SEPARATOR . 'bootstrap.php');
	require_once (dirname(dirname(dirname(dirname(__FILE__)))) . DIRECTORY_SEPARATOR . AC_FOLDER_INCLUDES . DIRECTORY_SEPARATOR . 'init.php');

	// ########################### INITILIZATION #############################
	// Start a session if one does not exist
	$a = session_id();
	if (empty($a)) 
	{
		session_start();
	}

	// ###################### START NOTIFICATION RECEIVE ######################
	if (logged_in($userid)) 
	{
		// Remove typing notification for all users
		if (isset($_SESSION['typing_to']))
		{			
			foreach ($_SESSION['typing_to'] as $key => $value)
			{	
				$result = $db->execute("
					SELECT typing 
					FROM arrowchat_status
					WHERE userid = '" . $db->escape_string($value) . "'
				");

				if ($result AND $db->count_select() > 0 AND logged_in($userid)) 
				{
					$row = $db->fetch_array($result);
					$old_data = $row['typing'];
					
					if (preg_match("#:$userid/[0-9]+#", $old_data, $matches))
					{
						$typing_insert = str_replace($matches[0], ":".$userid."/0", $old_data);
					}
					else
					{
						$typing_insert = ":".$userid."/0";
					}
					
					$db->execute("
						UPDATE arrowchat_status
						SET typing = '" . $db->escape_string($typing_insert) . "' 
						WHERE userid = '" . $db->escape_string($value) . "'
					");
					
					if ($push_on == 1)
					{
						$arrowpush->publish(array(
							'channel' => 'u' . $value,
							'message' => array('nottyping' => array("id" => $userid))
						));
					}
				}
			}
			
			unset($_SESSION['typing_to']);
		}
	}

	header('Content-type: application/json; charset=utf-8');
	echo 1;
	close_session();
	exit;

?>