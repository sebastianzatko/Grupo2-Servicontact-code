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

	// Require any necessary external files for retrieving the user's session

		
	/**
	 * The database information
	 *
	 * Your existing users and information should already be in this database.  Do NOT create
	 * a new database for ArrowChat.
	*/
	define('DB_SERVER','localhost'); 
	define('DB_USERNAME','u740561717_chang'); 
	define('DB_PASSWORD','ch4ng3r0_5464t8'); 
	define('DB_NAME','u740561717_chang');	
		
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
	*/
	define('TABLE_PREFIX','');
	
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
	 */
	define('DB_USERTABLE','USUARIOS'); 
	define('DB_USERTABLE_NAME',"NOMBRE"); 
	define('DB_USERTABLE_USERID','idUSUARIO'); 
	define('DB_USERTABLE_AVATAR','FOTO_DE_PERFIL'); 
	
	define('DB_FRIENDSTABLE','CHAT'); 
	define('DB_FRIENDSTABLE_USERID', 'id_usuario'); 
	define('DB_FRIENDSTABLE_FRIENDID', 'id_usuario2'); 
	define('DB_FRIENDSTABLE_FRIENDS', 'friends');
	
	/**
	 * Friend System
	 *
	 * If your website does not have a friend system (ex: you want to display all online users) then
	 * change the value below from 0 to 1.
	*/
	define('NO_FREIND_SYSTEM', '0');
	
	/**
	 * MSSQL Database
	 *
	 * If your database is MSSQL then change the value below from 0 to 1.
	*/
	define('MSSQL_DATABASE', '0');
	
	/**
	 * Emoji Support
	 *
	 * Do not change this value. You must reinstall ArrowChat.
	*/
	define('EMOJI_SUPPORT', '1');
		
	// DO NOT EDIT BELOW THIS POINT
	// Initiate a connection to the database
	if (MSSQL_DATABASE == 1)
		$db = new QuickMSDB(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME, false, false, false);
	else
	{
		if (EMOJI_SUPPORT == 1)
			$db = new QuickDB(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME, false, false, true);
		else
			$db = new QuickDB(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME, false, false, false);
	}

?>
