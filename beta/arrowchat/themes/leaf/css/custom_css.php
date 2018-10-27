#arrowchat_base,.arrowchat_bar_button,#arrowchat_buddy_list_tab,.arrowchat_apps_button,.arrowchat_tray_button,#arrowchat_show_bar_button,#arrowchat_chatbox_left{-webkit-box-shadow:none;background:#<?php echo $bar_background; ?>;color:#<?php echo $bar_text; ?>}
#arrowchat_show_bar_button{border-left:1px solid #<?php echo $bar_border; ?> !important;border-right: 1px solid #<?php echo $bar_border; ?> !important;border-top: 1px solid #<?php echo $bar_border; ?> !important}
.arrowchat_tabmouseover,.arrowchat_chatbox_lr_mouseover{background:#<?php echo $bar_hover; ?> !important}
#arrowchat_base{border:1px solid #<?php echo $bar_border; ?>;border-bottom: 0}
.arrowchat_tabclick,.arrowchat_trayclick,.arrowchat_tabcontent,.arrowchat_chatroom_content,.arrowchat_moderation_content,.arrowchat_reports_subtitle,.arrowchat_traycontent,.arrowchat_traycontent,.arrowchat_apps_subtitle,.arrowchat_powered_by{border-left:1px solid #<?php echo $bar_border; ?> !important;border-right: 1px solid #<?php echo $bar_border; ?> !important}
.arrowchat_apps_button,#arrowchat_applications_button,.arrowchat_tray_button{border-right:1px solid #<?php echo $bar_border; ?>}
.arrowchat_bar_button,#arrowchat_chatbox_left{border-left:1px solid #<?php echo $bar_border; ?>}
.arrowchat_tabtitle,.arrowchat_chatrooms_title{background:#<?php echo $window_title; ?> !important;border:1px solid #<?php echo $bar_border; ?>}
.arrowchat_typing_title,.arrowchat_userstabtitle,.arrowchat_moderation_title,.arrowchat_traytitle,.arrowchat_unseen_title{background:#<?php echo $window_title_focus; ?> !important;border:1px solid #<?php echo $bar_border; ?>}
.arrowchat_chatroom_lobby_title{background:#<?php echo $window_title_focus; ?> !important}
.arrowchat_chatboxtabtitlemouseover,.arrowchat_chatboxtabtitlemouseover2,.arrowchat_chatboxtabtitlemouseover3,.arrowchat_more_button_selected{background-color:#<?php echo $window_title_hover; ?> !important}
.arrowchat_tab_name a,.arrowchat_tab_name{color:#<?php echo $window_text; ?> !important}
.arrowchat_chatboxmessage_wrapper,.arrowchat_chatroom_message_content{background-color:#<?php echo $chat_bubble; ?>}
.arrowchat_chatboxmessagecontent,.arrowchat_chatroom_message_content{color:#<?php echo $chat_bubble_text; ?>}
.arrowchat_self .arrowchat_chatboxmessage_wrapper,.arrowchat_self .arrowchat_chatroom_message_content{background-color:#<?php echo $chat_bubble_self; ?>}
.arrowchat_self .arrowchat_chatboxmessagecontent,.arrowchat_self .arrowchat_chatroom_msg{color:#<?php echo $chat_bubble_self_text; ?> !important}
.arrowchat_more_hover,.arrowchat_options_padding_hover,.arrowchat_unseen_user_list_hover{background-color: #<?php echo $window_title_focus; ?> !important;color: #<?php echo $window_text; ?> !important;border-top: 1px solid #<?php echo $window_title_hover; ?> !important;border-bottom: 1px solid #<?php echo $window_title_hover; ?> !important;}
.arrowchat_unseen_close_hover{background:#<?php echo $window_title_hover; ?>;color:#<?php echo $window_text; ?>}
.arrowchat_ui_button{background:#<?php echo $window_title_focus; ?>;color:#<?php echo $window_text; ?>}
.arrowchat_ui_button:hover{background:#<?php echo $window_title; ?>}
.arrowchat_tab_new_message{background:#<?php echo $bar_hover; ?> !important;color:#<?php echo $bar_text; ?> !important}

<?php
	if (!empty($bar_hover)) {
?>
.arrowchat_tabclick,.arrowchat_trayclick,.arrowchat_unseen_list_open{background-color:#fff !important}
<?php
	}
?>