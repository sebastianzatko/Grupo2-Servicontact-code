<?php

	$language = array();

	// ########################### STATUS #############################
	$language[1]			=	"Disponible";								// Available users
	$language[2]			=	"Ocupado";										// Busy users
	$language[3]			=	"Invisible";								// Invisible users
	$status['available']	=	"Estoy disponible";							// Default available status message
	$status['busy']			=	"Estoy ocupado";									// Default busy status message
	$status['away']			=	"No estoy";									// Default idle status message
	$status['offline']		=	"Estoy desconectado";								// Default offline status message
	$status['invisible']	=	"Estoy desconectado";								// Default invisible status message
	$language[83]			=	"Invitado";									// Displayed if the user has no username

	// ####################### SERVICE UPDATES ########################
	$language[27]			=	"El chat est&aacute; temporalmente en mantenimiento.";  // Hover message when chat is in maintenance mode
	$language[28]			=	"Cerrar"; 									// Close the announcement message
	$language[58]			=	"Debes estar registrado o entrar en tu cuenta para hablar en el chat";	// The message that guests view when logged out

	// ######################## NOTIFICATIONS #########################
	$language[0]			=	"Notificaciones"; 							// Displayed in the title bar of the notifications popup
	$language[9]   			=   "No tienes nuevas notificaciones."; 			// Displayed when a user has no new notifications
	$language[21]			=	"Ver todas las notificaciones"; 					// The tooltip to see all notifications
	$language[71]			=	"segundo";								// Displayed after the time in notifications (second)
	$language[72]			=	"segundos";								// Displayed after the time in notifications (seconds)
	$language[73]			=	"minuto";								// Displayed after the time in notifications (minute)
	$language[74]			=	"minutos";								// Displayed after the time in notifications (minutes)
	$language[75]			=	"hora";									// Displayed after the time in notifications (hour)
	$language[76]			=	"horas";								// Displayed after the time in notifications (hours)
	$language[77]			=	"d&iacute;a";									// Displayed after the time in notifications (day)
	$language[78]			=	"d&iacute;as";									// Displayed after the time in notifications (days)
	$language[79]			=	"mes";								// Displayed after the time in notifications (month)
	$language[80]			=	"meses";								// Displayed after the time in notifications (months)
	$language[81]			=	"a&ntilde;o";									// Displayed after the time in notifications (year)
	$language[82]			=	"a&ntilde;os";								// Displayed after the time in notifications (years)

	// ######################### BUDDY LIST ###########################
	$language[4]			=	"Chat"; 									// Displayed in the title bar of the buddy list popup
	$language[7]			=	"Chat (Desconectado)"; 							// Displayed in the buddy list tab when offline
	$language[8]    		=   "No hay nadie disponible para hablar"; 			// Displayed with no one is online
	$language[12]   		=   "Buscar"; 									// Displayed in the search text area of the buddy list
	$language[22]			=	"Estado";									// Button to show status options in the buddy list
	$language[23]			=	"Opciones";									// Button to show options in the buddy list
	$language[25]			=	"Cargando...";								// Text to show while the buddy list is loading
	$language[26]			=	"No se han encontrado contactos.";						// Displayed when no friends are found after searching

	// ########################### OPTIONS ############################
	$language[5]			=	"Disponible para chatear";						// Option to go offline text
	$language[6]			=	"Sonidos del Chat";								// Option to play sound for new messages text
	$language[17]   		=   "Guardar lista abierta";							// Option to keep the buddy list open text
	$language[18]   		=   "Mostrar s&oacute;lo nombres";							// Option to hide avatars in the buddy list text
	$language[29]			=	"Aspecto:";									// Text to display next to the theme change select box
	$language[95]			=	"Gestionar lista de bloqueados...";						// Option to manage the block list
	$language[96]			=	"Selecciona el usuario que deseas desbloquear";		// Text to display when a user is managing the block list
	$language[97]			=	"Desbloquear";									// Text to display on unblock button
	$language[108]			=	"Selecciona el dise&ntilde;o que deseas usar";			// Text to display when a user is choosing a theme
	$language[109]			=	"Elegir";									// Text to display on the choose theme button
	$language[118]			=	"Seleccionar";									// Text to display on the selection for the block menu

	// ######################## APPLICATIONS ##########################
	$language[16]  		 	=   "Aplicaciones";								// Displayed in the title bar of the applications popup
	$language[20]			=	"Marcadores";								// Displayed in the applications popup for the user's bookmarked applications
	$language[64]			=	"Otras Aplicaciones";						// Displayed under bookmarks (non-bookmarks heading)
	$language[65]			=	"Arrastrar para reordenar";							// Drag to reorder text
	$language[104]			=	"Guardar aplicaciones abiertas";							// Displayed in the menu to keep an app window open
	$language[105]			=	"Siempre cargar aplicaciones";							// Displayed in the menu to load the app when the bar loads

	// ######################### HIDE CHAT ############################
	$language[14]   		=   "Esconder Chat";								// Displayed when the user hovers over the hide chat button
	$language[15]   		=   "Mostrar Chat";								// Displayed when the user hovers over the show chat button

	// ######################## POPOUT CHAT ############################
	$language[10]   		=   "Convertir en ventana";								// Option to pop out chat
	$language[11]   		=   "Convertir en barra";								// Option to pop in chat

	// ############################ CHAT ###############################
	$language[13]  	 		=   "&eacute;ste usuario est&aacute; desconectado, pero recibir&aacute; tu mensaje cuando se conecte.";		// DISPLAYS USERNAME FIRST - Shown when a message is sent to an offline user
	$language[24]			=	"Limpiar conversaci&oacute;n";													// Displayed in the chat popup to clear chat history
	$language[30]			=	"Nuevo mensaje desde";														// DISPLAYS USERNAME AFTER - Blinks in the title of the browser on new messages
	$language[59]			=	"M&aacute;s &#9660;";															// The text to display more chat options
	$language[60]			=	"Comenzar videollamada";															// The video chat option in the more menu
	$language[61]			=	"Has recibido una solicitud de videochat. Ignora el mensaje para rechazar.";// The message to send when a video chat is reuqested
	$language[62]			=	"Aceptar";																// Accept a video chat request
	$language[63]			=	"Tu solicitud de videochat ha sido enviada";								// Displayed when a user sends a video chat request
	$language[66]			=	"Enviar archivo...";														// The file transfer option in the more menu
	$language[67]			=	"Cancelar la subida";														// The link to cancel the file transfer
	$language[68]			=	"Tu archivo ha sido subido y enviado";								// Displayed when a user sends a file
	$language[69]			=	"Te he enviado un archivo. Ignorar el mensaje para rechazar.";				// The message to send when a file is sent
	$language[70]			=	"Descargar archivo";														// Download a file that was sent
	$language[84]			=	"Bloquear usuario";															// Blocks a user
	$language[85]			=	"¿Quieres denunciar a &eacute;ste usuario?";								// Asks the user if they want to report another user
	$language[86]			=	"Examinar";																// The text to browse for a file when uploading
	$language[87]			=	"Pulsa examinar para subir un archivo o ";										// Text to display when uploading a file
	$language[88]			=	"Convertir todas las conversaciones en ventana";										// Displays when mouseover the popout chat icon
	$language[89]			=	"Cerrar chat";															// Displays when mouserver the close icon
	$language[90]			=	"Tu";																	// Displays on mosueover of your own chat text
	$language[102]			=	"El mensaje no se ha enviado. &eacute;ste usuario te ha bloqueado.";						// Displays this when a user tries to send a message to another user who has them blocked
	$language[103]			=	"El usuario ha sido bloqueado. No recibir&aacute;s m&aacute;s mensajes suyos."; // Displays when a user is blocked

	// ######################### CHAT ROOMS #############################
	$language[19]			=	"Salas de Chat";								// Displayed in the chatrooms popup and tab
	$language[31]			=	"Crear";									// Button to show create chatroom
	$language[32]			=	"Opciones";									// Button to show chatroom options
	$language[33]			=	"Abandonar";									// Button to show leave chatroom
	$language[34]			=	"Cargando...";								// Text so show while the chatroom list is loading
	$language[35]			=	"Conectado";									// DISPLAYS ONLINE COUNT FIRST - Shown after online count in list
	$language[37]			=	"Crear nueva sala de chat:";					// Text to display in the create chatroom popup
	$language[36]   		=   "Mantener la sala abierta";							// Option to keep the chatroom window open
	$language[47]			=	"Permanecer en la sala";								// Option to stay in the chatroom without the window open on page load
	$language[38]			=	"Bloquear chats privados";						// Option to block private chats from users in the chatroom
	$language[39]			=	"Debes esperar un poco antes de crear otra sala.";	// Error to show when the chatroom flood limit is reached
	$language[40]			=	"Las salas creadas se han deshabilitado.";				// Error to show when user chatrooms are disabled
	$language[41]			=	"Mensaje privado";							// Send user a private messages
	$language[42]			=	"Visitar Perfil";							// Visit the user's profile
	$language[43]			=	"Invitado";									// The user's title in the chatroom - shown when the user is a guest
	$language[44]			=	"Moderador";								// The user's title in the chatroom - shown when the user is a moderator
	$language[45]			=	"Administrador";							// The user's title in the chatroom - shown when the user is an administrator
	$language[46]			= 	"&eacute;ste usuario tiene los mensajes privados deshabilitados"; // The text that the alert box will display when a user trys to PM with blocked chat
	$language[48]			=	"&eacute;sta sala de chat no existe";			// Displayed when a user trys to enter an invalid chatroom
	$language[49]			=	"La contrase&ntilde;a es incorrecta. Prueba de nuevo.";		// Displayed when a user enters the wrong password
	$language[50]			=	"Escribe la contrase&ntilde;a para &eacute;sta sala.";						// Text to display when entering the chatroom password
	$language[51]			=	"L&iacute;mite alcanzado: Debes esperar un poco para enviar otro mensaje.";	// Error to show when flood limit is reached
	$language[52]			=	"Crear Moderador";							// Make the user a moderator
	$language[54]			=	"Borrar Moderador";							// Remove the user from being a moderator
	$language[53]			=	"Banear usuario";									// Ban/Kick the user from the chatroom
	$language[55]			=	"Est&aacute;s baneado en &eacute;sta sala permanentemente.";					// Shown when a user is permanently banned
	$language[56]			=	"Est&aacute;s baneado en &eacute;sta sala durante los siguientes minutos: ";		// DISPLAYS MINUTES AFTER - shown when a user is kicked
	$language[57]			=	"Escribe el n&uacute;mero de minutos que el usuario ser&aacute; baneado. De 0 a permanente.";	// Message to show when banning a user.  Typing 0 will permanently ban the user
	$language[91]			=	"Escribe el nombre de la sala de chat que quieres crear.";		// Message to display when creating a chat room
	$language[92]			=	"Abandonar la sala de chat";							// Tooltip when mousover the leave chat room icon
	$language[93]			=	"Crear nueva sala de chat";					// Tooltip when mouseover the create chat room icon
	$language[94]			=	"Cambiar el aspecto del chat";					// Tooltip when mouseover the change theme icon
	$language[98]			=	"Nombre";										// Placeholder for the create chatroom name box
	$language[99]			=	"Contrase&ntilde;a (Opcional)";						// Placeholder for the create chatroom password box
	$language[100]			=	"Unirse a la sala";										// Displayed on UI buttons to join a chat room
	$language[101]			=	"Sonidos de la sala";							// The option to enable/disable chat room sounds
	$language[106]			=	" has sido convertido en moderador por ";			// DISPLAYS USERNAME FIRST/MODERATOR AFTER - Shown after a user is made a moderator
	$language[107]			=	" has sido expulsado de la sala por ";	// DISPLAYS USERNAME FIRST/MODERATOR AFTER - Shown after a user is kicked
	$language[117]			=	"Convertir en ventana";							// Option to pop out the chat room
	
	// ######################### MOBILE CHAT #############################
	$language[110]			=	"Chat m&oacute;vil";			// Displays in the header of the mobile chat
	$language[111]			=	"Usuarios conectados";			// Displays in the header for the online user list
	$language[112]			=	"Usuarios inactivos";			// Displays in the header for the idle user list
	$language[113]			=	"Volver";					// Displays on the back button when viewing a chat
	$language[114]			=	"Enviar";					// Text for the send button
	$language[115]			=	"Nuevo";					// Text to display when a new message is received
	$language[116]			=	"Debes entrar en tu cuenta para usar el chat m&oacute;vil";	// Text to display when user is not logged in using mobile

?>
