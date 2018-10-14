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
	
	/**
	 * Check if a file has write permissions
	 *
	 * @param	string	$file	The path to the file to be checked
	 * @return	bool	True if it can be written; false if it cannot
	*/
	function is_file_writable($file)
	{
		if (strtolower(substr(PHP_OS, 0, 3)) === 'win' OR !function_exists('is_writable'))
		{
			if (file_exists($file))
			{
				// Canonicalise path to absolute path
				if (is_dir($file))
				{
					// Test directory by creating a file inside the directory
					$result = @tempnam($file, 'i_w');

					if (is_string($result) AND file_exists($result))
					{
						unlink($result);

						// Ensure the file is actually in the directory (returned realpathed)
						return (strpos($result, $file) === 0) ? true : false;
					}
				}
				else
				{
					$handle = @fopen($file, 'r+');

					if (is_resource($handle))
					{
						fclose($handle);
						return true;
					}
				}
			}
			else
			{
				// file does not exist test if we can write to the directory
				$dir = dirname($file);

				if (file_exists($dir) AND is_dir($dir) AND is_file_writable($dir))
				{
					return true;
				}
			}

			return false;
		}
		else
		{
			return is_writable($file);
		}
	}

	/**
	 * Checks whether the folder is writable
	 *
	 * @param	string	$path	The path to the folder to check
	 * @return	bool	Return true if folder is writable; false if not
	*/
	function is__writable($path) 
	{
		if ($path{strlen($path) - 1} == '/')
		{
			return is__writable($path . uniqid(mt_rand()) . '.tmp');
		}
		else if (is_dir($path))
		{
			return is__writable($path . '/' . uniqid(mt_rand()) . '.tmp');
		}
		
		$rm = file_exists($path);
		$f = @fopen($path, 'a');
		
		if ($f === false)
		{
			return false;
		}
		
		fclose($f);
		
		if (!$rm)
		{
			unlink($path);
		}
		
		return true;
	}
	
	/**
	 * Checks whether the server can run the DLL for the database
	 *
	 * @param	string	$dll	The DLL name to check
	 * @return	bool	Return true if it can; false if not
	*/
	function can_load_dll($dll)
	{
		if ($dll == 'sqlite' AND version_compare(PHP_VERSION, '5.0.0', '>=') AND !extension_loaded('pdo'))
		{
			return false;
		}
		
		return ((@ini_get('enable_dl') OR strtolower(@ini_get('enable_dl')) == 'on') AND (!@ini_get('safe_mode') OR strtolower(@ini_get('safe_mode')) == 'off') AND function_exists('dl') AND @dl($dll . '.' . PHP_SHLIB_SUFFIX)) ? true : false;
	}
	
	/**
	 * Checks which databases the server can run
	 *
	 * @return	bool	Return true if it can run MySQL; false if not
	*/
	function checkDB() 
	{
		$available_dbms = array(
			'mysql'		=> array(
				'LABEL'			=> 'MySQL',
				'SCHEMA'		=> 'mysql',
				'MODULE'		=> 'mysql',
				'DELIM'			=> ';',
				'COMMENTS'		=> 'remove_remarks',
				'DRIVER'		=> 'mysql',
				'AVAILABLE'		=> true,
				'2.0.x'			=> true,
			)
		);
		
		foreach ($available_dbms as $db_name => $db_ary)
		{
			if ($only_20x_options AND !$db_ary['2.0.x'])
			{
				if ($return_unavailable)
				{
					$available_dbms[$db_name]['AVAILABLE'] = false;
				}
				else
				{
					unset($available_dbms[$db_name]);
				}
				continue;
			}

			$dll = $db_ary['MODULE'];

			if (!@extension_loaded($dll))
			{
				if (!can_load_dll($dll))
				{
					if ($return_unavailable)
					{
						$available_dbms[$db_name]['AVAILABLE'] = false;
					}
					else
					{
						unset($available_dbms[$db_name]);
					}
					continue;
				}
			}
			$any_db_support = true;
		}
		
		if ($any_db_support)
		{
			$check = true;
		}
		else
		{
			$check = false;
		}
			
		return $check;
	}
	
	/**
	 * Splits the SQL file into queries
	 *
	 * @param	string	$sql	The full SQL to split
	 * @param	string	$sql	The delimiter to split at
	 * @return	array	An array of the split SQL
	*/
	function split_sql_file($sql, $delimiter)
	{
		$sql = str_replace("\r" , '', $sql);
		$data = preg_split('/' . preg_quote($delimiter, '/') . '$/m', $sql);
		$data = array_map('trim', $data);
		$end_data = end($data);

		if (empty($end_data))
		{
			unset($data[key($data)]);
		}

		return $data;
	}
	
	/**
	 * Removes comments/remakes from an SQL file
	 *
	 * @param	string	$sql	The SQL string to remove remarks from
	*/	
	function remove_remarks(&$sql)
	{
		$sql = preg_replace('/\n{2,}/', "\n", preg_replace('/^#.*$/m', "\n", $sql));
	}
	
	/**
	 * Updates the settings for ArrowChat by writing a new cache file
	 *
	*/
	function write_config_file()
	{
		global $no_friend_system;
		
		$include_data = "";
			
		if ($_SESSION['version'] == "vbulletin_v4")
			$include_data = "
	require_once dirname(dirname(dirname(__FILE__))).\"/includes/config.php\";";
	
		if ($_SESSION['version'] == "vbulletin_v5")
			$include_data = "
	require_once dirname(dirname(dirname(__FILE__))).\"/core/includes/config.php\";";

		if ($_SESSION['version'] == "xoops_v1")
			$include_data = "
	require_once dirname(dirname(dirname(__FILE__))).\"/mainfile.php\";";
			
		if ($_SESSION['version'] == "smf_v1")
			$include_data = "
	require_once dirname(dirname(dirname(__FILE__))).\"/Settings.php\";";
	
		if ($_SESSION['version'] == "smf_v2")
			$include_data = "
	require_once dirname(dirname(dirname(__FILE__))).\"/Settings.php\";";
			
		if ($_SESSION['version'] == "socialengine_v3")
			$include_data = "
	require_once dirname(dirname(dirname(__FILE__))).\"/include/database_config.php\";";
			
		if ($_SESSION['version'] == "dzoic_v1")
			$include_data = "
	require_once dirname(dirname(dirname(__FILE__))).\"/includes/config/config.inc.php\";";
			
		if ($_SESSION['version'] == "ipboard_v3")
			$include_data = "
	require_once dirname(dirname(dirname(__FILE__))).\"/conf_global.php\";";
			
		if ($_SESSION['version'] == "jcow_v1")
			$include_data = "
	\$_REQUEST['p'] = \"feed\";
	chdir(dirname(dirname(dirname(__FILE__))));
	require_once dirname(dirname(dirname(__FILE__))).\"/includes/boot.inc.php\";
	chdir(dirname(__FILE__));";

		if ($_SESSION['version'] == "osdate_v1")
			$include_data = "
	session_start();";
			
		if ($_SESSION['version'] == "jomsocial_v1")
			$include_data = "
	define('_JEXEC',1);
	define('DS',DIRECTORY_SEPARATOR);
	define('JPATH_BASE',dirname(dirname(dirname(__FILE__))));
	require_once dirname(dirname(dirname(__FILE__))).'/includes/defines.php';
	require_once dirname(dirname(dirname(__FILE__))).'/includes/framework.php';
	\$mainframe =& JFactory::getApplication('site');
	\$mainframe->initialise();";

		if ($_SESSION['version'] == "joomla_v1")
			$include_data = "
	define('_JEXEC',1);
	define('DS',DIRECTORY_SEPARATOR);
	define('JPATH_BASE',dirname(dirname(dirname(__FILE__))));
	require_once dirname(dirname(dirname(__FILE__))).'/includes/defines.php';
	require_once dirname(dirname(dirname(__FILE__))).'/includes/framework.php';
	\$mainframe =& JFactory::getApplication('site');
	\$mainframe->initialise();";
	
		if ($_SESSION['version'] == "easysocial_v1")
			$include_data = "
	define('_JEXEC',1);
	define('DS',DIRECTORY_SEPARATOR);
	define('JPATH_BASE',dirname(dirname(dirname(__FILE__))));
	require_once dirname(dirname(dirname(__FILE__))).'/includes/defines.php';
	require_once dirname(dirname(dirname(__FILE__))).'/includes/framework.php';
	\$mainframe =& JFactory::getApplication('site');
	\$mainframe->initialise();";
	
		if ($_SESSION['version'] == "jomwall_v1")
			$include_data = "
	define('_JEXEC',1);
	define('DS',DIRECTORY_SEPARATOR);
	define('JPATH_BASE',dirname(dirname(dirname(__FILE__))));
	require_once dirname(dirname(dirname(__FILE__))).'/includes/defines.php';
	require_once dirname(dirname(dirname(__FILE__))).'/includes/framework.php';
	\$mainframe =& JFactory::getApplication('site');
	\$mainframe->initialise();";
	
		if ($_SESSION['version'] == "kunena_v1")
			$include_data = "
	define('_JEXEC',1);
	define('DS',DIRECTORY_SEPARATOR);
	define('JPATH_BASE',dirname(dirname(dirname(__FILE__))));
	require_once dirname(dirname(dirname(__FILE__))).'/includes/defines.php';
	require_once dirname(dirname(dirname(__FILE__))).'/includes/framework.php';
	\$mainframe =& JFactory::getApplication('site');
	\$mainframe->initialise();";
	
		if ($_SESSION['version'] == "offiria_v1")
			$include_data = "
	define('_JEXEC',1);
	define('DS',DIRECTORY_SEPARATOR);
	define('JPATH_BASE',dirname(dirname(dirname(__FILE__))));
	require_once dirname(dirname(dirname(__FILE__))).'/includes/defines.php';
	require_once dirname(dirname(dirname(__FILE__))).'/includes/framework.php';
	\$mainframe = JFactory::getApplication('site');
	\$mainframe->initialise();";

		if ($_SESSION['version'] == "oxwall_v1")
			$include_data = "
	define('_OW_', true);
	define('DS', DIRECTORY_SEPARATOR);
	define('OW_DIR_ROOT', dirname(dirname(dirname(__FILE__))) . DS);
	require_once(OW_DIR_ROOT . 'ow_includes' . DS . 'init.php');
	OW::getSession()->start();";
	
		if ($_SESSION['version'] == "skadate_v10")
			$include_data = "
	define('_OW_', true);
	define('DS', DIRECTORY_SEPARATOR);
	define('OW_DIR_ROOT', dirname(dirname(dirname(__FILE__))) . DS);
	require_once(OW_DIR_ROOT . 'ow_includes' . DS . 'init.php');
	OW::getSession()->start();";

		if ($_SESSION['version'] == "cbuilder_v1")
			$include_data = "
	define('_JEXEC',1);
	define('DS',DIRECTORY_SEPARATOR);
	define('JPATH_BASE',dirname(dirname(dirname(__FILE__))));
	require_once dirname(dirname(dirname(__FILE__))).'/includes/defines.php';
	require_once dirname(dirname(dirname(__FILE__))).'/includes/framework.php';
	\$mainframe =& JFactory::getApplication('site');
	\$mainframe->initialise();";
	
		if ($_SESSION['version'] == "phpfox_v3")
			$include_data = "
	define('PHPFOX', true);
	define('PHPFOX_DS', DIRECTORY_SEPARATOR);
	define('PHPFOX_DIR', dirname(dirname(dirname(__FILE__))) . PHPFOX_DS);
	define('PHPFOX_NO_SESSION', true);
	require_once dirname(dirname(dirname(__FILE__))) . '/include/init.inc.php';";
	
		if ($_SESSION['version'] == "phpfox_v4")
			$include_data = "
	define('PHPFOX', true);
	define('PHPFOX_DS', DIRECTORY_SEPARATOR);
	define('PHPFOX_DIR', dirname(dirname(dirname(__FILE__))) . PHPFOX_DS . 'PF.Base' . PHPFOX_DS);
	define('PHPFOX_NO_SESSION', true);
	require_once dirname(dirname(dirname(__FILE__))) . '/PF.Base/include/init.inc.php';";
	
		if ($_SESSION['version'] == "phpfox_v4.2")
			$include_data = "
	\$phpfox_array = array();
	\$phpfox_array = require_once dirname(dirname(dirname(__FILE__))) . '/PF.Base/file/cache/setting.php';";
		
		if ($_SESSION['version'] == "sharetronix_v1")
			$include_data = "
	require_once dirname(dirname(dirname(__FILE__))).\"/system/conf_main.php\";";

		if ($_SESSION['version'] == "standalone_v1")
			$include_data = "";
			
		$stringData = "<?php 

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

	// Require any necessary external files for retrieving the user's session
";
		
		$stringData .= $include_data;
		
		$stringData .= "
		
	/**
	 * The database information
	 *
	 * Your existing users and information should already be in this database.  Do NOT create
	 * a new database for ArrowChat.
	*/";
		$stringData .= "
	define('DB_SERVER','" . $_SESSION['db_host'] . "'); 
	define('DB_USERNAME','" . $_SESSION['db_username'] . "'); 
	define('DB_PASSWORD','" . $_SESSION['db_password'] . "'); 
	define('DB_NAME','" . $_SESSION['db_name'] . "');";
	
		$stringData .= "	
		
	/**
	 * The table prefix can be left blank. A quick example of what you should input here:
	 *
	 * Example - Pretend the following list are tables:
	 * phpbb_friends
	 * phpbb_threads
	 * phpbb_users
	 *
	 * In the example above, the prefix would be phpbb_ because everything starts with it.
	 *
	 * Example - Pretend the following list are tables:
	 * friends
	 * threads
	 * users
	 *
	 * In the example above, the prefix would be blank.
	*/";
	
		$stringData .= "
	define('TABLE_PREFIX','" . $_SESSION['db_prefix'] . "');";
	
		$stringData .= "
	
	/**
	 * These variables will help automatically connect your existing website with ArrowChat.  Please
	 * review the descriptions below to better understand them. DO NOT INCLUDE THE PREFIX WITH THESE
	 * VALUES!
	 *
	 * DB_USERTABLE		   		= The name of the user's table
	 * DB_USERTABLE_USERID 		= The field for the user ID in the user's table
	 * DB_USERTABLE_NAME   		= The field for the username in the user's table
	 * DB_USERTABLE_AVATAR 		= The field for the avatar (input the user ID field if none exists)
	 *
	 * DB_FRIENDSTABLE	   		= (Optional) The name of the friend's table
	 * DB_FRIENDSTABLE_USERID	= (Optional) The field for the user ID in the friend's table
	 * DB_FRIENDSTABLE_FRIENDID	= (Optional) The field for the relationship/friend ID in the firned's table
	 * DB_FRIENDSTABLE_FRIENDS	= (Optional) The field to check if the users are friends
	 *
	 * All the friends stuff is optional.  If your site does not have a friend's system, leave the
	 * values blank and change the no friend system value.
	 */";
	 
		$stringData .= "
	define('DB_USERTABLE','" . $_SESSION['config_table_user'] . "'); 
	define('DB_USERTABLE_NAME','" . $_SESSION['config_field_username'] . "'); 
	define('DB_USERTABLE_USERID','" . $_SESSION['config_field_userid'] . "'); 
	define('DB_USERTABLE_AVATAR','" . $_SESSION['config_field_avatar'] . "'); 
	
	define('DB_FRIENDSTABLE','" . $_SESSION['config_table_friends'] . "'); 
	define('DB_FRIENDSTABLE_USERID', '" . $_SESSION['config_field_friend_userid'] . "'); 
	define('DB_FRIENDSTABLE_FRIENDID', '" . $_SESSION['config_field_friendid'] . "'); 
	define('DB_FRIENDSTABLE_FRIENDS', '" . $_SESSION['config_field_friend_check'] . "');";
	
		$stringData .= "
	
	/**
	 * Friend System
	 *
	 * If your website does not have a friend system (ex: you want to display all online users) then
	 * change the value below from 0 to 1.
	*/";
	
		$stringData .= "
	define('NO_FREIND_SYSTEM', '" . $no_friend_system . "');";
	
		$stringData .= "
	
	/**
	 * MSSQL Database
	 *
	 * If your database is MSSQL then change the value below from 0 to 1.
	*/";
	
		$stringData .= "
	define('MSSQL_DATABASE', '" . $_SESSION['db_type'] . "');";
	
		$stringData .= "
	
	/**
	 * Emoji Support
	 *
	 * Do not change this value. You must reinstall ArrowChat.
	*/";
	
		$stringData .= "
	define('EMOJI_SUPPORT', '" . $_SESSION['emoji_support'] . "');";
	
		$stringData .= "
		
	// DO NOT EDIT BELOW THIS POINT
	// Initiate a connection to the database
	if (MSSQL_DATABASE == 1)
		\$db = new QuickMSDB(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME, false, false, false);
	else
	{
		if (EMOJI_SUPPORT == 1)
			\$db = new QuickDB(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME, false, false, true);
		else
			\$db = new QuickDB(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME, false, false, false);
	}

?>";
		// Rename old Config File
		if (file_exists(dirname(dirname(dirname(__FILE__))) . DIRECTORY_SEPARATOR . "includes" . DIRECTORY_SEPARATOR . "config.php"))
		{
			rename(dirname(dirname(dirname(__FILE__))) . DIRECTORY_SEPARATOR . "includes" . DIRECTORY_SEPARATOR . "config.php", dirname(dirname(dirname(__FILE__))) . DIRECTORY_SEPARATOR . "includes" . DIRECTORY_SEPARATOR . "config.old." . time() . ".php");
		}
		
		// Write new Config File
		$myFile = dirname(dirname(dirname(__FILE__))) . DIRECTORY_SEPARATOR . "includes" . DIRECTORY_SEPARATOR . "config.new.php";
		$fh = fopen($myFile, 'w') or die("Can't open includes/config.new.php file.  Please make this file writable.");
		fwrite($fh, $stringData);
		fclose($fh);
		
		// Rename new Config File to config.php
		rename(dirname(dirname(dirname(__FILE__))) . DIRECTORY_SEPARATOR . "includes" . DIRECTORY_SEPARATOR . "config.new.php", dirname(dirname(dirname(__FILE__))) . DIRECTORY_SEPARATOR . "includes" . DIRECTORY_SEPARATOR . "config.php");
	}

	/**
	 * Renames the integration file to be used
	 *
	 * @return	bool	Return true if the file was renamed; false if not
	*/
	function write_functions_file()
	{
		$rename = false;

		if (file_exists(dirname(dirname(dirname(__FILE__))) . DIRECTORY_SEPARATOR . "includes/functions/integrations/functions_".$_SESSION['version'].".php"))
		{
			$rename = rename(dirname(dirname(dirname(__FILE__))) . DIRECTORY_SEPARATOR . "includes/functions/integrations/functions_".$_SESSION['version'].".php", dirname(dirname(dirname(__FILE__))) . DIRECTORY_SEPARATOR . "includes/integration.php");
		}
		else
		{
			$rename = true;
		}
		
		return $rename;
	}
	
	/**
	 * Returns the instructions on how to add the header/footer code for each integration
	 *
	 * @param	string	$version	The version to get instructions for
	 * @return	string	The instructions in text form
	*/
	function getFinalInstructions($version) 
	{
		switch($version)
		{
			case "phpbb_v2":
				return "In phpBB, you can edit the header and footer files by going to the phpBB Admin Panel > Styles > Templates > Click Edit Next to your Active Style > Choose overall_footer.html and overall_header.html from the dropdown menu.";
				break;
				
			case "phpbb_v3":
				return "In phpBB, you can edit the header and footer files by going to the following folder via FTP: /styles/{style name}/template/. Then, edit the overall_header.html and overall_footer.html files. These files should have the &lt;head&gt; and &lt;/body&gt; tags. Do a Ctrl+F to find them. You will also need to clear the phpBB cache by clicking 'Purge the cache' in the dashboard of the phpBB administrator panel.";
				break;
				
			case "vbulletin_v4":
				return "In vBulletin, you can edit the header and footer files by going to the vBulletin Admin Panel > Styles & Templates > Style Manager.  Now select the style you want ArrowChat to appear on and hit Go.  In the headinclue box, paste the ArrowChat header code at the top.  In the footer box, place the ArrowChat footer code at the bottom.  Hit Save at the bottom.";
				break;
				
			case "vbulletin_v5":
				return "In vBulletin, you can edit the header and footer files by going to the vBulletin Admin Panel > Styles > Style Manager.  Next to your active style, select 'Edit Templates' from the dropdown box.  Double-click the head_include template, paste the ArrowChat header code at the top, and hit save.  Next, double-click the footer template, paste the ArrowChat footer code at the bottom, and hit save.";
				break;
			
			case "jomsocial_v1":
				return "In JomSocial, you can edit the header and footer files by going to the Joomla Admin Panel > Extensions > Template Manager.  Next, select the active template (usually indicated by a star).  Click on the Edit HTML button (top-right corner). In Joomla 3, you will need to select 'Templates' in the template manager > Select your active template > Select the index.php file.  This file should have the &lt;head&gt; and &lt;/body&gt; tags.  Do a Ctrl+F to find them.";
				break;
				
			case "joomla_v1":
				return "In Joomla, you can edit the header and footer files by going to the Joomla Admin Panel > Extensions > Template Manager.  Next, select the active template (usually indicated by a star).  Click on the Edit HTML button (top-right corner). In Joomla 3, you will need to select 'Templates' in the template manager > Select your active template > Select the index.php file.  This file should have the &lt;head&gt; and &lt;/body&gt; tags.  Do a Ctrl+F to find them.";
				break;
				
			case "jomwall_v1":
				return "In JomWall, you can edit the header and footer files by going to the Joomla Admin Panel > Extensions > Template Manager.  Next, select the active template (usually indicated by a star).  Click on the Edit HTML button (top-right corner). In Joomla 3, you will need to select 'Templates' in the template manager > Select your active template > Select the index.php file.  This file should have the &lt;head&gt; and &lt;/body&gt; tags.  Do a Ctrl+F to find them.";
				break;
				
			case "kunena_v1":
				return "In Kunena, you can edit the header and footer files by going to the Joomla Admin Panel > Extensions > Template Manager.  Next, select the active template (usually indicated by a star).  Click on the Edit HTML button (top-right corner). In Joomla 3, you will need to select 'Templates' in the template manager > Select your active template > Select the index.php file.  This file should have the &lt;head&gt; and &lt;/body&gt; tags.  Do a Ctrl+F to find them.";
				break;
				
			case "cbuilder_v1":
				return "In Community Builder, you can edit the header and footer files by going to the Joomla Admin Panel > Extensions > Template Manager.  Next, select the active template (usually indicated by a star).  Click on the Edit HTML button (top-right corner). In Joomla 3, you will need to select 'Templates' in the template manager > Select your active template > Select the index.php file.  This file should have the &lt;head&gt; and &lt;/body&gt; tags.  Do a Ctrl+F to find them.";
				break;
				
			case "wordpress_v1":
				return "In WordPress, you can edit the header and footer files by going to the WordPress Admin Panel > Appearance > Editor > Edit the Header and Footer files (usually header.php and footer.php) of your active theme.";
				break;
				
			case "buddypress_v1":
				return "In BuddyPress, you can edit the header and footer files by going to the WordPress Admin Panel > Appearance > Editor > Edit the Header and Footer files (usually header.php and footer.php) of your active theme.";
				break;
				
			case "dzoic_v1":
				return "In DZOIC, you can change the header and footer by editing the /themes/handshakes_plain/templates/source/header.tpl and footer.tpl files (where handshakes_plain is the theme name).";
				break;
				
			case "smf_v1":
				return "In Simple Machines Forum, you can change the header and footer by editing the index.php file in your SMF root folder.";
				break;
				
			case "smf_v2":
				return "In Simple Machines Forum, you can change the header and footer by editing the following file: /themes/default/index.template.php (where default is the name of your current theme).";
				break;
				
			case "elgg_v2.0":
				return "In Elgg, you can edit the header and footer files by going to the following folder via FTP: /vendor/elgg/elgg/views/default/page/elements/.  Then, edit the head.php and foot.php files.  Paste our code at the very top of the files before any other characters.  You may also need to clear the Elgg cache by clicking 'Flush the caches' in the dashboard of the Elgg administrator panel.";
				break;
			
			case "elgg_v1.10":
				return "In Elgg, you can edit the header and footer files by going to the following folder via FTP: /views/default/page/elements/.  Then, edit the head.php and foot.php files.  Paste our code at the very top of the files before any other characters.  You may also need to clear the Elgg cache by clicking 'Flush the caches' in the dashboard of the Elgg administrator panel.";
				break;
				
			case "elgg_v1.8":
				return "In Elgg, you can edit the header and footer files by going to the following folder via FTP: /views/default/page/elements/.  Then, edit the head.php and footer.php files.  You may also need to clear the Elgg cache by clicking 'Flush the caches' in the dashboard of the Elgg administrator panel.";
				break;
				
			case "elgg_v1.7":
				return "In Elgg, you can edit the header and footer files by going to the following folder via FTP: /views/default/page/elements/.  Then, edit the head.php and footer.php files.  You may also need to clear the Elgg cache by clicking 'Flush the caches' in the dashboard of the Elgg administrator panel.";
				break;
				
			case "jcow_v1":
				return "In JCow, you can edit the header and footer files by going to the following folder: /themes/{Your Active Theme}/.  Then, edit the page.tpl.php file.";
				break;
				
			case "socialengine_v3":
				return "In Social Engine 3, you can edit the header and footer files by going to the SocialEngine Admin Panel.  Under the layout settings tab, select the HTML Templates option.  Next, select the header_global.tpl and footer.tpl files.";
				break;
				
			case "socialengine_v4":
				return "In Social Engine 4, you can edit the header and footer files by going to the SocialEngine Admin Panel > Layout > Layout Editor > Click \"Editing: Home Page\" and select Site Header > Drag and Drop an HTML Block above everything and paste in the header code.  Then click Editing: Site Header and select Site Footer.  Do the same for the footer code and drag a new HTML Block below everything.  <b>Do not give the HTML blocks a title.</b>";
				break;
				
			case "dolphin_v1":
				return "In Dolphin, you can edit the header and footer files by browsing to your /templates/base/ folder via FTP and editing the _header.html and _footer.html files.  You'll also need to clear the template cache by going to your Dolphin admin panel's home page and clicking Tools > Cache and then \"Templates\" under \"Clear Cache\".  In addition, you'll also need to remove the \"member menu\" if you haven't already.  This can be done by going to your Dolphin admin panel > Settings > Templates > Settings > Uncheck \"Enable Member Menu\".";
				break;
				
			case "drupal_v1":
				return "In Drupal, you can edit the header and footer by editing the page.tpl.php file located in the Drupal directory at /themes/garland/page.tpl.php (where garland is your theme name).";
				break;
				
			case "ipboard_v3":
				return "In IP.Board, you can edit the header and footer files by going to the IP.Board Admin Panel, clicking Look & Feel and then clicking the down arrow next to your active skin(s) and select Manage Templates.  Under Global Templates, select globalTemplate.";
				break;
				
			case "ipboard_v4":
				return "In IPS, you can edit the header and footer files by going to the IPS Admin Panel, hover over 'Customization', and then clicking 'Themes'.  Click the 'Designers Mode' button and enable the mode.  Using FTP, browse to /IPS Root Folder/themes/{theme number}/html/core/front/global/.  In this folder, edit the globalTemplate.phtml file.  Be sure that you put the code after the &lt;head&gt; tag and before the &lt;/body&gt; tag.  You can do ctrl+F to find these in the file.  Finally, go back to the IPS admin panel and click the 'Designers Mode Enabled' button.  Disable the mode and synchronize the changes.";
				break;
				
			case "ipboard_v4.1":
				return "In IPS, you can edit the header and footer files by going to the IPS Admin Panel, hover over 'Customization', and then clicking 'Themes'.  Click the 'Designers Mode' button and enable the mode.  Using FTP, browse to /IPS Root Folder/themes/{theme number}/html/core/front/global/.  In this folder, edit the globalTemplate.phtml file.  Be sure that you put the code after the &lt;head&gt; tag and before the &lt;/body&gt; tag.  You can do ctrl+F to find these in the file.  Finally, go back to the IPS admin panel and click the 'Designers Mode Enabled' button.  Disable the mode and synchronize the changes.";
				break;
				
			case "jamroom_v4":
				return "In Jamroom, you can edit the header and footer files by logging in as an admin to Jamroom > Admin Options > System Tools > Template Editor > Search for skins/<Your Theme>/jr_header.tpl and jr_footer.tpl > Click Edit Template.";
				break;
				
			case "phpnuke_v1":
				return "In PHP-Nuke, you can edit the header and footer files by going to the following folder: /php-nuke root/.  Then, edit the header.php and footer.php files.  Be sure that you put the code after the &lt;head&gt; tag and before the &lt;/body&gt; tag.  You can do ctrl+F to find these in the file.";
				break;
				
			case "phpfox_v3":
				return "In phpFox, you can change the header and footer by logging in to the phpFox admin dashboard > Extensions > Manage Themes > Click the down arrow on your theme > Edit Templates > template.html.php.";
				break;
				
			case "phpfox_v4":
				return "In phpFox 4, you can edit the header and footer by going to the following folder: /PF.Site/themes/{theme number}/html/.  Then, edit the layout.html file.  Be sure that you put the code after the &lt;head&gt; tag and before the &lt;/body&gt; tag.  You can do ctrl+F to find these in the file.";
				break;
				
			case "phpfox_v4.2":
				return "In phpFox, you can change the header and footer by logging in to the phpFox admin dashboard > Themes > Mouse over your active theme and click Edit > Click HTML on the side bar.  Be sure that you put the code after the &lt;head&gt; tag and before the &lt;/body&gt; tag then click save.";
				break;
			
			case "skadate_v9":
				return "In SkaDate, you can edit the header and footer files by going to the following folder: /layout/.  Then, edit the Layout.tpl file.  It is IMPORTANT that you place the header code directly after the <head> tag in SkaDate.  Additionally, you may need to refresh the layout cache by browsing to /\$internal_c/components/{your theme's name}/ and deleting the layout folder.";
				break;
				
			case "skadate_v10":
				return "In SkaDate X, you can edit the header and footer files by going to the following folder: /SkaDate Root/ow_themes/{your theme}/master_pages/html_document.html.  Be sure that you put the code after the &lt;head&gt; tag and before the &lt;/body&gt; tag.  You can do ctrl+F to find these in the file.  You may also need to clear the cache by going to ow_smarty/templace_c/ and deleting the file with html_document.html.php on the end.";
				break;
	
			case "xenforo_v1":
				return "In XenForo, you can edit the header and footer files by going to the XenForo Admin Panel > Appearance > Templates > Select the PAGE_CONTAINER template.";
				break;
				
			case "xenforo_v2":
				return "In XenForo, you can edit the header and footer files by going to the XenForo Admin Panel > Appearance > Templates > Select the PAGE_CONTAINER template.";
				break;
				
			case "osdate_v1":
				return "In osDate, you can edit the header and footer files by going to the following folder: /templates/{your theme}/.  Then, edit the index_header.tpl and footer.tpl files.  Be sure that you put the header code after the &lt;head&gt; tag and the footer code at the bottom of the footer.tpl file.";
				break;
				
			case "oxwall_v1":
				return "In Oxwall, you can edit the header and footer files by going to the following folder: /Oxwall root/ow_themes/{your theme}/master_pages/html_document.html.  Be sure that you put the code after the &lt;head&gt; tag and before the &lt;/body&gt; tag.  You can do ctrl+F to find these in the file.  You may also need to clear the cache by going to ow_smarty/templace_c/ and deleting the file with html_document.html.php on the end.";
				break;
				
			case "vldpersonals_v1":
				return "In vldPersonals, you can edit the header and footer files by going to the following folder: /templates/webby2/ (where webby2 is the name of your theme).  Then, edit the header.tpl and footer.tpl files.";
				break;
				
			case "mybb_v1":
				return "In MyBB, you can edit the header and footer templates by going to the MyBB Admin Panel > Templates & Style > Templates > Expand Templates.  The header can be changed in the Ungrouped Templates called headerinclude.  The footer can be changed in the Footer Templates under footer.";
				break;
				
			case "xoops_v1":
				return "In XOOPS, you can edit the header and footer files by going to the XOOPS Admin Panel > Templates > Select your active theme > theme.html.";
				break;
				
			case "concrete5_v5.6":
				return "In Concrete5, you can edit the header and footer files by going to the following folder: /concrete/themes/{your theme's name}/elements/.  Then, edit the header.php and footer.php files.  Be sure that you put the code after the &lt;head&gt; tag and before the &lt;/body&gt; tag.  You can do ctrl+F to find these in the file.";
				break;
				
			case "concrete5_v5.7":
				return "In Concrete5, you can edit the header and footer files by going to the following folder: /concrete/themes/{your theme's name}/elements/.  Then, edit the header.php and footer.php files.  Be sure that you put the code after the &lt;head&gt; tag and before the &lt;/body&gt; tag.  You can do ctrl+F to find these in the file.";
				break;
				
			case "e107_v1":
				return "In e107, you can edit the header and footer files by going to the following folder: /e107_core/templates/.  Then, edit the header_default.php and footer_default.php files.  Be sure that you put the code after the &lt;head&gt; tag and before the &lt;/body&gt; tag.  You can do ctrl+F to find these in the file.  The ArrowChat code must be placed within the single quotes.";
				break;
				
			case "expressionengine_v1":
				return "In ExpressionEngine, you can edit the header and footer files by going to the Admin Panel > Design > Templates > Global Variables.  Click on html_head for the header and html_close for the footer.";
				break;
				
			case "mediawiki_v1":
				return "In MediaWiki, you can edit the header and footer by going to the following folder: /skins/.  Then, edit the .php file named after your theme.  If your theme is named 'Vector' then you would edit Vector.php in this folder.  Ignore the &lt;head&gt; and &lt;/body&gt; tags.  You'll need to place the header code right on top of the footer code.  Find the code this->html( 'headelement' ); in the file by pressing Ctrl+F.  Place the ArrowChat header/footer code right before the first &lt;div&gt; element or do an echo of the code right after if no HTML exists.  This edit is more complicated than usual, so please feel free to open up a support ticket if you need help.";
				break;
				
			case "offiria_v1":
				return "In Offiria, you can edit the header and footer files by going to the following folder: /templates/offiria/.  Then, edit the index.php file.  Be sure that you put the code after the &lt;head&gt; tag and before the &lt;/body&gt; tag.  You can do ctrl+F to find these in the file.";
				break;
				
			case "sharetronix_v1":
				return "In Sharetronix, you can edit the header and footer files by going to the following folder: /static/templates/system/layout/.  Then, edit the header.php and footer.php files.  Be sure that you put the code after the &lt;head&gt; tag and before the &lt;/body&gt; tag.  You can do ctrl+F to find these in the file.";
				break;
				
			case "vanilla_v1":
				return "In Vanilla, you can edit the header and footer files by going to the following folder: /applications/dashboard/views/.  Then, edit the default.master.tpl file.  Be sure that you put the code after the &lt;head&gt; tag and before the &lt;/body&gt; tag.  You can do ctrl+F to find these in the file.";
				break;
				
			case "burningboard_v1":
				return "In Burning Board, you can edit the header and footer files by going to the following folder: /templates/.  Then, edit the headInclude.tpl and footer.tpl files.  The header code should go at the very top of the headInclude.tpl file and the footer code should go at the very bottom of the footer.tpl file.";
				break;
				
			case "easysocial_v1":
				return "In EasySocial, you can edit the header and footer files by going to the Joomla Admin Panel > Extensions > Template Manager.  Next, select the active template (usually indicated by a star).  Click on the Edit HTML button (top-right corner).  In Joomla 3, you will need to select 'Templates' in the template manager > Select your active template > Select the index.php file.  This file should have the &lt;head&gt; and &lt;/body&gt; tags.  Do a Ctrl+F to find them.";
				break;
				
			case "datingpro_v1":
				return "In PG Dating Pro, you can edit the header and footer files by going to the following folder: /application/views/default/.  Then, edit the header.tpl and footer.tpl files.  Be sure that you put the code after the &lt;head&gt; tag and before the &lt;/body&gt; tag.  You can do ctrl+F to find these in the file.";
				break;
				
			case "ilias_v1":
				return "In ILIAS, you can edit the header and footer files by going to the following folder: /templates/default/.  Then, edit the tpl.main.html file.  Be sure that you put the code after the &lt;head&gt; tag and before the &lt;/body&gt; tag.  You can do ctrl+F to find these in the file.";
				break;
				
			case "datalifeengine_v9":
				return "In Datalife Engine, you can edit the header and footer files by going to the following folder: /templates/{your theme's name}/.  Then, edit the main.tpl file.  Be sure that you put the code after the &lt;head&gt; tag and before the &lt;/body&gt; tag.  You can do ctrl+F to find these in the file.";
				break;
				
			case "datalifeengine_v10":
				return "In Datalife Engine, you can edit the header and footer files by going to the following folder: /templates/{your theme's name}/.  Then, edit the main.tpl file.  Be sure that you put the code after the &lt;head&gt; tag and before the &lt;/body&gt; tag.  You can do ctrl+F to find these in the file.";
				break;
				
			case "moosocial_v1":
				return "In mooSocial, you can edit the header and footer files by going to the following folder: /app/View/Layouts/.  Then, edit the default.ctp file.  Be sure that you put the code after the &lt;head&gt; tag and before the &lt;/body&gt; tag.  You can do ctrl+F to find these in the file.";
				break;
				
			case "socialstrap_v1":
				return "In SocialStrap, you can edit the header and footer files by going to the following folder: /app/core/views/layout/_layout/.  Then, edit the header.phtml and end.phtml files.  Be sure that you put the code after the &lt;head&gt; tag and before the &lt;/body&gt; tag.  You can do ctrl+F to find these in the file.";
				break;
				
			case "datingscript_v1":
				return "In SocialScript, you can edit the header and footer files by going to the following folder: /templates/your_template/.  Then, edit the header.php and footer.php files.  Be sure that you put the code after the &lt;head&gt; tag and before the &lt;/body&gt; tag.  You can do ctrl+F to find these in the file.";
				break;

			case "socialscript_v1":
				return "In SocialScript, you can edit the header and footer files by going to the following folder: /templates/your_template/.  Then, edit the header.php and footer.php files.  Be sure that you put the code after the &lt;head&gt; tag and before the &lt;/body&gt; tag.  You can do ctrl+F to find these in the file.";
				break;
				
			case "standalone_v1":
				return "If you have a header and footer file you can simply add this code to them, otherwise, you will need to add this code to each page you wish ArrowChat to be on.";
				break;
		}
	}
	
	/**
	 * Returns the current relative folder path without the filename
	 *
	 * @param	string	$php_self	The folder path
	 * @return	string	The folder path without filename
	*/
	function GetFileDir($php_self) 
	{ 
		$filename = explode("/", $php_self);
		$filename2 = "";
		
		for( $i = 0; $i < (count($filename) - 1); ++$i ) 
		{ 
			$filename2 .= $filename[$i] . '/'; 
		} 
		
		return $filename2; 
	} 
	
?>