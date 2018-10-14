(function (a) {
    a.arrowchat = function () {
		var $body = a('body');
		var $tooltip = null;
		var $tooltip_content;
		var $chatroom_tab = {};
		
		function hideTooltip() {
			if ($tooltip) {
				$tooltip.hide();
			}
		}
		
		function showTooltip($target, text, is_left, custom_left, custom_top, is_sideways, is_sideways_right) {
			if ($tooltip === null) {
				$tooltip = a('<div id="arrowchat_tooltip"><div class="arrowchat_tooltip_content"></div></div>').appendTo($body);
				$tooltip_content = a('.arrowchat_tooltip_content', $tooltip);
			}
			$tooltip_content.html(text);
			var target_offset = $target.offset();
			var target_width = $target.width();
			var target_height = $target.height();
			var tooltip_width = $tooltip.width();
			if (!custom_left) {
				custom_left = 0;
			}
			if (!custom_top) {
				custom_top = 0;
			}
			if (is_left) {
				$tooltip.css({
					top				: target_offset.top - a(window).scrollTop() - target_height - 5 - custom_top,
					left			: target_offset.left + target_width - 16 - custom_left,
					display			: "block",
					'padding-right' : "0px",
					'padding-left' : "0px"
				}).addClass("arrowchat_tooltip_left");
			} else if (is_sideways_right) {
				$tooltip.css({
					top				: target_offset.top - a(window).scrollTop() + (target_height/2) - 10 - custom_top,
					left			: target_offset.left + target_width + 28 - custom_left,
					display			: "block",
					'background-position'	: "-113px -58px",
					'padding-right' : "0px",
					'padding-left' : "6px"
				}).removeClass("arrowchat_tooltip_left");
			} else if (is_sideways) {
				$tooltip.css({
					top				: target_offset.top - a(window).scrollTop() - target_height - 5 - custom_top,
					left			: target_offset.left + target_width - tooltip_width + 18 - custom_left,
					display			: "block",
					'background-position'	: tooltip_width - 128 + "px -58px",
					'padding-right' : "6px",
					'padding-left' : "0px"
				}).removeClass("arrowchat_tooltip_left");
			} else {
				$tooltip.css({
					top				: target_offset.top - a(window).scrollTop() - target_height - 5 - custom_top,
					left			: target_offset.left + target_width - tooltip_width + 18 - custom_left,
					display			: "block",
					'background-position'	: tooltip_width - 23 + "px -114px",
					'padding-right' : "0px",
					'padding-left' : "0px"
				}).removeClass("arrowchat_tooltip_left");
			}
			if (W) {
				$tooltip.css("position", "absolute");
				$tooltip.css(
					"top", 
					parseInt(a(window).height()) - parseInt($tooltip.css("bottom")) - parseInt($tooltip.height()) + a(window).scrollTop() + "px"
				);
			}
		}
		
        function loadBuddyList() {
			clearTimeout(Z);
			a(".arrowchat_nofriends").remove();
            a.ajax({
                url: c_ac_path + "includes/json/receive/receive_buddylist.php?popout=1",
                cache: false,
                type: "post",
                dataType: "json",
                success: function (b) {
					if (!a("#arrowchat_popout_selection_room").hasClass("arrowchat_popout_selection_focused"))
						Va(b);
                }
            });
			if (typeof c_list_heart_beat != "undefined") {
				var BLHT = c_list_heart_beat * 1000;
			} else {
				var BLHT = 60000;
			}
            Z = setTimeout(function () {
                loadBuddyList()
            }, BLHT)
        }
		
        function Va(b) {
			a(".arrowchat_loading_icon").remove();
			a("#arrowchat_popout_left_lists").html('<div id="arrowchat_userslist_available"></div><div id="arrowchat_userslist_busy"></div><div id="arrowchat_userslist_away"></div><div id="arrowchat_userslist_offline"></div>');
            var c = {},
                d = "";
            c.available = "";
            c.busy = "";
            c.offline = "";
            c.away = "";
            onlineNumber = buddylistreceived = 0;
            b && a.each(b, function (i, e) {
                if (i == "buddylist") {
                    buddylistreceived = 1;
                    totalFriendsNumber = onlineNumber = 0;
                    a.each(e, function (l, f) {
                        longname = renderHTMLString(f.n).length > 16 ? renderHTMLString(f.n).substr(0, 16) + "..." : f.n;
                        if (G[f.id] != null) {
                            a("#arrowchat_popout_user_" + f.id + " .arrowchat_closebox_bottom_status").removeClass("arrowchat_available").removeClass("arrowchat_busy").removeClass("arrowchat_offline").removeClass("arrowchat_away").addClass("arrowchat_" + f.s);
                        }
                        if (f.s == "available" || f.s == "away" || f.s == "busy") onlineNumber++;
                        totalFriendsNumber++;
                        c[f.s] += '<div id="arrowchat_userlist_' + f.id + '" class="arrowchat_userlist arrowchat_buddylist_admin_' + f.admin + '" onmouseover="jqac(this).addClass(\'arrowchat_userlist_hover\');" onmouseout="jqac(this).removeClass(\'arrowchat_userlist_hover\');"><div class="arrowchat_popout_online_left"><img class="arrowchat_userlist_avatar ' + d + '" src="' + f.a + '" /></div><div class="arrowchat_popout_online_right"><span class="arrowchat_userscontentname">' + longname + '</span><span class="arrowchat_userscontentdot arrowchat_' + f.s + '"></span></div></div>';
						if (a("#arrowchat_popout_user_" + f.id + "_convo").length > 0) {
							var status = f.s;
							if (status == "available")
								status = lang[1];
							if (status == "away")
								status = lang[240];
							if (status == "offline")
								status = lang[241];
							if (status == "busy")
								status = lang[216];
							a("#arrowchat_popout_user_" + f.id + "_convo").children().children(".arrowchat_right_header_status").html(status);
							a("#arrowchat_popout_user_" + f.id + "_convo .arrowchat_info_status").html(status);
						}
                        uc_status[f.id] = f.s;
                        uc_name[f.id] = f.n;
                        uc_avatar[f.id] = f.a;
                        uc_link[f.id] = f.l
                    })
                }
                if (buddylistreceived == 1) {
                    for (buddystatus in c) {
						if (c.hasOwnProperty(buddystatus)) {
							if (c[buddystatus] == "") {
								a("#arrowchat_userslist_" + buddystatus).html("")
							} else {
								a("#arrowchat_userslist_" + buddystatus).html("<div>" + c[buddystatus] + "</div>");
							}
						}
					}
                    a(".arrowchat_userlist").click(function () {
						var c = a(this).attr('id').substr(19);
                        I(c, uc_name[c], uc_status[c], uc_avatar[c], uc_link[c]);
                    });
                    R = onlineNumber;
                    totalFriendsNumber == 0 && a('<div class="arrowchat_nofriends">' + lang[8] + "</div>").appendTo("#arrowchat_popout_friends");
                    buddylistreceived = 0
                }
				if (c_disable_avatars == 1 || a("#arrowchat_setting_names_only :input").is(":checked")) {
					setAvatarVisibility(1);
				}
            });
			a(".arrowchat_buddylist_admin_1").css("background-color", "#"+c_admin_bg);
			a(".arrowchat_buddylist_admin_1").css("color", "#"+c_admin_txt);
        }
		
        function DTitChange(name) {
            if (dtit2 != 2) {
                document.title = lang[30] + " " + name + "!";
                dtit2 = 2
            } else {
                document.title = dtit;
                dtit2 = 1
            }
            if (window_focus == false) {
                dtit3 = setTimeout(function () {
                    DTitChange(name)
                }, 1000)
            } else {
                document.title = dtit;
                clearTimeout(dtit3);
				setTimeout(function(){lsClick("body", 'window_focus')},500);
            }
        }
		
        function replaceURLWithHTMLLinks(text) {
			return anchorme.js(text);
		}
		
		RegExp.escape = function(text) {
			return text.replace(/[-[\]{}()*+?.,\\^$|#\s]/g, "\\$&");
		};
		
		function smileyreplace(mess) {
			if (c_disable_smilies != 1) {
				mess = mess.replace(/^\[e-([^\]]+)\]$/g, function(match, contents, offset, s) 
					{
						return '<span class="arrowchat_emoji_text arrowchat_emoji_32"><img src="' + c_ac_path + 'includes/emojis/img/32/' + contents + '.png" alt="" data-id="' + contents + '.png" /> </span>';
					}
				);
				mess = mess.replace(/\[e-(.*?)\]/g, function(match, contents, offset, s) 
					{
						return '<span class="arrowchat_emoji_text"><img src="' + c_ac_path + 'includes/emojis/img/16/' + contents + '.png" alt="" data-id="' + contents + '.png" /> </span>';
					}
				);
				for (i = 0; i < Smiley.length; i++) {
					var smiley_test = Smiley[i][1].replace(/</g, "&lt;").replace(/>/g, "&gt;");
					var check_emoticon = mess.lastIndexOf(smiley_test);
					if (check_emoticon != -1) {
						mess = mess.replace(
							new RegExp(RegExp.escape(smiley_test), 'g'),
							'<span class="arrowchat_emoji_text"><img src="' + c_ac_path + 'includes/emojis/img/16/' + Smiley[i][0] + '" alt="" /> </span>'
						);
					}
				}
				for (var i = 0; i < premade_smiley.length; i++) {
					var smiley_test = premade_smiley[i][0].replace(/</g, "&lt;").replace(/>/g, "&gt;");
					var check_emoticon = mess.lastIndexOf(smiley_test);
					if (check_emoticon != -1) {
						if (mess == smiley_test) {
							mess = mess.replace(
								new RegExp(RegExp.escape(smiley_test), 'g'),
								'<span class="arrowchat_emoji_text"><img src="' + c_ac_path + 'includes/emojis/img/16/' + premade_smiley[i][1] + '" alt="" /> </span>'
							);
						} else {
							mess = mess.replace(
								new RegExp(RegExp.escape(" " + smiley_test), 'g'),
								' <span class="arrowchat_emoji_text"><img src="' + c_ac_path + 'includes/emojis/img/16/' + premade_smiley[i][1] + '" alt="" /> </span>'
							);
						}
					}
				}
			}
			return mess;
		}
		
        function notifyNewMessage(b, c, d) {
            if (uc_name[b] == null || uc_name[b] == "") setTimeout(function () {
                notifyNewMessage(b, c, d)
            }, 500);
            else {
                I(b, uc_name[b], uc_status[b], uc_avatar[b], uc_link[b], 1);
                if (d == 1) if (a("#arrowchat_popout_user_" + b + " .arrowchat_popout_alert").length > 0) c = parseInt(a("#arrowchat_popout_user_" + b + " .arrowchat_popout_alert").html()) + parseInt(c);
                if (c == 0) {
                    a("#arrowchat_popout_user_" + b + " .arrowchat_popout_alert").remove();
                } else {
                    if (a("#arrowchat_popout_user_" + b + " .arrowchat_popout_alert").length > 0) {
                        a("#arrowchat_popout_user_" + b + " .arrowchat_popout_alert").html(c);
                    } else a("<div/>").addClass("arrowchat_popout_alert").html(c).insertAfter(a("#arrowchat_popout_user_" + b + " .arrowchat_popout_wrap .arrowchat_closebox_bottom_status"));
                }
                y[b] = c;
                S();
            }
        }
        function S() {
            var b = "",
                c = 0;
            for (chatbox in y) if (y.hasOwnProperty(chatbox)) if (y[chatbox] != null) {
                b += chatbox + "|" + y[chatbox] + ",";
                if (y[chatbox] > 0) c = 1
            }
            Ka = c;
            b.slice(0, -1)
        }
		
		function M() {
			a(".arrowchat_popout_convo").css("height", a(window).height() - a(".arrowchat_popout_convo_right_header").outerHeight() - a("#arrowchat_popout_open_chats").height() - 50);
		}
		
		function cancelJSONP() {
			if (typeof CHA != "undefined") {
				clearTimeout(CHA);
			}
			if (typeof xOptions != "undefined") {
				xOptions.abort();
			}
		}
		
        function receiveCore() {
			cancelJSONP();
			var chatroom_string = "";
			if (!a.isEmptyObject(chatroom_list)) {
				for (var i in chatroom_list) {
					chatroom_string = chatroom_string + "&room[]=" + chatroom_list[i];
				}
			}
            var url = c_ac_path + "includes/json/receive/receive_core.php?hash=" + u_hash_id + "&init=" + acsi + chatroom_string;
            xOptions = a.ajax({
                url: url,
				dataType: "jsonp",
                success: function (b) {
                    V.timestamp = ma;
                    var c = "",
                        d = {};
                    d.available = "";
                    d.busy = "";
                    d.offline = "";
                    d.away = "";
                    onlineNumber = buddylistreceived = 0;
                    if (b && b != null) {
                        var i = 0;
                        a.each(b, function (e, l) {
							if (e == "popout") {
								window.close();
							}
                            if (e == "typing") {
                                a.each(l, function (f, h) {
                                    if (h.is_typing == "1") {
										lsClick(h.typing_id, 'typing');
                                        receiveTyping(h.typing_id);
                                    } else {
										lsClick(h.typing_id, 'untyping');
                                        receiveNotTyping(h.typing_id);
                                    }
                                });
                            }
							if (e == "chatroom") {
								var alert_count = [],
									room_data = [],
									play_chatroom_sound = 0;
								a.each(l, function (f, h) {
									if (h.action == 1) {
										a("#arrowchat_chatroom_message_" + h.m + " .arrowchat_chatboxmessagecontent").html(lang[159] + h.n);
									} else {
										if (typeof(blockList[h.userid]) == "undefined") {
											addChatroomMessage(h.id, h.n, h.m, h.userid, h.t, h.global, h.mod, h.admin, h.chatroomid);
										}
										if (!a(".arrowchat_popout_convo_input").is(":focus") && h.userid != u_id)
											play_chatroom_sound = 1;
											
										room_data[h.chatroomid] = h;
										if (typeof(alert_count[h.chatroomid]) != "undefined")
											alert_count[h.chatroomid] = alert_count[h.chatroomid] + 1;
										else
											alert_count[h.chatroomid] = 1;
									}
								});
								if (room_data.length > 0) {
									showChatroomTime();
									for (var key in room_data) {
										if (typeof(blockList[room_data[key].userid]) == "undefined") {
											chatroomAlerts(alert_count[key], room_data[key].chatroomid);
											var data_array = [alert_count[key], room_data[key].chatroomid];
											lsClick(JSON.stringify(data_array), 'chatroom_alerts');
										}
									}
									u_sounds == 1 && play_chatroom_sound ==1 && playNewMessageSound();
								}
							}
                            if (e == "messages") {
                                a.each(l, function (f, h) {
									receiveMessage(h.id, h.from, h.message, h.sent, h.self, h.old);
                                });
                                K = 1;
								D = E;
								showTimeAndTooltip();
                                d != 1 && u_sounds == 1 && !a(".arrowchat_popout_convo_input").is(":focus") && acsi != 1 && playNewMessageSound();
                            }
                        });
                        j != "" && i > 0 && za(j, c)
                    }
                    if ($ != 1 && w != 1) {
                        K++;
                        if (K > 4) {
                            D *= 2;
                            K = 1
                        }
                        if (D > 12E3) D = 12E3
                    }
                    acsi++;
                    window.onblur = function () {
                        window_focus = false
                    };
                    window.onfocus = function () {
                        window_focus = true
                    };
					if (isAway == 1) {
						var CHT = c_heart_beat * 1000 * 3;
					} else {
						var CHT = c_heart_beat * 1000;
					}
					if (c_push_engine != 1) {
						CHA = setTimeout(function () {
							receiveCore()
						}, CHT);
					}
                }
            });
        }
		
        function addMessageToChatbox(b, c, d, i, e, l, f, multi_tab) {
			if (typeof(multi_tab) == "undefined") multi_tab = 0;
            aa[b] != 1 && I(b, uc_name[b], uc_status[b], uc_avatar[b], uc_link[b], 1, 1);
            if (uc_name[b] == null || uc_name[b] == "") setTimeout(function () {
                addMessageToChatbox(b, c, d, i, e, l, f, multi_tab)
            }, 500);
            else {
				lsClick(b, 'untyping');
				receiveNotTyping(b);
				var h = "",
					init = false;
                if (parseInt(d) == 1) {
                    fromname = u_name;
					fromid = u_id;
                    h = " arrowchat_self";
					avatar = u_avatar;
                } else {
					fromname = uc_name[b];
					fromid = b;
					avatar = uc_avatar[b];
				}
				tooltip = formatTimestamp(new Date(f * 1E3), 1);
				var full_name = fromid, image_msg = "";
                if (parseInt(l) == 1) c = c.replace(/</g, "&lt;").replace(/>/g, "&gt;").replace(/\n/g, "<br>").replace(/\"/g, "&quot;");
                c = replaceURLWithHTMLLinks(c);
                c = smileyreplace(c);
                separator = ":&nbsp;&nbsp;";
				if (c.substr(0, 4) == "<div") {
					image_msg = " arrowchat_image_msg";
				}
                if (a("#arrowchat_message_" + e).length) {
					a("#arrowchat_message_" + e + " .arrowchat_chatboxmessagecontent").html(c);
                } else {
					if (c_show_full_name != 1) {
						if (fromname.indexOf(" ") != -1) fromname = fromname.slice(0, fromname.indexOf(" "));
					}

					a("#arrowchat_popout_user_" + b + "_convo .arrowchat_popout_convo").append('<div class="arrowchat_chatboxmessage arrowchat_clearfix' + h + image_msg + '" id="arrowchat_message_' + e + '">' + formatTimestamp(new Date(f * 1E3)) + '<div class="arrowchat_chatboxmessagefrom"><div class="arrowchat_disable_avatars_name">' + fromname + '</div><img alt="' + fromname + ' ' + tooltip + '" class="arrowchat_chatbox_avatar" src="' + avatar + '" /></div><div class="arrowchat_chatboxmessage_wrapper"><div class="arrowchat_chatboxmessagecontent" data-id="' + tooltip + '">' + c + "</div></div></div>");
					
					if (a("#arrowchat_message_" + last_id[b]).length && d != 1) {
						a("#arrowchat_message_" + last_id[b]).children('.arrowchat_chatboxmessagefrom').children('.arrowchat_chatbox_avatar').addClass('arrowchat_single_avatar_hide');
					}
					
					last_sent[b] = f;
					last_name[b] = full_name;
					last_id[b] = e;
					
					if (c_disable_avatars == 1 || a("#arrowchat_setting_names_only :input").is(":checked")) {
						setAvatarVisibility(1);
					}
                    a("#arrowchat_popout_text_" + b).scrollTop(5E4);
					showTimeAndTooltip();
                }
				
                j != b && d != 1 && (i != 1 || multi_tab == 1) && notifyNewMessage(b, 1, 1)
            }
        }
		
		function showTimeAndTooltip() {
			a(".arrowchat_self .arrowchat_chatboxmessagecontent").mouseenter(function () {
				showTooltip(a(this), a(this).attr("data-id"), false, 2, 10 - a(this).outerHeight() + 30);
			});
			a(".arrowchat_self .arrowchat_chatboxmessagecontent").mouseleave(function () {
				hideTooltip();
			});
			a(".arrowchat_chatbox_avatar").mouseenter(function () {
				showTooltip(a(this), a(this).attr("alt"), false, 25, 5, 0, 1);
			});
			a(".arrowchat_chatbox_avatar").mouseleave(function () {
				hideTooltip();
			});						
			a(".arrowchat_chatboxmessage").mouseenter(function () {
				a(this).children(".arrowchat_ts").show();
			});
			a(".arrowchat_chatboxmessage").mouseleave(function () {
				a(this).children(".arrowchat_ts").hide();
			});
			a(".arrowchat_lightbox").unbind('click');
			a(".arrowchat_lightbox").click(function (){
				a.slimbox(a(this).attr('data-id'), '<a href="'+a(this).attr('data-id')+'">'+lang[70]+'</a>', {resizeDuration:1, overlayFadeDuration:1, imageFadeDuration:1, captionAnimationDuration:1});
			});
		}
		
        function za(b, c) {
            if (uc_name[b] == null || uc_name[b] == "") setTimeout(function () {
                za(b, c)
            }, 500);
            else {
                a("#arrowchat_popout_text_" + b).append("<div>" + c + "</div>");
                a("#arrowchat_popout_text_" + b).scrollTop(5E4);
                G[b] = 1
            }
        }
		
        function ya(b) {
            if (uc_name[b] == null || uc_name[b] == "") setTimeout(function () {
                ya(b)
            }, 500);
            else j != b && a("#arrowchat_popout_user_" + b).click()
        }
		
        function playNewMessageSound() {
			ion.sound.play("new_message");
        }
		
        function I(b, c, d, e, l, f, h) {
            if (!(b == null || b == "")) if (uc_name[b] == null || uc_name[b] == "") if (aa[b] != 1) {
                aa[b] = 1;
                a.ajax({
                    url: c_ac_path + "includes/json/receive/receive_user.php",
                    data: {
                        userid: b
                    },
                    type: "post",
                    cache: false,
                    success: function (o) {
                        if (o) {
                            c = uc_name[b] = o.n;
                            d = uc_status[b] = o.s;
                            e = uc_avatar[b] = o.a;
                            l = uc_link[b] = o.l;
                            if (G[b] != null) {
                                a("#arrowchat_popout_user_" + b + " .arrowchat_closebox_bottom_status").removeClass("arrowchat_available").removeClass("arrowchat_busy").removeClass("arrowchat_offline").addClass("arrowchat_" + d);
                            }
                            aa[b] = 0;
                            if (c != null) {
                                qa(b, c, d, e, l, f, h)
                            } else {
                                a.post(c_ac_path + "includes/json/send/send_settings.php", {
                                    userid: u_id,
                                    unfocus_chat: b
                                }, function () {})
                            }
                        }
                    }
                })
            } else setTimeout(function () {
                I(b, uc_name[b], uc_status[b], uc_avatar[b], uc_link[b], f, h)
            }, 500);
            else qa(b, uc_name[b], uc_status[b], uc_avatar[b], uc_link[b], f, h)
        }
		
		function formatTimestamp(b, noHTML) {
			var c = "am",
				d = b.getHours(),
				i = b.getMinutes(),
				e = b.getDate();
			b = b.getMonth();			var g = d;
			if (d > 11) c = "pm";
			if (d > 12) d -= 12;
			if (d == 0) d = 12;
			if (d < 10) d = d;
			if (i < 10) i = "0" + i;
			var l = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
				f = "th";
			if (e == 1 || e == 21 || e == 31) f = "st";
			else if (e == 2 || e == 22) f = "nd";
			else if (e == 3 || e == 23) f = "rd";
			if (noHTML) {
				if (c_us_time != 1) {
					return e != Na ? '' + g + ":" + i + " " + e + f + " " + l[b] + "" : '' + g + ":" + i + ""
				} else {
					return e != Na ? '' + d + ":" + i + c + " " + e + f + " " + l[b] + "" : '' + d + ":" + i + c + ""
				}
			} else {
				if (c_us_time != 1) {
					return e != Na ? '<span class="arrowchat_ts">' + g + ":" + i + " " + e + f + " " + l[b] + "</span>" : '<span class="arrowchat_ts">' + g + ":" + i + "</span>"
				} else {
					return e != Na ? '<span class="arrowchat_ts">' + d + ":" + i + c + " " + e + f + " " + l[b] + "</span>" : '<span class="arrowchat_ts">' + d + ":" + i + c + "</span>"
				}
			}
		}
		
        function receiveHistory(b, times) {
			if (times) {} else times = 1;
			if (times > 1) {
				a('<div class="arrowchat_message_history_loading" style="text-align:center;padding:5px 0;"><img src="' + c_ac_path + 'themes/' + u_theme + '/images/img-loading.gif" alt="Loading" /></div>').prependTo(a("#arrowchat_popout_text_" + b));
			}
            a.ajax({
                cache: false,
                url: c_ac_path + "includes/json/receive/receive_history.php",
                data: {
                    chatbox: b,
					history: times
                },
                type: "post",
				dataType: "json",
                success: function (c) {
					a(".arrowchat_message_history_loading").remove();
					history_ids[b] = 0;
					numMessages = 0;
                    if (c) {
						if (times == 1)
							a("#arrowchat_popout_user_" + b + "_convo .arrowchat_popout_convo").html("");
                        last_sent[b] = null;
                        var d = "",
                            i = uc_name[b],
							init = false,
							unhide_avatars = [];
                        a.each(c, function (e, l) {
                            e == "messages" && a.each(l, function (f, h) {
                                f = "";
								numMessages++;
                                if (h.self == 1) {
                                    fromname = u_name;
									fromid = u_id;
                                    f = " arrowchat_self";
                                    _aa5 = _aa4 = "";
									avatar = u_avatar;
                                } else {
                                    fromname = i;
									fromid = b;
                                    _aa4 = '<a target="_blank" href="' + uc_link[b] + '">';
                                    _aa5 = "</a>";
									avatar = uc_avatar[h.from];
                                }
								if (last_name[h.from] != fromid && typeof(last_name[h.from]) != "undefined") {
									unhide_avatars.push(last_id[h.from]);
								}
								var image_msg = "";
                                var o = new Date(h.sent * 1E3);
								tooltip = formatTimestamp(o, 1);
								if (c_show_full_name != 1) {
									if (fromname.indexOf(" ") != -1) fromname = fromname.slice(0, fromname.indexOf(" "));
								}
								if (h.message.substr(0, 4) == "<div") {
									image_msg = " arrowchat_image_msg";
								}
								d += '<div class="arrowchat_chatboxmessage arrowchat_clearfix' + f + image_msg + '" id="arrowchat_message_' + h.id + '">' + formatTimestamp(o) + '<div class="arrowchat_chatboxmessagefrom"><div class="arrowchat_disable_avatars_name">' + fromname + '</div><img alt="' + fromname + ' ' + tooltip + '" class="arrowchat_chatbox_avatar arrowchat_single_avatar_hide" src="' + avatar + '" /></div><div class="arrowchat_chatboxmessage_wrapper"><div class="arrowchat_chatboxmessagecontent" data-id="' + tooltip + '">' + h.message + "</div></div></div>";
								last_sent[h.from] = h.sent;
								last_name[h.from] = fromid;
								last_id[h.from] = h.id;
								init = true;
                            })
                        });
						var current_top_element = a("#arrowchat_popout_text_" + b).children('div').first('div');
                        if (times > 1) {
							a(d).prependTo(a("#arrowchat_popout_text_" + b).first('div'));
						} else {
							a("#arrowchat_popout_text_" + b).html("<div>" + d + "</div>");
						}
						if (a("#arrowchat_message_" + last_id[b]).length) {
							a("#arrowchat_message_" + last_id[b]).children('.arrowchat_chatboxmessagefrom').children('.arrowchat_chatbox_avatar').removeClass('arrowchat_single_avatar_hide');
						}
						a.each(unhide_avatars, function(key, value) {
							if (a("#arrowchat_message_" + value).length) {
								a("#arrowchat_message_" + value).children('.arrowchat_chatboxmessagefrom').children('.arrowchat_chatbox_avatar').removeClass('arrowchat_single_avatar_hide');
							}
						});
						showTimeAndTooltip();
						if (c_disable_avatars == 1 || a("#arrowchat_setting_names_only :input").is(":checked")) {
							setAvatarVisibility(1);
						}
						var previous_height = 0;
						current_top_element.prevAll().each(function() {
						  previous_height += a(this).outerHeight();
						});
						if (times == 1)
							a("#arrowchat_popout_text_" + b).scrollTop(5E4);
						else
							a("#arrowchat_popout_text_" + b).scrollTop(previous_height);
						a("#arrowchat_popout_text_" + b).scroll(function(){
							if (a("#arrowchat_popout_text_" + b).scrollTop() < 50 && history_ids[b] != 1) {
								history_ids[b] = 1;
								if (numMessages == 20) {
									times++;
									receiveHistory(b, times);
								}
							}
						});
						if (times == 1) {
							a(".arrowchat_chatboxmessagecontent>div>img,.arrowchat_emoji_text>img").one("load", function() {
							  a("#arrowchat_popout_text_" + b).scrollTop(5E4);
							}).each(function() {
							  if(this.complete) a(this).load();
							});
						}
                    }
                }
            });
        }
		
        function ea(atid) {
            a.post(c_ac_path + "includes/json/send/send_typing.php", {
                userid: u_id,
                typing: atid,
                untype: 1
            }, function () {});
            fa = -1
        }
		
		function chatroomKeydown(key, $element, id) {
			if (key.keyCode == 13 && key.shiftKey == 0) {
				var i = $element.val();
				i = i.replace(/^\s+|\s+$/g, "");
				$element.val("");
				$element.focus();
				if (c_send_room_msg == 1 && i != "") {
					displayMessage("arrowchat_chatroom_message_flyout", lang[209], "error");
				} else {
					i != "" && a.ajax({
						url: c_ac_path + "includes/json/send/send_message_chatroom.php",
						type: "post",
						cache: false,
						dataType: "json",
						data: {
							userid: u_id,
							username: u_name,
							chatroomid: Ccr,
							message: i
						},
						error: function () {
							displayMessage("arrowchat_chatroom_message_flyout", lang[135], "error");
						},
						success: function (o) {
							if (o) {
								var is_json = true;
								if (a.isNumeric(o)) is_json = false;
								var no_error = true;
								if (is_json) {
									o && a.each(o, function (i, e) {
										if (i == "error") {
											a.each(e, function (l, f) {
												no_error = false;
												displayMessage("arrowchat_chatroom_message_flyout", f.m, "error");
											});
										}
									});
								}
								
								if (no_error) {
									addMessageToChatroom(o, u_name, i, id);
									var data_array = [o, u_name, i, id, Ccr];
									lsClick(JSON.stringify(data_array), 'send_chatroom_message');
									a("#arrowchat_popout_user_" + id + "_convo .arrowchat_popout_convo").scrollTop(a("#arrowchat_popout_user_" + id + "_convo .arrowchat_popout_convo")[0].scrollHeight)
								}
							}
						}
					});
				}
				return false
			}
		}
		
        function O(b, c, d) {
            clearTimeout(pa);
            pa = setTimeout(function () {
                ea(d)
            }, 5E3);
            if (fa != d) {
                a.post(c_ac_path + "includes/json/send/send_typing.php", {
                    userid: u_id,
                    typing: d
                }, function () {});
                fa = d
            }
            if (b.keyCode == 13 && b.shiftKey == 0) {
                var i = a(c).val();
                i = i.replace(/^\s+|\s+$/g, "");
				a(c).val("");
				a(c).focus();
				if (c_send_priv_msg == 1 && i != "") {
					displayMessage("arrowchat_chatroom_message_flyout", lang[209], "error");
				} else {
					i != "" && a.post(c_ac_path + "includes/json/send/send_message.php", {
						userid: u_id,
						to: d,
						message: i
					}, function (e) {
						if (e) {
							var time = Math.floor((new Date).getTime() / 1E3);
							addMessageToChatbox(d, i, "1", "1", e, 1, time);
							var data_array = [e, d, i, time, 1, 1];
							lsClick(JSON.stringify(data_array), 'private_message');
							a("#arrowchat_popout_user_" + d + "_convo .arrowchat_popout_convo").scrollTop(a("#arrowchat_popout_user_" + d + "_convo .arrowchat_popout_convo")[0].scrollHeight)
						}
						K = 1;
						if (D > E) {
							D = E;
							clearTimeout(Y);
							Y = setTimeout(function () {
								receiveCore()
							}, E)
						}
					});
				}
                return false
            }
        }
		
        function Ca(b, c, d) {
			if (a("#arrowchat_popout_user_" + d + "_convo .arrowchat_smiley_popout").is(":visible")) {
				a("#arrowchat_popout_user_" + d + "_convo .arrowchat_smiley_popout").children(".arrowchat_more_popout").hide();
			}
            a("#arrowchat_popout_user_" + d + "_popup .arrowchat_popout_convo").scrollTop(a("#arrowchat_popout_user_" + d + "_convo .arrowchat_popout_convo")[0].scrollHeight)
        }
		
        function qa(b, c, d, e, l, f) {
            if (G[b] != null || a("#arrowchat_popout_user_"+b+"_convo").length > 0) {
                if (!a("#arrowchat_user_" + b).hasClass("arrowchat_tabclick") && f != 1) {
					j = b;
					a(".arrowchat_popout_convo_wrapper").removeClass("arrowchat_popout_convo_focused");
					a(".arrowchat_popout_tab").removeClass("arrowchat_popout_focused");
					a("#arrowchat_popout_user_" + b + "_convo").addClass("arrowchat_popout_convo_focused");
					a("#arrowchat_popout_user_" + b).addClass("arrowchat_popout_focused");
					if (ca[b] != 1) {
						receiveHistory(b);
						ca[b] = 1
					}
                }
            } else {
                shortname = renderHTMLString(c).length > 12 ? renderHTMLString(c).substr(0, 12) + "..." : c;
                longname = renderHTMLString(c).length > 24 ? renderHTMLString(c).substr(0, 24) + "..." : c;
                a("<div/>").attr("id", "arrowchat_popout_user_" + b).addClass("arrowchat_popout_tab").html('<div class="arrowchat_bar_left"><div class="arrowchat_popout_wrap"><div class="arrowchat_closebox_bottom_status arrowchat_' + d + '"></div><div class="arrowchat_popout_tab_name">' + shortname + '</div><div class="arrowchat_is_typing"><div class="arrowchat_typing_bubble"></div><div class="arrowchat_typing_bubble"></div><div class="arrowchat_typing_bubble"></div></div></div></div><div class="arrowchat_popout_right"><div class="arrowchat_closebox_bottom"></div></div>').appendTo(a("#arrowchat_popout_container"));
				var status = uc_status[b];
				if (status == "available")
					status = lang[1];
				if (status == "away")
					status = lang[240];
				if (status == "offline")
					status = lang[241];
				if (status == "busy")
					status = lang[216];
				var url = uc_link[b];
				url = url.replace(c_ac_path, "");
				a("<div/>").attr("id", "arrowchat_popout_user_" + b + "_convo").addClass("arrowchat_popout_convo_wrapper").html('<div class="arrowchat_popout_convo_right_header"><div class="arrowchat_right_header_name">' + uc_name[b] + '</div><div class="arrowchat_right_header_status">' + status + '</div><div class="arrowchat_popout_video_chat" id="arrowchat_video_chat_' + b + '"></div><div class="arrowchat_popout_info" id="arrowchat_info_' + b + '"></div></div><div id="arrowchat_popout_text_' + b + '" class="arrowchat_popout_convo"></div><div class="arrowchat_popout_input_container"><div class="arrowchat_smiley_button"><div class="arrowchat_more_wrapper arrowchat_smiley_popout"><div class="arrowchat_more_popout"><div class="arrowchat_smiley_box"><div class="arrowchat_emoji_wrapper"></div><div class="arrowchat_emoji_select_wrapper"><div class="arrowchat_emoji_selector arrowchat_emoji_smileys" data-id="emoji_smileys"></div><div class="arrowchat_emoji_selector arrowchat_emoji_animals" data-id="emoji_animals"></div><div class="arrowchat_emoji_selector arrowchat_emoji_food" data-id="emoji_food"></div><div class="arrowchat_emoji_selector arrowchat_emoji_activities" data-id="emoji_activities"></div><div class="arrowchat_emoji_selector arrowchat_emoji_travel" data-id="emoji_travel"></div><div class="arrowchat_emoji_selector arrowchat_emoji_objects" data-id="emoji_objects"></div><div class="arrowchat_emoji_selector arrowchat_emoji_symbols" data-id="emoji_symbols"></div><div class="arrowchat_emoji_selector arrowchat_emoji_flags" data-id="emoji_flags"></div><div class="arrowchat_emoji_selector arrowchat_emoji_custom" data-id="emoji_custom"></div></div></div><i class="arrowchat_more_tip"></i></div></div></div><div class="arrowchat_giphy_button"><div class="arrowchat_more_wrapper arrowchat_giphy_popout"><div class="arrowchat_more_popout"><div class="arrowchat_giphy_box"><label class="arrowchat_giphy_search_wrapper"><input type="text" class="arrowchat_giphy_search" placeholder="'+lang[214]+'" value="" tabindex="0" /></label><div class="arrowchat_giphy_image_wrapper"><div class="arrowchat_loading_icon"></div></div></div><i class="arrowchat_more_tip"></i></div></div></div><div id="arrowchat_upload_button_' + b + '"><div id="arrowchat_chatroom_uploader"> </div></div><div class="arrowchat_popout_input_wrapper"><textarea class="arrowchat_popout_convo_input" placeholder="' + lang[213] + '"></textarea></div></div>').appendTo(a("#arrowchat_popout_chat"));
				a('<div class="arrowchat_info_panel" data-id="' + b + '"><div class="arrowchat_info_user"><div class="arrowchat_info_avatar"><img src="' + uc_avatar[b] + '" alt="" /></div><div class="arrowchat_info_name_wrapper"><div class="arrowchat_info_name">' + uc_name[b] + '</div><div class="arrowchat_info_status">' + status + '</div></div><div class="arrowchat_clearfix"></div></div><div class="arrowchat_info_options"><div class="arrowchat_info_title">'+lang[23]+'</div><div class="arrowchat_info_option_wrapper arrowchat_option_clear" id="arrowchat_option_clear_' + b + '"><div class="arrowchat_info_option_pic"></div><div class="arrowchat_info_option_txt">'+lang[24]+'</div><div class="arrowchat_clearfix"></div></div><div class="arrowchat_info_option_wrapper arrowchat_option_ban" id="arrowchat_option_ban_' + b + '"><div class="arrowchat_info_option_pic"></div><div class="arrowchat_info_option_txt">'+lang[84]+'</div><div class="arrowchat_clearfix"></div></div><div class="arrowchat_info_option_wrapper arrowchat_option_report" id="arrowchat_option_report_' + b + '"><div class="arrowchat_info_option_pic"></div><div class="arrowchat_info_option_txt">'+lang[167]+'</div><div class="arrowchat_clearfix"></div></div></div><div class="arrowchat_info_link"><div class="arrowchat_info_title">'+lang[221]+'</div><div class="arrowchat_info_url"><a href="' + uc_link[b] + '" target="_blank">' + url + '</a></div></div></div>').prependTo("#arrowchat_popout_user_" + b + "_convo");
				if (c_enable_moderation != 1) a(".arrowchat_option_report").hide();
				a("#arrowchat_option_ban_" + b).click(function() {
					a("#arrowchat_popout_user_" + b + " .arrowchat_closebox_bottom").click();
					a.post(c_ac_path + "includes/json/send/send_settings.php", {
						block_chat: b
					}, function () {
						if (typeof(blockList[b]) == "undefined") {
							blockList[b] = b;
						}
						loadBuddyList();
					})
				});
				a("#arrowchat_option_clear_" + b).click(function() {
					a("#arrowchat_popout_text_" + b).html("");
					a.post(c_ac_path + "includes/json/send/send_settings.php", {
						clear_chat: b
					}, function () {})
				});
				a("#arrowchat_option_report_" + b).click(function() {
					a("#arrowchat_option_report_" + b).hide();
					a.post(c_ac_path + "includes/json/send/send_settings.php", {
						report_from: u_id,
						report_about: b
					}, function () {
						displayMessage("arrowchat_chatroom_message_flyout", lang[168], "notice");
					});
				});
				a("#arrowchat_info_" + b).click(function() {
					if (a("#arrowchat_popout_user_" + b + "_convo .arrowchat_info_panel").is(":visible")) {
						a("#arrowchat_popout_user_" + b + "_convo .arrowchat_info_panel").hide();
						a("#arrowchat_popout_user_" + b + "_convo").removeClass("arrowchat_info_panel_visible");
						a(this).removeClass("arrowchat_popout_info_hover");
						a("#arrowchat_popout_user_" + b + "_convo .arrowchat_popout_convo").css("margin-right", "0px");
						a("#arrowchat_popout_user_" + b + "_convo .arrowchat_popout_input_container").css("margin-right", "0px");
					} else {
						a("#arrowchat_popout_user_" + b + "_convo .arrowchat_info_panel").show();
						a("#arrowchat_popout_user_" + b + "_convo").addClass("arrowchat_info_panel_visible");
						a(this).addClass("arrowchat_popout_info_hover");
						a("#arrowchat_popout_user_" + b + "_convo .arrowchat_popout_convo").css("margin-right", "201px");
						a("#arrowchat_popout_user_" + b + "_convo .arrowchat_popout_input_container").css("margin-right", "201px");
					}
				});
                a("#arrowchat_popout_user_" + b + " .arrowchat_closebox_bottom").mouseenter(function () {
                    a(this).addClass("arrowchat_closebox_bottomhover")
                });
                a("#arrowchat_popout_user_" + b + " .arrowchat_closebox_bottom").mouseleave(function () {
                    a(this).removeClass("arrowchat_closebox_bottomhover")
                });
				a("#arrowchat_popout_user_" + b).mouseenter(function () {
					a(this).addClass("arrowchat_tabmouseover_popout");
                });
                a("#arrowchat_popout_user_" + b).mouseleave(function () {
					a(this).removeClass("arrowchat_tabmouseover_popout");
                });
				if (c_video_chat == 1) {
					a("#arrowchat_video_chat_" + b).click(function () {
						if (uc_status[b] != 'offline' && uc_status[b] != 'busy') {
							var RN = Math.floor(Math.random() * 9999999999);
							while (String(RN).length < 10) {
								RN = '0' + RN;
							}
							if (c_video_select == 4)
								RN = location.host + RN;
							if (c_video_select == 2) {
								a.ajax({
									type:"post",
									url: c_ac_path + "public/video/video_session.php",
									data: {
										room: RN
									},
									async: false,
									success: function(sess) {
										jqac.arrowchat.videoWith(sess);
										a.post(c_ac_path + "includes/json/send/send_message.php", {
											userid: u_id,
											to: b,
											message: "video{" + sess + "}"
										}, function (e) {
											if (e == "-1") {
												displayMessage("arrowchat_chatroom_message_flyout", lang[102], "error");
											} else {
												displayMessage("arrowchat_chatroom_message_flyout", lang[63], "notice");
											}
											a("#arrowchat_popout_text_" + b).scrollTop(a("#arrowchat_popout_text_" + b)[0].scrollHeight);
										});
									}
								});
							} else {
								jqac.arrowchat.videoWith(RN);
								a.post(c_ac_path + "includes/json/send/send_message.php", {
									userid: u_id,
									to: b,
									message: "video{" + RN + "}"
								}, function (e) {
									if (e == "-1") {
										displayMessage("arrowchat_chatroom_message_flyout", lang[102], "error");
									} else {
										displayMessage("arrowchat_chatroom_message_flyout", lang[63], "notice");
									}
									a("#arrowchat_popout_text_" + b).scrollTop(a("#arrowchat_popout_text_" + b)[0].scrollHeight);
								});
							}
						} else {
							displayMessage("arrowchat_chatroom_message_flyout", lang[146], "error");
						}
					});
				} else {
					a(".arrowchat_popout_video_chat").hide();
				}
                a("#arrowchat_popout_user_" + b + " .arrowchat_closebox_bottom").click(function () {
                    a.post(c_ac_path + "includes/json/send/send_settings.php", {
                        userid: u_id,
                        close_chat: b,
                        tab_alert: 1
                    }, function () {});
					a("#arrowchat_popout_user_" + b + "_convo").remove();
                    a("#arrowchat_popout_user_" + b).remove();
                    if (j == b) j = "";
                    y[b] = null;
                    G[b] = null;
                    ca[b] = 0;
					M();
                });
                a("#arrowchat_popout_user_" + b + "_convo .arrowchat_popout_convo_input").keydown(function (h) {
                    return O(h, this, b)
                });
                a("#arrowchat_popout_user_" + b + "_convo .arrowchat_popout_convo_input").keyup(function (h) {
                    return Ca(h, this, b)
                });
				a("#arrowchat_popout_user_" + b).click(function () {
					var tba = 0;
					Ccr = 0;
                    if (a("#arrowchat_popout_user_" + b + " .arrowchat_popout_alert").length > 0) {
                        tba = 1;
                        a("#arrowchat_popout_user_" + b + " .arrowchat_popout_alert").remove();
                        G[b] = 0;
                        y[b] = 0;
                        S()
                    }
                    if (a(this).hasClass("arrowchat_popout_focused")) {
                        a(this).removeClass("arrowchat_popout_focused");
						a("#arrowchat_popout_user_" + b + "_convo").removeClass("arrowchat_popout_convo_focused");
                        j = "";
                        a.post(c_ac_path + "includes/json/send/send_settings.php", {
                            userid: u_id,
                            unfocus_chat: b,
                            tab_alert: 1
                        }, function () {})
                    } else {
                        if (j != "") {
                            a("#arrowchat_popout_user_" + j).removeClass("arrowchat_popout_focused");
							a("#arrowchat_popout_user_" + j + "_convo").removeClass("arrowchat_popout_convo_focused");
                            j = ""
                        }
                        if (ca[b] != 1) {
                            receiveHistory(b);
                            ca[b] = 1
                        }
                        a.post(c_ac_path + "includes/json/send/send_settings.php", {
                            userid: u_id,
                            focus_chat: b,
                            tab_alert: tba
                        }, function () {});
						a(this).addClass("arrowchat_popout_focused");
						a("#arrowchat_popout_user_" + b + "_convo").addClass("arrowchat_popout_convo_focused");
						j = b;
						a("#arrowchat_popout_user_" + b + "_convo .arrowchat_popout_convo_input").focus()
					}
                    a("#arrowchat_popout_user_" + b + "_convo .arrowchat_popout_convo").scrollTop(a("#arrowchat_popout_user_" + b + "_convo .arrowchat_popout_convo")[0].scrollHeight);
				});
				a("#arrowchat_popout_user_" + b + "_convo .arrowchat_emoji_selector").click(function() {
					if (!a(this).hasClass("arrowchat_emoji_focused")) {
						a("#arrowchat_popout_user_" + b + "_convo .arrowchat_emoji_wrapper").html('<div class="arrowchat_loading_icon"></div>');
						a("#arrowchat_popout_user_" + b + "_convo .arrowchat_emoji_selector").removeClass("arrowchat_emoji_focused");
						a(this).addClass("arrowchat_emoji_focused");
						var load_id = a(this).attr("data-id");
						a.ajax({
							url: c_ac_path + 'includes/emojis/' + load_id + '.php',
							type: "GET",
							cache: true,
							success: function(html) {
								a("#arrowchat_popout_user_" + b + "_convo .arrowchat_emoji_wrapper").html(html);
								a("#arrowchat_popout_user_" + b + "_convo .arrowchat_emoji").click(function () {
									if (a(this).hasClass("arrowchat_emoji_custom"))
										var smiley_code = a(this).children('img').attr("data-id");
									else
										var smiley_code = '[e-' + a(this).children('img').attr("data-id").replace('.png', '') + ']';
									var existing_text = a("#arrowchat_popout_user_" + b + "_convo .arrowchat_popout_convo_input").val();
									a("#arrowchat_popout_user_" + b + "_convo .arrowchat_popout_convo_input").focus().val('').val(existing_text + smiley_code);
								});
							}
						});
					}
				});
				a(".arrowchat_emoji_smileys").mouseover(function(){showTooltip(a(this), lang[230], false, 15);}).mouseout(function(){hideTooltip();});
				a(".arrowchat_emoji_animals").mouseover(function(){showTooltip(a(this), lang[231], false, 15);}).mouseout(function(){hideTooltip();});
				a(".arrowchat_emoji_food").mouseover(function(){showTooltip(a(this), lang[232], false, 15);}).mouseout(function(){hideTooltip();});
				a(".arrowchat_emoji_activities").mouseover(function(){showTooltip(a(this), lang[233], false, 15);}).mouseout(function(){hideTooltip();});
				a(".arrowchat_emoji_travel").mouseover(function(){showTooltip(a(this), lang[234], false, 15);}).mouseout(function(){hideTooltip();});
				a(".arrowchat_emoji_objects").mouseover(function(){showTooltip(a(this), lang[235], false, 15);}).mouseout(function(){hideTooltip();});
				a(".arrowchat_emoji_symbols").mouseover(function(){showTooltip(a(this), lang[236], false, 15);}).mouseout(function(){hideTooltip();});
				a(".arrowchat_emoji_flags").mouseover(function(){showTooltip(a(this), lang[237], false, 15);}).mouseout(function(){hideTooltip();});
				a(".arrowchat_emoji_custom").mouseover(function(){showTooltip(a(this), lang[238], false, 15);}).mouseout(function(){hideTooltip();});
				a("#arrowchat_popout_user_" + b + "_convo .arrowchat_smiley_button").mouseenter(function () {
					a(this).addClass("arrowchat_smiley_button_hover")
				});
				a("#arrowchat_popout_user_" + b + "_convo .arrowchat_smiley_button").mouseleave(function () {
					a(this).removeClass("arrowchat_smiley_button_hover");
				});
				a("#arrowchat_popout_user_" + b + "_convo .arrowchat_smiley_wrapper").click(function () {
					var smiley_code = a(this).attr("data-id");
					var existing_text = a("#arrowchat_popout_user_" + b + "_convo .arrowchat_popout_convo_input").val();
					a("#arrowchat_popout_user_" + b + "_convo .arrowchat_popout_convo_input").focus().val('').val(existing_text + Smiley[smiley_code][1]);
				});
				a("#arrowchat_popout_user_" + b + "_convo .arrowchat_smiley_button").click(function () {
					if (a("#arrowchat_popout_user_" + b + "_convo .arrowchat_giphy_popout").children(".arrowchat_more_popout").is(":visible")) {
						a("#arrowchat_popout_user_" + b + "_convo .arrowchat_giphy_popout").children(".arrowchat_more_popout").hide();
					}
					if (a("#arrowchat_popout_user_" + b + "_convo .arrowchat_smiley_popout").is(":visible")) {
						a("#arrowchat_popout_user_" + b + "_convo .arrowchat_smiley_popout").children(".arrowchat_more_popout").hide();
					} else {
						if (!a("#arrowchat_popout_user_" + b + "_convo .arrowchat_emoji_selector").hasClass("arrowchat_emoji_focused")) {
							a("#arrowchat_popout_user_" + b + "_convo .arrowchat_emoji_wrapper").html('<div class="arrowchat_loading_icon"></div>');
							a("#arrowchat_popout_user_" + b + "_convo .arrowchat_emoji_selector").removeClass("arrowchat_emoji_focused");
							a("#arrowchat_popout_user_" + b + "_convo .arrowchat_emoji_smileys").addClass("arrowchat_emoji_focused");
							a.ajax({
								url: c_ac_path + 'includes/emojis/emoji_smileys.php',
								type: "GET",
								cache: true,
								success: function(html) {
									a("#arrowchat_popout_user_" + b + "_convo .arrowchat_emoji_wrapper").html(html);
									a("#arrowchat_popout_user_" + b + "_convo .arrowchat_emoji").click(function () {
										if (a(this).hasClass("arrowchat_emoji_custom"))
											var smiley_code = a(this).children('img').attr("data-id");
										else
											var smiley_code = '[e-' + a(this).children('img').attr("data-id").replace('.png', '') + ']';
										var existing_text = a("#arrowchat_popout_user_" + b + "_convo .arrowchat_popout_convo_input").val();
										a("#arrowchat_popout_user_" + b + "_convo .arrowchat_popout_convo_input").focus().val('').val(existing_text + smiley_code);
									});
								}
							});
						}
						a("#arrowchat_popout_user_" + b + "_convo .arrowchat_popout_convo_input").focus();
						a("#arrowchat_popout_user_" + b + "_convo .arrowchat_smiley_popout").children(".arrowchat_more_popout").show();
					}
				}).children().click(function(e){
					return false;
				});
				a("#arrowchat_popout_user_" + b + "_convo .arrowchat_giphy_button").mouseenter(function () {
					a(this).addClass("arrowchat_giphy_button_hover")
				});
				a("#arrowchat_popout_user_" + b + "_convo .arrowchat_giphy_button").mouseleave(function () {
					a(this).removeClass("arrowchat_giphy_button_hover");
				});
				a("#arrowchat_popout_user_" + b + "_convo .arrowchat_giphy_button").click(function () {
					if (a("#arrowchat_popout_user_" + b + "_convo .arrowchat_smiley_popout").children(".arrowchat_more_popout").is(":visible")) {
						a("#arrowchat_popout_user_" + b + "_convo .arrowchat_smiley_popout").children(".arrowchat_more_popout").hide();
					}
					if (a("#arrowchat_popout_user_" + b + "_convo .arrowchat_giphy_popout").children(".arrowchat_more_popout").is(":visible")) {
						a("#arrowchat_popout_user_" + b + "_convo .arrowchat_giphy_popout").children(".arrowchat_more_popout").hide();
					} else {
						a("#arrowchat_popout_user_" + b + "_convo .arrowchat_giphy_popout").children(".arrowchat_more_popout").show();
						a("#arrowchat_popout_user_" + b + "_convo .arrowchat_giphy_search").val('');
						a("#arrowchat_popout_user_" + b + "_convo .arrowchat_giphy_search").focus();
						loadGiphy('https://api.giphy.com/v1/gifs/trending?api_key=IOYyr4NK5ldaU&limit=20', 1, b);
					}
				}).children().click(function(e){
					return false;
				});
				a("#arrowchat_popout_user_" + b + "_convo .arrowchat_giphy_search").keyup(function () {
					a("#arrowchat_popout_user_" + b + "_convo .arrowchat_giphy_image_wrapper").html('<div class="arrowchat_loading_icon"></div>');
					if (a("#arrowchat_popout_user_" + b + "_convo .arrowchat_giphy_search").val() == '')
						loadGiphy('https://api.giphy.com/v1/gifs/trending?api_key=IOYyr4NK5ldaU&limit=20', 1, b);
					else
						loadGiphy('https://api.giphy.com/v1/gifs/search?api_key=IOYyr4NK5ldaU&limit=20&q=' + a("#arrowchat_popout_user_" + b + "_convo .arrowchat_giphy_search").val(), 1, b);
				});
				if (c_disable_smilies == 1) {a(".arrowchat_smiley_button").hide();a("#arrowchat_popout_user_" + b + "_convo .arrowchat_popout_input_container").addClass("arrowchat_no_smiley")}
				if (c_file_transfer != 1) {a("#arrowchat_upload_button_" + b).hide();a("#arrowchat_popout_user_" + b + "_convo .arrowchat_popout_input_container").addClass("arrowchat_no_file_upload")}
				if (c_giphy == 1) {a("#arrowchat_popout_user_" + b + "_convo .arrowchat_giphy_button").hide();a("#arrowchat_popout_user_" + b + "_convo .arrowchat_popout_input_container").addClass("arrowchat_no_giphy")}
				if (c_file_transfer == 1) {uploadProcessing(b, 0);}
				f != 1 && a("#arrowchat_popout_user_" + b).click();
				y[b] = 0;
				G[b] = 0;
            }
			M();
        }
		
		function loadGiphy(url, selector, popup_id) {
			a.ajax({
				url: url,
				type: "get",
				cache: false,
				dataType: "json",
				success: function (results) {
					results && a.each(results, function (i, e) {
						if (i == "data") {
							a("#arrowchat_popout_user_" + popup_id + "_convo .arrowchat_giphy_image_wrapper").html('');
							var new_height = 0;
							a.each(e, function (l, f) {
								new_height = Math.round((256/(f.images.original.width/f.images.original.height)));
								a("#arrowchat_popout_user_" + popup_id + "_convo .arrowchat_giphy_image_wrapper").append('<img class="arrowchat_giphy_image" src="' + f.images.original.url + '" alt="" style="height:' + new_height + 'px;width:256px" height="' + new_height + '" />');
							});
							a("#arrowchat_popout_user_" + popup_id + "_convo .arrowchat_giphy_image").click(function () {
								a("#arrowchat_popout_user_" + popup_id + "_convo .arrowchat_giphy_popout").children(".arrowchat_more_popout").hide();
								var giphy_src = a(this).attr('src');
								if (selector == 2) {
									a.post(c_ac_path + "includes/json/send/send_message_chatroom.php", {
										userid: u_id,
										username: u_name,
										chatroomid: Ccr,
										message: "giphy{" + a(this).attr('height') + "}{" + a(this).attr('src') + "}"
									}, function (e) {
										if (a("#arrowchat_chatroom_message_" + e).length) {} else {
											a("#arrowchat_popout_user_" + popup_id + "_convo .arrowchat_popout_convo").append('<div class="arrowchat_chatboxmessage arrowchat_clearfix arrowchat_self arrowchat_image_msg" id="arrowchat_chatroom_message_' + e + '"><span class="arrowchat_ts" style="display: none;"></span><div class="arrowchat_chatboxmessagefrom"><div class="arrowchat_disable_avatars_name">' + lang[90] + '</div></div><div class="arrowchat_chatboxmessage_wrapper"><div class="arrowchat_chatboxmessagecontent" data-id="' + lang[90] + '"><div class="arrowchat_giphy_message"><img class="arrowchat_lightbox" data-id="' + giphy_src + '" src="' + giphy_src + '" alt="" style="width:179px"></div></div></div></div>');
											var data_array = [e, u_name, '<div class="arrowchat_giphy_message"><img class="arrowchat_lightbox" data-id="' + giphy_src + '" src="' + giphy_src + '" alt="" style="width:179px"></div>', popup_id, Ccr];
											lsClick(JSON.stringify(data_array), 'send_chatroom_message');
										}
										a("#arrowchat_popout_user_" + popup_id + "_convo .arrowchat_popout_convo").scrollTop(a("#arrowchat_popout_user_" + popup_id + "_convo .arrowchat_popout_convo")[0].scrollHeight);
									});
								} else {
									a.post(c_ac_path + "includes/json/send/send_message.php", {
										userid: u_id,
										to: popup_id,
										username: u_name,
										chatroomid: Ccr,
										message: "giphy{" + a(this).attr('height') + "}{" + a(this).attr('src') + "}"
									}, function (e) {
										if (a("#arrowchat_message_" + e).length) {} else {
											a("#arrowchat_popout_user_" + popup_id + "_convo .arrowchat_popout_convo").append('<div class="arrowchat_chatboxmessage arrowchat_clearfix arrowchat_self arrowchat_image_msg" id="arrowchat_message_' + e + '"><span class="arrowchat_ts" style="display: none;"></span><div class="arrowchat_chatboxmessagefrom"><div class="arrowchat_disable_avatars_name">' + lang[90] + '</div></div><div class="arrowchat_chatboxmessage_wrapper"><div class="arrowchat_chatboxmessagecontent" data-id="' + lang[90] + '"><div class="arrowchat_giphy_message"><img class="arrowchat_lightbox" data-id="' + giphy_src + '" src="' + giphy_src + '" alt="" style="width:179px"></div></div></div></div>');
											var time = Math.floor((new Date).getTime() / 1E3);
											var data_array = [e, popup_id, '<div class="arrowchat_giphy_message"><img class="arrowchat_lightbox" data-id="' + giphy_src + '" src="' + giphy_src + '" alt="" style="width:179px"></div>', time, 1, 1];
											lsClick(JSON.stringify(data_array), 'private_message');
										}
										a("#arrowchat_popout_user_" + popup_id + "_convo .arrowchat_popout_convo").scrollTop(a("#arrowchat_popout_user_" + popup_id + "_convo .arrowchat_popout_convo")[0].scrollHeight);
									});
								}
							});
						}
					});
				}
			});
		}
		
		function uploadProcessing(b, chatroom) {
			var ts67 = Math.round(new Date().getTime());
			var path = c_ac_path.replace("../", "/");
			a("#arrowchat_upload_button_" + b).uploadifive({
				'uploadScript': path + 'includes/classes/class_uploads.php',
				'buttonText': ' ',
				'buttonClass': 'arrowchat_upload_user_button',
				'removeCompleted' : true,
				'formData': {
					'unixtime': ts67,
					'user': u_id
				},
				'queueID' : 'arrowchat_user_upload_queue',
				'height': 25,
				'width': 24,
				'multi': false,
				'auto': true,
				'fileType': 'image/*',
				'fileSizeLimit' : c_max_upload_size + 'MB',
				'onError': function (file, errorCode, errorMsg, errorString) {
					a("#arrowchat_popout_user_" + b + "_convo .arrowchat_popout_convo_input").focus();
				},
				'onCancel': function (file) {
					a("#arrowchat_popout_user_" + b + "_convo .arrowchat_popout_convo_input").focus();
				},
				'onUploadComplete': function (file) {
					var uploadType = "file",
						fileType = file.type.toLowerCase();
					if (fileType == "image/jpeg" || fileType == "image/gif" || fileType == "image/jpg" || fileType == "image/png")
						uploadType = "image";
					
					var sendUrl = "includes/json/send/send_message.php";
					var messageID = "arrowchat_message_";
					if (chatroom == 1) {
						sendUrl = "includes/json/send/send_message_chatroom.php";
						messageID = "arrowchat_chatroom_message_";
					}
					
					a.post(c_ac_path + sendUrl, {
						userid: u_id,
						username: u_name,
						chatroomid: Ccr,
						to: b,
						message: uploadType + "{" + ts67 + "}{" + file.name + "}"
					}, function (e) {
						if (a("#" + messageID + e).length) {} else {
							var message = "";
							if (uploadType == "image") {
								a("#arrowchat_popout_user_" + b + "_convo .arrowchat_popout_convo").append('<div class="arrowchat_chatboxmessage arrowchat_clearfix arrowchat_self arrowchat_image_msg" id="' + messageID + e + '"><span class="arrowchat_ts" style="display: none;">' + lang[90] + '</span><div class="arrowchat_chatboxmessagefrom"><div class="arrowchat_disable_avatars_name">' + lang[90] + '</div></div><div class="arrowchat_chatboxmessage_wrapper"><div class="arrowchat_chatboxmessagecontent" data-id="' + lang[90] + '"><div class="arrowchat_image_message"><img data-id="' + c_ac_path + 'public/download.php?file=' + ts67 + '" src="' + c_ac_path + 'public/download.php?file=' + ts67 + '_t" alt="Image" class="arrowchat_lightbox" /></div></div></div></div>');
								message = '<div class="arrowchat_image_message"><img data-id="' + c_ac_path + 'public/download.php?file=' + ts67 + '" src="' + c_ac_path + 'public/download.php?file=' + ts67 + '_t" alt="Image" class="arrowchat_lightbox" /></div>';
								a(".arrowchat_chatboxmessagecontent>div>img,.arrowchat_emoji_text>img").one("load", function() {
									setTimeout(function () {
										a(".arrowchat_popout_convo").scrollTop(5E4);
									}, 500);
								}).each(function() {
								  if(this.complete) a(this).load();
								});
							} else {
								a("#arrowchat_popout_user_" + b + "_convo .arrowchat_popout_convo").append('<div class="arrowchat_chatboxmessage arrowchat_clearfix arrowchat_self arrowchat_image_msg" id="' + messageID + e + '"><span class="arrowchat_ts" style="display: none;">' + lang[90] + '</span><div class="arrowchat_chatboxmessagefrom"><div class="arrowchat_disable_avatars_name">' + lang[90] + '</div></div><div class="arrowchat_chatboxmessage_wrapper"><div class="arrowchat_chatboxmessagecontent" data-id="' + lang[90] + '"><div class="arrowchat_action_message">' + lang[69] + '<br /><a href="' + c_ac_path + 'public/download.php?file=' + ts67 + '">' + file.name + '</a></div></div></div></div>');
								message = '<div class="arrowchat_action_message">' + lang[69] + '<br /><a href="' + c_ac_path + 'public/download.php?file=' + ts67 + '">' + file.name + '</a></div>';
							}
							if (chatroom == 1) {
								var data_array = [e, u_name, message, b, Ccr];
								lsClick(JSON.stringify(data_array), 'send_chatroom_message');
							} else {
								var time = Math.floor((new Date).getTime() / 1E3);
								var data_array = [e, b, message, time, 1, 1];
								lsClick(JSON.stringify(data_array), 'private_message');
							}
						}
						a(".arrowchat_popout_convo").scrollTop(5E4);
					});
					a("#arrowchat_popout_user_" + b + "_convo .arrowchat_popout_convo_input").focus();
					uploadProcessing(b, chatroom);
				}
			});
			a(".arrowchat_upload_user_button").mouseenter(function () {
				a(this).addClass("arrowchat_upload_button_hover")
			});
			a(".arrowchat_upload_user_button").mouseleave(function () {
				a(this).removeClass("arrowchat_upload_button_hover");
			});
		}
		
		function loadChatroomList() {
			a("#arrowchat_popout_left_lists").html("");
			a(".arrowchat_nofriends").remove();
			a('<div class="arrowchat_loading_icon"></div>').appendTo("#arrowchat_popout_friends");
			a.ajax({					
				url: c_ac_path + "includes/json/receive/receive_chatroom_list.php",
				cache: false,
				data: {
					chatroom_window: u_chatroom_open,
					chatroom_stay: u_chatroom_stay
				},
				type: "post",
				dataType: "json",
				success: function (b) {
					buildChatroomList(b);
				}
			});
		}
		
		function buildChatroomList(b) {
			a(".arrowchat_loading_icon").remove();
			a("#arrowchat_popout_left_lists").html("");
			var c = {},
			code = "",
			featured_list = "",
			other_list = "";
			b && a.each(b, function (i, e) {
				if (i == "chatrooms") {
					a.each(e, function (l, f) {
						code = '<div id="arrowchat_chatroom_' + f.id + '" class="arrowchat_chatroom_list" onmouseover="jqac(this).addClass(\'arrowchat_userlist_hover\');" onmouseout="jqac(this).removeClass(\'arrowchat_userlist_hover\');"><div class="arrowchat_popout_online_left"><img class="arrowchat_userlist_avatar ' + d + '" src="' + c_ac_path + "themes/" + u_theme + '/images/icons/' + f.img + '" alt="" /></div><div class="arrowchat_popout_online_right"><div class="arrowchat_popout_room_name_wrapper"><div class="arrowchat_userscontentname">' + f.n + '</div><div class="arrowchat_popout_room_desc">' + f.d + '</div></div><div class="arrowchat_popout_room_status_wrapper"><div class="arrowchat_popout_room_count">' + f.c + lang[35] + '</div><div class="arrowchat_chatroom_status arrowchat_chatroom_' + f.t + '"></div></div></div></div>';
						
						if (f.o == 1) {
							other_list += code;
						} else {
							featured_list += code;
						}
						crt[f.id] = f.t;
						crt2[f.id] = f.n;
					})
				}
			});
			if (featured_list != "") {
				a('<div class="arrowchat_chatroom_list_title">' + lang[227] + '</div>').appendTo(a("#arrowchat_popout_left_lists"));
				a(featured_list).appendTo(a("#arrowchat_popout_left_lists"));
			}
			if (other_list != "") {
				a('<div class="arrowchat_chatroom_list_title">' + lang[228] + '</div>').appendTo(a("#arrowchat_popout_left_lists"));
				a(other_list).appendTo(a("#arrowchat_popout_left_lists"));
			}
			chatroomreceived = 1;
			a(".arrowchat_chatroom_list").click(function (l) {
				chatroomListClicked(a(this), 19)
			});
		}
		
		function chatroomListClicked(b, length) {
			if (a(b).attr("id"))
				c = a(b).attr("id").substr(length);
			if (c == "") c = a(b).parent().attr("id").substr(length);
			var id2 = "cr-" + c;
			if (Object.keys($chatroom_tab).length <= 2 || typeof($chatroom_tab[id2]) != "undefined") {
				if (crt[c] == 2) {
					a("#arrowchat_chatroom_password_id").val(c);
					if (a("#arrowchat_chatroom_" + c).hasClass("arrowchat_chatroom_clicked")) {
						a("#arrowchat_chatroom_password_flyout").hide("slide", { direction: "up"}, 250);
						a(".arrowchat_chatroom_list").removeClass("arrowchat_chatroom_clicked");
						a("#arrowchat_popout_wrapper").removeClass("arrowchat_chatroom_opacity");
					} else {
						a(".arrowchat_chatroom_list").removeClass("arrowchat_chatroom_clicked");
						a("#arrowchat_chatroom_" + c).addClass("arrowchat_chatroom_clicked");
						if (!a("#arrowchat_chatroom_password_flyout").is(":visible")) {
							a("#arrowchat_chatroom_password_flyout").show("slide", { direction: "up"}, 250, function() {
								a("#arrowchat_chatroom_password_input").focus();
							});
							a("#arrowchat_popout_wrapper").addClass("arrowchat_chatroom_opacity");
						} else {
							a("#arrowchat_chatroom_password_flyout").hide("slide", { direction: "up"}, 250);
							a("#arrowchat_chatroom_password_flyout").show("slide", { direction: "up"}, 250, function() {
								a("#arrowchat_chatroom_password_input").focus();
							});
							a("#arrowchat_popout_wrapper").addClass("arrowchat_chatroom_opacity");
						}
					}
				} else {
					a("#arrowchat_popout_wrapper").removeClass("arrowchat_chatroom_opacity");
					if (a("#arrowchat_chatroom_password_flyout").is(":visible")) {
						a("#arrowchat_chatroom_password_flyout").hide("slide", { direction: "up"}, 250);
					}
					Ccr = c;
					addChatroomTab(c, crt2[c], 1);
					if (ca[id2] != 1) {
						loadChatroom(c, crt[c]);
						ca[id2] = 1;
					}
				}
			} else {
				displayMessage("arrowchat_chatroom_message_flyout", lang[218], "error");
			}
		}
		
		function addChatroomTab(id, name, focused) {
			var real_id = id;
			id = "cr-" + id;
			if (typeof(name) != "undefined") {
				if (typeof $chatroom_tab[id] == "undefined") {
					crt2[id] = name;
					$chatroom_tab[id] = a("<div/>").attr("id", "arrowchat_popout_user_" + id).addClass("arrowchat_popout_tab").html('<div class="arrowchat_bar_left"><div class="arrowchat_popout_wrap"><div class="arrowchat_popout_tab_name">' + crt2[id] + '</div></div></div><div class="arrowchat_popout_right"><div class="arrowchat_closebox_bottom"></div></div>').appendTo(a("#arrowchat_popout_container"));
					a("<div/>").attr("id", "arrowchat_popout_user_" + id + "_convo").addClass("arrowchat_popout_convo_wrapper").addClass("arrowchat_popout_chatroom_convo").html('<div class="arrowchat_popout_convo_right_header"><div class="arrowchat_right_header_name">' + crt2[id] + '</div><div class="arrowchat_right_header_status">'+lang[19]+'</div><div class="arrowchat_popout_display_list" id="arrowchat_display_list_' + id + '"></div></div><div id="arrowchat_popout_text_' + id + '" class="arrowchat_popout_convo"></div><div class="arrowchat_popout_input_container"><div class="arrowchat_smiley_button"><div class="arrowchat_more_wrapper arrowchat_smiley_popout"><div class="arrowchat_more_popout"><div class="arrowchat_smiley_box"><div class="arrowchat_emoji_wrapper"></div><div class="arrowchat_emoji_select_wrapper"><div class="arrowchat_emoji_selector arrowchat_emoji_smileys" data-id="emoji_smileys"></div><div class="arrowchat_emoji_selector arrowchat_emoji_animals" data-id="emoji_animals"></div><div class="arrowchat_emoji_selector arrowchat_emoji_food" data-id="emoji_food"></div><div class="arrowchat_emoji_selector arrowchat_emoji_activities" data-id="emoji_activities"></div><div class="arrowchat_emoji_selector arrowchat_emoji_travel" data-id="emoji_travel"></div><div class="arrowchat_emoji_selector arrowchat_emoji_objects" data-id="emoji_objects"></div><div class="arrowchat_emoji_selector arrowchat_emoji_symbols" data-id="emoji_symbols"></div><div class="arrowchat_emoji_selector arrowchat_emoji_flags" data-id="emoji_flags"></div><div class="arrowchat_emoji_selector arrowchat_emoji_custom" data-id="emoji_custom"></div></div></div><i class="arrowchat_more_tip"></i></div></div></div><div class="arrowchat_giphy_button"><div class="arrowchat_more_wrapper arrowchat_giphy_popout"><div class="arrowchat_more_popout"><div class="arrowchat_giphy_box"><label class="arrowchat_giphy_search_wrapper"><input type="text" class="arrowchat_giphy_search" placeholder="'+lang[214]+'" value="" tabindex="0" /></label><div class="arrowchat_giphy_image_wrapper"><div class="arrowchat_loading_icon"></div></div></div><i class="arrowchat_more_tip"></i></div></div></div><div id="arrowchat_upload_button_' + id + '"><div id="arrowchat_chatroom_uploader"> </div></div><div class="arrowchat_popout_input_wrapper"><textarea class="arrowchat_popout_convo_input" maxlength="' + c_max_chatroom_msg + '" placeholder="' + lang[213] + '"></textarea></div></div>').appendTo(a("#arrowchat_popout_chat"));
					a('<div class="arrowchat_info_panel" data-id="' + id + '"><div class="arrowchat_chatroom_list_title arrowchat_popout_room_admins">'+lang[148]+'</div><div class="arrowchat_chatroom_list_admins"></div><div class="arrowchat_chatroom_list_title arrowchat_popout_room_mods">'+lang[149]+'</div><div class="arrowchat_chatroom_list_mods"></div><div class="arrowchat_chatroom_list_title arrowchat_popout_room_users">'+lang[147]+'</div><div class="arrowchat_chatroom_list_users"></div></div>').prependTo("#arrowchat_popout_user_" + id + "_convo");
					addHover($chatroom_tab[id], "arrowchat_tabmouseover_popout");
					a(".arrowchat_closebox_bottom", $chatroom_tab[id]).unbind('click');
					a(".arrowchat_closebox_bottom", $chatroom_tab[id]).click(function() {
						$chatroom_tab[id].remove();
						a("#arrowchat_popout_user_" + id + "_convo").remove();
						delete $chatroom_tab[id];
						chatroom_popout = "";
						if (a.isEmptyObject($chatroom_tab)) {
							clearTimeout(Crref2);
						} else {
							for (var i in $chatroom_tab) {
								var tempId = i;
								tempId = tempId.substr(3);
								break;
							}
							receiveChatroom(tempId);
						}
						if (j == id) j = "";
						y[id] = null;
						G[id] = null;
						ca[id] = 0;
						a.post(c_ac_path + "includes/json/send/send_settings.php", {
							chatroom_unfocus: real_id
						}, function () {});
						changePushChannel(real_id, 0);
						M();
					});
					a("#arrowchat_display_list_" + id).click(function() {
						if (a("#arrowchat_popout_user_" + id + "_convo .arrowchat_info_panel").is(":visible")) {
							a("#arrowchat_popout_user_" + id + "_convo .arrowchat_info_panel").hide();
							a("#arrowchat_popout_user_" + id + "_convo").removeClass("arrowchat_info_panel_visible");
							a("#arrowchat_popout_user_" + id + "_convo .arrowchat_popout_convo").css("margin-right", "0px");
							a("#arrowchat_popout_user_" + id + "_convo .arrowchat_popout_input_container").css("margin-right", "0px");
						} else {
							a("#arrowchat_popout_user_" + id + "_convo .arrowchat_info_panel").show();
							a("#arrowchat_popout_user_" + id + "_convo").addClass("arrowchat_info_panel_visible");
							a("#arrowchat_popout_user_" + id + "_convo .arrowchat_popout_convo").css("margin-right", "201px");
							a("#arrowchat_popout_user_" + id + "_convo .arrowchat_popout_input_container").css("margin-right", "201px");
						}
						if (a("#arrowchat_popout_user_" + id + "_convo #arrowchat_chatroom_users_flyout_" + crou + "_" + id).hasClass("arrowchat_chatroom_create_flyout_display"))
							toggleChatroomUserInfo(crou);
						a("#arrowchat_popout_text_" + id).scrollTop(5E4);
					});
					a("#arrowchat_popout_user_" + id + "_convo .arrowchat_popout_convo_input").keydown(function (h) {
						return chatroomKeydown(h, a("#arrowchat_popout_user_" + id + "_convo .arrowchat_popout_convo_input"), id)
					});
					a("#arrowchat_popout_user_" + id + "_convo .arrowchat_popout_convo_input").keyup(function (h) {
						return Ca(h, a("#arrowchat_popout_user_" + id + "_convo .arrowchat_popout_convo_input"), id)
					});
					$chatroom_tab[id].unbind('click');
					$chatroom_tab[id].click(function () {
						if (a(".arrowchat_popout_alert", $chatroom_tab[id]).length > 0) {
							a(".arrowchat_popout_alert", $chatroom_tab[id]).remove();
						}
						if ($chatroom_tab[id].hasClass("arrowchat_popout_focused")) {
							a(this).removeClass("arrowchat_popout_focused");
							a("#arrowchat_popout_user_" + id + "_convo").removeClass("arrowchat_popout_convo_focused");
							j="";
						} else {
							if (j != "") {
								a("#arrowchat_popout_user_" + j).removeClass("arrowchat_popout_focused");
								a("#arrowchat_popout_user_" + j + "_convo").removeClass("arrowchat_popout_convo_focused");
								j = "";
							}
							if (ca[id] != 1) {
								loadChatroom(real_id, crt[id]);
								ca[id] = 1;
							}
							a(this).addClass("arrowchat_popout_focused");
							a("#arrowchat_popout_user_" + id + "_convo").addClass("arrowchat_popout_convo_focused");
							j = id;
							Ccr = real_id;
							a("#arrowchat_popout_user_" + id + "_convo .arrowchat_popout_convo_input").focus();
						}
						chatroom_popout = "";
						receiveChatroom(real_id);
						a("#arrowchat_popout_text_" + id).scrollTop(5E4);
					});
					a(".arrowchat_closebox_bottom", $chatroom_tab[id]).mouseenter(function () {
						a(this).addClass("arrowchat_closebox_bottomhover")
					});
					a(".arrowchat_closebox_bottom", $chatroom_tab[id]).mouseleave(function () {
						a(this).removeClass("arrowchat_closebox_bottomhover")
					});
					a("#arrowchat_popout_user_" + id + "_convo .arrowchat_emoji_selector").click(function() {
						if (!a(this).hasClass("arrowchat_emoji_focused")) {
							a("#arrowchat_popout_user_" + id + "_convo .arrowchat_emoji_wrapper").html('<div class="arrowchat_loading_icon"></div>');
							a("#arrowchat_popout_user_" + id + "_convo .arrowchat_emoji_selector").removeClass("arrowchat_emoji_focused");
							a(this).addClass("arrowchat_emoji_focused");
							var load_id = a(this).attr("data-id");
							a.ajax({
								url: c_ac_path + 'includes/emojis/' + load_id + '.php',
								type: "GET",
								cache: true,
								success: function(html) {
									a("#arrowchat_popout_user_" + id + "_convo .arrowchat_emoji_wrapper").html(html);
									a("#arrowchat_popout_user_" + id + "_convo .arrowchat_emoji").click(function () {
										if (a(this).hasClass("arrowchat_emoji_custom"))
											var smiley_code = a(this).children('img').attr("data-id");
										else
											var smiley_code = '[e-' + a(this).children('img').attr("data-id").replace('.png', '') + ']';
										var existing_text = a("#arrowchat_popout_user_" + id + "_convo .arrowchat_popout_convo_input").val();
										a("#arrowchat_popout_user_" + id + "_convo .arrowchat_popout_convo_input").focus().val('').val(existing_text + smiley_code);
									});
								}
							});
						}
					});
					a(".arrowchat_emoji_smileys").mouseover(function(){showTooltip(a(this), lang[230], false, 15);}).mouseout(function(){hideTooltip();});
					a(".arrowchat_emoji_animals").mouseover(function(){showTooltip(a(this), lang[231], false, 15);}).mouseout(function(){hideTooltip();});
					a(".arrowchat_emoji_food").mouseover(function(){showTooltip(a(this), lang[232], false, 15);}).mouseout(function(){hideTooltip();});
					a(".arrowchat_emoji_activities").mouseover(function(){showTooltip(a(this), lang[233], false, 15);}).mouseout(function(){hideTooltip();});
					a(".arrowchat_emoji_travel").mouseover(function(){showTooltip(a(this), lang[234], false, 15);}).mouseout(function(){hideTooltip();});
					a(".arrowchat_emoji_objects").mouseover(function(){showTooltip(a(this), lang[235], false, 15);}).mouseout(function(){hideTooltip();});
					a(".arrowchat_emoji_symbols").mouseover(function(){showTooltip(a(this), lang[236], false, 15);}).mouseout(function(){hideTooltip();});
					a(".arrowchat_emoji_flags").mouseover(function(){showTooltip(a(this), lang[237], false, 15);}).mouseout(function(){hideTooltip();});
					a(".arrowchat_emoji_custom").mouseover(function(){showTooltip(a(this), lang[238], false, 15);}).mouseout(function(){hideTooltip();});
					a("#arrowchat_popout_user_" + id + "_convo .arrowchat_smiley_button").mouseenter(function () {
						a(this).addClass("arrowchat_smiley_button_hover")
					});
					a("#arrowchat_popout_user_" + id + "_convo .arrowchat_smiley_button").mouseleave(function () {
						a(this).removeClass("arrowchat_smiley_button_hover");
					});
					a("#arrowchat_popout_user_" + id + "_convo .arrowchat_smiley_wrapper").click(function () {
						var smiley_code = a(this).attr("data-id");
						var existing_text = a("#arrowchat_popout_user_" + id + "_convo .arrowchat_popout_convo_input").val();
						a("#arrowchat_popout_user_" + id + "_convo .arrowchat_popout_convo_input").focus().val('').val(existing_text + Smiley[smiley_code][1]);
					});
					a("#arrowchat_popout_user_" + id + "_convo .arrowchat_smiley_button").click(function () {
						if (a("#arrowchat_popout_user_" + id + "_convo .arrowchat_giphy_popout").children(".arrowchat_more_popout").is(":visible")) {
							a("#arrowchat_popout_user_" + id + "_convo .arrowchat_giphy_popout").children(".arrowchat_more_popout").hide();
						}
						if (a("#arrowchat_popout_user_" + id + "_convo .arrowchat_smiley_popout").is(":visible")) {
							a("#arrowchat_popout_user_" + id + "_convo .arrowchat_smiley_popout").children(".arrowchat_more_popout").hide();
						} else {
							if (!a("#arrowchat_popout_user_" + id + "_convo .arrowchat_emoji_selector").hasClass("arrowchat_emoji_focused")) {
								a("#arrowchat_popout_user_" + id + "_convo .arrowchat_emoji_wrapper").html('<div class="arrowchat_loading_icon"></div>');
								a("#arrowchat_popout_user_" + id + "_convo .arrowchat_emoji_selector").removeClass("arrowchat_emoji_focused");
								a("#arrowchat_popout_user_" + id + "_convo .arrowchat_emoji_smileys").addClass("arrowchat_emoji_focused");
								a.ajax({
									url: c_ac_path + 'includes/emojis/emoji_smileys.php',
									type: "GET",
									cache: true,
									success: function(html) {
										a("#arrowchat_popout_user_" + id + "_convo .arrowchat_emoji_wrapper").html(html);
										a("#arrowchat_popout_user_" + id + "_convo .arrowchat_emoji").click(function () {
											if (a(this).hasClass("arrowchat_emoji_custom"))
												var smiley_code = a(this).children('img').attr("data-id");
											else
												var smiley_code = '[e-' + a(this).children('img').attr("data-id").replace('.png', '') + ']';
											var existing_text = a("#arrowchat_popout_user_" + id + "_convo .arrowchat_popout_convo_input").val();
											a("#arrowchat_popout_user_" + id + "_convo .arrowchat_popout_convo_input").focus().val('').val(existing_text + smiley_code);
										});
									}
								});
							}
							a("#arrowchat_popout_user_" + id + "_convo .arrowchat_popout_convo_input").focus();
							a("#arrowchat_popout_user_" + id + "_convo .arrowchat_smiley_popout").children(".arrowchat_more_popout").show();
						}
					}).children().click(function(e){
						return false;
					});
					a("#arrowchat_popout_user_" + id + "_convo .arrowchat_giphy_button").mouseenter(function () {
						a(this).addClass("arrowchat_giphy_button_hover")
					});
					a("#arrowchat_popout_user_" + id + "_convo .arrowchat_giphy_button").mouseleave(function () {
						a(this).removeClass("arrowchat_giphy_button_hover");
					});
					a("#arrowchat_popout_user_" + id + "_convo .arrowchat_giphy_button").click(function () {
						if (a("#arrowchat_popout_user_" + id + "_convo .arrowchat_smiley_popout").children(".arrowchat_more_popout").is(":visible")) {
							a("#arrowchat_popout_user_" + id + "_convo .arrowchat_smiley_popout").children(".arrowchat_more_popout").hide();
						}
						if (a("#arrowchat_popout_user_" + id + "_convo .arrowchat_giphy_popout").children(".arrowchat_more_popout").is(":visible")) {
							a("#arrowchat_popout_user_" + id + "_convo .arrowchat_giphy_popout").children(".arrowchat_more_popout").hide();
						} else {
							a("#arrowchat_popout_user_" + id + "_convo .arrowchat_giphy_popout").children(".arrowchat_more_popout").show();
							a("#arrowchat_popout_user_" + id + "_convo .arrowchat_giphy_search").val('');
							a("#arrowchat_popout_user_" + id + "_convo .arrowchat_giphy_search").focus();
							loadGiphy('https://api.giphy.com/v1/gifs/trending?api_key=IOYyr4NK5ldaU&limit=20', 2, id);
						}
					}).children().click(function(e){
						return false;
					});
					a("#arrowchat_popout_user_" + id + "_convo .arrowchat_giphy_search").keyup(function () {
						a("#arrowchat_popout_user_" + id + "_convo .arrowchat_giphy_image_wrapper").html('<div class="arrowchat_loading_icon"></div>');
						if (a("#arrowchat_popout_user_" + id + "_convo .arrowchat_giphy_search").val() == '')
							loadGiphy('https://api.giphy.com/v1/gifs/trending?api_key=IOYyr4NK5ldaU&limit=20', 2, id);
						else
							loadGiphy('https://api.giphy.com/v1/gifs/search?api_key=IOYyr4NK5ldaU&limit=20&q=' + a("#arrowchat_popout_user_" + id + "_convo .arrowchat_giphy_search").val(), 2, id);
					});
					if (c_disable_smilies == 1) {a(".arrowchat_smiley_button").hide();a("#arrowchat_popout_user_" + id + "_convo .arrowchat_popout_input_container").addClass("arrowchat_no_smiley")}
					if (c_file_transfer != 1 || c_chatroom_transfer != 1) {a("#arrowchat_upload_button_" + id).hide();a("#arrowchat_popout_user_" + id + "_convo .arrowchat_popout_input_container").addClass("arrowchat_no_file_upload")}
					if (c_giphy_chatroom == 1) {a("#arrowchat_popout_user_" + id + "_convo .arrowchat_giphy_button").hide();a("#arrowchat_popout_user_" + id + "_convo .arrowchat_popout_input_container").addClass("arrowchat_no_giphy")}
					if (c_chatroom_transfer == 1) {uploadProcessing(id, 1);}
					focused == 1 && $chatroom_tab[id].click();
				} else {
					if (focused == 1) {
						$chatroom_tab[id].addClass("arrowchat_popout_focused");
						j = id;
						a(".arrowchat_popout_convo_wrapper").removeClass("arrowchat_popout_convo_focused");
						a(".arrowchat_popout_tab").removeClass("arrowchat_popout_focused");
						a("#arrowchat_popout_user_" + id + "_convo").addClass("arrowchat_popout_convo_focused");
						a("#arrowchat_popout_user_" + id).addClass("arrowchat_popout_focused");
					}
				}
			}
			M();
		}
		
		function loadChatroom(b, c, pass) {
			var htmlID = "cr-" + b;
			a("#arrowchat_popout_wrapper").removeClass("arrowchat_chatroom_opacity");
			var global_mod = 0,
				global_admin = 0,
				admin_markup = "";
			chatroom_mod = 0;
			chatroom_popout = "";
			chatroom_admin = 0;
			chatroomreceived = 1;
			a.ajax({
				url: c_ac_path + "includes/json/receive/receive_chatroom_room.php",
				data: {
					chatroomid: b,
					chatroom_window: u_chatroom_open,
					chatroom_stay: u_chatroom_stay,
					chatroom_pw: pass
				},
				type: "post",
				cache: false,
				dataType: "json",
				success: function (o) {
					if (o) {
						clearTimeout(Crref2);
						var no_error = true;
						o && a.each(o, function (i, e) {
							if (i == "error") {
								a.each(e, function (l, f) {
									no_error = false;
									Ccr = 0;
									clearTimeout(Crref2);
									if (typeof($chatroom_tab[htmlID]) != "undefined") {
										a(".arrowchat_closebox_bottom", $chatroom_tab[htmlID]).click();
									}
									displayMessage("arrowchat_chatroom_message_flyout", f.m, "error");
								});
							}
						});
						if (no_error) {
							var welcomeMSG = "";
							u_chatroom_stay = b;
							Crref2 = setTimeout(function () {
								receiveChatroom(b)
							}, 30000);
							if (c_push_engine != 1) {
								cancelJSONP();
								changePushChannel(b, 1);
								receiveCore();
							} else {
								changePushChannel(b, 1);
							}
							if (typeof crt2[b] != "undefined") {
								addChatroomTab(b, crt2[b], 1);
							}
							o && a.each(o, function (i, e) {
								if (i == "user_title") {
									a.each(e, function (l, f) {
										if (f.admin == 1) {
											global_admin = 1;
											chatroom_admin = 1;
										}
										if (f.mod == 1) {
											global_mod = 1;
											chatroom_mod = 1;
										}
									});
								}
								if (i == "chat_name") {
									a.each(e, function (l, f) {										
										if (typeof crt2[b] == "undefined") {
											crt2[b] = f.n;
											addChatroomTab(b, crt2[b], 1);
										}
									});
								}
								if (i == "chat_users") {
									var longname,adminCount=0,modCount=0,userCount=0;
									a("#arrowchat_popout_user_" + htmlID + "_convo .arrowchat_chatroom_list_users").html("");
									a("#arrowchat_popout_user_" + htmlID + "_convo .arrowchat_chatroom_list_mods").html("");
									a("#arrowchat_popout_user_" + htmlID + "_convo .arrowchat_chatroom_list_admins").html("");
									a.each(e, function (l, f) {
										if ((global_admin == 1 || global_mod == 1) && (f.t == 1 || f.t == 4)) {
											admin_markup = '<hr class="arrowchat_options_divider" /><div class="arrowchat_chatroom_options_padding"><div id="arrowchat_chatroom_make_mod_' + f.id + '" class="arrowchat_chatroom_flyout_text">' + lang[52] + '</div></div><div class="arrowchat_chatroom_options_padding"><div id="arrowchat_chatroom_silence_user_' + f.id + '" class="arrowchat_chatroom_flyout_text">' + lang[161] + '</div></div><div class="arrowchat_chatroom_options_padding"><div id="arrowchat_chatroom_ban_user_' + f.id + '" class="arrowchat_chatroom_flyout_text">' + lang[53] + '</div></div>';
										}
										if (global_admin == 1 && f.t == 2) {
											admin_markup = '<hr class="arrowchat_options_divider" /><div class="arrowchat_chatroom_options_padding"><div id="arrowchat_chatroom_remove_mod_' + f.id + '" class="arrowchat_chatroom_flyout_text">' + lang[54] + '</div></div>';
										}
										appendVal = ".arrowchat_chatroom_list_users";
										if (f.t == 2) {
											appendVal = ".arrowchat_chatroom_list_mods";
											modCount++;
										} else if (f.t == 3) {
											appendVal = ".arrowchat_chatroom_list_admins";
											adminCount++;
										} else
											userCount++;
										longname = renderHTMLString(f.n);
										f.n = renderHTMLString(f.n);
										a("<div/>").attr("id", "arrowchat_chatroom_user_" + f.id).mouseover(function () {
											a(this).addClass("arrowchat_chatroom_list_hover");
										}).mouseout(function () {
											a(this).removeClass("arrowchat_chatroom_list_hover");
										}).addClass("arrowchat_chatroom_room_list").addClass('arrowchat_chatroom_admin_' + f.t).html('<img class="arrowchat_chatroom_avatar" src="' + f.a + '"/><span class="arrowchat_chatroom_room_name">' + f.n + '</span><span class="arrowchat_userscontentdot arrowchat_' + f.status + '"></span>').appendTo("#arrowchat_popout_user_" + htmlID + "_convo " + appendVal);
										var pm_opacity = "";
										if ((f.b == 1 && global_admin != 1) || f.id == u_id) pm_opacity = " arrowchat_no_private_msg";
										if (a("#arrowchat_chatroom_users_flyout_" + f.id + "_" + htmlID).length) a("#arrowchat_chatroom_users_flyout_" + f.id + "_" + htmlID).remove();
										a("<div/>").attr("id", "arrowchat_chatroom_users_flyout_" + f.id + "_" + htmlID).addClass("arrowchat_more_wrapper_chatroom").html('<div class="arrowchat_chatroom_users_flyout"><div class="arrowchat_chatroom_flyout_avatar"><img src="'+f.a+'" alt="" /></div><div class="arrowchat_chatroom_flyout_info"><div class="arrowchat_chatroom_title_padding"><div id="arrowchat_chatroom_title_' + f.id + '" class="arrowchat_chatroom_flyout_text"><a href="'+f.l+'" target="_blank">' + longname + '</a><br/>' + lang[43] + '</div></div><hr class="arrowchat_options_divider"/><div class="arrowchat_chatroom_options_padding"><div id="arrowchat_chatroom_private_message_' + f.id + '" class="arrowchat_chatroom_flyout_text'+pm_opacity+'">' + lang[41] + '</div></div><div class="arrowchat_chatroom_options_padding"><div id="arrowchat_chatroom_block_user_' + f.id + '" class="arrowchat_chatroom_flyout_text">' + lang[84] + '</div></div><div class="arrowchat_chatroom_options_padding"><div id="arrowchat_chatroom_report_user_' + f.id + '" class="arrowchat_chatroom_flyout_text">' + lang[167] + '</div></div>' + admin_markup + '</div><div class="arrowchat_clearfix"></div><i class="arrowchat_more_tip_chatroom"></i></div>').appendTo(a("#arrowchat_popout_user_" + htmlID + "_convo"));
										if (f.t == 2) {
											a("#arrowchat_popout_user_" + htmlID + "_convo #arrowchat_chatroom_title_" + f.id).html('<a href="'+f.l+'" target="_blank">' + longname + '</a><br/>' + lang[44]);
										} else if (f.t == 3) {
											a("#arrowchat_popout_user_" + htmlID + "_convo #arrowchat_chatroom_title_" + f.id).html('<a href="'+f.l+'" target="_blank">' + longname + '</a><br/>' + lang[45]);
										} else if (f.t == 4) {
											a("#arrowchat_popout_user_" + htmlID + "_convo #arrowchat_chatroom_title_" + f.id).html('<a href="'+f.l+'" target="_blank">' + longname + '</a><br/>' + lang[212])
										}
										addHover(a(".arrowchat_chatroom_options_padding"), "arrowchat_options_padding_hover");
										chatroomUserOptions(f, global_admin);
									});
									if (userCount == 0)
										a("#arrowchat_popout_user_" + htmlID + "_convo .arrowchat_popout_room_users").hide();
									else
										a("#arrowchat_popout_user_" + htmlID + "_convo .arrowchat_popout_room_users").show();
									if (adminCount == 0)
										a("#arrowchat_popout_user_" + htmlID + "_convo .arrowchat_popout_room_admins").hide();
									else
										a("#arrowchat_popout_user_" + htmlID + "_convo .arrowchat_popout_room_admins").show();
									if (modCount == 0)
										a("#arrowchat_popout_user_" + htmlID + "_convo .arrowchat_popout_room_mods").hide();
									else
										a("#arrowchat_popout_user_" + htmlID + "_convo .arrowchat_popout_room_mods").show();
									a(".arrowchat_chatroom_admin_3").css("background-color", "#"+c_admin_bg);
									a(".arrowchat_chatroom_admin_3").css("color", "#"+c_admin_txt);
								}
								if (i == "chat_history") {
									var d = "";
									a.each(e, function (l, f) {
										var regex = new RegExp('^(^|\\s)(@' + u_name + ')(\\s|$)', 'i');
										f.m = f.m.replace(regex, '$1<span class="arrowchat_at_user">$2</span>$3');
										if (typeof(blockList[f.userid]) == "undefined") {
											var title = "", important = "";
											if (f.mod == 1) {
												title = lang[137];
												important = " arrowchat_chatroom_important";
											}
											if (f.admin == 1) {
												title = lang[136];
												important = " arrowchat_chatroom_important";
											}
											l = "";
											var image_msg = "";
											fromname = f.n;
											if (f.n == u_name) {
												l = " arrowchat_self";
											}
											if (f.m.substr(0, 4) == "<div") {
												image_msg = " arrowchat_image_msg";
											}
											var sent_time = new Date(f.t * 1E3);
											var tooltip = formatTimestamp(sent_time, 1);
											if (f.global == 1) {
												d += '<div class="arrowchat_chatroom_box_message arrowchat_clearfix" id="arrowchat_chatroom_message_' + f.id + '"><div class="arrowchat_chatroom_message_content' + l + ' arrowchat_global_chatroom_message">' + formatTimestamp(sent_time) + f.m + "</div></div>"
											} else {
												d += '<div class="arrowchat_chatboxmessage arrowchat_popout_room_msg arrowchat_clearfix' + l + image_msg + important + '" id="arrowchat_chatroom_message_' + f.id + '">' + formatTimestamp(sent_time) + '<div class="arrowchat_chatboxmessagefrom"><img alt="' + fromname + title + ' ' + tooltip + '" class="arrowchat_chatbox_avatar arrowchat_no_names" src="' + f.a + '" /><div class="arrowchat_chatroom_message_name">' + fromname + title + ':</div></div><div class="arrowchat_chatboxmessage_wrapper"><div class="arrowchat_chatboxmessagecontent" data-id="' + tooltip + '">' + f.m + '<div class="arrowchat_chatroom_delete" data-id="' +  f.id + '"> </div></div></div></div>';
											}
										}
									});
									a("#arrowchat_popout_text_" + htmlID).html(d);
									showChatroomTime();
								}
								if (i == "room_info") {
									a.each(e, function (l, f) {										
										if (f.welcome_msg != "") {
											var message = stripslashes(f.welcome_msg);
											room_info[b] = message;
											message = replaceURLWithHTMLLinks(message);
											welcomeMSG = '<div class="arrowchat_chatroom_box_message arrowchat_clearfix" id="arrowchat_chatroom_welcome_msg"><div class="arrowchat_chatroom_message_content arrowchat_global_chatroom_message">' + message + '</div></div>';
										}
										room_desc[b] = f.desc;
										room_limit_msg[b] = f.limit_msg;
										room_limit_sec[b] = f.limit_sec;
									});
								}
							});
							if (welcomeMSG != "") {
								a("#arrowchat_popout_text_" + htmlID).append(welcomeMSG);
							}
							modDeleteControls(b);
							if (c_disable_avatars == 1 || a("#arrowchat_setting_names_only :input").is(":checked")) {
								setAvatarVisibility(1);
							}
							if (a("#arrowchat_chatroom_show_names :input").is(":checked")) {
								a(".arrowchat_chatroom_message_name").show();
								a(".arrowchat_chatbox_avatar").removeClass("arrowchat_no_names");
							}
							a("#arrowchat_popout_text_" + htmlID).scrollTop(5E4);
							a("#arrowchat_popout_user_" + htmlID + "_convo .arrowchat_popout_convo_input").focus();
							a(".arrowchat_image_msg img,.arrowchat_emoji_text>img").one("load", function() {
								a("#arrowchat_popout_text_" + htmlID).scrollTop(5E4);
							}).each(function() {
							  if(this.complete) a(this).load();
							});
						}
					}
				}
			})
		}
		
		function receiveChatroom(c) {
			var global_mod = 0,
				global_admin = 0,
				admin_markup = "";
			chatroom_mod = 0;
			chatroom_admin = 0;
			var tabs_string = "";
			var real_id;
			var htmlID = "cr-" + c;
			for (var i in $chatroom_tab) {
				if (!a("#arrowchat_popout_user_" + i).hasClass("arrowchat_popout_focused")) {
					real_id = i.substr(3);
					if (real_id != c)
						tabs_string += real_id + ",";
				}
			}
			tabs_string = tabs_string.slice(0, -1);
			a.ajax({
				url: c_ac_path + "includes/json/receive/receive_chatroom.php",
				cache: false,
				type: "post",
				data: {
					chatroomid: c,
					chatroomtabs: tabs_string
				},
				dataType: "json",
				success: function (b) {
					if (b) {
						var no_error = true;
						b && a.each(b, function (i, e) {
							if (i == "error") {
								a.each(e, function (l, f) {
									no_error = false;									
									Ccr = 0;
									clearTimeout(Crref2);
									if (typeof($chatroom_tab[htmlID]) != "undefined") {
										a(".arrowchat_closebox_bottom", $chatroom_tab[htmlID]).click();
									}
									if (!a.isEmptyObject($chatroom_tab)) {
										for (var i in $chatroom_tab) {
											$chatroom_tab[i].click();
											break;
										}
									} else {
										chatroomreceived = 0;
										loadChatroomList();
									}
									displayMessage("arrowchat_chatroom_message_flyout", f.m, "error");
								})
							}
						});
						if (no_error) {
							b && a.each(b, function (i, e) {
								if (i == "user_title") {
									a.each(e, function (l, f) {
										if (f.admin == 1) {
											global_admin = 1;
											chatroom_admin = 1;
										}
										if (f.mod == 1) {
											global_mod = 1;
											chatroom_mod = 1;
										}
									})
								}
								if (i == "chat_users") {
									var longname,adminCount=0,modCount=0,userCount=0;
									a("#arrowchat_popout_user_" + htmlID + "_convo .arrowchat_chatroom_list_users").html("");
									a("#arrowchat_popout_user_" + htmlID + "_convo .arrowchat_chatroom_list_mods").html("");
									a("#arrowchat_popout_user_" + htmlID + "_convo .arrowchat_chatroom_list_admins").html("");
									a.each(e, function (l, f) {
										if ((global_admin == 1 || global_mod == 1) && (f.t == 1 || f.t == 4)) {
											admin_markup = '<hr class="arrowchat_options_divider" /><div class="arrowchat_chatroom_options_padding"><div id="arrowchat_chatroom_make_mod_' + f.id + '" class="arrowchat_chatroom_flyout_text">' + lang[52] + '</div></div><div class="arrowchat_chatroom_options_padding"><div id="arrowchat_chatroom_silence_user_' + f.id + '" class="arrowchat_chatroom_flyout_text">' + lang[161] + '</div></div><div class="arrowchat_chatroom_options_padding"><div id="arrowchat_chatroom_ban_user_' + f.id + '" class="arrowchat_chatroom_flyout_text">' + lang[53] + '</div></div>';
										}
										if (global_admin == 1 && f.t == 2) {
											admin_markup = '<hr class="arrowchat_options_divider" /><div class="arrowchat_chatroom_options_padding"><div id="arrowchat_chatroom_remove_mod_' + f.id + '" class="arrowchat_chatroom_flyout_text">' + lang[54] + '</div></div>';
										}
										appendVal = ".arrowchat_chatroom_list_users";
										if (f.t == 2) {
											appendVal = ".arrowchat_chatroom_list_mods";
											modCount++;
										} else if (f.t == 3) {
											appendVal = ".arrowchat_chatroom_list_admins";
											adminCount++;
										} else
											userCount++;
										longname = renderHTMLString(f.n);
										f.n = renderHTMLString(f.n);
										a("<div/>").attr("id", "arrowchat_chatroom_user_" + f.id).mouseover(function () {
											a(this).addClass("arrowchat_chatroom_list_hover");
										}).mouseout(function () {
											a(this).removeClass("arrowchat_chatroom_list_hover");
										}).addClass("arrowchat_chatroom_room_list").addClass('arrowchat_chatroom_admin_' + f.t).html('<img class="arrowchat_chatroom_avatar" src="' + f.a + '"/><span class="arrowchat_chatroom_room_name">' + f.n + '</span><span class="arrowchat_userscontentdot arrowchat_' + f.status + '"></span>').appendTo("#arrowchat_popout_user_" + htmlID + "_convo " + appendVal);
										var pm_opacity = "";
										if ((f.b == 1 && global_admin != 1) || f.id == u_id) pm_opacity = " arrowchat_no_private_msg";
										if (a("#arrowchat_chatroom_users_flyout_" + f.id + "_" + htmlID).length) a("#arrowchat_chatroom_users_flyout_" + f.id + "_" + htmlID).remove();
										a("<div/>").attr("id", "arrowchat_chatroom_users_flyout_" + f.id + "_" + htmlID).addClass("arrowchat_more_wrapper_chatroom").html('<div class="arrowchat_chatroom_users_flyout"><div class="arrowchat_chatroom_flyout_avatar"><img src="'+f.a+'" alt="" /></div><div class="arrowchat_chatroom_flyout_info"><div class="arrowchat_chatroom_title_padding"><div id="arrowchat_chatroom_title_' + f.id + '" class="arrowchat_chatroom_flyout_text"><a href="'+f.l+'">' + longname + '</a><br/>' + lang[43] + '</div></div><hr class="arrowchat_options_divider"/><div class="arrowchat_chatroom_options_padding"><div id="arrowchat_chatroom_private_message_' + f.id + '" class="arrowchat_chatroom_flyout_text'+pm_opacity+'">' + lang[41] + '</div></div><div class="arrowchat_chatroom_options_padding"><div id="arrowchat_chatroom_block_user_' + f.id + '" class="arrowchat_chatroom_flyout_text">' + lang[84] + '</div></div><div class="arrowchat_chatroom_options_padding"><div id="arrowchat_chatroom_report_user_' + f.id + '" class="arrowchat_chatroom_flyout_text">' + lang[167] + '</div></div>' + admin_markup + '</div><div class="arrowchat_clearfix"></div><i class="arrowchat_more_tip_chatroom"></i></div>').appendTo(a("#arrowchat_popout_user_" + htmlID + "_convo"));
										if (f.t == 2) {
											a("#arrowchat_popout_user_" + htmlID + "_convo #arrowchat_chatroom_title_" + f.id).html('<a href="'+f.l+'" target="_blank">' + longname + '</a><br/>' + lang[44]);
										} else if (f.t == 3) {
											a("#arrowchat_popout_user_" + htmlID + "_convo #arrowchat_chatroom_title_" + f.id).html('<a href="'+f.l+'" target="_blank">' + longname + '</a><br/>' + lang[45]);
										} else if (f.t == 4) {
											a("#arrowchat_popout_user_" + htmlID + "_convo #arrowchat_chatroom_title_" + f.id).html('<a href="'+f.l+'" target="_blank">' + longname + '</a><br/>' + lang[212])
										}
										addHover(a(".arrowchat_chatroom_options_padding"), "arrowchat_options_padding_hover");
										chatroomUserOptions(f, global_admin);
										uc_avatar[f.id] = f.a;
									});
									if (userCount == 0)
										a("#arrowchat_popout_user_" + htmlID + "_convo .arrowchat_popout_room_users").hide();
									else
										a("#arrowchat_popout_user_" + htmlID + "_convo .arrowchat_popout_room_users").show();
									if (adminCount == 0)
										a("#arrowchat_popout_user_" + htmlID + "_convo .arrowchat_popout_room_admins").hide();
									else
										a("#arrowchat_popout_user_" + htmlID + "_convo .arrowchat_popout_room_admins").show();
									if (modCount == 0)
										a("#arrowchat_popout_user_" + htmlID + "_convo .arrowchat_popout_room_mods").hide();
									else
										a("#arrowchat_popout_user_" + htmlID + "_convo .arrowchat_popout_room_mods").show();
									a(".arrowchat_chatroom_admin_3").css("background-color", "#"+c_admin_bg);
									a(".arrowchat_chatroom_admin_3").css("color", "#"+c_admin_txt);
									if (chatroom_popout != "") {
										a("#arrowchat_popout_user_" + htmlID + "_convo #arrowchat_chatroom_user_" + chatroom_popout).click();
									}
								}
							});
							modDeleteControls(c);
							if (c_disable_avatars == 1 || a("#arrowchat_setting_names_only :input").is(":checked")) {
								setAvatarVisibility(1);
							}
							if (a("#arrowchat_chatroom_show_names :input").is(":checked")) {
								a(".arrowchat_chatroom_message_name").show();
								a(".arrowchat_chatroom_message_avatar").removeClass("arrowchat_no_names");
							}
						}
					}
				}
			});
			clearTimeout(Crref2);
			Crref2 = setTimeout(function () {
				receiveChatroom(c)
			}, 6E4);
		}
		
		function showChatroomTime() {
			a(".arrowchat_popout_room_msg .arrowchat_self .arrowchat_chatboxmessagecontent").mouseenter(function () {
				showTooltip(a(this), a(this).attr("data-id"), false, 2, 10 - a(this).outerHeight() + 30);
			});
			a(".arrowchat_popout_room_msg .arrowchat_self .arrowchat_chatboxmessagecontent").mouseleave(function () {
				hideTooltip();
			});
			a(".arrowchat_popout_room_msg .arrowchat_chatbox_avatar").mouseenter(function () {
				showTooltip(a(this), a(this).attr("alt"), false, 25, 5, 0, 1);
			});
			a(".arrowchat_popout_room_msg .arrowchat_chatbox_avatar").mouseleave(function () {
				hideTooltip();
			});	
			a(".arrowchat_lightbox").unbind('click');
			a(".arrowchat_lightbox").click(function (){
				a.slimbox(a(this).attr('data-id'), '<a href="'+a(this).attr('data-id')+'">'+lang[70]+'</a>', {resizeDuration:1, overlayFadeDuration:1, imageFadeDuration:1, captionAnimationDuration:1});
			});
		}
		
		function chatroomUserOptions(data, is_admin) {
			var htmlID = "cr-" + Ccr;
			a("#arrowchat_popout_user_" + htmlID + "_convo #arrowchat_chatroom_make_mod_" + data.id).click(function () {
				a.post(c_ac_path + "includes/json/send/send_settings.php", {
					chatroom_mod: data.id,
					chatroom_id: Ccr
				}, function () {receiveChatroom(Ccr);});
				toggleChatroomUserInfo(data.id);
			});
			a("#arrowchat_popout_user_" + htmlID + "_convo #arrowchat_chatroom_remove_mod_" + data.id).click(function () {
				a.post(c_ac_path + "includes/json/send/send_settings.php", {
					chatroom_remove_mod: data.id,
					chatroom_id: Ccr
				}, function () {receiveChatroom(Ccr);});
				toggleChatroomUserInfo(data.id);
			});
			a("#arrowchat_popout_user_" + htmlID + "_convo #arrowchat_chatroom_block_user_" + data.id).click(function () {
				a.post(c_ac_path + "includes/json/send/send_settings.php", {
					block_chat: data.id
				}, function (json_data) {
					if (json_data != "-1") {
						if (typeof(blockList[data.id]) == "undefined") {
							blockList[data.id] = data.id;
						}
						loadBuddyList();
						displayMessage("arrowchat_chatroom_message_flyout", lang[103], "notice");
					}
				});
				toggleChatroomUserInfo(data.id);
			});
			if (c_enable_moderation != 1) a("#arrowchat_popout_user_" + htmlID + "_convo #arrowchat_chatroom_report_user_" + data.id).hide();
			a("#arrowchat_popout_user_" + htmlID + "_convo #arrowchat_chatroom_report_user_" + data.id).click(function () {
				a.post(c_ac_path + "includes/json/send/send_settings.php", {
					report_about: data.id,
					report_from: u_id,
					report_chatroom: Ccr
				}, function (json_data) {
					displayMessage("arrowchat_chatroom_message_flyout", lang[168], "notice");
				});
				toggleChatroomUserInfo(data.id);
			});
			a("#arrowchat_popout_user_" + htmlID + "_convo #arrowchat_chatroom_ban_user_" + data.id).click(function () {
				var ban_length = prompt(lang[57]);
				if (ban_length != null && ban_length != "" && !(isNaN(ban_length))) {
					a.post(c_ac_path + "includes/json/send/send_settings.php", {
						chatroom_ban: data.id,
						chatroom_id: Ccr,
						chatroom_ban_length: ban_length
					}, function () {receiveChatroom(Ccr);});
				}
				toggleChatroomUserInfo(data.id);
			});
			a("#arrowchat_popout_user_" + htmlID + "_convo #arrowchat_chatroom_silence_user_" + data.id).click(function () {
				var silence_length = prompt(lang[162]);
				if (silence_length != null && silence_length != "" && !(isNaN(silence_length))) {
					a.post(c_ac_path + "includes/json/send/send_settings.php", {
						chatroom_silence: data.id,
						chatroom_id: Ccr,
						chatroom_silence_length: silence_length
					}, function () {});
				}
				toggleChatroomUserInfo(data.id);
			});
			a("#arrowchat_popout_user_" + htmlID + "_convo #arrowchat_chatroom_private_message_" + data.id).click(function () {
				if (data.b != 1 || is_admin == 1) {
					if (u_id != data.id) {
						I(data.id, uc_name[data.id], uc_status[data.id], uc_avatar[data.id], uc_link[data.id], "0");
					}
				} else {
					displayMessage("arrowchat_chatroom_message_flyout", lang[46], "error");
				}
				toggleChatroomUserInfo(data.id);
			});
			a("#arrowchat_popout_user_" + htmlID + "_convo #arrowchat_chatroom_user_" + data.id).click(function () {
				if (crou != data.id) {
					a("#arrowchat_popout_user_" + htmlID + "_convo #arrowchat_chatroom_user_" + crou).removeClass("arrowchat_chatroom_clicked");
					a("#arrowchat_popout_user_" + htmlID + "_convo #arrowchat_chatroom_users_flyout_" + crou + "_" + htmlID).removeClass("arrowchat_chatroom_create_flyout_display");
				}
				crou = data.id;
				toggleChatroomUserInfo(data.id);
				a("#arrowchat_popout_user_" + htmlID + "_convo #arrowchat_chatroom_users_flyout_" + data.id + "_" + htmlID).css("top", a("#arrowchat_popout_user_" + htmlID + "_convo #arrowchat_chatroom_user_" + crou).position().top - a("#arrowchat_popout_user_" + htmlID + "_convo #arrowchat_chatroom_users_flyout_" + data.id + "_" + htmlID).outerHeight() + (a("#arrowchat_popout_user_" + htmlID + "_convo #arrowchat_chatroom_user_" + crou).outerHeight() * 2) + 12 + "px");
				a("#arrowchat_popout_user_" + htmlID + "_convo #arrowchat_chatroom_users_flyout_" + data.id + "_" + htmlID + " .arrowchat_more_tip_chatroom").css("top", "auto").css("bottom", "18px");
				if (parseInt(a("#arrowchat_popout_user_" + htmlID + "_convo #arrowchat_chatroom_users_flyout_" + data.id + "_" + htmlID).css("top"), 10) < 0) {
					a("#arrowchat_popout_user_" + htmlID + "_convo #arrowchat_chatroom_users_flyout_" + data.id + "_" + htmlID).css("top", a("#arrowchat_popout_user_" + htmlID + "_convo #arrowchat_chatroom_users_flyout_" + data.id + "_" + htmlID).position().top + a("#arrowchat_popout_user_" + htmlID + "_convo #arrowchat_chatroom_users_flyout_" + data.id + "_" + htmlID).outerHeight() - a("#arrowchat_popout_user_" + htmlID + "_convo #arrowchat_chatroom_user_" + crou).outerHeight() - 12 + "px");
					a("#arrowchat_popout_user_" + htmlID + "_convo #arrowchat_chatroom_users_flyout_" + data.id + "_" + htmlID + " .arrowchat_more_tip_chatroom").css("top", "21px").css("bottom", "auto");
					if (a(window).width() <= 520) {
						a("#arrowchat_popout_user_" + htmlID + "_convo #arrowchat_chatroom_users_flyout_" + data.id + "_" + htmlID).css("top", a("#arrowchat_popout_user_" + htmlID + "_convo #arrowchat_chatroom_users_flyout_" + data.id + "_" + htmlID).position().top + a("#arrowchat_popout_user_" + htmlID + "_convo #arrowchat_chatroom_user_" + crou).outerHeight() + "px");
					}
				} else {
					if (a(window).width() <= 520) {
						a("#arrowchat_popout_user_" + htmlID + "_convo #arrowchat_chatroom_users_flyout_" + data.id + "_" + htmlID).css("top", a("#arrowchat_popout_user_" + htmlID + "_convo #arrowchat_chatroom_users_flyout_" + data.id + "_" + htmlID).position().top - a("#arrowchat_popout_user_" + htmlID + "_convo #arrowchat_chatroom_user_" + crou).outerHeight() + "px");
					}
				}
			}).children("#arrowchat_popout_user_" + htmlID + "_convo #arrowchat_chatroom_users_flyout_" + data.id + "_" + htmlID).click(function (e) {
				if (a(e.target).is('a')) {
					window.location = data.l;
				} else
					return false;
			});
		}
		
		function toggleChatroomUserInfo(id) {
			var htmlID = "cr-" + Ccr;
			a("#arrowchat_popout_user_" + htmlID + "_convo #arrowchat_chatroom_user_" + id).toggleClass("arrowchat_chatroom_clicked");
			a("#arrowchat_popout_user_" + htmlID + "_convo #arrowchat_chatroom_users_flyout_" + id + "_" + htmlID).toggleClass("arrowchat_chatroom_create_flyout_display");
			if (a("#arrowchat_popout_user_" + htmlID + "_convo #arrowchat_chatroom_users_flyout_" + id + "_" + htmlID).hasClass("arrowchat_chatroom_create_flyout_display")) {
				chatroom_popout = id;
			} else {
				chatroom_popout = "";
			}
		}
		
		function addMessageToChatroom(b, c, d, id, multi_tab) {
			if (typeof(multi_tab) == "undefined") multi_tab = 0;
			var title = "",important = "", image_msg = "";
			if (chatroom_mod == 1) {
				title = lang[137];
				important = " arrowchat_chatroom_important";
			}
			if (chatroom_admin == 1) {
				title = lang[136];
				important = " arrowchat_chatroom_important";
			}
			if (multi_tab != 1)
				d = d.replace(/</g, "&lt;").replace(/>/g, "&gt;").replace(/\n/g, "<br>").replace(/\"/g, "&quot;");
			d = replaceURLWithHTMLLinks(d);
			d = smileyreplace(d);
			if (d.substr(0, 4) == "<div") {
				image_msg = " arrowchat_image_msg";
			}
			var tooltip = formatTimestamp(new Date(Math.floor((new Date).getTime() / 1E3) * 1E3), 1);
			if (a("#arrowchat_chatroom_message_" + b).length > 0) {
			} else {
				a("#arrowchat_popout_text_" + id).append('<div class="arrowchat_chatboxmessage arrowchat_popout_room_msg arrowchat_clearfix arrowchat_self' + image_msg + important + '" id="arrowchat_chatroom_message_' + b + '"><div class="arrowchat_chatboxmessagefrom"><img alt="' + c + title + ' ' + tooltip + '" class="arrowchat_chatbox_avatar arrowchat_no_names" src="' + u_avatar + '" /><div class="arrowchat_chatroom_message_name">' + c + title + ':</div></div><div class="arrowchat_chatboxmessage_wrapper"><div class="arrowchat_chatboxmessagecontent" data-id="' + tooltip + '">' + d + '<div class="arrowchat_chatroom_delete" data-id="' +  b + '"> </div></div></div></div>');
				a("#arrowchat_popout_text_" + id).scrollTop(5E4);
			}
			showChatroomTime();
			var tempId = id;
			tempId = tempId.substr(3);
			modDeleteControls(tempId);
		}
		
		function modDeleteControls(id) {
			var htmlID = "cr-" + id;
			if (chatroom_mod == 1 || chatroom_admin == 1) {
				a("#arrowchat_popout_user_" + htmlID + "_convo .arrowchat_chatroom_delete").show();
				a("#arrowchat_popout_user_" + htmlID + "_convo .arrowchat_chatroom_delete").unbind("mouseenter").unbind("mouseleave").unbind("click");
				a("#arrowchat_popout_user_" + htmlID + "_convo .arrowchat_chatroom_delete").mouseenter(function () {
					showTooltip(a(this), lang[160], 0, 3, 21);
					a(this).addClass("arrowchat_chatroom_delete_hover")
				});
				a("#arrowchat_popout_user_" + htmlID + "_convo .arrowchat_chatroom_delete").mouseleave(function () {
					hideTooltip();
					a(this).removeClass("arrowchat_chatroom_delete_hover");
				});
				a("#arrowchat_popout_user_" + htmlID + "_convo .arrowchat_chatroom_delete").click(function () {
					hideTooltip();
					var msg_id = a(this).attr('data-id');
					a("#arrowchat_chatroom_message_" + msg_id + " .arrowchat_chatroom_delete").remove();
					a.post(c_ac_path + "includes/json/send/send_settings.php", {
						delete_msg: msg_id,
						chatroom_id: Ccr,
						delete_name: u_name
					}, function () {
						a("#arrowchat_popout_user_" + htmlID + "_convo  #arrowchat_chatroom_message_" + msg_id + " .arrowchat_chatboxmessagecontent").html(lang[159] + u_name);
					})
				});
			} else {
				a("#arrowchat_popout_user_" + htmlID + "_convo  .arrowchat_chatroom_delete").hide();
			}
		}
		
		function changePushChannel(id, connect) {
			if (connect == 1) {
				if (c_push_engine == 1) {
					push.subscribe({ "channel" : "chatroom" + id, "callback" : function(data) { pushReceive(data); } });
				}
				chatroom_list[id] = id;
			} else {
				if (c_push_engine == 1) {
					push.unsubscribe({ "channel" : "chatroom" + id });
				}
				if (typeof(chatroom_list[id]) != "undefined") {
					delete chatroom_list[id];
				}
			}
		}
		
		function loadChatroomInit() {
			a("#arrowchat_password_cancel_button").click(function () {
				a("#arrowchat_popout_wrapper").removeClass("arrowchat_chatroom_opacity");
				a(".arrowchat_chatroom_list").removeClass("arrowchat_chatroom_clicked");
				a("#arrowchat_chatroom_password_flyout").hide("slide", { direction: "up"}, 250);
			});
			a("#arrowchat_password_button").click(function () {
				c = a("#arrowchat_chatroom_password_id").val();
				a("#arrowchat_chatroom_password_flyout").hide();
				a("#arrowchat_popout_wrapper").removeClass("arrowchat_chatroom_opacity");
				a(".arrowchat_chatroom_list").removeClass("arrowchat_chatroom_clicked");
				input_value = a("#arrowchat_chatroom_password_input").val();
				a("#arrowchat_chatroom_password_input").val("");
				input_value = input_value.replace(/^\s+|\s+$/g, "");
				Ccr = c;
				loadChatroom(c, crt[c], input_value)
			});
		}
		
		function displayMessage(id, message, type) {
			clearTimeout(message_timeout);
			if (a("#" + id).is(":visible")) {
				a("#" + id).hide("slide", { direction: "up"}, 250, function() {					
					a("#" + id + " .arrowchat_message_text").html(message);
					type == "error" && a(".arrowchat_message_box").addClass("arrowchat_message_box_error").removeClass("arrowchat_message_box_notice");
					type == "notice" && a(".arrowchat_message_box").addClass("arrowchat_message_box_notice").removeClass("arrowchat_message_box_error");
					a("#" + id).show("slide", { direction: "up"}, 250);
				});
			} else {
				type == "error" && a(".arrowchat_message_box").addClass("arrowchat_message_box_error").removeClass("arrowchat_message_box_notice");
				type == "notice" && a(".arrowchat_message_box").addClass("arrowchat_message_box_notice").removeClass("arrowchat_message_box_error");
				a("#" + id + " .arrowchat_message_text").html(message);
				a("#" + id).show("slide", { direction: "up"}, 250);
			}
			message_timeout = setTimeout(function () {
				a("#" + id).hide("slide", { direction: "up"}, 250);
			}, 5000);
		}
		
		function stripslashes(str) {
			str=str.replace(/\\'/g,'\'');
			str=str.replace(/\\"/g,'"');
			str=str.replace(/\\0/g,'\0');
			str=str.replace(/\\\\/g,'\\');
			return str;
		}
		
		function receiveMessage(id, from, message, sent, self, old, multi_tab) {
			var data_array = [id, from, message, sent, self, old];
			acsi != 1 && lsClick(JSON.stringify(data_array), 'private_message');
			var c = "",
			ma = id;
			clearTimeout(dtit3);
			document.title = dtit;
			if (j == from && uc_name[from] != "" && uc_name[from] != null) {
				lsClick(from, 'untyping');
				receiveNotTyping(from);
				var container = a("#arrowchat_popout_text_" + from)[0].scrollHeight - a("#arrowchat_popout_text_" + from).scrollTop() - 10;
				var container2 = a("#arrowchat_popout_text_" + from).outerHeight();
				var o = uc_name[from];
				if (uc_status[from] == "offline") {
					loadBuddyList();
				}
				f = "";
				if (self == 1) {
					fromname = u_name;
					fromid = u_id;
					f = " arrowchat_self";
					avatar = u_avatar;
				} else {
					DTitChange(uc_name[from]);
					fromname = o;
					fromid = from;
					avatar = uc_avatar[from];
				}
				tooltip = formatTimestamp(new Date(sent * 1E3), 1);
				var image_msg = "";
				message = stripslashes(message);
				message = replaceURLWithHTMLLinks(message);
				if (multi_tab == 1)
					message = smileyreplace(message);
				if (message.substr(0, 4) == "<div") {
					image_msg = " arrowchat_image_msg";
				}
				if (a("#arrowchat_message_" + id).length) {
					a("#arrowchat_message_" + id + " .arrowchat_chatboxmessagecontent").html(message);
				} else {
					if (c_show_full_name != 1) {
						if (fromname.indexOf(" ") != -1) fromname = fromname.slice(0, fromname.indexOf(" "));
					}

					a("#arrowchat_popout_user_" + from + "_convo .arrowchat_popout_convo").append('<div class="arrowchat_chatboxmessage arrowchat_clearfix' + f + image_msg + '" id="arrowchat_message_' + id + '">' + formatTimestamp(new Date(sent * 1E3)) + '<div class="arrowchat_chatboxmessagefrom"><div class="arrowchat_disable_avatars_name">' + fromname + '</div><img alt="' + fromname + ' ' + tooltip + '" class="arrowchat_chatbox_avatar" src="' + avatar + '" /></div><div class="arrowchat_chatboxmessage_wrapper"><div class="arrowchat_chatboxmessagecontent" data-id="' + tooltip + '">' + message + "</div></div></div>");
					if (a("#arrowchat_message_" + last_id[from]).length && self != 1) {
						a("#arrowchat_message_" + last_id[from]).children('.arrowchat_chatboxmessagefrom').children('.arrowchat_chatbox_avatar').addClass('arrowchat_single_avatar_hide');
					}
					last_sent[from] = sent;
					last_name[from] = fromid;
					last_id[from] = id;
					
					if (c_disable_avatars == 1 || a("#arrowchat_setting_names_only :input").is(":checked")) {
						setAvatarVisibility(1);
					}
				}
				if (container <= container2 || !a("#arrowchat_popout_user_"+from).hasClass("arrowchat_popout_focused")) {
					a("#arrowchat_popout_text_" + from).scrollTop(5E4);
					a(".arrowchat_chatboxmessagecontent>div>img,.arrowchat_emoji_text>img").one("load", function() {
						setTimeout(function () {
							a("#arrowchat_popout_text_" + from).scrollTop(5E4);
						}, 500);
					}).each(function() {
					  if(this.complete) a(this).load();
					});
				} else {
					displayMessage("arrowchat_chatroom_message_flyout", lang[134], "notice");
				}
			} else {
				f = 0;
				if (!(a("#arrowchat_popout_user_" + from).length > 0)) {
					a.post(c_ac_path + "includes/json/send/send_settings.php", {
						unfocus_chat: from
					}, function () {});
					f = 1
				}
				addMessageToChatbox(from, message, self, old, id, 0, sent, multi_tab);
				j == "" && 0 && ya(from)
			}
		}
		
		function receiveTyping(id) {
			if (a("#arrowchat_popout_text_" + id).length) {
				var container = a("#arrowchat_popout_text_" + id)[0].scrollHeight - a("#arrowchat_popout_text_" + id).scrollTop() - 10;
				var container2 = a("#arrowchat_popout_text_" + id).outerHeight();
				a("#arrowchat_popout_user_"+id+" .arrowchat_closebox_bottom_status").addClass("arrowchat_typing");
				a("#arrowchat_popout_user_"+id+" .arrowchat_is_typing").show();
				a("#arrowchat_popout_text_" + id).append('<div class="arrowchat_chatboxmessage arrowchat_clearfix" id="arrowchat_typing_message_' + id + '"><div class="arrowchat_chatboxmessagefrom"><img alt="" class="arrowchat_chatbox_avatar" src="' + uc_avatar[id] + '" /></div><div class="arrowchat_chatboxmessage_wrapper"><div class="arrowchat_chatboxmessagecontent" data-id="Typing"><div class="arrowchat_is_typing arrowchat_is_typing_chat"><div class="arrowchat_typing_bubble"></div><div class="arrowchat_typing_bubble"></div><div class="arrowchat_typing_bubble"></div></div></div></div></div>');
				if (container <= container2) {
					a("#arrowchat_popout_text_" + id).scrollTop(5E4);
				}
				clearTimeout(typingTimeout);
				typingTimeout = setTimeout(function () {
					lsClick(id, 'untyping');
					receiveNotTyping(id)
				}, 30000);
			}
		}
		
		function receiveNotTyping(id) {
			if (a("#arrowchat_popout_text_" + id).length) {
				clearTimeout(typingTimeout);
				if (a("#arrowchat_typing_message_" + id).length) {
					a("#arrowchat_typing_message_" + id).remove();
				}
				a("#arrowchat_popout_user_"+id+" .arrowchat_closebox_bottom_status").removeClass("arrowchat_typing");
				a("#arrowchat_popout_user_"+id+" .arrowchat_is_typing").hide();
			}
		}
		
		function chatroomAlerts(count, chatroomid) {
			var htmlID = "cr-" + chatroomid;
			if (typeof($chatroom_tab[htmlID]) != "undefined") {
				if (chatroomid != Ccr || !$chatroom_tab[htmlID].hasClass("arrowchat_popout_focused")) {
					if (a(".arrowchat_popout_alert", $chatroom_tab[htmlID]).length > 0) {
						var count3 = parseInt(a(".arrowchat_popout_alert", $chatroom_tab[htmlID]).html()) + count;
						a(".arrowchat_popout_alert", $chatroom_tab[htmlID]).html(count3);
					} else {
						a("<div/>").addClass("arrowchat_popout_alert").html(count).prependTo(a(".arrowchat_popout_wrap", $chatroom_tab[htmlID]));
					}
				}
			}
		}
		
		function addChatroomMessage(id, name, message, userid, sent, global, mod, admin, chatroomid) {
			var data_array = [id, name, message, userid, sent, global, mod, admin, chatroomid];
			lsClick(JSON.stringify(data_array), 'chatroom_message');
			if (userid == u_id) {
				uc_avatar[u_id] = u_avatar;
			}
			message = stripslashes(message);
			message = replaceURLWithHTMLLinks(message);
			var sent_time = new Date(sent * 1E3);
			if (typeof(uc_avatar[userid]) == "undefined") {
				a.ajax({
					url: c_ac_path + "includes/json/receive/receive_user.php",
					data: {
						userid: userid
					},
					type: "post",
					cache: false,
					dataType: "json",
					success: function (data) {
						if (data) {
							uc_avatar[userid] = data.a;
							chatroomDiv(id, uc_avatar[userid], name, sent_time, message, global, mod, admin, userid, chatroomid);
						}
					}
				});
			} else {
				chatroomDiv(id, uc_avatar[userid], name, sent_time, message, global, mod, admin, userid, chatroomid);
			}
			count++;	
		}
		
		function chatroomDiv(id, image, name, time, message, global, mod, admin, userid, chatroomid) {
			var htmlID = "cr-" + chatroomid;
			var container = a("#arrowchat_popout_text_" + htmlID)[0].scrollHeight - a("#arrowchat_popout_text_" + htmlID).scrollTop() - 10;
			var container2 = a("#arrowchat_popout_text_" + htmlID).outerHeight();
			var title = "", l = "", important = "", image_msg = "";
			if (userid == u_id) {
				l = "arrowchat_self";
			}
			if (mod == 1) {
				title = lang[137];
				important = "arrowchat_chatroom_important";
			}
			if (admin == 1) {
				title = lang[136];
				important = "arrowchat_chatroom_important";
			}
			if (message.substr(0, 4) == "<div") {
				image_msg = " arrowchat_image_msg";
			}
			var regex = new RegExp('^(^|\\s)(@' + u_name + ')(\\s|$)', 'i');
			message = message.replace(regex, '$1<span class="arrowchat_at_user">$2</span>$3');
			if (a("#arrowchat_chatroom_message_" + id).length > 0) {
				a("#arrowchat_chatroom_message_" + id + " .arrowchat_chatboxmessagecontent").html(message);
				if (userid == u_id) {
					a("#arrowchat_chatroom_message_" + id).addClass(l);
				}
			} else {
				var tooltip = formatTimestamp(time, 1);
				if (global == 1) {
					a("<div/>").attr("id", "arrowchat_chatroom_message_" + id).addClass("arrowchat_chatroom_box_message").addClass("arrowchat_clearfix").html('<div class="arrowchat_chatroom_message_content arrowchat_global_chatroom_message">' + formatTimestamp(time) + message + "</div>").appendTo("#arrowchat_popout_text_" + htmlID);
					receiveChatroom(chatroomid);
				} else {
					a("<div/>").attr("id", "arrowchat_chatroom_message_" + id).addClass(important).addClass(image_msg).addClass(l).addClass("arrowchat_chatboxmessage").addClass("arrowchat_clearfix").addClass("arrowchat_popout_room_msg").html(formatTimestamp(time) + '<div class="arrowchat_chatboxmessagefrom"><img alt="' + name + title + ' ' + tooltip + '" class="arrowchat_chatbox_avatar arrowchat_no_names" src="' + image + '" /><div class="arrowchat_chatroom_message_name">' + name + title + ':</div></div><div class="arrowchat_chatboxmessage_wrapper"><div class="arrowchat_chatboxmessagecontent" data-id="' + tooltip + '">' + message + '<div class="arrowchat_chatroom_delete" data-id="' +  id + '"> </div></div></div>').appendTo("#arrowchat_popout_text_" + htmlID);
				}
				
				if (c_disable_avatars == 1 || a("#arrowchat_setting_names_only :input").is(":checked")) {
					setAvatarVisibility(1);
				}
				if (a("#arrowchat_chatroom_show_names :input").is(":checked")) {
					a(".arrowchat_chatroom_message_name").show();
					a(".arrowchat_chatbox_avatar").removeClass("arrowchat_no_names");
				}
				if (container <= container2) {
					a("#arrowchat_popout_text_" + htmlID).scrollTop(5E4);
					a(".arrowchat_image_msg img,.arrowchat_emoji_text>img").one("load", function() {
						setTimeout(function () {
							a("#arrowchat_popout_text_" + htmlID).scrollTop(5E4);
						}, 500);
					}).each(function() {
					  if(this.complete) a(this).load();
					});
				} else {
					displayMessage("arrowchat_chatroom_message_flyout", lang[134], "notice");
				}
				showChatroomTime();
				modDeleteControls(chatroomid);
			}
		}
		
		function pushSubscribe() {
			if (c_push_engine == 1) {
				push.subscribe({ "channel" : "u"+u_id, "callback" : function(data) { pushReceive(data); } });
			}
		}
		
		function pushReceive(data) {
			if ("typing" in data) {
				lsClick(data.typing.id, 'typing');
				receiveTyping(data.typing.id);
			}
			if ("nottyping" in data) {
				lsClick(data.nottyping.id, 'untyping');
				receiveNotTyping(data.nottyping.id);
			}
			if ("messages" in data) {
				receiveMessage(data.messages.id, data.messages.from, data.messages.message, data.messages.sent, data.messages.self, data.messages.old);
				data.messages.self != 1 && u_sounds == 1 && !a(".arrowchat_popout_convo_input").is(":focus") && playNewMessageSound();
				showTimeAndTooltip();
				K = 1;
				D = E;
			}
			if ("chatroommessage" in data) {
				if (typeof(blockList[data.chatroommessage.userid]) == "undefined")
				{
					addChatroomMessage(data.chatroommessage.id, data.chatroommessage.name, data.chatroommessage.message, data.chatroommessage.userid, data.chatroommessage.sent, data.chatroommessage.global, data.chatroommessage.mod, data.chatroommessage.admin, data.chatroommessage.chatroomid);
					if (data.chatroommessage.name != 'Delete' && data.chatroommessage.global != 1) {
						chatroomAlerts(1, data.chatroommessage.chatroomid);
						var data_array = [1, data.chatroommessage.chatroomid];
						lsClick(JSON.stringify(data_array), 'chatroom_alerts');
						if (data.chatroommessage.userid != u_id) {
							u_sounds == 1 && !a(".arrowchat_popout_convo_input").is(":focus") && playNewMessageSound();
						}
					}
				}
			}
			if ("chatroomban" in data) {
				var htmlID = "cr-" + data.chatroomban.id;
				a(".arrowchat_closebox_bottom", $chatroom_tab[htmlID]).click();
				displayMessage("arrowchat_chatroom_message_flyout", data.chatroomban.error2, "error");
			}
		}
		
		function renderHTMLString(string) {
			var render = a("<div/>").attr("id", "arrowchat_render").html(string).appendTo('body');
			var new_render = a("#arrowchat_render").html();
			render.remove();
			return new_render;
		}
		
		function loadSettingsButton() {
			if (u_sounds == 1) { 
				a("#arrowchat_setting_sound :input").prop("checked", true)
			} else {
				a("#arrowchat_setting_sound").addClass("arrowchat_menu_unchecked");
				a("#arrowchat_setting_sound :input").prop("checked", false)
			}
			if (u_no_avatars == 1) {
				a("#arrowchat_setting_names_only :input").prop("checked", true)
			} else {
				a("#arrowchat_setting_names_only").addClass("arrowchat_menu_unchecked");
				a("#arrowchat_setting_names_only :input").prop("checked", false);
			}
			if (u_chatroom_block_chats == 1) { 
				a("#arrowchat_chatroom_block :input").prop("checked", true)
			} else {
				a("#arrowchat_chatroom_block").addClass("arrowchat_menu_unchecked");
				a("#arrowchat_chatroom_block :input").prop("checked", false)
			}
			if (u_chatroom_show_names == 1) { 
				a("#arrowchat_chatroom_show_names :input").prop("checked", true)
			} else {
				a("#arrowchat_chatroom_show_names").addClass("arrowchat_menu_unchecked");
				a("#arrowchat_chatroom_show_names :input").prop("checked", false)
			}
			u_is_guest == 1 && c_guest_name_change == 1 && u_guest_name == "" && a("#arrowchat_popout_change_name_wrapper").show();
			a(".arrowchat_panel_item").click(function() {
				a("#arrowchat_options_flyout").toggleClass("arrowchat_options_flyout_display");
				a("#arrowchat_options_flyout").children(".arrowchat_inner_menu").show();
				a(".arrowchat_block_menu").hide();
			});
			a("#arrowchat_chatroom_block").click(function () {	
				a(this).toggleClass("arrowchat_menu_unchecked");
				if (a("#arrowchat_chatroom_block :input").is(":checked")) {
					a("#arrowchat_chatroom_block :input").prop("checked", false);
					_chatroomblock = -1;
				} else {
					a("#arrowchat_chatroom_block :input").prop("checked", true);
					_chatroomblock = 1;
				}
				a.post(c_ac_path + "includes/json/send/send_settings.php", {
					chatroom_block_chats: _chatroomblock
				}, function () {
				})
			});
			a("#arrowchat_chatroom_show_names").click(function () {
				a(this).toggleClass("arrowchat_menu_unchecked");
				if (a("#arrowchat_chatroom_show_names :input").is(":checked")) {
					a("#arrowchat_chatroom_show_names :input").prop("checked", false);
					_chatroomshownames = -1;
					u_chatroom_show_names = 0;
					a(".arrowchat_chatroom_message_name").hide();
					a(".arrowchat_chatbox_avatar").addClass("arrowchat_no_names");
				} else {
					a("#arrowchat_chatroom_show_names :input").prop("checked", true);
					_chatroomshownames = 1;
					u_chatroom_show_names = 1;
					a(".arrowchat_chatroom_message_name").show();
					a(".arrowchat_chatbox_avatar").removeClass("arrowchat_no_names");
				}
				a.post(c_ac_path + "includes/json/send/send_settings.php", {
					chatroom_show_names: _chatroomshownames
				}, function () {
				})
			});
			a("#arrowchat_setting_sound").click(function () {
				a(this).toggleClass("arrowchat_menu_unchecked");
				if (a("#arrowchat_setting_sound :input").is(":checked")) {
					a("#arrowchat_setting_sound :input").prop("checked", false);
					_soundcheck = -1;
					u_sounds = 0;
				} else {
					a("#arrowchat_setting_sound :input").prop("checked", true);
					_soundcheck = 1;
					u_sounds = 1;
				}
				a.post(c_ac_path + "includes/json/send/send_settings.php", {
					sound: _soundcheck
				}, function () {
				});
			});
			a("#arrowchat_setting_names_only").click(function () {
				a(this).toggleClass("arrowchat_menu_unchecked");
				if (a("#arrowchat_setting_names_only :input").is(":checked")) {
					a("#arrowchat_setting_names_only :input").prop("checked", false);
					setAvatarVisibility(0);
					_namecheck = -1
				} else {
					a("#arrowchat_setting_names_only :input").prop("checked", true);
					setAvatarVisibility(1);
					_namecheck = 1
				}
				a.post(c_ac_path + "includes/json/send/send_settings.php", {
					name: _namecheck
				}, function () {
				});
			});
			a("#arrowchat_popout_change_name").click(function () {
				a(this).parent().parent().parent(".arrowchat_inner_menu").hide();
				a(".arrowchat_change_name_menu").show();
				a(".arrowchat_change_name_menu input").focus();
			});
			a("#arrowchat_change_name_button").click(function () {
				a.post(c_ac_path + "includes/json/send/send_settings.php", {
					chat_name: a("#arrowchat_change_name_input").val()
				}, function (data) {
					if (data != "1") {
						displayMessage("arrowchat_chatroom_message_flyout", data, "error");
					} else {
						a(".arrowchat_panel_item").click();
						a("#arrowchat_popout_change_name_wrapper").hide();
						u_name = a("#arrowchat_change_name_input").val();
					}
				});
			});
			a("#arrowchat_setting_block_list").click(function () {
				a(this).parent().parent(".arrowchat_inner_menu").hide();
				a(".arrowchat_block_menu").show();
				a.ajax({
					url: c_ac_path + "includes/json/receive/receive_block_list.php",
					type: "get",
					cache: false,
					dataType: "json",
					success: function (b) {
						if (b && b != null) {
							a(".arrowchat_block_menu select").html("");
							a("<option/>").attr("value", "0").html(lang[118]).appendTo(a(".arrowchat_block_menu select"));
							a.each(b, function (e, l) {
								a.each(l, function (f, h) {
									a("<option/>").attr("value", h.id).html(h.username).appendTo(a(".arrowchat_block_menu select"));
								});
							});
						}
					}
				});
			});
			a("#arrowchat_unblock_button").click(function () {
				a(".arrowchat_panel_item").click();
				var unblock_chat_user = a(".arrowchat_block_menu select").val();
				if (unblock_chat_user != "0") {
					a.post(c_ac_path + "includes/json/send/send_settings.php", {
						unblock_chat: unblock_chat_user
					}, function () {
						if (typeof(blockList[unblock_chat_user]) != "undefined") {
							blockList.splice(unblock_chat_user, 1);
						}
						loadBuddyList();
					});
				}
			});
			addHover(a(".arrowchat_menu_item"), "arrowchat_more_hover");
			
			if (a.cookie('arrowchat_hide_lists') == 1 || ac_autohide_panel == 1) {
				a(".arrowchat_popout_hide_lists").show();
				a("#arrowchat_popout_wrapper").addClass("arrowchat_lists_hidden");
			}
			a("#arrowchat_hide_lists_button").click(function() {
				a.cookie('arrowchat_hide_lists', 1, {expires: 365, path: '/'});
				a(".arrowchat_panel_item").click();
				a(".arrowchat_popout_hide_lists").show();
				a("#arrowchat_popout_wrapper").addClass("arrowchat_lists_hidden");
			});
			a(".arrowchat_popout_hide_lists").click(function () {
				a.cookie('arrowchat_hide_lists', 0, {expires: 365, path: '/'});
				a(".arrowchat_popout_hide_lists").hide();
				a("#arrowchat_popout_wrapper").removeClass("arrowchat_lists_hidden");
			});

		}
		
		function loadSelectionButtons() {
			a("#arrowchat_popout_selection_room").click(function() {
				a("#arrowchat_popout_selection_chat").removeClass("arrowchat_popout_selection_focused");
				a(this).addClass("arrowchat_popout_selection_focused");
				loadChatroomList();
			});
			a("#arrowchat_popout_selection_chat").click(function() {
				chatroomreceived = 0;
				a("#arrowchat_popout_selection_room").removeClass("arrowchat_popout_selection_focused");
				a(this).addClass("arrowchat_popout_selection_focused");
				a("#arrowchat_popout_left_lists").html("");
				a('<div class="arrowchat_loading_icon"></div>').appendTo("#arrowchat_popout_friends");
				loadBuddyList();
			});
		}
		
		function addHover($elements, classes) {
			$elements.each( function (i, element) {
				a(element).hover(
					function () {
						a(this).addClass(classes);
					}, function () {
						a(this).removeClass(classes);
					}
				);
			});
		}
		
		function setAvatarVisibility(b) {
			if (b == 1) { 
				a(".arrowchat_userlist .arrowchat_userlist_avatar").addClass("arrowchat_hide_avatars");
				a(".arrowchat_chatbox_avatar").hide();
				a(".arrowchat_chatroom_avatar").addClass("arrowchat_hide_avatars");
				a(".arrowchat_chatroom_flyout_avatar").addClass("arrowchat_hide_avatars");
				a(".arrowchat_chatroom_message_avatar").addClass("arrowchat_hide_avatars");
				a(".arrowchat_chatroom_message_name").show();
				a(".arrowchat_chatbox_avatar").removeClass("arrowchat_no_names");
				a(".arrowchat_disable_avatars_name").show();
				a(".arrowchat_chatboxmessage_wrapper").addClass("arrowchat_chatboxmessage_wrapper2");
				a(".arrowchat_chatboxmessagecontent").addClass("arrowchat_chatboxmessagecontent2");
				a(".arrowchat_userlist").addClass("arrowchat_userslist_no_avatars");
			} else {
				a(".arrowchat_userlist .arrowchat_userlist_avatar").removeClass("arrowchat_hide_avatars");
				a(".arrowchat_chatbox_avatar").show();
				a(".arrowchat_chatroom_avatar").removeClass("arrowchat_hide_avatars");
				a(".arrowchat_chatroom_flyout_avatar").removeClass("arrowchat_hide_avatars");
				a(".arrowchat_chatroom_message_avatar").removeClass("arrowchat_hide_avatars");
				a(".arrowchat_chatroom_message_name").hide();
				a(".arrowchat_chatbox_avatar").addClass("arrowchat_no_names");
				a(".arrowchat_disable_avatars_name").hide();
				a(".arrowchat_chatboxmessage_wrapper").removeClass("arrowchat_chatboxmessage_wrapper2");
				a(".arrowchat_chatboxmessagecontent").removeClass("arrowchat_chatboxmessagecontent2");
				a(".arrowchat_userlist").removeClass("arrowchat_userslist_no_avatars");
			}
		}
		
		function buildMaintenance() {
			var language = lang[58];
			var extraHTML = "";
			if (c_chat_maintenance != 0 || c_db_connection == 1 || c_disable_arrowchat == 1)
				if (c_db_connection == 1)
					language = "We could not connect to the database. Please try again later.";
				else
					language = lang[27];
			else {
				if (c_login_url != "")
					extraHTML = '<div class="arrowchat_login_button_wrapper"><a class="arrowchat_login_button" href="' + c_login_url + '">' + lang[239] + '</a></div>';
			}
			a("#arrowchat_popout_wrapper").html('<div style="text-align:center;padding-top:10px;font-size:16px">' + language + '</div>' + extraHTML);
		}
		
		function getChatroomTabs(room, focus) {
			a.ajax({					
				url: c_ac_path + "includes/json/receive/receive_chatroom_list.php",
				cache: false,
				data: {
					chatroom_window: '-1',
					chatroom_stay: '-1'
				},
				type: "post",
				dataType: "json",
				success: function (b) {
					b && a.each(b, function (i, e) {
						if (i == "chatrooms") {
							a.each(e, function (l, f) {
								var id2 = "cr-" + f.id;
								crt[id2] = f.t;
								crt2[id2] = f.n;
							})
						}
					});
					changePushChannel(room, 1);
					var room2 = "cr-" + room;
					if (ac_load_chatroom_id > 0) {
						if (crt[room2] == 2) {
							a("#arrowchat_chatroom_password_id").val(room);
							a("#arrowchat_chatroom_password_flyout").show("slide", { direction: "up"}, 250, function() {
								a("#arrowchat_chatroom_password_input").focus();
							});
							a("#arrowchat_popout_wrapper").addClass("arrowchat_chatroom_opacity");
						} else {
							addChatroomTab(room, crt2[room2], focus);
							if (a(window).width() > 520)
								a("#arrowchat_display_list_" + room2).click();
						}
					} else {
						receiveChatroom(room);
						addChatroomTab(room, crt2[room2], focus);
					}
				}
			});
		}
		
		function lsClick(id, action, acvar) {
			if (lsreceive == 0) {
				var milliseconds = new Date().getTime();
				if (action == "private_message" || action == "chatroom_message" || action == "chatroom_alerts" || action == "send_chatroom_message") {
					if (!msieversion()) {
						localStorage.setItem(action, id + "/##-" + milliseconds);
					}
				} else {
					if (!msieversion()) {
						if (typeof(acvar) == "undefined") {
							localStorage.setItem(action, id + "/" + milliseconds);
						} else
							localStorage.setItem(action, id + "," + acvar + "/" + milliseconds);
					}
				}
			}
		}
		
		function msieversion() {
			var ua = window.navigator.userAgent;
			var msie = ua.indexOf("MSIE ");
			if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./))
				return true;

		   return false;
		}
		
		function localStorageFired(e) {
			lsreceive = 1;
			if (e.key == 'window_focus') {
				clearTimeout(dtit3);
				document.title = dtit;
			}
			if (c_push_engine != 1) {
				if (e.key == 'untyping') {
					var res = e.newValue.split("/");
					receiveNotTyping(res[0]);
				}
				if (e.key == 'typing') {
					var res = e.newValue.split("/");
					receiveTyping(res[0]);
				}
				if (e.key == 'private_message') {
					var res = e.newValue.split("/##-");
					var data = JSON.parse(res[0]);
					receiveMessage(data[0], data[1], data[2], data[3], data[4], 1, 1);
				}
				if (e.key == 'chatroom_message') {
					var res = e.newValue.split("/##-");
					var data = JSON.parse(res[0]);
					var tester = data[8];
					if (tester.substring(0, 3) == "cr-")
						tester = tester.substr(3);
					addChatroomMessage(data[0], data[1], data[2], data[3], data[4], data[5], data[6], data[7], tester);
				}
				if (e.key == 'chatroom_alerts') {
					var res = e.newValue.split("/##-");
					var data = JSON.parse(res[0]);
					var tester = data[1];
					if (tester.substring(0, 3) == "cr-")
						tester = tester.substr(3);
					chatroomAlerts(data[0], tester);
				}
				if (e.key == 'send_chatroom_message') {
					var res = e.newValue.split("/##-");
					var data = JSON.parse(res[0]);
					var tester = data[3];
					if (tester.substring(0, 3) != "cr-")
						tester = "cr-" + tester;
					addMessageToChatroom(data[0], data[1], data[2], tester, 1);
					a("#arrowchat_popout_text_" + tester).scrollTop(5E4);
					a(".arrowchat_chatboxmessagecontent>div>img,.arrowchat_emoji_text>img").one("load", function() {
					  a("#arrowchat_popout_text_" + tester).scrollTop(5E4);
					}).each(function() {
					  if(this.complete) a(this).load();
					});
				}
			}
			lsreceive = 0;
		}
		
        var bounce = 0,
            bounce2 = 0,
			typingTimeout,
			lsreceive = 0,
            count = 0,
            V = {},
            dtit = document.title,
            dtit2 = 1,
            dtit3, window_focus = true,
            xa = {},
			chatroom_list = {},
            j = "",
			chatroom_popout = "",
            crou = "",
            $ = 0,
            w = 0,
            bli = 1,
			isAway = 0,
            chatroomreceived = 0,
            msgcount = 0,
            W = false,
            Y, Z, E = 3E3,
            Crref2, Ccr = -1,
            D = E,
            K = 1,
            ma = 0,
            R = 0,
            m = "",
            Ka = 0,
            crt = {},
            crt2 = {},
            y = {},
            G = {},
            aa = {},
            ca = {},
			history_ids = {},
			room_info = [],
			room_desc = [],
			room_limit_msg = [],
			room_limit_sec = [],
			last_id = {},
			last_sent = {},
			last_name = {},
            Aa = new Date,
            Na = Aa.getDate(),
            ab = Math.floor(Aa.getTime() / 1E3),
            acsi = 1,
            Q = 0,
			message_timeout,
            fa = -1,
            acp = "Powered By <a href='http://www.arrowchat.com/' target='_blank'>ArrowChat</a>",
            pa = 0,
			premade_smiley = [],
            B, N;
		premade_smiley[0] = [':)','1f600.png'];
		premade_smiley[1] = [':-)','1f600.png'];
		premade_smiley[2] = ['=)','1f600.png'];
		premade_smiley[3] = [':p','1f61b.png'];
		premade_smiley[4] = [':o','1f62e.png'];
		premade_smiley[5] = [':|','1f610.png'];
		premade_smiley[6] = [':(','1f614.png'];
		premade_smiley[7] = ['=(','1f614.png'];
		premade_smiley[8] = [':D','1f603.png'];
		premade_smiley[9] = ['=D','1f603.png'];
		premade_smiley[10] = [':/','1f615.png'];
		premade_smiley[11] = ['=/','1f615.png'];
		premade_smiley[12] = [';)','1f609.png'];
		premade_smiley[13] = [':\'(','1f62d.png'];
		premade_smiley[14] = ['<3','2764.png'];
		premade_smiley[15] = ['>:(','1f620.png'];
        var _ts = "",
            _ts2;
        for (d = 0; d < Themes.length; d++) {
            if (Themes[d][2] == u_theme) {
                _ts2 = "selected";
            } else {
                _ts2 = "";
            }
            _ts = _ts + "<option value=\"" + Themes[d][0] + "\" " + _ts2 + ">" + Themes[d][1] + "</option>";
        }
        arguments.callee.videoWith = function (b) {
            if (c_video_select == 4) {
				var win = window.open('https://opentokrtc.com/room/' + b + '?userName=' + u_name, 'audiovideochat', "status=no,toolbar=no,menubar=no,directories=no,resizable=no,location=no,scrollbars=no,width="+c_video_width+",height="+c_video_height+"");
			} else {
				var win = window.open(c_ac_path + 'public/video/?rid=' + b, 'audiovideochat', "status=no,toolbar=no,menubar=no,directories=no,resizable=no,location=no,scrollbars=no,width="+c_video_width+",height="+c_video_height+"");
			}
			win.focus();
        };
		function runarrowchat() {
			a.ajax({					
				url: c_ac_path + "includes/json/receive/receive_init.php",
				cache: false,
				type: "get",
				dataType: "json",
				success: function (b) {}
			});
			window.addEventListener('storage', localStorageFired, false);
			if (c_chat_maintenance != 0 || c_db_connection == 1 || u_id == "" || c_disable_arrowchat == 1) {				
				buildMaintenance();
			} else {
				a("#arrowchat_options_flyout .arrowchat_inner_menu").append('<li class="arrowchat_menu_separator"></li><li id="arrowchat_popout_powered_by">' + acp + '</li>');
				if (c_push_engine == 1) {
					push = PUBNUB.init({
						publish_key   : c_push_publish,
						subscribe_key : c_push_subscribe
					});
				}
				if (c_push_engine == 1) {
					pushSubscribe();
				}
				receiveCore();
				a("#arrowchat_popout_left_lists").html("");
				a('<div class="arrowchat_loading_icon"></div>').appendTo("#arrowchat_popout_friends");
				loadBuddyList();
				loadChatroomInit();
				loadSelectionButtons();
				loadSettingsButton();
				if (c_chatrooms != 1) {
					a("#arrowchat_popout_selection_wrapper").remove();
					a("#arrowchat_popout_left_lists").css("top", "51px");
				} else {
					for (var d = 0; d < unfocus_chatroom.length; d++) {
						if (typeof(unfocus_chatroom[d] != "undefined") && ac_load_chatroom_id != unfocus_chatroom[d]) {
							changePushChannel(unfocus_chatroom[d], 1);
							addChatroomTab(unfocus_chatroom[d], chatroom_name[unfocus_chatroom[d]], 0);
						}
					}

					if (u_chatroom_open > 0 && ac_load_chatroom_id != u_chatroom_open) {
						getChatroomTabs(u_chatroom_open, 0);
					} else if (u_chatroom_stay > 0 && ac_load_chatroom_id != u_chatroom_stay) {
						getChatroomTabs(u_chatroom_stay, 0);
					} else if (c_chatroom_auto_join > 0 && ac_load_chatroom_id == 0) {
						getChatroomTabs(c_chatroom_auto_join, 0);
					}
					
					if (ac_load_chatroom_id > 0) {
						getChatroomTabs(ac_load_chatroom_id, 1);
					}
				}
				M();
				a(window).bind("resize", M);
				a("#arrowchat_popout_left_lists").perfectScrollbar();
				for (var d = 0; d < unfocus_chat.length; d++) {
					I(unfocus_chat[d], uc_name[unfocus_chat[d]], uc_status[unfocus_chat[d]], uc_avatar[unfocus_chat[d]], uc_link[unfocus_chat[d]], "1");
				}
				if (u_chat_open != 0) { 
					if (ac_load_chatroom_id > 0) {
						I(u_chat_open, uc_name[u_chat_open], uc_status[u_chat_open], uc_avatar[u_chat_open], uc_link[u_chat_open], "1");
					} else {
						I(u_chat_open, uc_name[u_chat_open], uc_status[u_chat_open], uc_avatar[u_chat_open], uc_link[u_chat_open], "0");
					}
				}
				ion.sound({
					sounds: [
						{
							name: "new_message"
						}
					],
					volume: 1.0,
					path: c_ac_path + "themes/" + u_theme + "/sounds/",
					preload: true
				});
				a('#arrowchat_popout_powered_by').each(function(){this.style.setProperty('display','block','important');});
				if (acp.search(/arrowchat/i) == -1 || (!a('#arrowchat_popout_powered_by')[0]) || a('#arrowchat_popout_powered_by').html() == "" || a('#arrowchat_popout_powered_by').not(':contains("ArrowChat")').html()) {
					console.log("bfd");
					a('body').each(function(){this.style.setProperty('display','none','important');});
					return false;
				}
			}
		}
        a.ajaxSetup({
            scriptCharset: "utf-8",
            cache: false
        });
        arguments.callee.runarrowchat = function () {
            runarrowchat()
        };
    }
})(jqac);
(jqac);
jqac(document).ready(function () {
    jqac.arrowchat();
    jqac.arrowchat.runarrowchat()
});