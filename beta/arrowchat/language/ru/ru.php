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

    $language = array();

    // ########################### STATUS #############################
    $language[1]         =  "Свободен";     // Available users
    $language[2]         =  "Занят";        // Busy users
    $language[3]         =  "Невидимый";    // Invisible users
    $status['available'] =  "Я свободен";   // Default available status message
    $status['busy']      =  "Я занят";      // Default busy status message
    $status['away']      =  "Нет на месте"; // Default idle status message
    $status['offline']   =  "Не в сети";    // Default offline status message
    $status['invisible'] =  "Не в сети";    // Default invisible status message
    $language[83]        =  "Гость";        // Displayed if the user has no username

    // ####################### SERVICE UPDATES ########################
    $language[27]   =  "Чат закрыт по техническим причинам.";      // Hover message when chat is in maintenance mode
    $language[28]   =  "Закрыть";                                  // Close the announcement message
    $language[58]   =  "Вы должны войти, чтобы использовать чат."; // The message that guests view when logged out

    // ######################## NOTIFICATIONS #########################
    $language[0]    =  "Уведомления";            // Displayed in the title bar of the notifications popup
    $language[9]    =  "Нет новых уведомлений."; // Displayed when a user has no new notifications
    $language[21]   =  "Показать все";           // The tooltip to see all notifications
    $language[71]   =  "секунд назад";           // Displayed after the time in notifications (second)
    $language[72]   =  "секунд назад";           // Displayed after the time in notifications (seconds)
    $language[73]   =  "минут назад";            // Displayed after the time in notifications (minute)
    $language[74]   =  "минут назад";            // Displayed after the time in notifications (minutes)
    $language[75]   =  "часов назад";            // Displayed after the time in notifications (hour)
    $language[76]   =  "часов назад";            // Displayed after the time in notifications (hours)
    $language[77]   =  "дней назад";             // Displayed after the time in notifications (day)
    $language[78]   =  "дней назад";             // Displayed after the time in notifications (days)
    $language[79]   =  "месяцев назад";          // Displayed after the time in notifications (month)
    $language[80]   =  "месяцев назад";          // Displayed after the time in notifications (months)
    $language[81]   =  "лет назад";              // Displayed after the time in notifications (year)
    $language[82]   =  "лет назад";              // Displayed after the time in notifications (years)
    $language[144]  =  "Новое сообщение от ";    // DISPLAYS USERNAME AFTER - The title for HTML5 notifications

    // ######################### BUDDY LIST ###########################
    $language[4]    =  "Чат";                                           // Displayed in the title bar of the buddy list popup
    $language[7]    =  "Чат (Не в сети)";                               // Displayed in the buddy list tab when offline
    $language[8]    =  "Нет никого онлайн";                             // Displayed with no one is online
    $language[12]   =  "Найти пользователя";                            // Displayed in the search text area of the buddy list
    $language[22]   =  "Статус";                                        // Button to show status options in the buddy list
    $language[23]   =  "Опции";                                         // Button to show options in the buddy list
    $language[25]   =  "Загрузка...";                                   // Text to show while the buddy list is loading
    $language[26]   =  "Пользователь не найден";                        // Displayed when no friends are found after searching
    $language[119]  =  "Введите имя пользователя";                      // Displayed in the guest username box
    $language[120]  =  "Вы должны указать имя.";                        // Error message when the user enters no guest name
    $language[121]  =  "Имя может содержать только буквы и цифры.";     // Error message when the user enters a guest name with more than letter/numbers
    $language[122]  =  "Имя содержит запрещенные слова: ";              // DISPLAYS BLOCKED WORD AFTER - Error message when the user enters a blocked word guest name
    $language[123]  =  "Вы не можете изменить своё имя.";               // Error message when user trys to change guest name again
    $language[124]  =  "Это имя занято другим пользователем.";          // Error message when duplicate guest name is selected
    $language[125]  =  "Длина имени не должна превышать 25 символов.";  // Error message when guest name is too long
    $language[140]  =  "Подключиться к Facebook";                       // Text to connect to Facebook
    $language[141]  =  "Выйти из Facebook";                             // Text to logout from Facebook
    $language[142]  =  "Пользователи сайта";                            // Text to display for site user's group
    $language[143]  =  "Друзья из Facebook";                            // Text to display for facebook friend's group

    // ########################### OPTIONS ############################
    $language[5]    =  "В сети";                                // Option to go offline text
    $language[6]    =  "Проигрывать звуки";                     // Option to play sound for new messages text
    $language[17]   =  "Не прятать список";                     // Option to keep the buddy list open text
    $language[18]   =  "Скрыть аватарки";                       // Option to hide avatars in the buddy list text
    $language[29]   =  "Тема:";                                 // Text to display next to the theme change select box
    $language[95]   =  "Список игноров...";                     // Option to manage the block list
    $language[96]   =  "Убрать пользователя из списка игноров"; // Text to display when a user is managing the block list
    $language[97]   =  "Убрать";                                // Text to display on unblock button
    $language[108]  =  "Выберите тему";                         // Text to display when a user is choosing a theme
    $language[109]  =  "OK";                                    // Text to display on the choose theme button
    $language[118]  =  "Выбрать";                               // Text to display on the selection for the block menu

    // ######################## APPLICATIONS ##########################
    $language[16]   =  "Приложения";                        // Displayed in the title bar of the applications popup
    $language[20]   =  "Закладки";                          // Displayed in the applications popup for the user's bookmarked applications
    $language[64]   =  "Другие приложения";                 // Displayed under bookmarks (non-bookmarks heading)
    $language[65]   =  "Перетащите для изменения порядка";  // Drag to reorder text
    $language[104]  =  "Не скрывать";                       // Displayed in the menu to keep an app window open
    $language[105]  =  "Загружать всегда";                  // Displayed in the menu to load the app when the bar loads

    // ######################### HIDE CHAT ############################
    $language[14]   =  "Скрыть чат";    // Displayed when the user hovers over the hide chat button
    $language[15]   =  "Показать чат";  // Displayed when the user hovers over the show chat button

    // ######################## POPOUT CHAT ############################
    $language[10]   =  "В отдельном окне";       // Option to pop out chat
    $language[11]   =  "Показать чат на панели"; // Option to pop in chat

    // ############################ CHAT ###############################
    $language[13]   =  "Пользователь вышел из сети. Он получит это сообщение, когда вернется";      // DISPLAYS USERNAME FIRST - Shown when a message is sent to an offline user
    $language[24]   =  "Очистить историю";                                                          // Displayed in the chat popup to clear chat history
    $language[30]   =  "Новое сообщение от";                                                        // DISPLAYS USERNAME AFTER - Blinks in the title of the browser on new messages
    $language[59]   =  "Больше &#9660;";                                                            // The text to display more chat options
    $language[60]   =  "Начать видеочат";                                                           // The video chat option in the more menu
    $language[61]   =  "Пользователь приглашает Вас в видеочат. Проигнорируйте это сообщение для отклонения."; // The message to send when a video chat is reuqested
    $language[62]   =  "Принять приглашение";                                                       // Accept a video chat request
    $language[63]   =  "Приглашение в видеочат отправлено";                                         // Displayed when a user sends a video chat request
    $language[66]   =  "Отправить файл...";                                                         // The file transfer option in the more menu
    $language[67]   =  "отмените отправку";                                                         // The link to cancel the file transfer
    $language[68]   =  "Ваш файл загружен и отправлен";                                             // Displayed when a user sends a file
    $language[69]   =  "Пользователь отправил Вам файл. Проигнорируйте это сообщение для отклонения."; // The message to send when a file is sent
    $language[70]   =  "Скачать файл";                                                              // Download a file that was sent
    $language[84]   =  "Игнорировать";                                                              // Blocks a user
    $language[85]   =  "Хотите также пожаловаться на этого пользователя?";                          // Asks the user if they want to report another user
    $language[86]   =  "Выбрать";                                                                   // The text to browse for a file when uploading
    $language[87]   =  "Выберите файл или ";                                                        // Text to display when uploading a file
    $language[88]   =  "Показать все чаты в отдельном окне";                                        // Displays when mouseover the popout chat icon
    $language[89]   =  "Закрыть чат";                                                               // Displays when mouserver the close icon
    $language[90]   =  "Вы";                                                                        // Displays on mosueover of your own chat text
    $language[102]  =  "Сообщение не было отправлено: пользователь игнорирует Вас";                 // Displays this when a user tries to send a message to another user who has them blocked
    $language[103]  =  "Пользователь теперь игнорируется. Его сообщения не будут отображаться";     // Displays when a user is blocked
    $language[134]  =  "Получено новое сообщение. Прокрутите вниз, чтобы прочитать";                // Displays when a chat window is not scrolled down on a new message
    $language[135]  =  "При отправке Вашего сообщения произошла ошибка";                            // Error message when a message fails to send

    // ######################### CHAT ROOMS #############################
    $language[19]   =  "Чат-комнаты";                                                               // Displayed in the chatrooms popup and tab
    $language[31]   =  "Создать";                                                                   // Button to show create chatroom
    $language[32]   =  "Опции";                                                                     // Button to show chatroom options
    $language[33]   =  "Покинуть";                                                                  // Button to show leave chatroom
    $language[34]   =  "Загрузка...";                                                               // Text so show while the chatroom list is loading
    $language[35]   =  " онлайн";                                                                   // DISPLAYS ONLINE COUNT FIRST - Shown after online count in list
    $language[37]   =  "Создать новую чат-комнату:";                                                // Text to display in the create chatroom popup
    $language[36]   =  "Не прятать окно";                                                           // Option to keep the chatroom window open
    $language[47]   =  "Не покидать комнату";                                                       // Option to stay in the chatroom without the window open on page load
    $language[38]   =  "Игнорировать личные чаты";                                                  // Option to block private chats from users in the chatroom
    $language[39]   =  "Вы недавно уже создали чат-комнату. Необходимо подождать некоторое время";  // Error to show when the chatroom flood limit is reached
    $language[40]   =  "В данный момент пользователи не могут создавать чат-комнаты";               // Error to show when user chatrooms are disabled
    $language[41]   =  "Личное сообщение";                                                          // Send user a private messages
    $language[42]   =  "Перейти к профилю";                                                         // Visit the user's profile
    $language[43]   =  "Гость";                                                                     // The user's title in the chatroom - shown when the user is a guest
    $language[44]   =  "Модератор";                                                                 // The user's title in the chatroom - shown when the user is a moderator
    $language[45]   =  "Администратор";                                                             // The user's title in the chatroom - shown when the user is an administrator
    $language[46]   =  "Пользователь игнорирует личные чаты";                                       // The text that the alert box will display when a user trys to PM with blocked chat
    $language[48]   =  "Этой чат-комнаты не существует";                                            // Displayed when a user trys to enter an invalid chatroom
    $language[49]   =  "Введен неверный пароль";                                                    // Displayed when a user enters the wrong password
    $language[50]   =  "Введите пароль для этой чат-комнаты:";                                      // Text to display when entering the chatroom password
    $language[51]   =  "Вы отправили слишком много сообщений подряд. Подождите, прежде чем сможете отправить новое"; // Error to show when flood limit is reached
    $language[52]   =  "Назначить модератором";                                                     // Make the user a moderator
    $language[54]   =  "Снять модератора";                                                          // Remove the user from being a moderator
    $language[53]   =  "Забанить";                                                                  // Ban/Kick the user from the chatroom
    $language[55]   =  "Вы забанены в этой чат-комнате на неопределенный срок";                     // Shown when a user is permanently banned
    $language[56]   =  "Вы забанены в этой чат-комнате на срок (в минутах): ";                      // DISPLAYS MINUTES AFTER - shown when a user is kicked
    $language[57]   =  "Введите время в минутах, на которое будет забанен пользователь. Введите 0 для бана на неопределенный срок"; // Message to show when banning a user.  Typing 0 will permanently ban the user
    $language[91]   =  "Укажите название создаваемой чат-комнаты";                                  // Message to display when creating a chat room
    $language[92]   =  "Выйти из чат-комнаты";                                                      // Tooltip when mousover the leave chat room icon
    $language[93]   =  "Создать новую чат-комнату";                                                 // Tooltip when mouseover the create chat room icon
    $language[94]   =  "Изменить внешний вид чата";                                                 // Tooltip when mouseover the change theme icon
    $language[98]   =  "Название";                                                                  // Placeholder for the create chatroom name box
    $language[99]   =  "Пароль (необязательно)";                                                    // Placeholder for the create chatroom password box
    $language[100]  =  "Войти";                                                                     // Displayed on UI buttons to join a chat room
    $language[101]  =  "Звуки чат-комнат";                                                          // The option to enable/disable chat room sounds
    $language[106]  =  " теперь модератор чат-комнаты. Назначил: ";                                 // DISPLAYS USERNAME FIRST/MODERATOR AFTER - Shown after a user is made a moderator
    $language[107]  =  " был выгнан из чат-комнаты модератором ";                                   // DISPLAYS USERNAME FIRST/MODERATOR AFTER - Shown after a user is kicked
    $language[117]  =  "Показать чат-комнату в отдельном окне";                                     // Option to pop out the chat room
    $language[127]  =  "Эта чат-комната переполнена. Попробуйте зайти позже";                       // Displayed when a user tries to enter a chat room with too many online.
    $language[136]  =  " (Админ)";                                                                  // Will display after a username when an administrator
    $language[137]  =  " (Модератор)";                                                              // Will display after a username when a moderator

    // ######################### MOBILE CHAT #############################
    $language[110]  =  "Мобильный чат";                                     // Displays in the header of the mobile chat
    $language[111]  =  "Пользователи онлайн";                               // Displays in the header for the online user list
    $language[112]  =  "Нет на месте";                                      // Displays in the header for the idle user list
    $language[113]  =  "Назад";                                             // Displays on the back button when viewing a chat
    $language[114]  =  "Отправить";                                         // Text for the send button
    $language[115]  =  "Новое";                                             // Text to display when a new message is received
    $language[116]  =  "Вы должны войти, чтобы использовать мобильный чат"; // Text to display when user is not logged in using mobile
    $language[126]  =  "Главная";                                           // Displays as a button to return to the website when in mobile chat
    $language[128]  =  "Чат-комнаты";                                       // Displays in the header for the chat room list
    $language[129]  =  "Настройки";                                         // Displays in the header for the settings
    $language[130]  =  "Показывать чат-комнаты";                            // The option to show chat rooms
    $language[131]  =  "Показывать пользователей, которых нет на месте";    // The option to show idle users
    $language[132]  =  "Да";                                                // The on option for a toggle
    $language[133]  =  "Нет";                                               // The off option for a toggle
    $language[138]  =  "Введите пароль для этой чат-комнаты:";              // Text to display for the chat room password input
    $language[139]  =  "Войти";                                             // The submit button to enter a chat room

    // Translation made by shoomyst (c) 2014
