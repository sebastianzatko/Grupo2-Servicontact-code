<?php

	/*
	|| #################################################################### ||
	|| #                             ArrowChat                            # ||
	|| # ---------------------------------------------------------------- # ||
	|| #         Copyright ©2010 GloTouch LLC. All Rights Reserved.       # ||
	|| # This file may not be redistributed in whole or significant part. # ||
	|| # ---------------- ARROWCHAT IS NOT FREE SOFTWARE ---------------- # ||
	|| #   http://www.arrowchat.com | http://www.arrowchat.com/license/   # ||
	|| #################################################################### ||
	*/
	
	if (file_exists(dirname(dirname(__FILE__)) . DIRECTORY_SEPARATOR . 'includes' . DIRECTORY_SEPARATOR . "integration.php")) require_once (dirname(dirname(__FILE__)) . DIRECTORY_SEPARATOR . 'includes' . DIRECTORY_SEPARATOR . "integration.php"); else die("The includes/integration.php file does not exist.  We recommend running the install folder instead of the upgrade folder.");
	
	if (!function_exists('get_group_id'))
	{
		function get_group_id(){return array(1);}
		$group_disable_arrowchat = 0;
		$group_disable_apps = 0;
		$group_disable_video = 0;
		$group_disable_rooms = 0;
		$group_disable_uploads  = 0;
		$group_disable_sending_private = 0;
		$group_disable_sending_rooms = 0;
	}
	
	// Start Session and Include Core Files
	session_start();
	require_once(dirname(dirname(__FILE__)) . DIRECTORY_SEPARATOR . "bootstrap.php");

	// Check Admin is Logged In
	require_once(dirname(dirname(__FILE__)) . DIRECTORY_SEPARATOR . AC_FOLDER_ADMIN . DIRECTORY_SEPARATOR . "includes/admin_init.php");
	
	// Set Upgrade Ran Test Variable to False
	$ran = false;
	
	// Do all the upgrades
	if (isset($_POST['upgrade']) || isset($_POST['upgrade_x'])) 
	{
		$result = $db->execute("
			ALTER TABLE arrowchat_status
			ADD INDEX userid (userid)
		");
		
		$result = $db->execute("
			ALTER TABLE arrowchat_status
			ENGINE = MyISAM
		");

		if ($result)
		{
			update_config_file();
			$ran = true;
		}
		else
		{
			die("There was a mySQL error or the upgrade was already run.  Make sure your MySQL user has the ability to create tables.");
		}
	}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr"> 
<head profile="http://gmpg.org/xfn/11"> 
 
	<title>ArrowChat | Upgrade Installation</title> 
 
</head> 
 
<body> 

	<div style="font-size: 14px; font-family: arial, verdana; margin: 0 auto; width: 700px; margin-top: 50px;">
	
		<span style="font-weight: bold; font-size: 18px;">ArrowChat Upgrade Process</span>
		
		<br /><br />
		
<?php
	if ($ran) {
?>
		Your ArrowChat installation has been upgraded.  It is safe to delete the upgrade folder.
<?php
	} else {
?>
		Running this upgrade process will make the necessary upgrades to your ArrowChat database structure.  This is not requried on a fresh install of ArrowChat.  It is safe to delete the upgrade folder after this process is run or on a fresh install of ArrowChat.
		
		<br /><br />
		
		<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data"> 
		
			<input type="submit" name="upgrade" value="Run Upgrade" />
		
		</form>
<?php
	}
?>
	
	</div>

</body>
</html>