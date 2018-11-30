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
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://code.jquery.com/jquery-1.11.2.js"integrity="sha256-WMJwNbei5YnfOX5dfgVCS5C4waqvc+/0fV7W2uy3DyU="crossorigin="anonymous"></script>
		<script src="https://beta.changero.online/bootstrap/bootstrap.min.js"></script>
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
		<script type="text/javascript" src="<?php echo $base_url; ?>external.php?type=djs" charset="utf-8"></script> 
		<script type="text/javascript" src="<?php echo $base_url; ?>external.php?type=mjs" charset="utf-8"></script>
	</head>
    <body>
<?php
session_start();
$myid=-1;
if (isset($_SESSION['id'])){
    $myid=$_SESSION['id'];
}

$modalcita = '<style>
#not'.$myid.'{
    display: none;
}
</style>
<!-- MODAL CITAS -->
<div class="modal" id="formcita" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h2 class="modal-title">Crear cita</h2>
        </div>
        <div class="modal-body" id="formulariocita">
        <h3 id="citah3"></h3>
        <div>
          <form action="#" type="post" role="form">
          	<div>
            	<label for="servicios">Servicios a contratar:</label>
            </div>
            <div>
            	<select multiple class="form-control" id="servicios">
				</select>
            </div>
          	<div>
                <label for="servicios">Ingrese fecha:</label>
            </div>
            <div>
            	<input type="date" class="form-control" id="fecha">
            </div>
          	<div>
            	<label for="servicios">Ingrese hora:</label>
            </div>
            <div>
            	<input type="time" class="form-control" id="hora">
            </div>
                <input type="hidden" class="form-control" id="prof">
                <input type="hidden" class="form-control" id='.$myid.'>
          </form>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn" data-dismiss="modal">Cerrar</button>
          <button type="button" id="submitform" class="btn btn-success" data-dismiss="modal">Aceptar</button>
        </div>
      </div>
    </div>
</div>
<!-- FIN DE MODAL-->';
$modalpuntuar = '<!-- MODAL PUNTUACION -->
<div class="modal" id="formpuntuar" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h2 id="puntuacion" class="modal-title">Calificar</h2>
        </div>
        <div class="modal-body" id="formulariopuntuacion">
        <center>
        <h4 id="descripcion"></h4>
        <input id="cita" type="hidden">
        <input id="profes" type="hidden">
        <input id="idnot" type="hidden">
        <div id="puntuar">
        </div>
        <center/>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn" data-dismiss="modal">Cerrar</button>
            <span class="button-checkbox">
            <button type="button" id="submitcalificacion" data-dismiss="modal" class="btn criteria btn-default" data-color="info"><i class="state-icon fa fa-square-o"></i> Calificar</button>
            <input type="checkbox" class="hidden">
            </span>  
        </div>
      </div>
    </div>
</div>
<!-- FIN DE MODAL-->';
echo $modalcita;
echo $modalpuntuar;
?>
        <div data-role="page" id="page1">
            <div data-theme="b" data-role="header" data-position="fixed" data-tap-toggle="false">
                <h3>
                    <?php echo $language[110]; ?>
                </h3>
				<a data-role="button" id="home-button" data-iconshadow="false" data-iconpos="notext" data-ajax="false" data-theme="b" href="<?php echo $home_url; ?>" data-icon="home" data-shadow="false" data-corners="false"></a>
				<a id="settings-button" data-iconpos="notext" data-iconshadow="false" data-theme="b" data-rel="dialog" data-transition="slidedown" href="#settings-page" data-icon="gear" data-shadow="false" data-corners="false"></a>
            </div>
            <div data-role="content">
				<ul id="buddylist-container-chatroom" data-role="listview" data-divider-theme="c" data-inset="false"></ul>
				<ul class="alert" id="buddylist-container-recent" data-role="listview" data-divider-theme="c" data-inset="false"></ul>
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
                <a data-role="button" id="home-button" data-iconshadow="false" data-iconpos="notext" data-ajax="false" data-theme="b" href="#page1" data-icon="home" data-shadow="false" data-corners="false" class="ui-link ui-btn-left ui-btn ui-btn-b ui-icon-home ui-btn-icon-notext" role="button"><?php echo $language[113]; ?>
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
								<div class="giphy_cancel">Cancelar</div>
							</label>
						</div>
					</div>
					<input id="textinput1" placeholder="" value="" type="text" />
					<div class="msg_controls">
						<div id="arrowchat_upload_button"><div id="arrowchat_chatroom_uploader"> </div></div>
						<div class="arrowchat_giphy_button"> </div>
						<div class="arrowchat_smiley_button"> </div>
					</div>
				</div>
				<div class="btn-group dropup open" style="float:right; margin-right: 70px; margin-top:-46px;"> <button data-role="button" class="btn btn-info btn-lg dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="true">Citar <span class="glyphicon glyphicon-bookmark"></span> </button> <ul class="dropdown-menu"> <li><a href="#" onclick="m_sol_cita()">Solicitar Cita</a></li> <li><a href="#" onclick="m_cargarform()" data-toggle="modal" id="102" data-target="#formcita">Programar Cita</a></li> </ul> </div>
				<a id="send_button" class="btn btn-info btn-lg" data-role="button" data-inline="true" data-transition="none" data-theme="b" href="javascript:;" style="float:right; margin-right: 10px; margin-top:-37px">
					<?php echo $language[114]; ?>
				</a>
				<div class="smiley_box_wrapper" id="smiley_box_wrapper2"></div>
            </div>
		</div>
		<div data-role="page" id="page3">
			<div data-role="panel" data-theme="a" data-position="right" id="user-panel">
				<ul id="chatroom-users-list" data-role="listview" data-divider-theme="c" data-inset="false"></ul>
			</div>
            <div data-theme="b" data-role="header" data-position="fixed" data-tap-toggle="false">
                <h3 id="chatroom-header">
					<?php echo $language[128]; ?>
				</h3>
                <a data-role="button" id="back-button-chatroom" data-direction="reverse" data-transition="slide" data-theme="b" href="#page1" data-icon="arrow-l" data-iconshadow="false" data-iconpos="left" class="back_buttons">
					<?php echo $language[113]; ?>
				</a>
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
								<div class="giphy_cancel2">Cancelar</div>
							</label>
						</div>
					</div>
					<input id="textinput2" maxlength="160" placeholder="" value="" type="text" />
					<div class="msg_controls2">
						<div id="arrowchat_upload_button2"><div id="arrowchat_chatroom_uploader2"> </div></div>
						<div class="arrowchat_giphy_button2"> </div>
						<div class="arrowchat_smiley_button2"> </div>
					</div>
				</div>
				<a id="send_button_chatroom" data-role="button" data-inline="true" data-iconshadow="false" data-transition="none" data-theme="b" href="javascript:;" style="position:absolute;top:14px;right:10px">
					<?php echo $language[114]; ?>
					</a>
				<div class="smiley_box_wrapper" id="smiley_box_wrapper3"></div>
            </div>
		</div>
		<div data-role="page" id="password-page">
			<div data-theme="b" data-role="header" data-tap-toggle="false">
				<h1><?php echo $language[128]; ?></h1>
			</div>
			<div data-theme="d" data-role="content" id="chatroom-message">
				<label for="room-password"><?php echo $language[138]; ?></label>
				<input type="text" name="room-password" id="room-password" value="" />
				<a href="#page3" data-theme="b" data-role="button" id="submit-chatroom-password"><?php echo $language[139]; ?></a>
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
				<h1><?php echo $language[128]; ?></h1>
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
				<h1><?php echo $language[129]; ?></h1>
			</div>
			<div data-theme="d" data-role="content">
				<div style="margin-bottom:60px" id="chatroom-settings-container">
					<div style="float:left; width: 60%; margin-top: 11px; font-size:18px">
						<?php echo $language[130]; ?></div>
					<div style="float:right;">
						<form>
							<select name="flip-show-chatroom" id="flip-show-chatroom" data-role="slider">
								<option value="off"><?php echo $language[133]; ?></option>
								<option value="on"><?php echo $language[132]; ?></option>
							</select>
						</form>
					</div>
				</div>
				<div>
					<div style="float:left; width: 60%; margin-top: 11px; font-size:18px">
						<?php echo $language[131]; ?></div>
					<div style="float:right;">
						<form>
							<select name="flip-show-idle" id="flip-show-idle" data-role="slider">
								<option value="off"><?php echo $language[133]; ?></option>
								<option value="on"><?php echo $language[132]; ?></option>
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
								<option value="off"><?php echo $language[133]; ?></option>
								<option value="on"><?php echo $language[132]; ?></option>
							</select>
						</form>
					</div>
					<div class="arrowchat_clearfix"></div>
				</div>
				<div>
					<div style="float:left; width: 60%; margin-top: 11px; font-size:18px">
						Selecciona el usuario que deseas desbloquear</div>
					<div style="float:right;">
						<form>
							<select name="unblock-mobile" id="unblock-mobile" data-mini="true" data-inline="true">
								<option value="0">Seleccionar</option>
							</select>
						</form>
					</div>
					<div class="arrowchat_clearfix"></div>
				</div>
				<div id="change-name-wrapper" style="display:none">
					<div style="float:left; width: 60%; margin-top: 11px; font-size:18px">
						Ingrese el nombre que le gustaría usar</div>
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
    <script type="text/javascript" src="https://beta.changero.online/includes/js/citas.js"></script>
    <script type="text/javascript" src="https://beta.changero.online/includes/js/calificar.js" charset="utf-8"></script>
</html>