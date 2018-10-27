DROP TABLE IF EXISTS `arrowchat`;
DROP TABLE IF EXISTS `arrowchat_admin`;
DROP TABLE IF EXISTS `arrowchat_applications`;
DROP TABLE IF EXISTS `arrowchat_banlist`;
DROP TABLE IF EXISTS `arrowchat_chatroom_banlist`;
DROP TABLE IF EXISTS `arrowchat_chatroom_messages`;
DROP TABLE IF EXISTS `arrowchat_chatroom_rooms`;
DROP TABLE IF EXISTS `arrowchat_chatroom_users`;
DROP TABLE IF EXISTS `arrowchat_config`;
DROP TABLE IF EXISTS `arrowchat_graph_log`;
DROP TABLE IF EXISTS `arrowchat_notifications`;
DROP TABLE IF EXISTS `arrowchat_notifications_markup`;
DROP TABLE IF EXISTS `arrowchat_reports`;
DROP TABLE IF EXISTS `arrowchat_smilies`;
DROP TABLE IF EXISTS `arrowchat_status`;
DROP TABLE IF EXISTS `arrowchat_themes`;
DROP TABLE IF EXISTS `arrowchat_trayicons`;
DROP TABLE IF EXISTS `arrowchat_warnings`;

CREATE TABLE IF NOT EXISTS `arrowchat` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `from` varchar(25) character set utf8mb4 collate utf8mb4_unicode_ci NOT NULL,
  `to` varchar(25) character set utf8mb4 collate utf8mb4_unicode_ci NOT NULL,
  `message` text character set utf8mb4 collate utf8mb4_unicode_ci NOT NULL,
  `sent` int(10) unsigned NOT NULL,
  `read` int(10) unsigned NOT NULL,
  `user_read` tinyint(1) NOT NULL default '0',
  `direction` int(10) unsigned NOT NULL default '0',
  PRIMARY KEY  (`id`),
  KEY `to` (`to`),
  KEY `read` (`read`),
  KEY `user_read` (`user_read`),
  KEY `from` (`from`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS `arrowchat_admin` (
  `id` int(3) unsigned NOT NULL auto_increment,
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS `arrowchat_applications` (
  `id` int(3) unsigned NOT NULL auto_increment,
  `name` varchar(100) character set utf8mb4 collate utf8mb4_unicode_ci NOT NULL,
  `folder` varchar(100) character set utf8mb4 collate utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(100) character set utf8mb4 collate utf8mb4_unicode_ci NOT NULL,
  `width` int(4) unsigned NOT NULL,
  `height` int(4) unsigned NOT NULL,
  `bar_width` int(3) unsigned default NULL,
  `bar_name` varchar(100) default NULL,
  `dont_reload` tinyint(1) unsigned default '0',
  `default_bookmark` tinyint(1) unsigned default '1',
  `show_to_guests` tinyint(1) unsigned default '1',
  `link` varchar(191) default NULL,
  `update_link` varchar(191) default NULL,
  `version` varchar(20) default NULL,
  `active` tinyint(1) unsigned NOT NULL default '1',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS `arrowchat_banlist` (
  `ban_id` int(10) unsigned NOT NULL auto_increment,
  `ban_userid` varchar(25) default NULL,
  `ban_ip` varchar(50) default NULL,
  `banned_by` varchar(25) NOT NULL,
  `banned_time` int(20) unsigned NOT NULL,
  PRIMARY KEY  (`ban_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS `arrowchat_chatroom_banlist` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `user_id` varchar(25) NOT NULL,
  `chatroom_id` int(10) unsigned NOT NULL,
  `ban_length` int(10) unsigned NOT NULL,
  `ban_time` int(10) unsigned NOT NULL,
  `ip_address` varchar(40) default NULL,
  PRIMARY KEY  (`id`),
  KEY `user_id` (`user_id`),
  KEY `chatroom_id` (`chatroom_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS `arrowchat_chatroom_messages` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `chatroom_id` int(10) unsigned NOT NULL,
  `user_id` varchar(25) NOT NULL,
  `username` varchar(100) collate utf8mb4_unicode_ci NOT NULL,
  `message` text collate utf8mb4_unicode_ci NOT NULL,
  `global_message` tinyint(1) unsigned default '0',
  `is_mod` tinyint(1) unsigned default '0',
  `is_admin` tinyint(1) unsigned default '0',
  `sent` int(10) unsigned NOT NULL,
  `action` tinyint(1) unsigned default '0',
  PRIMARY KEY  (`id`),
  KEY `chatroom_id` (`chatroom_id`),
  KEY `user_id` (`user_id`),
  KEY `sent` (`sent`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=30;

CREATE TABLE IF NOT EXISTS `arrowchat_chatroom_rooms` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `author_id` varchar(25) NOT NULL,
  `name` varchar(100) collate utf8mb4_unicode_ci NOT NULL,
  `description` varchar(100) collate utf8mb4_unicode_ci default '',
  `welcome_message` varchar(191) collate utf8mb4_unicode_ci default '',
  `image` varchar(100) collate utf8mb4_unicode_ci default '',
  `type` tinyint(1) unsigned NOT NULL,
  `password` varchar(25) collate utf8mb4_unicode_ci default NULL,
  `length` int(10) unsigned NOT NULL,
  `is_featured` tinyint(1) unsigned default NULL,
  `max_users` int(10) NOT NULL default '0',
  `limit_message_num` int(5) NOT NULL default '3',
  `limit_seconds_num` int(5) NOT NULL default '10',
  `disallowed_groups` text collate utf8mb4_unicode_ci NOT NULL,
  `session_time` int(10) unsigned NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `session_time` (`session_time`),
  KEY `author_id` (`author_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS `arrowchat_chatroom_users` (
  `user_id` varchar(25) NOT NULL,
  `chatroom_id` int(10) unsigned NOT NULL,
  `is_admin` tinyint(1) unsigned NOT NULL default '0',
  `is_mod` tinyint(1) unsigned NOT NULL default '0',
  `block_chats` tinyint(4) unsigned NOT NULL default '0',
  `silence_length` int(3) unsigned default NULL,
  `silence_time` int(15) unsigned default NULL,
  `session_time` int(15) unsigned NOT NULL,
  UNIQUE KEY `user_id` (`user_id`,`chatroom_id`),
  KEY `chatroom_id` (`chatroom_id`),
  KEY `is_admin` (`is_admin`),
  KEY `is_mod` (`is_mod`),
  KEY `session_time` (`session_time`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS `arrowchat_config` (
  `config_name` varchar(191) character set utf8mb4 collate utf8mb4_unicode_ci NOT NULL,
  `config_value` text,
  `is_dynamic` tinyint(1) unsigned NOT NULL default '0',
  UNIQUE KEY `config_name` (`config_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS `arrowchat_graph_log` (
  `id` int(6) unsigned NOT NULL auto_increment,
  `date` varchar(30) NOT NULL,
  `user_messages` int(10) unsigned default '0',
  `chat_room_messages` int(10) unsigned default '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `date` (`date`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS `arrowchat_notifications` (
  `id` int(25) unsigned NOT NULL auto_increment,
  `to_id` varchar(25) NOT NULL,
  `author_id` varchar(25) NOT NULL,
  `author_name` varchar(100) NOT NULL,
  `misc1` varchar(191) default NULL,
  `misc2` varchar(191) default NULL,
  `misc3` varchar(191) default NULL,
  `type` int(3) unsigned NOT NULL,
  `alert_read` int(1) unsigned NOT NULL default '0',
  `user_read` int(1) unsigned NOT NULL default '0',
  `alert_time` int(15) unsigned NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `to_id` (`to_id`),
  KEY `alert_read` (`alert_read`),
  KEY `user_read` (`user_read`),
  KEY `alert_time` (`alert_time`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS `arrowchat_notifications_markup` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `name` varchar(50) NOT NULL,
  `type` int(3) unsigned NOT NULL,
  `markup` text NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS `arrowchat_reports` (
	`id` int(25) unsigned NOT NULL auto_increment,
	`report_from` varchar(25) NOT NULL,
	`report_about` varchar(25) NOT NULL,
	`report_chatroom` int(10) unsigned NOT NULL,
	`report_time` int(20) unsigned NOT NULL,
	`working_by` varchar(25) NOT NULL,
	`working_time` int(20) unsigned NOT NULL,
	`completed_by` varchar(25) NOT NULL,
	`completed_time` int(20) unsigned NOT NULL,
	PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS `arrowchat_smilies` (
  `id` int(3) unsigned NOT NULL auto_increment,
  `name` varchar(20) NOT NULL,
  `code` varchar(20) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS `arrowchat_status` (
  `userid` varchar(25) NOT NULL,
  `guest_name` varchar(50) default NULL,
  `message` text,
  `status` varchar(10) default NULL,
  `theme` int(3) unsigned default NULL,
  `popout` int(11) unsigned default NULL,
  `typing` text,
  `hide_bar` tinyint(1) unsigned default NULL,
  `play_sound` tinyint(1) unsigned default '1',
  `window_open` tinyint(1) unsigned default NULL,
  `only_names` tinyint(1) unsigned default NULL,
  `chatroom_window` varchar(6) NOT NULL default '-1',
  `chatroom_stay` varchar(6) NOT NULL default '0',
  `chatroom_unfocus` text,
  `chatroom_show_names` tinyint(1) unsigned default NULL,
  `chatroom_block_chats` tinyint(1) unsigned default NULL,
  `chatroom_sound` tinyint(1) unsigned default NULL,
  `announcement` tinyint(1) unsigned NOT NULL default '1',
  `unfocus_chat` text,
  `focus_chat` varchar(50) default NULL,
  `last_message` text,
  `clear_chats` text,
  `apps_bookmarks` text,
  `apps_other` text,
  `apps_open` int(10) unsigned default NULL,
  `apps_load` text,
  `block_chats` text,
  `session_time` int(20) unsigned NOT NULL default '0',
  `is_admin` tinyint(1) unsigned NOT NULL default '0',
  `is_mod` tinyint(1) unsigned NOT NULL default '0',
  `hash_id` varchar(20) NOT NULL default '0',
  `ip_address` varchar(40) default '',
  PRIMARY KEY  (`userid`),
  KEY `hash_id` (`hash_id`),
  KEY `userid` (`userid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS `arrowchat_themes` (
  `id` int(3) unsigned NOT NULL auto_increment,
  `folder` varchar(25) NOT NULL,
  `name` varchar(100) NOT NULL,
  `active` tinyint(1) unsigned NOT NULL,
  `update_link` varchar(191) default NULL,
  `version` varchar(20) default NULL,
  `default` tinyint(1) unsigned NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS `arrowchat_trayicons` (
  `id` int(3) unsigned NOT NULL auto_increment,
  `name` varchar(100) character set utf8mb4 collate utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(100) NOT NULL,
  `location` varchar(191) NOT NULL,
  `target` varchar(25) default NULL,
  `width` int(4) unsigned default NULL,
  `height` int(4) unsigned default NULL,
  `tray_width` int(3) unsigned default NULL,
  `tray_name` varchar(100) character set utf8mb4 collate utf8mb4_unicode_ci default NULL,
  `tray_location` int(3) unsigned NOT NULL,
  `active` tinyint(1) unsigned NOT NULL default '1',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS `arrowchat_warnings` (
	`id` int(25) unsigned NOT NULL auto_increment,
	`user_id` varchar(25) NOT NULL,
	`warn_reason` text,
	`warned_by` varchar(25) NOT NULL,
	`warning_time` int(20) unsigned NOT NULL,
	`user_read` tinyint(1) unsigned NOT NULL default '0',
	PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;