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
	
	// ########################## INCLUDE BACK-END ##########################
	require_once (dirname(dirname(dirname(__FILE__))) . DIRECTORY_SEPARATOR . 'bootstrap.php');

	if (preg_match('#public/mobile#', $_SERVER[REQUEST_URI]))
		$home_url = "../../../";
	else
		$home_url = "../../";
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
		<title>Mobile Chat</title>
		
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0" />
		<meta name="apple-mobile-web-app-capable" content="yes" />
		<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />
		<meta name="apple-touch-fullscreen" content="yes" />
		
		<link rel="apple-touch-icon" href="images/apple-touch-icon.png"/> 
		<link rel="stylesheet" href="/arrowchat/public/mobile/includes/css/jquery-mobile.css" />
		<link type="text/css" rel="stylesheet" id="arrowchat_css" media="all" href="/arrowchat/public/mobile/includes/css/style.css" charset="utf-8" />
		<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700' rel='stylesheet' type='text/css'>

		<script type="text/javascript" src="/arrowchat/includes/js/jquery.js"></script>
		<script type="text/javascript" charset="utf-8" src="/arrowchat/public/mobile/includes/js/jquery-mobile.js"></script>
		<script type="text/javascript" src="/arrowchat/includes/js/jquery-ui.js"></script>
		<script type="text/javascript" src="/arrowchat/external.php?type=djs" charset="utf-8"></script> 
		<script type="text/javascript" src="/arrowchat/external.php?type=mjs" charset="utf-8"></script> 
	</head>
    <body>
        <div data-role="page" id="page1">
            <div data-theme="b" data-role="header" data-position="fixed" data-tap-toggle="false">
                <h3>
                    <?php echo $language[110]; ?>
                </h3>
				<a data-role="button" id="home-button" data-iconshadow="false" data-iconpos="notext" data-ajax="false" data-theme="b" href="../../" data-icon="home" data-shadow="false" data-corners="false"></a>
				<a id="settings-button" data-iconpos="notext" data-iconshadow="false" data-theme="b" data-rel="dialog" data-transition="slidedown" href="#settings-page" data-icon="gear" data-shadow="false" data-corners="false"></a>
            </div>
            <div data-role="content">
				<ul id="buddylist-container-chatroom" data-role="listview" data-divider-theme="c" data-inset="false"></ul>
				<ul id="buddylist-container-recent" data-role="listview" data-divider-theme="c" data-inset="false"></ul>
                <ul id="buddylist-container-available" data-role="listview" data-divider-theme="c" data-inset="false"></ul>
				<ul id="buddylist-container-away" data-role="listview" data-divider-theme="c" data-inset="false"></ul>
            </div>
        </div>
		<div data-role="page" id="page2">
            <div data-theme="b" data-role="header" data-position="fixed" data-tap-toggle="false">
                <h3 id="username-header">
					<?php echo $language[110]; ?>
				</br>
                </h3>
                <a data-role="button" id="back-button" data-direction="reverse" data-transition="slide" data-theme="b" href="#page1" data-icon="arrow-l" data-iconshadow="false" data-iconpos="left" class="back_buttons">
                	<?php echo $language[113]; ?>
                </a>
            </div>
            <div data-role="content" class="chat_user_content">
            </div>
            <div data-theme="d" data-role="footer" data-position="fixed" data-tap-toggle="false">
                <div data-role="fieldcontain">
					<div style="width:100%; float:left; margin-top:-5px;padding-right:0px;-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing: border-box;margin-bottom:3px">
						<div class="arrowchat_giphy_box">
							<div class="arrowchat_giphy_image_wrapper"></div>
							<label class="arrowchat_giphy_search_wrapper">
								<input type="text" class="arrowchat_giphy_search" placeholder="Search GIFs..." value="" tabindex="0" />
								<div class="giphy_cancel">Cancel</div>
							</label>
						</div>
					</div>
					<input id="textinput1" placeholder="Type a message..." value="" type="text" />
					<div class="msg_controls">
						<div id="arrowchat_upload_button"><div id="arrowchat_chatroom_uploader"> </div></div>
						<div class="arrowchat_giphy_button"> </div>
						<div class="arrowchat_smiley_button"> </div>
					</div>
				</div>
				<a id="send_button" data-role="button" data-inline="true" data-transition="none" data-theme="b" href="javascript:;" style="position:absolute;top:14px;right:10px">
					Send				</a>
				<div class="smiley_box_wrapper" id="smiley_box_wrapper2"></div>
            </div>
		</div>
		<div data-role="page" id="page3">
			<div data-role="panel" data-theme="a" data-position="right" id="user-panel">
				<ul id="chatroom-users-list" data-role="listview" data-divider-theme="c" data-inset="false"></ul>
			</div>
            <div data-theme="b" data-role="header" data-position="fixed" data-tap-toggle="false">
                <h3 id="chatroom-header">
					Chat Rooms                </h3>
                <a data-role="button" id="back-button-chatroom" data-direction="reverse" data-transition="slide" data-theme="b" href="#page1" data-icon="arrow-l" data-iconshadow="false" data-iconpos="left" class="back_buttons">
					Back				</a>
				<a data-role="button" id="users-button-chatroom" data-display="push" data-theme="b" data-icon="bars" href="#user-panel" data-iconpos="notext"></a>
            </div>
            <div data-role="content" class="chat_room_content">
            </div>
            <div data-theme="d" data-role="footer" data-position="fixed" data-tap-toggle="false">
                <div data-role="fieldcontain">
					<div style="width:100%; float:left; margin-top:-5px;padding-right:0px;-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing: border-box;margin-bottom:3px">
						<div class="arrowchat_giphy_box2">
							<div class="arrowchat_giphy_image_wrapper2"></div>
							<label class="arrowchat_giphy_search_wrapper2">
								<input type="text" class="arrowchat_giphy_search2" placeholder="Search GIFs..." value="" tabindex="0" />
								<div class="giphy_cancel2">Cancel</div>
							</label>
						</div>
					</div>
					<input id="textinput2" maxlength="160" placeholder="Type a message..." value="" type="text" />
					<div class="msg_controls2">
						<div id="arrowchat_upload_button2"><div id="arrowchat_chatroom_uploader2"> </div></div>
						<div class="arrowchat_giphy_button2"> </div>
						<div class="arrowchat_smiley_button2"> </div>
					</div>
				</div>
				<a id="send_button_chatroom" data-role="button" data-inline="true" data-iconshadow="false" data-transition="none" data-theme="b" href="javascript:;" style="position:absolute;top:14px;right:10px">
					Send				</a>
				<div class="smiley_box_wrapper" id="smiley_box_wrapper3"></div>
            </div>
		</div>
		<div data-role="page" id="password-page">
			<div data-theme="b" data-role="header" data-tap-toggle="false">
				<h1>Chat Rooms</h1>
			</div>
			<div data-theme="d" data-role="content" id="chatroom-message">
				<label for="room-password">Enter the room's password:</label>
				<input type="text" name="room-password" id="room-password" value="" />
				<a href="#page3" data-theme="b" data-role="button" id="submit-chatroom-password">Enter Chat Room</a>
			</div>
		</div>
		<div data-role="dialog" id="user-error">
			<div data-theme="b" data-role="header" data-tap-toggle="false">
				<h1>Messenger</h1>
			</div>
			<div data-theme="d" data-role="content" id="user-error-content"></div>
		</div>
		<div data-role="dialog" id="chatroom-error">
			<div data-theme="b" data-role="header" data-tap-toggle="false">
				<h1>Chat Rooms</h1>
			</div>
			<div data-theme="d" data-role="content" id="chatroom-error-content"></div>
		</div>
		<div data-role="dialog" id="user-options">
			<div data-theme="b" data-role="header" data-tap-toggle="false">
				<h1></h1>
			</div>
			<div data-theme="d" data-role="content" id="user-options-content"></div>
		</div>
		<div id="arrowchat_user_upload_queue" class="arrowchat_users_upload_queue"></div>
		<div class="arrowchat_message_box">
			<div class="arrowchat_message_box_wrapper">
				<div class="message_avatar"></div>
				<div class="message_info_wrapper">
					<div class="message_username"></div>
					<div class="message_msg"></div>
				</div>
				<div class="arrowchat_clearfix"></div>
			</div>
		</div>
		<div data-role="page" id="settings-page">
			<div data-theme="b" data-role="header" data-tap-toggle="false">
				<h1>Settings</h1>
			</div>
			<div data-theme="d" data-role="content">
				<div style="margin-bottom:60px" id="chatroom-settings-container">
					<div style="float:left; width: 60%; margin-top: 11px; font-size:18px">
						Show chat rooms list					</div>
					<div style="float:right;">
						<form>
							<select name="flip-show-chatroom" id="flip-show-chatroom" data-role="slider">
								<option value="off">Off</option>
								<option value="on">On</option>
							</select>
						</form>
					</div>
				</div>
				<div>
					<div style="float:left; width: 60%; margin-top: 11px; font-size:18px">
						Show idle user list					</div>
					<div style="float:right;">
						<form>
							<select name="flip-show-idle" id="flip-show-idle" data-role="slider">
								<option value="off">Off</option>
								<option value="on">On</option>
							</select>
						</form>
					</div>
					<div class="arrowchat_clearfix"></div>
				</div>
				<div>
					<div style="float:left; width: 60%; margin-top: 11px; font-size:18px">
						Hide mobile chat tab on site					</div>
					<div style="float:right;">
						<form>
							<select name="flip-hide-mobile" id="flip-hide-mobile" data-role="slider">
								<option value="off">Off</option>
								<option value="on">On</option>
							</select>
						</form>
					</div>
					<div class="arrowchat_clearfix"></div>
				</div>
				<div>
					<div style="float:left; width: 60%; margin-top: 11px; font-size:18px">
						Select the user you wish to unblock					</div>
					<div style="float:right;">
						<form>
							<select name="unblock-mobile" id="unblock-mobile" data-mini="true" data-inline="true">
								<option value="0">Select</option>
							</select>
						</form>
					</div>
					<div class="arrowchat_clearfix"></div>
				</div>
				<div id="change-name-wrapper" style="display:none">
					<div style="float:left; width: 60%; margin-top: 11px; font-size:18px">
						Enter the name you'd like to use					</div>
					<div style="float:right;">
						<form>
							<input maxlength="25" style="width:120px;margin-top:5px;" type="text" name="change-name" id="change-name" data-mini="true" data-theme="b" />
						</form>
					</div>
					<div class="arrowchat_clearfix"></div>
				</div>
			</div>
		</div>
    </body>
</html>