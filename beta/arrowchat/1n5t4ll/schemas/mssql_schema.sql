IF OBJECT_ID('arrowchat', 'U') IS NOT NULL
  DROP TABLE arrowchat;
IF OBJECT_ID('arrowchat_admin', 'U') IS NOT NULL
  DROP TABLE arrowchat_admin;
IF OBJECT_ID('arrowchat_applications', 'U') IS NOT NULL
  DROP TABLE arrowchat_applications;
IF OBJECT_ID('arrowchat_banlist', 'U') IS NOT NULL
  DROP TABLE arrowchat_banlist;
IF OBJECT_ID('arrowchat_chatroom_banlist', 'U') IS NOT NULL
  DROP TABLE arrowchat_chatroom_banlist;
IF OBJECT_ID('arrowchat_chatroom_messages', 'U') IS NOT NULL
  DROP TABLE arrowchat_chatroom_messages;
IF OBJECT_ID('arrowchat_chatroom_rooms', 'U') IS NOT NULL
  DROP TABLE arrowchat_chatroom_rooms;
IF OBJECT_ID('arrowchat_chatroom_users', 'U') IS NOT NULL
  DROP TABLE arrowchat_chatroom_users;
IF OBJECT_ID('arrowchat_config', 'U') IS NOT NULL
  DROP TABLE arrowchat_config;
IF OBJECT_ID('arrowchat_graph_log', 'U') IS NOT NULL
  DROP TABLE arrowchat_graph_log;
IF OBJECT_ID('arrowchat_notifications', 'U') IS NOT NULL
  DROP TABLE arrowchat_notifications;
IF OBJECT_ID('arrowchat_notifications_markup', 'U') IS NOT NULL
  DROP TABLE arrowchat_notifications_markup;
IF OBJECT_ID('arrowchat_markup', 'U') IS NOT NULL
  DROP TABLE arrowchat_markup;
IF OBJECT_ID('arrowchat_reports', 'U') IS NOT NULL
  DROP TABLE arrowchat_reports;
IF OBJECT_ID('arrowchat_smilies', 'U') IS NOT NULL
  DROP TABLE arrowchat_smilies;
IF OBJECT_ID('arrowchat_status', 'U') IS NOT NULL
  DROP TABLE arrowchat_status;
IF OBJECT_ID('arrowchat_themes', 'U') IS NOT NULL
  DROP TABLE arrowchat_themes;
IF OBJECT_ID('arrowchat_trayicons', 'U') IS NOT NULL
  DROP TABLE arrowchat_trayicons;
IF OBJECT_ID('arrowchat_warnings', 'U') IS NOT NULL
  DROP TABLE arrowchat_warnings;
  
CREATE TABLE arrowchat (
  id int IDENTITY(1,1) PRIMARY KEY,
  [from] varchar(25) NULL,
  [to] varchar(25) NULL,
  message text NULL,
  sent int NULL,
  [read] int NULL,
  user_read tinyint default '0',
  direction int default '0',
  --KEY to (to),
  --KEY read (read),
  --KEY user_read (user_read),
  --KEY from (from)
);

CREATE TABLE arrowchat_admin (
  id int IDENTITY(1,1) PRIMARY KEY,
  username varchar(20) NULL,
  password varchar(50) NULL,
  email varchar(50) NULL
);

CREATE TABLE arrowchat_applications (
  id int IDENTITY(1,1) PRIMARY KEY,
  [name] varchar(100) NULL,
  folder varchar(100) NULL,
  icon varchar(100) NULL,
  width int NULL,
  height int NULL,
  bar_width int NULL,
  bar_name varchar(100) NULL,
  dont_reload tinyint default '0',
  default_bookmark tinyint default '1',
  show_to_guests tinyint default '1',
  link varchar(255) NULL,
  update_link varchar(255) NULL,
  version varchar(20) NULL,
  active tinyint default '1'
);

CREATE TABLE arrowchat_banlist (
  ban_id int IDENTITY(1,1) PRIMARY KEY,
  ban_userid varchar(25) NULL,
  ban_ip varchar(50) NULL,
  banned_by varchar(25) NULL,
  banned_time int NULL
);

CREATE TABLE arrowchat_chatroom_banlist (
  id int IDENTITY(1,1) PRIMARY KEY,
  user_id varchar(25) PRIMARY KEY,
  chatroom_id int NULL,
  ban_length int NULL,
  ban_time int NULL,
  ip_address varchar(40) NULL,
  --KEY chatroom_id (chatroom_id)
);

CREATE TABLE arrowchat_chatroom_messages (
  id int IDENTITY(1,1) PRIMARY KEY,
  chatroom_id int NULL,
  user_id varchar(25) NULL,
  username varchar(100) NULL,
  message text NULL,
  global_message tinyint default '0',
  is_mod tinyint default '0',
  is_admin tinyint default '0',
  sent int NULL,
  [action] tinyint default '0',
  --KEY chatroom_id (chatroom_id),
  --KEY user_id (user_id),
  --KEY sent (sent)
);

CREATE TABLE arrowchat_chatroom_rooms (
  id int IDENTITY(1,1) PRIMARY KEY,
  author_id varchar(25) NULL,
  [name] varchar(100) NULL,
  description varchar(100) NULL,
  welcome_message varchar(255) NULL,
  image varchar(100) NULL,
  [type] tinyint NULL,
  password varchar(25) NULL,
  length int NULL,
  is_featured tinyint NULL,
  max_users int default '0',
  limit_message_num int default '3',
  limit_seconds_num int default '10',
  disallowed_groups text NULL,
  session_time int NULL,
  --KEY session_time (session_time),
  --KEY author_id (author_id)
);

CREATE TABLE arrowchat_chatroom_users (
  user_id varchar(25) NULL,
  chatroom_id int NULL,
  is_admin tinyint default '0',
  is_mod tinyint default '0',
  block_chats tinyint default '0',
  silence_length int NULL,
  silence_time int NULL,
  session_time int NULL,
  --UNIQUE KEY user_id (user_id,chatroom_id)
  --KEY chatroom_id (chatroom_id),
  --KEY is_admin (is_admin),
  --KEY is_mod (is_mod),
  --KEY session_time (session_time)
);

CREATE TABLE arrowchat_config (
  config_name varchar(255),
  config_value text NULL,
  is_dynamic tinyint default '0',
  --UNIQUE KEY config_name (config_name)
);

CREATE TABLE arrowchat_graph_log (
  id int IDENTITY(1,1) PRIMARY KEY,
  [date] varchar(30) NULL,
  user_messages int default '0',
  chat_room_messages int default '0'
  --UNIQUE KEY date (date)
);

CREATE TABLE arrowchat_notifications (
  id int IDENTITY(1,1) PRIMARY KEY,
  to_id varchar(25) NULL,
  author_id varchar(25) NULL,
  author_name char(100) NULL,
  misc1 varchar(255) NULL,
  misc2 varchar(255) NULL,
  misc3 varchar(255) NULL,
  [type] int NULL,
  alert_read int default '0',
  user_read int default '0',
  alert_time int NULL,
  --KEY to_id (to_id),
  --KEY alert_read (alert_read),
  --KEY user_read (user_read),
  --KEY alert_time (alert_time)
);

CREATE TABLE arrowchat_notifications_markup (
  id int IDENTITY(1,1) PRIMARY KEY,
  [name] varchar(50) NULL,
  [type] int NULL,
  markup text NULL
);

CREATE TABLE arrowchat_reports (
	id int IDENTITY(1,1) PRIMARY KEY,
	report_from varchar(25) NULL,
	report_about varchar(25) NULL,
	report_chatroom int NULL,
	report_time int NULL,
	working_by varchar(25) NULL,
	working_time int NULL,
	completed_by varchar(25) NULL,
	completed_time int NULL
);

CREATE TABLE arrowchat_smilies (
  id int IDENTITY(1,1) PRIMARY KEY,
  [name] varchar(20) NULL,
  code varchar(20) NULL
);

CREATE TABLE arrowchat_status (
  userid varchar(25) PRIMARY KEY,
  guest_name varchar(50) NULL,
  message text NULL,
  status varchar(10) NULL,
  theme int NULL,
  popout int NULL,
  typing text NULL,
  hide_bar tinyint NULL,
  play_sound tinyint default '1',
  window_open tinyint NULL,
  only_names tinyint NULL,
  chatroom_window varchar(6) default '-1',
  chatroom_stay varchar(6) default '0',
  chatroom_unfocus text NULL,
  chatroom_show_names tinyint NULL,
  chatroom_block_chats tinyint NULL,
  chatroom_sound tinyint NULL,
  announcement tinyint default '1',
  unfocus_chat text NULL,
  focus_chat varchar(50) NULL,
  last_message text NULL,
  clear_chats text NULL,
  apps_bookmarks text NULL,
  apps_other text NULL,
  apps_open int NULL,
  apps_load text NULL,
  block_chats text NULL,
  session_time int NULL,
  is_admin tinyint default '0',
  is_mod tinyint default '0',
  hash_id varchar(20) NULL,
  ip_address varchar(40) NULL,
  --KEY hash_id (hash_id),
  --KEY session_time (session_time)
);

CREATE TABLE arrowchat_themes (
  id int IDENTITY(1,1) PRIMARY KEY,
  folder varchar(25) NULL,
  [name] varchar(100) NULL,
  active tinyint NULL,
  update_link varchar(255) NULL,
  version varchar(20) NULL,
  [default] tinyint NULL
);

CREATE TABLE arrowchat_trayicons (
  id int IDENTITY(1,1) PRIMARY KEY,
  [name] varchar(100) NULL,
  icon varchar(100) NULL,
  location varchar(255) NULL,
  target varchar(25) NULL,
  width int NULL,
  height int NULL,
  tray_width int NULL,
  tray_name varchar(100) NULL,
  tray_location int NULL,
  active tinyint default '1'
);

CREATE TABLE arrowchat_warnings (
	id int IDENTITY(1,1) PRIMARY KEY,
	user_id varchar(25) NULL,
	warn_reason text NULL,
	warned_by varchar(25) NULL,
	warning_time int NULL,
	user_read tinyint default '0'
);
