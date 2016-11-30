
(function ($) {
	var socket, uuid;
	var pw = window.opener; // parent window

	uuid = pw.$.gbvc.chat.cobo.uuid;
	socket = pw.$.gbvc.chat.cobo.socket;

	$(document).ready(function() {
		socket.emit('startCoBrowseSession', uuid);
	});

	$(window).on("beforeunload", function() { 
		pw.$.gbvc.chat.cobo.uuid = null;
		socket.emit('endCoBrowseSession', uuid);

		// this saves my day madafaka
		socket.removeListener('coBrowseSessionStarted');
		socket.removeListener('coBrowseChangesClient');
		socket.removeListener('coBroweClientMousePosition');
	});

	function dd(d) {
		pw.window.console.log(d);
	};

	socket.on('coBrowseSessionStarted', function(room) {
		var sendScroll = true;
		var mirrorClient;
		var base, mirror;
		
		// -- start mirror
		while (document.firstChild) {
	        document.removeChild(document.firstChild);
	    }

	    mirror = new TreeMirror(document, {
	        createElement: function(tagName) {
	            if (tagName == 'SCRIPT') {
	                var node = document.createElement('NO-SCRIPT');
	                node.style.display = 'none';
	                return node;
	            }
	        }
	    });

		$(window).scroll(function(){
			if(sendScroll == true)
				emitCoBrowseChangeByAdmin(room, {
					scroll: {
						top: $(window).scrollTop(),
						left: $(window).scrollLeft()
					}
				});

			sendScroll = true;
		});

		// $(window).resize(function() {
		// 	emitCoBrowseChangeByAdmin(room, {triggerResize: true});
		// });

        $(document).mouseenter(function(){
        	emitCoBrowseChangeByAdmin(room, {clientMouseOn: true});
        });

        $(document).mouseleave(function(){
        	emitCoBrowseChangeByAdmin(room, {clientMouseOn: false});
        });

        $(document).mousemove(function(e){
	        e = translateMousePosToPx(e);
	        socket.emit('coBroweAdminMousePosition', {
	        	room: room,
	        	PositionLeft: e.pageX, 
	        	PositionTop: e.pageY
	        });
        });

        $(document).click(function(e){
        	socket.emit('coBrowseTriggerClick', {
        		room: room,
        		x: e.pageX, 
        		y: e.pageY
        	});
        })

        emitCoBrowseChangeByAdmin(room, {clientMouseOff: true});
	   
	    socket.on('coBrowseChangesClient', function(changes) {
	    	dd('Changes from client rcvd --');

	    	if(typeof changes.scroll !== 'undefined'){
	    		sendScroll = false;
	            $(window).scrollTop(changes.scroll.top);
	            $(window).scrollLeft(changes.scroll.left);
	        }

	        if(changes.height) {
	        	window.resizeTo(
	        		changes.width + (window.outerWidth - window.innerWidth), 
	        		changes.height + (window.outerHeight - window.innerHeight)
	        	);
	        }

	        if(typeof changes.clientMouseOn !== 'undefined' ){
	        	mirrorClient.mutationSummary.disconnect();
	            ClientMouseDisplayToggle(changes.clientMouseOn);
	            mirrorClient.mutationSummary.reconnect();
	        }

	        if(changes.args){
	            if(changes.f == 'initialize'){
	                socket.emit('coBrowseDOMLoaded', room);
	                mirror[changes.f].apply(mirror, changes.args);
	                initializeMirrorBackToClient();
	                
	                mirrorClient.mutationSummary.disconnect();
	                AddClientMouse();
	                mirrorClient.mutationSummary.reconnect();

	            } else {
		        	mirrorClient.mutationSummary.disconnect();
		            mirror[changes.f].apply(mirror, changes.args);
		            mirrorClient.mutationSummary.reconnect();
	            }
	        }
	    });

	    socket.on('coBroweClientMousePosition', function(msg){
	    	mirrorClient.mutationSummary.disconnect();
	        MoveMouse(
	        	msg.PositionLeft, 
	        	msg.PositionTop - $(document).scrollTop());
	        mirrorClient.mutationSummary.reconnect();
	    });

	    function initializeMirrorBackToClient() {
	    	// -- mirror back to client
            mirrorClient = new TreeMirrorClient(document, {
		        initialize: function(rootId, children) {
		        	bindEverything();
		        },
		        applyChanged: function(removed, addedOrMoved, attributes, text) {
		        	dd('Changes detected -- ADMIN');
		            if(socket != undefined){
		                emitCoBrowseChangeByAdmin(room, {
		                    f: 'applyChanged',
		                    args: [removed, addedOrMoved, attributes, text]
		                });
		                dd('	-- changes sent');
		            }
		        }
		    });
	    };

	    function emitCoBrowseChangeByAdmin(room, changes) {
		    socket.emit('coBrowseChangesAdmin', {room: room, changes: changes});
		};

		function translateMousePosToPx(e) {
			if(!e) e = window.event;

	        if(e.pageX == null && e.clientX != null) {
	            var doc = document.documentElement, body = document.body;

	            e.pageX = e.clientX
	                + (doc && doc.scrollLeft || body && body.scrollLeft || 0)
	                - (doc.clientLeft || 0);

	            e.pageY = e.clientY
	                + (doc && doc.scrollTop || body && body.scrollTop || 0)
	                - (doc.clientTop || 0);
	        }

	        return e;
		};

	});

	function AddClientMouse(){
		$('#cobrowse-client-pointer').remove();
	    $('body').append('<div id="cobrowse-client-pointer" style="position: absolute; z-index: 1; height: 10px; width: 10px; border-radius: 5em; background-color: green; opacity:0.5; top: -26px;left: -26px;"></div> ');
	}

	function MoveMouse(x,y){
	    $('#cobrowse-client-pointer').css({'left': x -3 , 'top': y -3});
	}

	function ClientMouseDisplayToggle(show) {
		var m = $('#cobrowse-client-pointer');

		if(show) {
			m.show();
		} else {
			m.hide();
		}
	}

	function bindEverything() {
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

			// $(this).val(val);
		});
	};
})(jQuery);