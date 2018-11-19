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
	$language[240]			=	"Ausente";										// Idle user status
	$language[241]			=	"Desconectado";									// Offline user status


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
	$language[144]			=	"Nuevo mensaje de ";						// DISPLAYS USERNAME AFTER - The title for HTML5 notifications

	// ######################### BUDDY LIST ###########################
	$language[4]			=	"Chat"; 									// Displayed in the title bar of the buddy list popup
	$language[7]			=	"Chat (Desconectado)"; 							// Displayed in the buddy list tab when offline
	$language[8]    		=   "No hay nadie disponible para hablar"; 			// Displayed with no one is online
	$language[12]   		=   "Buscar"; 									// Displayed in the search text area of the buddy list
	$language[22]			=	"Estado";									// Button to show status options in the buddy list
	$language[23]			=	"Opciones";									// Button to show options in the buddy list
	$language[25]			=	"Cargando...";								// Text to show while the buddy list is loading
	$language[26]			=	"No se han encontrado contactos.";						// Displayed when no friends are found after searching
	$language[119]			=	"Enter a name to chat with";				// Displayed in the guest username box
	$language[120]			=	"Debes ingresar un nombre.";					// Error message when the user enters no guest name
	$language[121]			=	"Solo se permiten letras y/o numeros.";	// Error message when the user enters a guest name with more than letter/numbers
	$language[122]			=	"Hay una palabra bloqueada en tu nombre: ";	// DISPLAYS BLOCKED WORD AFTER - Error message when the user enters a blocked word guest name
	$language[123]			=	"No puedes cambiar tu nombre de nuevo.";		// Error message when user trys to change guest name again
	$language[124]			=	"Este nombre ya existe.";				// Error message when duplicate guest name is selected
	$language[125]			=	"Tu nombre no puede contener mas de 25 caracteres";// Error message when guest name is too long
	$language[140]			=	"Conectar con Facebook";						// Text to connect to Facebook
	$language[141]			=	"Desconectarse de Facebook";						// Text to logout from Facebook
	$language[142]			=	"Site Users";								// Text to display for site user's group
	$language[143]			=	"Amigos de Facebook";							// Text to display for facebook friend's group

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
	$language[222]			=	"Cancelar";									// Displayed on UI buttons to cancel an action
	$language[242]			=	"Cambiar tu nombre...";						// Option to manage guest name
	$language[243]			=	"Aceptar";									// Button to submit name change
	$language[244]			=	"Ingresa el nombre que deseas usar";			// Text for guest name change menu

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
	$language[221]			=	"Ver perfil";								// Title text for the profile link
	$language[229]			=	"Ocultar panel izquierdo";							// Setting to hide the left panel in pop out chat


	// ############################ CHAT ###############################
	$language[13]  	 		=   "&eacute;ste usuario est&aacute; desconectado, pero recibir&aacute; tu mensaje cuando se conecte.";		// DISPLAYS USERNAME FIRST - Shown when a message is sent to an offline user
	$language[24]			=	"Limpiar conversaci&oacute;n";													// Displayed in the chat popup to clear chat history
	$language[30]			=	"Nuevo mensaje desde";														// DISPLAYS USERNAME AFTER - Blinks in the title of the browser on new messages
	$language[59]			=	"M&aacute;s &#9660;";															// The text to display more chat options
	$language[60]			=	"Abrir en una ventana";															// The video chat option in the more menu
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
	$language[88]			=	"Comenzar videollamada";										// Displays when mouseover the popout chat icon
	$language[89]			=	"Cerrar chat";															// Displays when mouserver the close icon
	$language[90]			=	"Tu";																	// Displays on mosueover of your own chat text
	$language[102]			=	"El mensaje no se ha enviado. &eacute;ste usuario te ha bloqueado.";						// Displays this when a user tries to send a message to another user who has them blocked
	$language[103]			=	"El usuario ha sido bloqueado. No recibir&aacute;s m&aacute;s mensajes suyos."; // Displays when a user is blocked
	$language[134]			=	"Desliza hacia abajo para ver mensajes nuevos.";										// Displays when a chat window is not scrolled down on a new message
	$language[135]			=	"Ocurrio un error al enviar tu mensaje. Intentalo mas tarde.";			// Error message when a message fails to send
	$language[146]			=	"Las Videollamadas no se encuentran disponibles.";								// Displays when mouseover the video chat icon and user is offline
	$language[151]			=	"Ocurrio un erro al subir el archivo.";								// File upload error message
	$language[209]			=	"Sending messages has been disabled for your user group.";				// Error message when a bad user group tries to send a message
	$language[213]			=	"Escribe un mensaje...";													// Displayed in the input box to message someone
	$language[214]			=	"Buscar GIFs...";														// Placeholder on the Giphy Input for GIFs
	$language[215]			=	"Minimizar Chat";														// The title for the minimized users tab
	$language[230]			=	"Emoticones y Personas";														// Tooltip for smiley emojis
	$language[231]			=	"Animales y Naturaleza";														// Tooltip for animal emojis
	$language[232]			=	"Comidas y Bebidas";															// Tooltip for food emojis
	$language[233]			=	"ACtividades";															// Tooltip for activity emojis
	$language[234]			=	"Viajes y Cuidades";														// Tooltip for travel emojis
	$language[235]			=	"Objetos";																// Tooltip for object emojis
	$language[236]			=	"Simbolos";																// Tooltip for symbol emojis
	$language[237]			=	"Banderas";																// Tooltip for flag emojis
	$language[238]			=	"Mas emoticones";	

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
	$language[212]			=	"Miembro";									// The user's title in the chatroom - shown when the user is a member
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
	$language[219]			=	" por ";									// DISPLAYS CHATROM NAME BEFORE AND MINUTES AFTER - shown when a user is temporarily banned
	$language[220]			=	" minuto(s)";									// DISPLAYS MINUTES BEFORE - shown when a user is temporarily banned
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
	$language[127]			=	"There are too many users in this chat room.  Please try again later.";	// Displayed when a user tries to enter a chat room with too many online.	
	$language[136]			=	" (Admin)";									// Will display after a username when an administrator
	$language[137]			=	" (Mod)";									// Will display after a username when a moderator
	$language[147]			=	"Users";									// Text to display for chat room's user group
	$language[148]			=	"Admins";									// Text to display for chat room's admin group
	$language[149]			=	"Mods";										// Text to display for chat room's mod group
	$language[150]			=	"User-created chat room";					// Text for chat rooms that have no description entered
	$language[152]			=	"Always Show Names";						// Option to always show names in a chat room
	$language[153]			=	"Edit Welcome Message...";					// Option to edit the welcome message
	$language[154]			=	"Enter the welcome message that you would like to be displayed when users enter this chat room. Enter a blank value for no welcome message.";	// Prompt for the mod/admin to edit the welcome message
	$language[155]			=	"The settings have been successfully saved.";	// Notice when an admin or mod saves settings
	$language[156]			=	" has had their moderator status taken away by ";	// DISPLAYS USERNAME FIRST/MODERATOR AFTER - Shown after a user is made a moderator
	$language[157]			=	"Edit Description...";						// Option to edit the description
	$language[158]			=	"Enter the description that you would like to be displayed in the chat room list.";	// Prompt for the mod/admin to edit the description
	$language[159]			=	"Message deleted by ";						// DISPLAYS USERNAME AFTER - Shown when a chat room message is deleted in replacement of the message
	$language[160]			=	"Delete Message";							// Tooltip to show on the delete message icon
	$language[161]			=	"Silence User";								// Option to silence a user
	$language[162]			=	"Enter the number in seconds that the user should be silenced for.  Maximum time is 300 seconds.";	// Message to show when silencing a user
	$language[163]			=	" has been silenced by ";					// DISPLAYS USERNAME FIRST/MODERATOR AFTER - Shown after a user is silenced
	$language[164]			=	"You are silenced for another ";			// DISPLAYS SECONDS AFTER - The first half of the user is silenced error message.
	$language[165]			=	" seconds.";								// DISPLAYS SECONDS BEFORE - The second half of the user is silenced error message.
	$language[169]			=	"You have exceeded the flood limit and must wait ";	// DISPLAYS SECONDS AFTER - The first half of the flood message
	$language[170]			=	" more seconds to chat.";					// DISPLAYS SECONDS BEFORE - The second half of the flood message
	$language[171]			=	"Edit Chat Flood...";						//	Option to change the chat room flood limits
	$language[172]			=	"Select your chat flood settings";			// Text to display in the flood menu
	$language[173]			=	"Save";										// Button text for the flood menu save
	$language[174]			=	"message(s) every";							// In between the flood message and time
	$language[175]			=	"second(s)";								// After the flood time
	$language[210]			=	"Your user group is not permitted to enter this room.";	// Error displayed when a disallowed user group enters the chat room
	$language[217]			=	"Join another chat room";					// Tooltip for the button to add another chat room
	$language[218]			=	"You may only be in 3 chat rooms at once.";	// Error message to display when trying to enter a 4th chat room
	$language[223]			=	"Options +";								// Options link for user created chat rooms
	$language[224]			=	"Password";									// Label for the password on user created chat rooms
	$language[225]			=	"Description";								// Label for the description on user created chat rooms
	$language[226]			=	"Welcome Message";							// Label for the welcome message on user created chat rooms
	$language[227]			=	"Featured Chat Rooms";						// Text for featured chat rooms
	$language[228]			=	"More Chat Rooms";							// Text for other chat rooms
	
	// ########################## MODERATORS #############################
	$language[166]			=	"Moderation";								// Displayed in the moderators popup and tab
	$language[167]			=	"Report Spam/Abuse";						// Option in 1-on-1 chat settings to report a person
	$language[168]			=	"Thank you for your report.";				// Message after a report is filed
	$language[177]			=	"Report From";								// Header for the reports from column
	$language[178]			=	"Report About";								// Header for the reports about column
	$language[179]			=	"Report Time";								// Header for the reports time column
	$language[180]			=	"Total Reports";							// DISPLAYS # OF REPORTS FIRST - Used in the title to show total number of reports
	$language[181]			=	"Reports On User";							// The header for the reports list
	$language[182]			=	"Someone else is already working on this report.";	// Error message when a report is already being worked on
	$language[183]			=	"Ban User";									// Option to ban the user
	$language[184]			=	"Warn User";								// Option to warn the user
	$language[185]			=	"Close Report";								// Option to close the report
	$language[186]			=	"Back to Lobby";							// Option to go back to the reports list
	$language[187]			=	"Report #";									// DISPLAYS REPORT NUMBER AFTER - shown in the reports on user list
	$language[188]			=	"No additional reports";				 	// Displays when no other reports are available
	$language[189]			=	"There are no reports, hooray!";			// Displays in the lobby when there are no reports
	$language[190]			=	"About: ";									// DISPLAYS ABOUT USER AFTER - The pretext for the user the report is about
	$language[191]			=	"From: ";									// DISPLAYS FROM USER AFTER - The pretext for the user the report is from
	$language[192]			=	"Previous Warnings: ";						// DISPLAYS WARNINGS AFTER - The pretext for the number of previous warnings
	$language[193]			=	"Time: ";									// DISPLAYS TIME AFTER - The pretext for the time of the report
	$language[194]			=	"The user was reported here";				// Displays in the report history where the user was reported
	$language[195]			=	"Are you sure you want to PERMANENTLY ban this user?  The user will have to be unbanned from the ArrowChat admin panel.";	// Prompt when the ban user option is clicked
	$language[196]			=	"Enter a reason for the warning.  THIS WILL BE SHOWN TO THE WARNED USER.";	// Prompt when after to enter a warning reason
	$language[197]			=	"This user has been warned in the past 24 hours.  Are you sure you want to warn again?";	// Prompt when the user has been warning in the past 24 hours
	$language[198]			=	"I Understand";								// The text that closes a warning notification
	$language[199]			=	"You have been warned by a moderator. Continued spam or abuse of the chat system could lead to a permanent ban. The reason that the moderator has given for the warning is below:";	
		
	
	// ######################### MOBILE CHAT #############################
	$language[110]			=	"Chat M&oacute;vil";			// Displays in the header of the mobile chat
	$language[111]			=	"Usuarios conectados";			// Displays in the header for the online user list
	$language[112]			=	"Usuarios inactivos";			// Displays in the header for the idle user list
	$language[113]			=	"Volver";					// Displays on the back button when viewing a chat
	$language[114]			=	"Enviar";					// Text for the send button
	$language[115]			=	"Nuevo";					// Text to display when a new message is received
	$language[116]			=	"Debes entrar en tu cuenta para usar el chat m&oacute;vil";	// Text to display when user is not logged in using mobile
	$language[126]			=	"Inicio";					// Displays as a button to return to the website when in mobile chat
	$language[128]			=	"Salas de Chat";			// Displays in the header for the chat room list
	$language[129]			=	"Configuracion";				// Displays in the header for the settings
	$language[130]			=	"Mostrar salas de Chat";	// The option to show chat rooms
	$language[131]			=	"Mostrar lista de ausentes";	// The option to show idle users
	$language[132]			=	"Si";					// The on option for a toggle
	$language[133]			=	"No";					// The off option for a toggle
	$language[138]			=	"Ingresa la contraseña de la sala:";	// Text to display for the chat room password input
	$language[139]			=	"Entrar a la sala.";		// The submit button to enter a chat room
	$language[145]			=	"Chat M&oacute;vil";			// The text to appear on mobile chat tab
	$language[176]			=	"Conversaciones recientes";			// Displays in the header for the recent chat list
	$language[208]			=	"Escribe un mensaje...";	// Text placeholder for the message inputs
	$language[211]			=	"Ocultar el boton de chat movil en el sitio.";	// Setting that will hide the floating mobile chat tab for the user
	$language[216]			=	"Movil";				// Status displayed when a user is on a mobile device
	$language[239]			=	"Iniciar Sesi&oacute;n";				// Text to display on a login button
	
		// ######################### VIDEO CHAT #############################
	$language[200]			=	"Video Chat";					// The title for the video chat page
	$language[201]			=	"Invitar a Video Chat";			// The title for the invite user to chat page
	$language[202]			=	"Invita a alguien para chat de video contigo, enviandole este link.";	// Directions to invite a user to video
	$language[203]			=	"El videochat finalizó.";	// Tokbox - Displays when the session ends
	$language[204]			=	"Finalizar llamada";						// Tokbox - Text to end the call
	$language[205]			=	"Invitar";						// Tokbox - Text to invite a user
	$language[206]			=	"Activar Video";				// Tokbox - Text to turn on video
	$language[207]			=	"Desactivar Video";				// Tokbox - Text to turn off video

?>
