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

	// The list of integrations to be displayed for installation
	// Keys:
	// 		0 - Display name for the integration
	// 		1 - Identifier for the integration used in the back-end
	// 		2 - The default database server host
	// 		3 - The default database port
	// 		4 - The location of a configuration file to check the ArrowChat folder is located within the integration

	$installs = array(
				"standalone" => array(0 => "Standalone", 1 => "standalone", 2 => "localhost", 3 => "3306", 4 => array("v1" => array("All Versions", "/"))),
				"buddypress" => array(0 => "BuddyPress", 1 => "buddypress", 2 => "localhost", 3 => "3306", 4 => array("v1" => array("All Versions", "/wp-load.php"))),
				"burningboard" => array(0 => "Burning Board", 1 => "burningboard", 2 => "localhost", 3 => "3306", 4 => array("v1" => array("All Versions", "/"))),
				"cbuilder" => array(0 => "Community Builder", 1 => "cbuilder", 2 => "localhost", 3 => "3306", 4 => array("v1" => array("All Versions", "/configuration.php"))),
				"concrete5" => array(0 => "Concrete5", 1 => "concrete5", 2 => "localhost", 3 => "3306", 4 => array("v5.7" => array("Version 5.7+", "/application/config/database.php"), "v5.6" => array("Version 5.6", "/config/site.php"))),
				"datalifeengine" => array(0 => "Datalife Engine", 1 => "datalifeengine", 2 => "localhost", 3 => "3306", 4 => array("v10" => array("Version 10+", "/engine/data/config.php"), "v9" => array("Version 9", "/engine/data/config.php"))),
				"datingpro" => array(0 => "PG Dating Pro", 1 => "datingpro", 2 => "localhost", 3 => "3306", 4 => array("v1" => array("All Versions", "/config.php"))),
				"datingscript" => array(0 => "DatingScript", 1 => "datingscript", 2 => "localhost", 3 => "3306", 4 => array("v1" => array("All Versions", "/system/base.php"))),
				"dolphin" => array(0 => "Boonex Dolphin", 1 => "dolphin", 2 => "localhost", 3 => "3306", 4 => array("v1" => array("All Versions", "/inc/header.inc.php"))),
				"drupal" => array(0 => "Drupal", 1 => "drupal", 2 => "localhost", 3 => "3306", 4 => array("v1" => array("All Versions", "/includes/bootstrap.inc"))),
				"dzoic" => array(0 => "DZOIC", 1 => "dzoic", 2 => "localhost", 3 => "3306", 4 => array("v1" => array("All Versions", "/includes/config/config.inc.php"))),
				"e107" => array(0 => "e107", 1 => "e107", 2 => "localhost", 3 => "3306", 4 => array("v1" => array("All Versions", "/e107_config.php"))),
				"easysocial" => array(0 => "EasySocial", 1 => "easysocial", 2 => "localhost", 3 => "3306", 4 => array("v1" => array("All Versions", "/configuration.php"))),
				"elgg" => array(0 => "Elgg", 1 => "elgg", 2 => "localhost", 3 => "3306", 4 => array("v2.0" => array("Version 2.0+", "/elgg-config/settings.php"),"v1.10" => array("Version 1.10-1.12", "/engine/settings.php"), "v1.8" => array("Version 1.8-1.9", "/engine/settings.php"), "v1.7" => array("Version 1.7", "/engine/settings.php"))),
				"expressionengine" => array(0 => "ExpressionEngine", 1 => "expressionengine", 2 => "localhost", 3 => "3306", 4 => array("v1" => array("All Versions", "/system/expressionengine/config/config.php"))),
				"ilias" => array(0 => "ILIAS", 1 => "ilias", 2 => "localhost", 3 => "3306", 4 => array("v1" => array("All Versions", "/setup/setup.php"))),
				"ipboard" => array(0 => "IP.Board", 1 => "ipboard", 2 => "localhost", 3 => "3306", 4 => array("v4.1" => array("Version 4.1+", "/conf_global.php"), "v4" => array("Version 4", "/conf_global.php"), "v3" => array("Version <=3", "/conf_global.php"))),
				"jamroom" => array(0 => "Jamroom", 1 => "jamroom", 2 => "localhost", 3 => "3306", 4 => array("v4" => array("Version 4", "/config/settings.cfg.php"))),
				"jcow" => array(0 => "JCow", 1 => "jcow", 2 => "localhost", 3 => "3306", 4 => array("v1" => array("All Versions", "/my/config.php"))),
				"jomsocial" => array(0 => "JomSocial", 1 => "jomsocial", 2 => "localhost", 3 => "3306", 4 => array("v1" => array("All Versions", "/configuration.php"))),
				"jomwall" => array(0 => "JomWall", 1 => "jomwall", 2 => "localhost", 3 => "3306", 4 => array("v1" => array("All Versions", "/configuration.php"))),
				"joomla" => array(0 => "Joomla", 1 => "joomla", 2 => "localhost", 3 => "3306", 4 => array("v1" => array("All Versions", "/configuration.php"))),
				"kunena" => array(0 => "Kunena", 1 => "kunena", 2 => "localhost", 3 => "3306", 4 => array("v1" => array("All Versions", "/configuration.php"))),
				"mediawiki" => array(0 => "MediaWiki", 1 => "mediawiki", 2 => "localhost", 3 => "3306", 4 => array("v1" => array("All Versions", "/LocalSettings.php"))),
				"moosocial" => array(0 => "mooSocial", 1 => "moosocial", 2 => "localhost", 3 => "3306", 4 => array("v1" => array("All Versions", "/app/Config/config.php"))),
				"mybb" => array(0 => "MyBB", 1 => "mybb", 2 => "localhost", 3 => "3306", 4 => array("v1" => array("All Versions", "/inc/config.php"))),
				"offiria" => array(0 => "Offiria", 1 => "offiria", 2 => "localhost", 3 => "3306", 4 => array("v1" => array("All Versions", "/configuration.php"))),
				"osdate" => array(0 => "osDate", 1 => "osdate", 2 => "localhost", 3 => "3306", 4 => array("v1" => array("All Versions", "/temp/myconfigs/config.php"))),
				"oxwall" => array(0 => "Oxwall", 1 => "oxwall", 2 => "localhost", 3 => "3306", 4 => array("v1" => array("All Versions", "/ow_includes/config.php"))),
				"phpbb" => array(0 => "phpBB", 1 => "phpbb", 2 => "localhost", 3 => "3306", 4 => array("v3" => array("Version 3.1+", "/config.php"), "v2" => array("Version 2.0-3.0", "/config.php"))),
				"phpfox" => array(0 => "phpFox", 1 => "phpfox", 2 => "localhost", 3 => "3306", 4 => array("v4.2" => array("Version 4.2+", "/PF.Base/include/init.inc.php"), "v4" => array("Version 4", "/PF.Base/include/init.inc.php"), "v3" => array("Version 3", "/include/init.inc.php"))),
				"phpnuke" => array(0 => "PHP-Nuke", 1 => "phpnuke", 2 => "localhost", 3 => "3306", 4 => array("v1" => array("All Versions", "/config.php"))),
				"sharetronix" => array(0 => "Sharetronix", 1 => "sharetronix", 2 => "localhost", 3 => "3306", 4 => array("v1" => array("All Versions", "/system/conf_main.php"))),
				"skadate" => array(0 => "SkaDate", 1 => "skadate", 2 => "localhost", 3 => "3306", 4 => array("v10" => array("Version 10", "/ow_includes/config.php"), "v9" => array("Version <=9", "/"))),
				"smf" => array(0 => "Simple Machines Forum", 1 => "smf", 2 => "localhost", 3 => "3306", 4 => array("v2" => array("Version 2", "/Settings.php"), "v1" => array("Version 1", "/Settings.php"))),
				"socialengine" => array(0 => "Social Engine 3", 1 => "socialengine", 2 => "localhost", 3 => "3306", 4 => array("v4" => array("Version 4", "/application/settings/database.php"), "v3" => array("Version 3", "/include/database_config.php"))),
				"socialscript" => array(0 => "SocialScript", 1 => "socialscript", 2 => "localhost", 3 => "3306", 4 => array("v1" => array("All Versions", "/system/base.php"))),
				"socialstrap" => array(0 => "SocialStrap", 1 => "socialstrap", 2 => "localhost", 3 => "3306", 4 => array("v1" => array("All Versions", "/config.php"))),
				"vanilla" => array(0 => "Vanilla", 1 => "vanilla", 2 => "localhost", 3 => "3306", 4 => array("v1" => array("All Versions", "/conf/config.php"))),
				"vbulletin" => array(0 => "vBulletin", 1 => "vbulletin", 2 => "localhost", 3 => "3306", 4 => array("v5" => array("Version 5", "/core/includes/config.php"), "v4" => array("Version 3-4", "/includes/config.php"))),
				"vldpersonals" => array(0 => "vldPersonals", 1 => "vldpersonals", 2 => "localhost", 3 => "3306", 4 => array("v1" => array("All Versions", "/includes/cp.php"))),
				"wordpress" => array(0 => "WordPress", 1 => "wordpress", 2 => "localhost", 3 => "3306", 4 => array("v1" => array("All Versions", "/wp-load.php"))),
				"xenforo" => array(0 => "XenForo", 1 => "xenforo", 2 => "localhost", 3 => "3306", 4 => array("v2" => array("Version 2", "/src/config.php"), "v1" => array("Version 1", "/library/config.php"))),
				"xoops" => array(0 => "XOOPS", 1 => "xoops", 2 => "localhost", 3 => "3306", 4 => array("v1" => array("All Versions", "/mainfile.php")))
			);
			
?>