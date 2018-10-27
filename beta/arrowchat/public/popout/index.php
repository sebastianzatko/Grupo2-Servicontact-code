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
	require_once (dirname(dirname(dirname(__FILE__))) . DIRECTORY_SEPARATOR . 'bootstrap.php');

	$load_chatroom_id		= get_var('cid');
	$autohide_panel			= get_var('ah');
	
	if (!is_numeric($load_chatroom_id))
		$load_chatroom_id = 0;
		
	if ($autohide_panel != 1 AND $autohide_panel != 0)
		$autohide_panel = 0;

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-gb" xml:lang="en-gb"> 
<head> 

	<title><?php echo $language[110]; ?></title>
	
	<link type="text/css" rel="stylesheet" media="all" href="<?php echo $base_url; ?>external.php?type=css" charset="utf-8" /> 
	
	<script type="text/javascript" src="<?php echo $base_url; ?><?php echo AC_FOLDER_INCLUDES; ?>/js/jquery.js"></script>
	<script type="text/javascript" src="<?php echo $base_url; ?><?php echo AC_FOLDER_INCLUDES; ?>/js/jquery-ui.js"></script>
	<script type="text/javascript" src="<?php echo $base_url; ?>external.php?type=djs" charset="utf-8"></script> 
	<script type="text/javascript" src="<?php echo $base_url; ?>external.php?type=pjs" charset="utf-8"></script> 
	<script type="text/javascript">
		var ac_load_chatroom_id = <?php echo htmlspecialchars($load_chatroom_id); ?>;
		var ac_autohide_panel = <?php echo htmlspecialchars($autohide_panel); ?>;
	</script>
	
	<style type="text/css"> 
		body, html {
			margin: 0px;
			padding: 0px;
			height: 100%;
			width: 100%;
			font-size: 11px;
			font-family: "Helvetica Neue", "Segoe UI", Helvetica, Arial, sans-serif;
		}
.ps-container{-ms-touch-action:none;touch-action:none;overflow:hidden !important;-ms-overflow-style:none}@supports (-ms-overflow-style: none){.ps-container{overflow:auto !important}}@media screen and (-ms-high-contrast: active), (-ms-high-contrast: none){.ps-container{overflow:auto !important}}.ps-container.ps-active-x>.ps-scrollbar-x-rail,.ps-container.ps-active-y>.ps-scrollbar-y-rail{display:block;background-color:transparent}.ps-container.ps-in-scrolling{pointer-events:none}.ps-container.ps-in-scrolling.ps-x>.ps-scrollbar-x-rail{background-color:#eee;opacity:.9}.ps-container.ps-in-scrolling.ps-x>.ps-scrollbar-x-rail>.ps-scrollbar-x{background-color:#999}.ps-container.ps-in-scrolling.ps-y>.ps-scrollbar-y-rail{background-color:#eee;opacity:.9}.ps-container.ps-in-scrolling.ps-y>.ps-scrollbar-y-rail>.ps-scrollbar-y{background-color:#999}.ps-container>.ps-scrollbar-x-rail{display:none;position:absolute;opacity:0;-webkit-transition:background-color .2s linear, opacity .2s linear;-moz-transition:background-color .2s linear, opacity .2s linear;-o-transition:background-color .2s linear, opacity .2s linear;transition:background-color .2s linear, opacity .2s linear;bottom:0px;height:15px}.ps-container>.ps-scrollbar-x-rail>.ps-scrollbar-x{position:absolute;background-color:#aaa;-webkit-border-radius:6px;-moz-border-radius:6px;border-radius:6px;-webkit-transition:background-color .2s linear, height .2s linear, width .2s ease-in-out, -webkit-border-radius .2s ease-in-out;transition:background-color .2s linear, height .2s linear, width .2s ease-in-out, -webkit-border-radius .2s ease-in-out;-moz-transition:background-color .2s linear, height .2s linear, width .2s ease-in-out, border-radius .2s ease-in-out, -moz-border-radius .2s ease-in-out;-o-transition:background-color .2s linear, height .2s linear, width .2s ease-in-out, border-radius .2s ease-in-out;transition:background-color .2s linear, height .2s linear, width .2s ease-in-out, border-radius .2s ease-in-out;transition:background-color .2s linear, height .2s linear, width .2s ease-in-out, border-radius .2s ease-in-out, -webkit-border-radius .2s ease-in-out, -moz-border-radius .2s ease-in-out;bottom:2px;height:6px}.ps-container>.ps-scrollbar-x-rail:hover>.ps-scrollbar-x,.ps-container>.ps-scrollbar-x-rail:active>.ps-scrollbar-x{height:11px}.ps-container>.ps-scrollbar-y-rail{display:none;position:absolute;opacity:0;-webkit-transition:background-color .2s linear, opacity .2s linear;-moz-transition:background-color .2s linear, opacity .2s linear;-o-transition:background-color .2s linear, opacity .2s linear;transition:background-color .2s linear, opacity .2s linear;right:0;width:15px}.ps-container>.ps-scrollbar-y-rail>.ps-scrollbar-y{position:absolute;background-color:#aaa;-webkit-border-radius:6px;-moz-border-radius:6px;border-radius:6px;-webkit-transition:background-color .2s linear, height .2s linear, width .2s ease-in-out, -webkit-border-radius .2s ease-in-out;transition:background-color .2s linear, height .2s linear, width .2s ease-in-out, -webkit-border-radius .2s ease-in-out;-moz-transition:background-color .2s linear, height .2s linear, width .2s ease-in-out, border-radius .2s ease-in-out, -moz-border-radius .2s ease-in-out;-o-transition:background-color .2s linear, height .2s linear, width .2s ease-in-out, border-radius .2s ease-in-out;transition:background-color .2s linear, height .2s linear, width .2s ease-in-out, border-radius .2s ease-in-out;transition:background-color .2s linear, height .2s linear, width .2s ease-in-out, border-radius .2s ease-in-out, -webkit-border-radius .2s ease-in-out, -moz-border-radius .2s ease-in-out;right:2px;width:6px}.ps-container>.ps-scrollbar-y-rail:hover>.ps-scrollbar-y,.ps-container>.ps-scrollbar-y-rail:active>.ps-scrollbar-y{width:11px}.ps-container:hover.ps-in-scrolling{pointer-events:none}.ps-container:hover.ps-in-scrolling.ps-x>.ps-scrollbar-x-rail{background-color:#eee;opacity:.9}.ps-container:hover.ps-in-scrolling.ps-x>.ps-scrollbar-x-rail>.ps-scrollbar-x{background-color:#999}.ps-container:hover.ps-in-scrolling.ps-y>.ps-scrollbar-y-rail{background-color:#eee;opacity:.9}.ps-container:hover.ps-in-scrolling.ps-y>.ps-scrollbar-y-rail>.ps-scrollbar-y{background-color:#999}.ps-container:hover>.ps-scrollbar-x-rail,.ps-container:hover>.ps-scrollbar-y-rail{opacity:.6}.ps-container:hover>.ps-scrollbar-x-rail:hover{background-color:#eee;opacity:.9}.ps-container:hover>.ps-scrollbar-x-rail:hover>.ps-scrollbar-x{background-color:#999}.ps-container:hover>.ps-scrollbar-y-rail:hover{background-color:#eee;opacity:.9}.ps-container:hover>.ps-scrollbar-y-rail:hover>.ps-scrollbar-y{background-color:#999}
	</style>
</head>
<body>
	<div id="arrowchat_sound_player_holder"></div>
	<div id="arrowchat_chatroom_password_flyout" class="arrowchat_password_box arrowchat_popout_password_flyout">
		<div class="arrowchat_password_box_wrapper">
			<div class="arrowchat_chatroom_pw_desc_text">
				<span><?php echo $language[50]; ?></span>
			</div>
			<div class="arrowchat_chatroom_password_input_wrapper">
				<input type="password" id="arrowchat_chatroom_password_input" maxlength="50" />
				<input type="hidden" id="arrowchat_chatroom_password_id" value="" />
			</div>
			<div class="arrowchat_password_button_wrapper">
				<div class="arrowchat_ui_button" id="arrowchat_password_button">
					<div><?php echo $language[100]; ?></div>
				</div>
				<div class="arrowchat_ui_button_cancel" id="arrowchat_password_cancel_button">
					<div><?php echo $language[222]; ?></div>
				</div>
			</div>
			<div style="clear: both;"></div>
		</div>
	</div>
	<div id="arrowchat_popout_wrapper">
		<div id="arrowchat_popout_left">
			<div id="arrowchat_popout_friends">
				<div id="arrowchat_popout_left_header">
					<div id="arrowchat_popout_settings">
						<a href="javascript:void(0);" class="arrowchat_panel_item arrowchat_more_anchor"></a>
						<div id="arrowchat_options_wrapper" class="arrowchat_more_wrapper">
							<div id="arrowchat_options_flyout" class="">
								<ul class="arrowchat_inner_menu">
									<div id="arrowchat_popout_change_name_wrapper">
										<li class="arrowchat_menu_item">
											<a id="arrowchat_popout_change_name" class="arrowchat_menu_anchor" style="background:none">
												<span><?php echo $language[242]; ?></span>
												<input type="checkbox" checked="" />
											</a>
										</li>
										<li class="arrowchat_menu_separator"></li>
									</div>
									<li class="arrowchat_menu_item">
										<a id="arrowchat_setting_sound" class="arrowchat_menu_anchor">
											<span><?php echo $language[6]; ?></span>
											<input type="checkbox" checked="" />
										</a>
									</li>
									<li class="arrowchat_menu_item">
										<a id="arrowchat_setting_names_only" class="arrowchat_menu_anchor">
											<span><?php echo $language[18]; ?></span>
											<input type="checkbox" checked="" />
										</a>
									</li>
									<li class="arrowchat_menu_item">
										<a id="arrowchat_setting_block_list" class="arrowchat_menu_anchor" style="background:none">
											<span><?php echo $language[95]; ?></span>
											<input type="checkbox" checked="" />
										</a>
									</li>
									<li class="arrowchat_menu_separator"></li>
									<li class="arrowchat_menu_item">
										<a id="arrowchat_chatroom_show_names" class="arrowchat_menu_anchor">
											<span><?php echo $language[152]; ?></span>
											<input type="checkbox" checked="" />
										</a>
									</li>
									<li class="arrowchat_menu_item">
										<a id="arrowchat_chatroom_block" class="arrowchat_menu_anchor">
											<span><?php echo $language[38]; ?></span>
											<input type="checkbox" checked="" />
										</a>
									</li>
									<li class="arrowchat_menu_separator"></li>
									<li class="arrowchat_menu_item">
										<a id="arrowchat_hide_lists_button" class="arrowchat_menu_anchor" style="background:none">
											<span><?php echo $language[229]; ?></span>
											<input type="checkbox" checked="" />
										</a>
									</li>
								</ul>
								<div class="arrowchat_change_name_menu">
									<div class="arrowchat_block_menu_text"><?php echo $language[244]; ?></div>
									<div style="float:left">
										<input id="arrowchat_change_name_input" type="text" maxlength="25" />
									</div>
									<div class="arrowchat_ui_button" id="arrowchat_change_name_button" style="float:right">
										<div style="width:45px;height:18px;position:relative;top:2px;left:-1px;"><?php echo $language[243]; ?></div>
									</div>
									<div class="arrowchat_clearfix"></div>
								</div>
								<div class="arrowchat_block_menu">
									<div class="arrowchat_block_menu_text"><?php echo $language[96]; ?></div>
									<div style="float:left">
										<select></select>
									</div>
									<div class="arrowchat_ui_button" id="arrowchat_unblock_button" style="float:right">
										<div style="width:45px;height:18px;position:relative;top:2px;left:-1px;"><?php echo $language[97]; ?></div>
									</div>
									<div class="arrowchat_clearfix"></div>
								</div>
								<i class="arrowchat_more_tip"></i>
							</div>
						</div>
					</div>
					<div class="arrowchat_popout_left_header_text"><?php echo $language[110]; ?></div>
				</div>
				<div id="arrowchat_popout_selection_wrapper">
					<div id="arrowchat_popout_selection_chat" class="arrowchat_popout_selection_box arrowchat_popout_selection_focused">Private</div>
					<div id="arrowchat_popout_selection_room" class="arrowchat_popout_selection_box">Chat Rooms</div>
				</div>
				<div id="arrowchat_popout_left_lists">
					<div id="arrowchat_userslist_available"></div>
					<div id="arrowchat_userslist_busy"></div>
					<div id="arrowchat_userslist_away"></div>
					<div id="arrowchat_userslist_offline"></div>
				</div>
			</div>
		</div>
		<div id="arrowchat_popout_right">
			<div id="arrowchat_popout_chat">
				<div class="arrowchat_popout_hide_lists"></div>
				<div id="arrowchat_user_upload_queue" class="arrowchat_users_upload_queue"></div>
				<div id="arrowchat_chatroom_message_flyout" class="arrowchat_message_box">
					<div class="arrowchat_message_box_wrapper">
						<div>
							<span class="arrowchat_message_text"></span>
						</div>
					</div>
				</div>	
			</div>
			<div id="arrowchat_popout_open_chats">
				<div id="arrowchat_popout_container">
				</div>
			</div>
		</div>
	</div>
</body>
</html>