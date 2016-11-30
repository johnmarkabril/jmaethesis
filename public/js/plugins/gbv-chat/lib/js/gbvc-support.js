/*! Gabbyville custom chat with co-browsing
 *! module gbvc-support.js
 * ================
 *
 * @Author  Edd Gracilla
 * @Support <ed.gracilla@gmail.com>
 * @Email   <ed.gracilla@gmail.com>
 * @version 0.0.1
 * @license 
 */

(function ($) {
	'user strict';

	if (typeof jQuery === "undefined") {
	  	throw new Error("Gabbyville Chat requires jQuery");
	}

	var _s, _o, _html, _selector, 
		_hotRm, _chatRooms = {};

	var hasPmRmRequest = false; // bug fix

	// -- cobrowsing globals
	var oDOM = null;
	var sendScroll = true;
	var sendResize = true;
	var mirrorAdmin = null;
	var mirrorClient = null;
	var changesFromAdmin = false;
	
	$.gbvc = {};
	$.gbvc.options = {
		icons: {
			toggleOn: 'fa-toggle-on',
			toggleOff: 'fa-toggle-off',
		},
		selectors: {
			boxMain: '.box-main',
			boxPane: '.box-side-pane',
			boxPaneToggler: '.box-pane-toggler',
			boxGuestsToggler: '.box-guests-toggler',
			boxContactsToggler: '.box-contacts-toggler',
			boxAddUserBtn: '.box-add-user-btn',
			boxCoBrowseBtn: '.box-co-browse-btn',

			chatTitle: '.chat-title',
			chatMsgTxt: '.chat-msg-txt',
			chatMsgSend: '.chat-msg-send',
			chatContacts: '.direct-chat-contacts',
			chatMessages: '.direct-chat-messages',
			chatBubble: '.direct-chat-text',
			guestsDiv: '.gbvc-guests',
			contactsDiv: '.gbvc-contacts',

			guestList: '.gbvc-guests ul',
			contactList: '.gbvc-contacts ul',
			guestListItem: '.gbvc-guests ul li',
			contactListItem: '.gbvc-contacts ul li',
			contactListMsg: '.contacts-list-msg',
			contactListDate: '.contacts-list-date',

			guestCount: '.guest-count',
			contactCount: '.contact-count',

			adminPointer: '#cobrowse-admin-pointer',
		},

		html: {
			previewUrl: 'client-preview.html',
			adminPointer: '<div id="cobrowse-admin-pointer"></div>',
			msgEntry: '<div class="direct-chat-msg %s"><div class="direct-chat-info clearfix"><span class="direct-chat-name pull-right">%s</span><span class="direct-chat-timestamp pull-left">%s</span></div><img class="direct-chat-img" src="https://www.gravatar.com/avatar/%s?d=identicon" alt="message user image"><div class="direct-chat-text">%s</div></div>',
			contactListItem: '<li id="%s" uuid="%s" name="%s"><img class="contacts-list-img" src="https://www.gravatar.com/avatar/%s?d=identicon"><div class="contacts-list-info"><span class="contacts-list-name">%s<small class="contacts-list-date pull-right">%s</small></span><span class="contacts-list-msg">%s</span></div></li>',
		},

		loginUrl: 'http://localhost:8001/gabbyville/login/',
	};

	$.gbvc.chat = {
		user: null,
		cobo: {
			socket: null,
			uuid: null,
		},

		activate: function() {

			var self = this;
			_o = $.gbvc.options;
			_s = io.connect("127.0.0.1:3001");

			_html = _o.html;
			_selector = _o.selectors;

			self.localListen();

			$(_selector.chatContacts).slimScroll({height: '463px'});
			$(_selector.chatMessages).slimScroll({height: '395px', start: 'bottom'});

			$.ajax({
				type: 'GET',
				dataType: 'jsonp',

				jsonp: false, 
				jsonpCallback: 'callback',
				url: _o.loginUrl + 'chat',
				success: function(jn) {
					
					if(!jn) {
						window.location.href = _o.loginUrl;
						return true;
					}

					_s.emit('userConnect', jn);
					self.serverListen();
				}
			});
		},

		// ---------------------------------
		// ----- LOCAL ---------------------
		// ---------------------------------

		localListen: function() {
			var self = this;


			// ---- guests ----

			$(document).on('click', _selector.guestListItem, function (e) {
				var contactId = $(this).attr('id'),
					uuid = $(this).attr('uuid'),
					name = $(this).attr('name');

				self.disableSend(true);
				if(uuid == '' || !_chatRooms[uuid]) {
					console.log('this shouldn\'t be dispalyed!');
				} else {
					dd('joinToGuestRoom');
					_s.emit('joinToGuestRoom', uuid);
					self.setChatRoomActive(uuid);
				}

				$(self.toSelectorID(contactId))
					.removeClass('has-new-msg');

				$(_selector.chatTitle).text(name);
				$(_selector.boxAddUserBtn).show();
				$(_selector.boxCoBrowseBtn).show();
			});

			$(document).on('click', _selector.boxCoBrowseBtn, function (e) {

				if(self.cobo.uuid !== null) {
					alert('You can only cobrowse/remote one at a time.');
					return true;
				}

				$.gbvc.chat.cobo.socket = _s;
				$.gbvc.chat.cobo.uuid = _chatRooms[_hotRm].uuid;
				self.newWindowCentered(_html.previewUrl, 'xx', 700, 600);
			});

			// ---- users ----

			$(document).on('click', _selector.boxGuestsToggler, function (e) {
				$(_selector.guestsDiv).addClass('gbvc-guests-open');
				$(_selector.contactsDiv).addClass('gbvc-contacts-close');

				if(!$(_selector.boxMain).hasClass('box-main-min')) {
					$(_selector.boxPaneToggler).click()
				}
			});

			$(document).on('click', _selector.boxContactsToggler, function (e) {
       			$(_selector.guestsDiv).removeClass('gbvc-guests-open');
				$(_selector.contactsDiv).removeClass('gbvc-contacts-close');

				if(!$(_selector.boxMain).hasClass('box-main-min')) {
					$(_selector.boxPaneToggler).click()
				}
			});

			$(document).on('click', _selector.boxPaneToggler, function (e) {
				$(_selector.boxPane).toggleClass('box-side-pane-open');
       			$(_selector.boxMain).toggleClass('box-main-min');

       			var icon = _o.icons;

       			if($(_selector.boxMain).hasClass('box-main-min')) {
	       			$(this).children(":first")	
	       				.removeClass(icon.toggleOn)
	       				.addClass(icon.toggleOff);
	       		} else {
	       			$(this).children(":first")
	       				.removeClass(icon.toggleOff)
	       				.addClass(icon.toggleOn);
	       		}
			});

			$(document).on('click', _selector.contactListItem, function (e) {
				var contactId = $(this).attr('id'),
					uuid = $(this).attr('uuid'),
					name = $(this).attr('name');

				self.disableSend(true);
				if(uuid == '' || !_chatRooms[uuid]) {
					_s.emit('initPrivateMsgRoom', contactId, uuid);
					hasPmRmRequest = true;
				} else {
					self.setChatRoomActive(uuid);
				}

				$(self.toSelectorID(contactId))
					.removeClass('has-new-msg');
				
				$(_selector.chatTitle).text(name);
				$(_selector.boxAddUserBtn).hide();
				$(_selector.boxCoBrowseBtn).hide();

			});

			$(document).on('click', _selector.chatMsgSend, function (e) {
				var txt = $(_selector.chatMsgTxt).val();

				if(txt == '') return;

				self.sendChatMsg(txt, 'right');
				$(_selector.chatMsgTxt).val('').focus();
			});

			$(document).on('keypress', _selector.chatMsgTxt, function (e) {
			    if(e.which == 13 && !e.shiftKey) {
			    	$(_selector.chatMsgSend).click();
			    	return false;
			    }
			});
		},
		
		// ----------------------------------
		// ----- SERVER ---------------------
		// ----------------------------------

		serverListen: function() {
			var self = this;

			// -- guests ---

			_s.on('feedFreeGuests', function(guests) {

				var listItem, msgStr;
				$.each(guests, function(){

					msgStr = this.lastMsg.msg;
					
					if(msgStr.length > 25) 
						msgStr = msgStr.substring(0, 25) +'...';

					listItem = sprintf(_html.contactListItem,
						this.hash, this.uuid, this.name, this.hash, 
						this.name, self.getDateTimeSince(this.lastMsg.time),
						msgStr
					);

					$(_selector.guestList).append(listItem);
				});

				$(_selector.guestCount).text(guests.length);
			});

			_s.on('feedToUserNewGuestQuery', function(guest, rm) {
				var listItem, count = 0;

				listItem = sprintf(_html.contactListItem,
					guest.hash, guest.uuid, guest.name, guest.hash, guest.name, 
					self.getDateTimeSince(guest.lastMsg.time), guest.lastMsg.msg
				);

				$(_selector.guestList).append(listItem);
				$('#'+guest.hash).addClass('has-new-msg');

				count = $(_selector.guestCount).text();
				count = parseInt(count)+1;
				$(_selector.guestCount).text(count);

				_chatRooms[rm.uuid] = {
					id: rm.id,
					uuid: rm.uuid,
				};

			});

			_s.on('newGuestMsg', function(msg) {
				var printDir, msgStr;
				if(_hotRm == msg.uuid) {
					printDir = (msg.hash == self.user.hash ? 'right': '');

					msg.time = self.getDate(msg.dt_created);
					self.printMsg(msg, printDir );
				
				} else {
					msgStr = msg.msg;
					
					if(msgStr.length > 25) 
						msgStr = msgStr.substring(0, 25) +'...';

					$('#'+msg.hash)
						.addClass('has-new-msg')
						.find(_selector.contactListMsg)
							.text(msgStr);

					$('#'+msg.hash)
						.find(_selector.contactListDate)
						.text(self.getDateTimeSince(msg.time));
				}
			});

			// -- users ---

			
			_s.on('feedOnlineUsers', function(users) {
				var listItem;
				$.each(users, function(){
					listItem = sprintf(_html.contactListItem,
						this.hash, '', this.name, this.hash, 
						this.name, '', this.roleLabel
					);

					$(_selector.contactList).append(listItem);
				});

				$(_selector.contactCount).text(users.length);
			});

			_s.on('feedUserInfo', function(user, chatRooms) {
				$.gbvc.chat.user = user;
				

				$.each(user.chats, function(userHash, info) {
					$('#'+userHash).attr('uuid', info.uuid);

					if(info.hasNewMsg) {
						var msg = info.lastMsg;
						var li = $('[uuid="'+ info.uuid +'"]');

						if(msg.length > 25)
							msg = msg.substring(0, 25) +'...';

						li.addClass('has-new-msg')
							.find(_selector.contactListMsg)
								.text(msg);

						li.find(_selector.contactListDate)
							.text(self.getDateTimeSince(info.lastMsgDate));
					}
				});

				$.each(chatRooms, function() {
					_chatRooms[this.uuid] = this;
				});
			});

			_s.on('tellNewUserOnline', function(user) {
				if($('#'+user.hash).length > 0 || self.user.hash == user.hash)
					return;

				var listItem, count; 

				listItem = sprintf(_html.contactListItem,
					user.hash, '', user.name, user.hash, 
					user.name, '', user.roleLabel
				);

				$(_selector.contactList).append(listItem);

				count = $(_selector.contactCount).text();
				count = parseInt(count)+1;
				$(_selector.contactCount).text(count);
			});

			_s.on('newPrivateMsgRoomDetail', function(rm) {
				_chatRooms[rm.uuid] = {
					id: rm.id,
					uuid: rm.uuid,
				};

				if($('#'+ rm.hashTo).length > 0) {
					$('#'+ rm.hashTo).attr('uuid', rm.uuid);
					if(hasPmRmRequest) {
						hasPmRmRequest = false;
						self.setChatRoomActive(rm.uuid);
					}
				}

				if($('#'+ rm.hashFrom).length > 0) {
					$('#'+ rm.hashFrom).attr('uuid', rm.uuid);
				}
			});

			_s.on('newUserMsg', function(msg) {
				var printDir, msgStr;
				if(_hotRm == msg.uuid) {
					printDir = (msg.hash == self.user.hash ? 'right': '');

					msg.time = self.getDate(msg.dt_created);
					self.printMsg(msg, printDir );
				
				} else {
					msgStr = msg.msg;
					
					if(msgStr.length > 25) 
						msgStr = msgStr.substring(0, 25) +'...';

					$('#'+msg.hash)
						.addClass('has-new-msg')
						.find(_selector.contactListMsg)
							.text(msgStr);

					$('#'+msg.hash)
						.find(_selector.contactListDate)
						.text(self.getDateTimeSince(msg.time));
				}
			});

			_s.on('feedRoomMessages', function(uuid, msgs) {
				if(_hotRm == uuid) {
					var printDir = '';
					$.each(msgs, function(){
						printDir = (this.hash == self.user.hash ? 'right' : '');
						this.time = self.getDate(this.time);
						self.printMsg(this, printDir);
					});
				}
			});

			_s.on('userDisconnect', function(hash) {
				var count = 0;
				$(self.toSelectorID(hash)).remove();

				count = $(_selector.contactCount).text();
				if(count > 0)
					count = parseInt(count)-1;

				$(_selector.contactCount).text(count);
			});

			_s.on('guestDisconnect', function(hash) {
				var count = 0;
				$(self.toSelectorID(hash)).remove();

				count = $(_selector.guestCount).text();
				if(count > 0)
					count = parseInt(count)-1;

				$(_selector.guestCount).text(count);
			});

			_s.on('coBrowseSessionStarted', function(uuid) {
				self.coBrowse.init(uuid);
			});

			_s.on('coBrowseSessionEnd', function() {
				self.coBrowse.end();
			});
		},

		coBrowse: {
			active: false,

			init: function(room) {
				this.active = true;
				this.startMirroring(room);

				__coBrowseEmitChanges(room, oDOM);
				this.listenLocalChanges(room);
				this.listenServerMirrorChanges();

				$('body').append(_html.adminPointer);
			},

			startMirroring: function(room) {
				mirrorAdmin = new TreeMirror(document, {
					createElement: function(tagName) {
						// if (tagName == 'SCRIPT') {
						// 	var node = document.createElement('NO-SCRIPT');
						// 	node.style.display = 'none';
						// 	return node;
						// }
						if (tagName == 'HEAD') {
							var node = document.createElement('HEAD');
							node.appendChild(document.createElement('BASE'));
							node.firstChild.href = location.href.match(/^(.*\/)[^\/]*$/)[1];
							return node;
						}
					}
				});

				mirrorClient = new TreeMirrorClient(document, {
					initialize: function(rootId, children) {
						oDOM = {
							f: 'initialize',
							args: [rootId, children],
						}
					},
					applyChanged: function(removed, addedOrMoved, attributes, text) {
						console.log('Changes detected -- CLIENT');
						if(_s != undefined){
							__coBrowseEmitChanges(room, {
								f: 'applyChanged',
								args: [removed, addedOrMoved, attributes, text]
							});
							console.log('	-- changes sent');
						}
					}
				});

				$.each(mirrorClient.knownNodes.map_, function(i) {
					mirrorAdmin.idMap[i] = this.k;
				});
			},

			listenLocalChanges: function(room) {

				var self = this;

				$(document).mouseenter(function(){
					if(self.active)
						__coBrowseEmitChanges(room, {clientMouseOn: true});
				});

				$(document).mouseleave(function(){
					if(self.active)
						__coBrowseEmitChanges(room, {clientMouseOn: false});
				});

				$(window).resize(function(e){
					if(self.active && sendResize) {
						__coBrowseEmitChanges(room, {
							height: window.innerHeight, 
							width: window.innerWidth
						});
					}
					sendResize = true;
				});

				$(window).scroll(function(e){
					if(self.active && sendScroll)
						__coBrowseEmitChanges(room, {
							scroll: {
								top: $(window).scrollTop(),
								left: $(window).scrollLeft()
							}
						});
					sendScroll = true;
				});

				$(document).mousemove(function(e){
					// e = self.translateMousePosToPx(e);
					_s.emit('coBroweClientMousePosition', {room: room, 
						PositionLeft: e.pageX, PositionTop: e.pageY});
				});
			},

			listenServerMirrorChanges: function() {
				var self = this;
				_s.on('coBrowseDOMLoaded', function(room){
					self.bindEverything();
					$(window).resize();
				});

				_s.on('coBroweAdminMousePosition', function(msg) {
					mirrorClient.mutationSummary.disconnect();
						$(_selector.adminPointer).css({
							'left': msg.PositionLeft - 3, 
							'top': msg.PositionTop - 3
						});
					mirrorClient.mutationSummary.reconnect();
				});

				_s.on('coBrowseTriggerClick', function(msg) {
					$(_selector.adminPointer).remove();

					var elem = document.elementFromPoint(msg.x, msg.y);

					elem.click();
					if($(elem).is('input')) {
						elem.focus();
					}

					$('body').append(_html.adminPointer);
				});

				_s.on('coBrowseChangesAdmin', function(changes) {
					console.log('Changes from admin rcvd --');
					if(typeof changes.clientMouseOff !== 'undefined' ){
						$(_selector.adminPointer).hide();
					}

					if(typeof changes.scroll !== 'undefined'){
						sendScroll = false;
						$(window).scrollTop(changes.scroll.top);
	            		$(window).scrollLeft(changes.scroll.left);
					}

					if(typeof changes.height !== 'undefined') {
						sendResize = false;
			        	window.resizeTo(
			        		changes.width + (window.outerWidth - window.innerWidth), 
			        		changes.height + (window.outerHeight - window.innerHeight)
			        	);
			        }

					mirrorClient.mutationSummary.disconnect();

					if(typeof changes.clientMouseOn !== 'undefined' ){
						if(changes.clientMouseOn) {
							$(_selector.adminPointer).show();
						} else {
							$(_selector.adminPointer).hide();
						}
					}

					// if(typeof changes.triggerResize !== 'undefined' ){
					// 	sendResize = true;
					// 	$(window).resize();
					// }

					if(changes.args){
						mirrorAdmin['applyChanged'].apply(mirrorAdmin, changes.args);
					}

					mirrorClient.mutationSummary.reconnect();
				});
			},

			bindEverything: function() {
				$(':input').each(function(){
			        $(this).attr('value', this.value);
			    });

			    $(document).on('keyup', ':input', function (e) {
			        $(this).attr('value', this.value);
			    });

			    $(document).on('change', 'select', function (e) {
					var Selected = $(this).children('option:selected');
					var val = Selected.val();

					$.each($(this).children('option'), function(){
						if($(this).val() != val) {
							$(this).removeAttr('selected', false);
						} else {
							$(this).attr('selected', true);
						}
					});
				});
			},

			end: function() {
				this.active = false;
				mirrorClient.mutationSummary.disconnect();
				mirrorClient = null;
				mirrorAdmin = null;
				oDOM = null;

				_s.removeListener('coBrowseDOMLoaded');
				_s.removeListener('coBrowseChangesAdmin');
				_s.removeListener('coBroweAdminMousePosition');
				_s.removeListener('coBrowseTriggerClick');

				$(_selector.adminPointer).remove();
			},
		},

		// ---- helper functions 

		disableSend: function(value) {
			var d = 'disabled';

			if(value) {
				$(_selector.chatMsgSend).addClass(d).prop(d, value);
				$(_selector.chatMsgTxt).addClass(d).prop(d, value);
			} else {
				$(_selector.chatMsgSend).removeClass(d).prop(d, value);
				$(_selector.chatMsgTxt).removeClass(d).prop(d, value);
			}
		},

		setChatRoomActive: function(uuid) {
			_hotRm = uuid;
			this.disableSend(false);
			$(_selector.chatMessages).empty();
			$(_selector.chatMsgTxt).focus();
			_s.emit('getMessages', uuid);
		},

		sendChatMsg: function(msgStr, printDir) {
			if(!_hotRm || msgStr == '') return;
			
			var msg = {
				rmid: _chatRooms[_hotRm].id,
				uuid: _chatRooms[_hotRm].uuid,
				hash: this.user.hash,
				name: this.user.name,
				time: this.getDate(),
				msg: msgStr,
			};

			_s.emit('sendUserMsg', msg); // first. byref msg!
			this.printMsg(msg, printDir); // second
		},

		printMsg: function(msg, printDir) {
			var html, lastMsgEntry, chatBubble;

			lastMsgEntry = $(_selector.chatMessages).children("div:last");
			chatBubble = lastMsgEntry.find(_selector.chatBubble);
	
			if(lastMsgEntry.length > 0) {
				if(lastMsgEntry.hasClass('right')) {
					append = (printDir == 'right');
				} else {
					if(!lastMsgEntry.hasClass('gbvc-sys-info')) {
						append = (printDir == '');
					}
				}
			}

			if($(_selector.chatMessages).attr('last-hash') != msg.hash) {
				append = false;
			}

			if(append) {
				var oldContent = chatBubble.html(), 
					newContent = oldContent +'<p>'+ msg.msg + '</p>';
				
				msg.msg = newContent;
				chatBubble.html(newContent);
				
			} else {
				html = sprintf(_html.msgEntry, printDir, 
					msg.name, msg.time.f2, 
					msg.hash, msg.msg);
				
				$(_selector.chatMessages).append(html)
					.attr('last-hash', msg.hash);
			}

			var scroll = $(_selector.chatMessages)[0]
				.scrollHeight;

			$(_selector.chatMessages)
				.slimScroll({scrollTo: scroll});
		},

		toSelectorID: function(id) {
			return '#'+id;
		},

		getDate: function(dateStr) {

			var Mos = [
				'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 
				'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'
			];

			var dt, yy, mm, d, h, m, s, h12;

			if(dateStr !== 'undefined') {
				dt = new Date();
			} else {
				dt = new Date(dateStr);
			}

			yy = dt.getFullYear();
		    mm = dt.getMonth();

			d  = dt.getDate();
		    h = dt.getHours();
		    m  = dt.getMinutes();
		    s  = dt.getSeconds();

		    d = (d < 10 ? '0' : '') + d;
		    h = (h < 10 ? '0' : '') + h;
		    m = (m < 10 ? '0' : '') + m;
		    s = (s < 10 ? '0' : '') + s;

		    h12 = (h > 12 ? h - 12 : h);

		    return {
		    	f1: d +'/'+ mm +'/'+ yy,
		        f2: d +' '+ Mos[mm] + " " + h12 + ":" + m + (h > 2 ? ' pm' : 'am'),
		    }
		},

		getDateTimeSince: function(t0) { // target should be a Date object
			t0 = new Date(t0);
			var x=new Date()-t0, a=x, i=0,s=0,m=0,h=0,j=0;
			if(a>=1){i=a%1000;a=(a-i)/1000;
			if(a>=1){s=a%60;a=(a-s)/60;
			if(a>=1){m=a%60;a=(a-m)/60;
			if(a>=1){h=a%24;a=(a-h)/24;
			if(a>=1){j=a;
			}}}}}

			// console.log('Elapsed: '+i+'ms '+s+'s '+m+'m '+h+'h '+j+'j (or '+x+'ms).');

			if(h>0) return h+'h';
			if(m>0) return m+'m';
			if(s>0) return s+'s';
			// if(i>0) return i+'ms';
			return '0s';
		},

		newWindowCentered: function(url, title, w, h) {
			// Fixes dual-screen position                         Most browsers      Firefox
			var dualScreenLeft = window.screenLeft != undefined ? window.screenLeft : screen.left;
			var dualScreenTop = window.screenTop != undefined ? window.screenTop : screen.top;

			var width = window.innerWidth ? window.innerWidth : 
				document.documentElement.clientWidth ? 
				document.documentElement.clientWidth : screen.width;
			var height = window.innerHeight ? window.innerHeight : 
				document.documentElement.clientHeight ? 
				document.documentElement.clientHeight : screen.height;

			var left = ((width / 2) - (w / 2)) + dualScreenLeft;
			var top = ((height / 2) - (h / 2)) + dualScreenTop;
			var newWindow = window.open(url, title, 'width=' + w + ', height=' + h + ', top=' + top + ', left=' + left);

			// Puts focus on the newWindow
			if (window.focus) {
				newWindow.focus();
			}
		},
	};

	function __coBrowseEmitChanges(room, changes) {
		_s.emit('coBrowseChangesClient', {
			room: room, 
			changes: changes,
		});
	};

	// debugging -- callable in browser dev tools
	$.gbvc.scr = function() { // show chat rooms
		dd(_chatRooms);
	};

})(jQuery);

$(function () {
	$.gbvc.chat.activate();
});

function dd(d) {
	console.log(d);
}