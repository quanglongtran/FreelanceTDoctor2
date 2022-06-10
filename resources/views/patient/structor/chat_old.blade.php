@if(!Session::get('user')==null)
<style type="text/css">

</style>
<script src="//cdnjs.cloudflare.com/ajax/libs/socket.io/1.7.3/socket.io.min.js"></script>
<!-- <script src="/public/js/latest.sdk.bundle.min.js"></script> -->

<script src="https://www.gstatic.com/firebasejs/8.6.3/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/8.6.2/firebase-messaging.js"></script>
<script id="script-to-send-push-message">

    jQuery(document).ready(function($){
        $('.list-menu li a:not(.bi-option-menu)').click(function(){
            jQuery('.box-show-loading').addClass('active');
            setTimeout(function(){
                jQuery('.box-show-loading').removeClass('active')                
            }, 5000)
        })
    })
    // request permission on page load
    document.addEventListener('DOMContentLoaded', function() {
        if (!Notification) {
            console.log('Desktop notifications not available in your browser. Try Chromium.');
            return;
        }
        if (Notification.permission !== 'granted')
            Notification.requestPermission();
    });
    
    function readCookie(name) {
        var nameEQ = name + "=";
        var ca = document.cookie.split(';');
        for(var i=0;i < ca.length;i++) {
            var c = ca[i];
            while (c.charAt(0)==' ') c = c.substring(1,c.length);
            if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
        }
        return null;
    }
    // Your web app's Firebase configuration
    var firebaseConfig = {
        apiKey: "AIzaSyCCm2WsuEV3dSvFRu4SSARcTVAeh6Uk_ko",
        authDomain: "medix-link.firebaseapp.com",
        databaseURL: "https://medix-link.firebaseio.com",
        projectId: "medix-link",
        storageBucket: "medix-link.appspot.com",
        messagingSenderId: "917263872826",
        appId: "1:917263872826:web:2d36474ec51fccef34d603"
    };
    // Initialize Firebase
    firebase.initializeApp(firebaseConfig);
    let messaging = null;
    if (firebase.messaging.isSupported()){
        messaging = firebase.messaging();
    // const messaging = firebase.messaging();

        navigator.serviceWorker.register('https://tdoctor.vn/public/v2/js/sw.js?v=2')
        .then((registration) => {
            messaging.useServiceWorker(registration);

            // Request permission and get token.....
            messaging.getToken({vapidKey: "BC_zMDethJOCk-Nw-hARQ2SIIVC0MjlHGwzhPooIv_pkIpEAh3Y6bxZKbC2OrvHoSDgr8yUdml1SDGhbXFDdTKA"})
            .then((currentToken) => {
                if (currentToken) {
                    var push_access_token = readCookie('push_access_token');
                    var currentToken_encode = btoa(currentToken);
                    if(!push_access_token || ( push_access_token + '==' ) != currentToken_encode){
                        //=======update push token to db//=======
                        jQuery.ajax({
                            type: 'POST',
                            url: '/chatapi/update-token',
                            data: {
                                old_token: push_access_token,
                                token: currentToken_encode
                            },
                            success: function(res) {
                                console.log(res);
                                if(res.status == true){
                                    console.log('Update push token success');
                                }else{
                                    console.log('Không thể kết nối máy chủ, vui lòng thử lại!');
                                }
                            },
                            error: function(res){
                                console.log('Không thể kết nối máy chủ, vui lòng thử lại !');
                            }
                        });
                    }
                    console.log(currentToken);
                    // var person = prompt("Your token", currentToken);
                    // Send the token to your server and update the UI if necessary
                    // ...
                } else {
                    // Show permission request UI
                    console.log('No registration token available. Request permission to generate one.');
                    // ...
                }
            }).catch((err) => {
                console.log('An error occurred while retrieving token. ', err);
                // ...
            });
            messaging.onMessage((payload) => {
                console.log('Message received. ', payload);
                // ...
                const notificationTitle = payload.notification.title;
                const notificationOptions = {
                    body: payload.notification.body,
                    icon: 'https://tdoctor.vn/public/images/doctor/logo1.jpg'
                };
                // self.registration.showNotification(notificationTitle,    notificationOptions);
                window.focus();
                notifyMe(notificationTitle, payload.notification.body, payload.data.icon, payload.data.click_action)
                // https://tdoctor.vn/chatapi/get-avatar/room_90007044
                let get_sender_id_from_payload = payload.data.icon.replace('https://tdoctor.vn/chatapi/get-avatar/', '');
                func_get_new_message_from_notification(get_sender_id_from_payload);
                
            });
        });
    }

// $('.btn-menu-chat').remove();

    function func_get_new_message_from_notification(get_sender_id_from_payload){
        _chat_clone_box = jQuery('.list-chat-items .chat-box[data-chat-to="'+get_sender_id_from_payload+'"]');
        if(_chat_clone_box){
            chat_to = get_sender_id_from_payload
            create_room = _chat_clone_box.attr('data-chat-room')
            currentID = _chat_clone_box.attr('current_id')
            clientName = _chat_clone_box.attr('data-client-name')
            myName = jQuery('.logo-username').text()
            var data_send =  {
                chat_to : chat_to,
                create_room : create_room,
                currentID : currentID,
                clientName : clientName,
                myName : myName,
                message : 'message',
            };
            func_load_list_message_to_the_message_box(_chat_clone_box, data_send, "append");
        }
    }

    //==========reload message by interval =======
    setInterval(function(){
        console.log('update new message');
        if($('.list-chat-items .chat-box').length){
            $('.list-chat-items .chat-box').each(function(){
                func_get_new_message_from_notification($(this).attr('data-chat-to'));
            })
        }
    }, 1000*10);

    function notifyMe(title, body, icon, url) {
        if (Notification.permission !== 'granted')
            Notification.requestPermission();
        else {
            $('title').text(title)
            var notification = new Notification(title, {
                icon: icon,
                body: body,
            });
            notification.onclick = function() {
                window.open(url);
            };
        }
    }

    function send_push_message_to_other_client(user_id, title, body, url, icon, type){
        jQuery.ajax({
            type: 'POST',
            url: '/chatapi/send-push-message',
            data: {
                chat_to: user_id,
                title: title,
                body: body,
                url: url,
                icon: icon,
                type: type,
            },
            success: function(res) {
                console.log(res);
                if(res.status == true){
                    console.log('Push thành công');
                }else{
                    console.log('Push thất bại!');
                }
            },
            error: function(res){
                console.log('Không thể kết nối máy chủ, vui lòng thử lại !');
            }
        });
    }


    var audio_play;
    
    function playSound(url, loop = false) {
        if(url == '1/public/v2/sounds/call.mp3'){
            $('.call-play-audio').play();
        }else{
            try {
                audio_play = new Audio(url);
                audio_play.loop = loop;
                audio_play.play();
              // adddlert("Welcome guest!");
            }
            catch(err) {
                console.log("can't play the sound");
              // document.getElementById("demo").innerHTML = err.message;
            }
        }
    }

    //=========click to video call========

    var stringeeClient;
    var access_token;
    var call;
    var stringeeUserId;
    var socket = io.connect('https://socket.sanwp.com');

    function show_hide_call_button_action(is_calling){
        if(is_calling){
            $('#modal-comming-call').removeClass('calling');
            $('.list-call-action').hide();
            $('.list-action-comming-call').show();
        }else{
            $('#modal-comming-call').addClass('calling');
            $('.list-call-action').show();
            $('.list-action-comming-call').hide();
        }
    }

    function switchCamera(){
        call.switchCamera();
    }

    function sendInfoToCall(call3, msg){
        call3.sendInfo(msg, function (res){
            console.log('sendInfo res', res);
        });
    }
    function sendInfo(msg){
        call.sendInfo(msg, function (res){
            console.log('sendInfo res', res);
        });
    }

    function func_incomming_call(call2){
        if($('#modal-comming-call').hasClass('show')){
            call2.reject(function (res) {
                console.log('reject res', res);
            });
        }else{
            console.log(call2);
            call = call2;
            settingCallEvent(call);

            $('#modal-comming-call').modal({
                backdrop: 'static',
                keyboard: false
            });
            // $('#incomingcallBox').show();
            $('#modal-comming-call .modal-title').text('Cuộc gọi đến');
            // $('#modal-comming-call .right-body h3').html('<span class="incomingCallFrom">'+$('.incomingCallFrom').text()+'</span> đang gọi bạn');
            $('#modal-comming-call .body-comming-call .avatar').attr('src', '/chatapi/get-avatar/room_'+call.fromNumber);
            show_hide_call_button_action(true);
            playSound('/public/v2/sounds/call.mp3', true);
            
        }
    }

    function settingsClientEvents(client) {
        client.on('authen', function (res) {
            console.log('on authen: ', res);
            if (res.r === 0) {
                stringeeUserId = res.userId;                    
            }else{
                func_get_access_token_and_join_chat();
            }
        });
        client.on('connect', function () {
            console.log('++++++++++++++ connected');
        });
        client.on('disconnect', function () {
            console.log('++++++++++++++ disconnected');
        });
        client.on('requestnewtoken', function () {
            console.log('++++++++++++++ requestnewtoken+++++++++');
            func_get_access_token_and_join_chat();
        });
        client.on('incomingcall2', function (call2) {
            func_incomming_call(call2);
        });
        client.on('incomingcall', function (call2) {
            func_incomming_call(call2);
        })
        client.on('addlocalstream', function (stream) {
            // reset srcObject to work around minor bugs in Chrome and Edge.
            // console.log('addlocalstream');
            localVideo.srcObject = null;
            localVideo.srcObject = stream;
        });
        client.on('addremotestream', function (stream) {
            // reset srcObject to work around minor bugs in Chrome and Edge.
            // console.log('addremoonstop()testream');
            remoteVideo.srcObject = null;
            remoteVideo.srcObject = stream;
            
            remoteAudio.srcObject = null;
            remoteAudio.srcObject = stream;

        });
    }
    function settingCallEvent(call1) {
        call1.on('addlocalstream', function (stream) {
            // reset srcObject to work around minor bugs in Chrome and Edge.
            // console.log('addlocalstream');
            localVideo.srcObject = null;
            localVideo.srcObject = stream;
        });
        call1.on('addremotestream', function (stream) {
            // reset srcObject to work around minor bugs in Chrome and Edge.
            // console.log('addremoonstop()testream');
            remoteVideo.srcObject = null;
            remoteVideo.srcObject = stream;
            
            remoteAudio.srcObject = null;
            remoteAudio.srcObject = stream;

        });
        call1.on('signalingstate', function (state) {
            console.log('signalingstate ', state);
            if (state.code === 6) {
                if(audio_play){
                    audio_play.pause();
                }
                $('#incomingcallBox').hide();
            }

            if (state.code === 6) {
                setCallStatus('Ended');
                if(audio_play){
                    audio_play.pause();
                }
                $('#modal-comming-call').modal('hide');
                onstop();
            } else if (state.code === 3) {
                setCallStatus('Answered');
                if(audio_play){
                    audio_play.pause();
                }
                show_hide_call_button_action(false);
            } else if (state.code === 5) {
                setCallStatus('User busy');
                if(audio_play){
                    audio_play.pause();
                }              
                $('#modal-comming-call').modal('hide');
                alert('Người dùng đang bận');
                onstop();
            }
        });
        call1.on('mediastate', function (state) {
            console.log('mediastate ', state);
        });
        call1.on('otherdevice', function (msg) {
            console.log('otherdevice ', msg);
            //486 may ban
            //200 da nhan cuoc goi o may khac
            if (msg.type == 'CALL2_STATE') {
                
            }
            if (msg.code == 200 || msg.code == 486) {
                if(audio_play){
                    audio_play.pause();
                }
                $('#incomingcallBox').hide();
                $('#modal-comming-call').modal('hide');
            }
        });
        call1.on('info', function (info) {
            console.log('++++info ', info);
            if(info.update_name){
                // $('.incomingCallFrom').html(info.update_name);
                $('#modal-comming-call .right-body h3').html('<span class="incomingCallFrom">'+info.update_name+'</span> đang gọi bạn');
            }
        });
    }
    function testAnswer() {
        call.answer(function (res) {
            console.log('answer res', res);
            if(audio_play){
                audio_play.pause();
            }
            show_hide_call_button_action(false);

            if (res.r === 0) {
                setCallStatus('Answered');
            }
        });
        $('#incomingcallBox').hide();
    }

    function testReject() {
        console.log('testReject');
        if(audio_play){
            audio_play.pause();
        }
        call.reject(function (res) {
            console.log('reject res', res);
        });
        $('#incomingcallBox').hide();
    }

    function testHangup() {
        call.hangup(function (res) {
            console.log('hangup res', res);
            $('#modal-comming-call').modal('hide');
        });
        onstop();
    }

    function onstop() {
        localVideo.srcObject = null;
        remoteVideo.srcObject = null;
    }

    function setCallStatus(status) {
        $('#txtStatus').html(status);
    }

    function testMute() {
        if (call.muted) {
            call.mute(false);
            console.log('unmuted');
        } else {
            call.mute(true);
            console.log('muted');
        }
    }

    function testDisableVideo() {
        if (call.localVideoEnabled) {
            call.enableLocalVideo(false);
            console.log('disable Local Video');
        } else {
            call.enableLocalVideo(true);
            console.log('enable Local Video');
        }
    }

    function testCall2(toNumber, is_video) {
        var fromNumber = stringeeUserId;

        call = new StringeeCall2(stringeeClient, fromNumber, toNumber, is_video);
        settingCallEvent(call);
        call.makeCall(function (res) {
            if (res.r == 0) {
                // console.log(call);
                console.log('make call success');
                setCallStatus('Calling...');
                // sendInfoToCall(call, {update_name: $('.logo-username').text()});
                socket.emit('send_to_groups', ['room_'+call.toNumber, {type: 'update_calling_member', update_name: $('.logo-username').text()}])
            }
        });
    }

    //=========disable stringee=======
    if(false){
        stringeeClient = new StringeeClient();
        settingsClientEvents(stringeeClient);
        var current_access_token = readCookie('current_access_token');
        if(current_access_token && current_access_token != ''){
            stringeeClient.connect(current_access_token);
        }else{
            func_get_access_token_and_join_chat();
        }
    }
    function func_get_access_token_and_join_chat(){
        jQuery.ajax({
            type: 'get',
            url: '/chatapi/get-token',
            data: [],
            // cache: false,
            // contentType: false,
            // processData: false,
            success: function(res) {
                console.log(res);
                // location.reload();
                if(res.status == true){
                    localStorage.setItem('current_access_token', res.data.access_token);
                    stringeeClient.connect(res.data.access_token);
                }else{
                    console.log('Không thể kết nối máy chủ, vui lòng thử lại!');
                }
            },
            error: function(res){
                console.log('Không thể kết nối máy chủ, đang thử lại !');
                func_get_access_token_and_join_chat();
            }
        });
    }
    function func_bi_auto_scroll_to_new_message(data, speed){
        jQuery('.content-chat img').each(function (k, v) {
            v.onload = function () {
                $(this).closest('.content-chat').addClass('loaded');
            };
            v.src = v.src;
        });
        jQuery('.content-chat .image-popup-vertical-fit').magnificPopup({
            type: 'image',
            closeOnContentClick: true,
            mainClass: 'mfp-img-mobile',
            image: {
                verticalFit: true,
                cursor: 'mfp-zoom-out-cur'
            }

        });
        if($('.chat-box[data-chat-room="'+data+'"] textarea').length){
            $('.chat-box[data-chat-room="'+data+'"] textarea')[0].focus();
            $('.chat-box[data-chat-room="'+data+'"] ul').animate({ scrollTop: $('.chat-box[data-chat-room="'+data+'"] ul')[0].scrollHeight }, speed);
        }
    }
    function show_chat_box_by_data(chat_to, create_room, myName, clientName){
        
        var create_room_second_lists = create_room.split('_');
        var create_room_second = create_room_second_lists[0]+'_'+create_room_second_lists[2]+'_'+create_room_second_lists[1];
        if( $('.chat-box[data-chat-room="'+create_room+'"]').length == 0 && $('.chat-box[data-chat-room="'+create_room_second+'"]').length == 0 ){
            _chat_clone_box = $('.chat-box-origin').clone();
            _chat_clone_box.removeClass('chat-box-origin');
            _chat_clone_box.attr('data-chat-room', create_room);                
            _chat_clone_box.attr('data-chat-to', chat_to);
            _chat_clone_box.attr('data-client-name', clientName);
            _chat_clone_box.attr('data-my-name', myName);
            _chat_clone_box.attr('data-chat-room', create_room);
            _chat_clone_box.addClass('active');
            $('.chat-box.active').removeClass('active');
            var currentID = _chat_clone_box.attr('current_id');


            _chat_clone_box.find('.chat-head .name span.title-chat').text(clientName);
            _chat_clone_box.find('.chat-head .name img').attr('src', '/chatapi/get-avatar/'+chat_to);
            $('.list-chat-items').prepend(_chat_clone_box.show());
            var data_send =  {
                chat_to : chat_to,
                create_room : create_room,
                currentID : currentID,
                clientName : clientName,
                myName : myName,
                message : 'message',
            };
            func_load_list_message_to_the_message_box(_chat_clone_box, data_send, "prepend");
        }           
    }
    function func_load_list_message_to_the_message_box(_chat_clone_box, data_send, render_type){
        $.ajax({
            type: 'POST',
            url: '/chatapi/get-messages',
            data: data_send,
            cache: false,
            success: function(res) {
                console.log(res);
                // location.reload();
                if(res.status == true){
                    // $('.chat-box[data-chat-room="'+data_send.create_room+'"] ul li').remove();
                    var max_index_number = 0;
                    if($('.chat-box[data-chat-room="'+data_send.create_room+'"] ul li').length){
                        
                        $('.chat-box[data-chat-room="'+data_send.create_room+'"] ul li').each(function(){ 
                            if($(this).attr('id')){ max_index_number = $(this).attr('id'); }
                        })

                    }
                    res.data.data.forEach(function(item, index){
                        // console.log(item)
                        if(max_index_number < item.id){
                            if(item.attach != null){
                                item.message = '<a style="display: inline-block;" target="_blank" class="image-popup-vertical-fit" href="'+item.attach.url+'"><img alt="'+item.user_id+'" src="'+item.attach.url+'" /></a>';
                                item.message += '<div class="loadingio-eclipse"><div class="ldio-rpinwye8j0b"><div></div></div></div>';
                            }
                            if(render_type == "prepend"){
                                if(data_send.currentID == 'room_'+item.user_id){
                                    $('.chat-box[data-chat-room="'+data_send.create_room+'"] ul').prepend('<li id="'+item.id+'" title="'+item.create_date+'" class="from-me">'
                                        +'<div><img class="avatar" src="/chatapi/get-avatar/room_'+item.user_id+'"><span class="content-chat">'+item.message+'</span></div>'
                                    +'</li>');
                                }else{
                                    $('.chat-box[data-chat-room="'+data_send.create_room+'"] ul').prepend('<li id="'+item.id+'" title="'+item.create_date+'" class="to-me">'
                                    +'<div><img class="avatar" src="/chatapi/get-avatar/room_'+item.user_id+'"><span class="content-chat">'+item.message+'</span></div>'
                                +'</li>');
                                }
                            }
                            else{
                                if(data_send.currentID == 'room_'+item.user_id){
                                    $('.chat-box[data-chat-room="'+data_send.create_room+'"] ul').append('<li id="'+item.id+'" title="'+item.create_date+'" class="from-me">'
                                        +'<div><img class="avatar" src="/chatapi/get-avatar/room_'+item.user_id+'"><span class="content-chat">'+item.message+'</span></div>'
                                    +'</li>');
                                }else{
                                    $('.chat-box[data-chat-room="'+data_send.create_room+'"] ul').append('<li id="'+item.id+'" title="'+item.create_date+'" class="to-me">'
                                    +'<div><img class="avatar" src="/chatapi/get-avatar/room_'+item.user_id+'"><span class="content-chat">'+item.message+'</span></div>'
                                +'</li>');
                                }
                            }
                            if(render_type != "prepend"){
                                func_bi_auto_scroll_to_new_message(data_send.create_room, 0);
                            }
                        }
                        if(render_type == "prepend"){
                            func_bi_auto_scroll_to_new_message(data_send.create_room, 0);
                        }
                    });
                    if(render_type == "prepend"){
                        func_bi_auto_scroll_to_new_message(data_send.create_room, 0);
                    }
                }
            },
            error: function(res){

            }
        });
    }


        //join current user to itselft room
        socket.on('connect', function(data) {
            // console.log(data);
            socket_real = data;
            socket.emit('join_to_group', ['room_{{Session::get('user')->user_id}}'])
        });     

        socket.on('send_to_groups', function(data){
            console.log(data);
            data_origin = data;
            data = data[1];
            if(data.type=='create_new_room'){
                if('room_{{Session::get('user')->user_id}}' != data.currentID){         
                    socket.emit('join_to_group', [data.create_room])
                    show_chat_box_by_data(data.currentID, data.create_room, data.clientName, data.myName);
                    playSound('/public/v2/sounds/messenger.mp3', false);
                }

            }
            if(data.type=='update_message'){
                var class_from = 'to-me';
                if('room_{{Session::get('user')->user_id}}' == data.sender){
                    class_from = 'from-me';
                }
                
                if(data.message_type && data.message_type == 'attachment' ){
                    data.message = '<a style="display: inline-block;" target="_blank" class="image-popup-vertical-fit" href="'+data.res.image_url+'"><img alt="Hình ảnh" src="'+data.res.image_url+'" /></a>';
                    data.message += '<div class="loadingio-eclipse"><div class="ldio-rpinwye8j0b"><div></div></div></div>';
                }
                $('.chat-box[data-chat-room="'+data.create_room+'"] ul').append('<li id="'+data.res.data.id+'" class="'+class_from+'">'
                    +'<div><img class="avatar" src="/chatapi/get-avatar/'+data.sender+'"><span class="content-chat">'+data.message+'</span></div>'
                +'</li>');
                playSound('/public/v2/sounds/messenger.mp3', false);
                func_bi_auto_scroll_to_new_message(data.create_room, "slow");
            }
            if(data.type=='update_calling_member'){
                $('#modal-comming-call .right-body h3').html('<span class="incomingCallFrom">'+data.update_name+'</span> đang gọi bạn');
            }
        })


        $('.btn-menu-chat').click(function(event){
            event.preventDefault();
            setTimeout(function(){
                jQuery('.box-show-loading').removeClass('active')
            }, 1000)
            console.log('open chat lists');
            $('.chat-list-right-box').toggleClass('active');

            if($('.list-message-members li').length > 0){
                $('.list-message-members li').remove();
            }
            if($('.chat-list-right-box.active').length > 0){
                func_load_new_list_chat_room(0);
            }
        })

        function func_load_new_list_chat_room_update(times){               
            $.ajax({
                type: 'POST',
                url: '/chatapi/get-list-rooms-update',
                data: {
                    
                },
                cache: false,
                success: function(res) {
                    console.log(res);
                    // location.reload();
                    if(res.status == true){
                        var current_id_real = $('.chat-box-origin').attr('current_id_real');
                        res.data.data.forEach(function(item, index){
                            item.members.forEach(function(itemc, indexc){
                                if(itemc.user_id != current_id_real){

                                    var chat_to = "room_" + itemc.user_id;
                                    var create_room = "" + item.name;
                                    var myName = $('.logo-username').text();
                                    var clientName = itemc.fullname;
                                    show_chat_box_by_data(chat_to, create_room, myName, clientName);
                                }
                            })                            
                        })

                    }else{
                        console.log('Không thể tải tin nhắn mới, vui lòng thử lại!');
                    }
                },
                error: function(res){
                    if(times == 0){
                        times++;
                        func_load_new_list_chat_room_update(times);
                        console.log('Không thể tải tin nhắn mới, đang thử lại!');
                    }else{
                        console.log('Không thể tải tin nhắn mới, vui lòng thử lại!');
                    }
                }
            });
        }
        //=========show popup chat===========
        setTimeout(function(){
            func_load_new_list_chat_room_update(0);      
            setInterval(function(){            
                func_load_new_list_chat_room_update(0);
            }, 20*1000);
        }, 6*1000);

        function func_load_new_list_chat_room(times){               
            $.ajax({
                type: 'POST',
                url: '/chatapi/get-list-rooms',
                data: {
                    
                },
                cache: false,
                success: function(res) {
                    console.log(res);
                    // location.reload();
                    if(res.status == true){
                        var current_id_real = $('.chat-box-origin').attr('current_id_real');
                        var total_new_message = 0;
                        res.data.data.forEach(function(item, index){
                            item.members.forEach(function(itemc, indexc){
                                if(itemc.user_id != current_id_real){
                                    if(item.latest_messages[0].message_type == 2){
                                        item.latest_messages[0].message = 'Hình ảnh';
                                    }
                                    var new_chat_room_item = '<li class="message-member-item click-to-start-chat" data-my-name="'+$('.logo-username').text()+'" data-client-name="'+itemc.fullname+'" data-chat-to="room_'+itemc.user_id+'" data-chat-room="'+item.name+'">'
                                        +'<span class="avatar"><img src="/chatapi/get-avatar/room_'+itemc.user_id+'" alt="'+itemc.fullname+'" /></span>'
                                        +'<span class="body-list">'
                                            +'<span class="name">'+itemc.fullname+'</span>'
                                            +'<span class="time-logs">'+item.latest_messages[0].message+'</span>'
                                        +'</span>'
                                    +'</li>';
                                    $('.list-message-members ul').append(new_chat_room_item);
                                    total_new_message ++;
                                    $('.btn-menu-chat .menu-notify').text(total_new_message+'+');
                                }
                            })                            
                        })
                        if(total_new_message == 0){
                            
                        }

                    }else{
                        console.log('Không thể tải tin nhắn, vui lòng thử lại!');
                    }
                },
                error: function(res){
                    if(times == 0){
                        times++;
                        func_load_new_list_chat_room(times);
                        console.log('Không thể tải tin nhắn, đang thử lại!');
                    }else{
                        console.log('Không thể tải tin nhắn, vui lòng thử lại!');
                    }
                }
            });
        }

        //=========click to send text message========
        var tin_nhan_da_gui = 0;
        function func_send_message_to_room_real(message, chat_to, create_room, myName, clientName, currentID, data){
            console.log('send message from cronjob');
            if(message != ''){
                $.ajax({
                    type: 'POST',
                    url: '/chatapi/send-message',
                    data: {
                        chat_to : chat_to,
                        create_room : create_room,
                        currentID : currentID,
                        clientName : clientName,
                        myName : myName,
                        message : message,
                    },
                    cache: false,
                    success: function(res) {
                        tin_nhan_da_gui ++;   
                        if(tin_nhan_da_gui >= data.length){
                            $('.btn-ajax-gui-tn-benh-nhan').removeClass('active');
                            alert('Gửi thành công!');
                        }
                        console.log(res);
                        // location.reload();
                        if(res.status == true){         
                            socket.emit('send_to_groups', [create_room, {type: 'update_message', create_room: create_room, sender: currentID, message_type: 'text', message: message, new_message_id: res.data.id, res: res}])
                            socket.emit('send_to_groups', [chat_to, {type: 'create_new_room', chat_to: chat_to, create_room: create_room, currentID: currentID, clientName: clientName, myName: myName }]);
                            send_push_message_to_other_client(chat_to, 'Tin nhắn mới từ '+myName, message, 'https://tdoctor.vn?from-push=1&u='+currentID, 'https://tdoctor.vn/chatapi/get-avatar/'+currentID, 'new_message');

                        }else{
                            console.log('Không gửi được tin nhắn, vui lòng thử lại!');
                        }
                    },
                    error: function(res){
                        tin_nhan_da_gui ++;
                        console.log('Không gửi được tin nhắn, vui lòng thử lại!');
                    }
                });

            }else{
                alert('Vui lòng nhập nội dung tin nhắn trước khi gửi!');
            }
        }

        function func_send_message_to_room(_that){
            console.log('send message');
            var _closest_box = _that.closest('.chat-box');
            var message = _closest_box.find('.content-chat-input').val();
            var chat_to = _closest_box.attr('data-chat-to');
            var create_room = _closest_box.attr('data-chat-room');
            var myName = _closest_box.attr('data-my-name');
            var clientName = _closest_box.attr('data-client-name');
            var currentID = _closest_box.attr('current_id');
            if(message != ''){
                _closest_box.find('.btn-send-chat-message').addClass('active');
                $.ajax({
                    type: 'POST',
                    url: '/chatapi/send-message',
                    data: {
                        chat_to : chat_to,
                        create_room : create_room,
                        currentID : currentID,
                        clientName : clientName,
                        myName : myName,
                        message : message,
                    },
                    cache: false,
                    success: function(res) {
                        console.log(res);
                        // location.reload();
                        if(res.status == true){
                            _closest_box.find('.content-chat-input').val('');
                            $('.chat-box[data-chat-room="'+create_room+'"] ul').append('<li id="'+res.data.id+'" title="'+(new Date().toISOString())+'" class="from-me">'
                                +'<div><img class="avatar" src="/chatapi/get-avatar/'+currentID+'"><span class="content-chat">'+message+'</span></div>'
                            +'</li>');
                            func_bi_auto_scroll_to_new_message(create_room, "slow");                  
                            socket.emit('send_to_groups', [create_room, {type: 'update_message', create_room: create_room, sender: currentID, message_type: 'text', message: message, new_message_id: res.data.id, res: res}])
                            socket.emit('send_to_groups', [chat_to, {type: 'create_new_room', chat_to: chat_to, create_room: create_room, currentID: currentID, clientName: clientName, myName: myName }]);
                            send_push_message_to_other_client(chat_to, 'Tin nhắn mới từ '+myName, message, 'https://tdoctor.vn?from-push=1&u='+currentID, 'https://tdoctor.vn/chatapi/get-avatar/'+currentID, 'new_message');

                        }else{
                            console.log('Không gửi được tin nhắn, vui lòng thử lại!');
                        }
                        _closest_box.find('.btn-send-chat-message').removeClass('active');
                    },
                    error: function(res){
                        console.log('Không gửi được tin nhắn, vui lòng thử lại!');
                        _closest_box.find('.btn-send-chat-message').removeClass('active');
                    }
                });

            }else{
                alert('Vui lòng nhập nội dung tin nhắn trước khi gửi!');
            }
        }

        $('body').on('click', '.chat-footer .btn-send-chat-message', function(event){
            event.preventDefault();
            func_send_message_to_room($(this));
        })
        $('body').on('keypress', '.content-chat-input', function(event){
            if(event.which === 13 && !event.shiftKey){
                event.preventDefault();
                func_send_message_to_room($(this));                
            }
        });
        $(document).mouseup(function(e) 
        {
            var container = $(".chat-list-right-box, .btn-menu-chat");

            // if the target of the click isn't the container nor a descendant of the container
            if (!container.is(e.target) && container.has(e.target).length === 0) 
            {
                $('.chat-list-right-box').removeClass('active');
            }
        });
        $('body').on('click', '.click-to-start-chat', function(event){
            event.preventDefault();
            $('.chat-list-right-box').removeClass('active');
            var _closest_box = $(this);
            var chat_to = _closest_box.attr('data-chat-to');
            var create_room = _closest_box.attr('data-chat-room');
            var myName = _closest_box.attr('data-my-name');
            var clientName = _closest_box.attr('data-client-name');
            var currentID = _closest_box.attr('current_id');

            show_chat_box_by_data(chat_to, create_room, myName, clientName);

            socket.emit('join_to_group', [create_room])
            //send to client to show chatbox
            // socket.emit('send_to_groups', [chat_to, {type: 'create_new_room', chat_to: chat_to, create_room: create_room, currentID: currentID, clientName: clientName, myName: myName }]);
        })


        $('body').on('click', '.chat-head .btn-close-chat', function(event){
            var _closest_box = $(this).closest('.chat-box');
            _closest_box.remove();
        });
        $('body').on('click', '.chat-head .btn-mini-chat', function(event){
            var _closest_box = $(this).closest('.chat-box');
            _closest_box.toggleClass('mini-size');
        });
        $('body').on('click', '.chat-head .name', function(event){
            var _closest_box = $(this).closest('.chat-box');
            _closest_box.removeClass('mini-size');
        });

        $('body').on('change', ".image-upload-input", function(e) {
            var _that = $(this);
            e.preventDefault();
            func_send_image_message_to_room(_that);    

            // var formData = new FormData($(this).closest('form')[0]);

            // $.ajax({
            //     url: window.location.pathname,
            //     type: 'POST',
            //     data: formData,
            //     cache: false,
            //     contentType: false,
            //     processData: false,
            //     success: function (res) {
            //         console.log(res)
            //     },
            //     error: function(res){
            //         console.log(res)
            //     }
            // });
        });
        //=========click to send image message========
        function func_send_image_message_to_room(_that){
            console.log('send image message');
            var _closest_box = _that.closest('.chat-box');
            var message = 'attachment';
            if(message != ''){
                _closest_box.find('.btn-send-chat-message').addClass('active');
                var chat_to = _closest_box.attr('data-chat-to');
                var create_room = _closest_box.attr('data-chat-room');
                var myName = _closest_box.attr('data-my-name');
                var clientName = _closest_box.attr('data-client-name');
                var currentID = _closest_box.attr('current_id');

                _closest_box.find('input[name="chat_to"]').val(chat_to);
                _closest_box.find('input[name="create_room"]').val(create_room);
                _closest_box.find('input[name="currentID"]').val(currentID);
                _closest_box.find('input[name="clientName"]').val(clientName);
                _closest_box.find('input[name="myName"]').val(myName);
                var formData = new FormData(_closest_box.find('.form-upload-image-message')[0]);
                $.ajax({
                    type: 'POST',
                    url: '/chatapi/send-message',
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function(res) {
                        console.log(res);
                        // location.reload();
                        if(res.status == true){
                            _closest_box.find('.content-chat-input').val('');
                            $('.chat-box[data-chat-room="'+create_room+'"] ul').append('<li id="'+res.data.id+'" title="'+(new Date().toISOString())+'" class="from-me">'
                                +'<div><img class="avatar" src="/chatapi/get-avatar/'+currentID+'"><span class="content-chat"><a style="display: inline-block;" target="_blank" class="image-popup-vertical-fit" href="'+res.image_url+'"><img alt="'+myName+'" src="'+res.image_url+'" /></a></span></div>'
                            +'</li>');
                            func_bi_auto_scroll_to_new_message(create_room, "slow");
                            socket.emit('send_to_groups', [create_room, {type: 'update_message', create_room: create_room, sender: currentID, message_type: 'attachment', message: 'attachment', new_message_id: res.data.id, res: res}]);
                            socket.emit('send_to_groups', [chat_to, {type: 'create_new_room', chat_to: chat_to, create_room: create_room, currentID: currentID, clientName: clientName, myName: myName }]);
                            send_push_message_to_other_client(chat_to, 'Tin nhắn mới từ '+myName, 'Hình ảnh', 'https://tdoctor.vn?from-push=1&u='+currentID, 'https://tdoctor.vn/chatapi/get-avatar/'+currentID, 'new_message');
                        }else{
                            console.log('Không gửi được tin nhắn, vui lòng thử lại!');
                        }
                        _closest_box.find('.btn-send-chat-message').removeClass('active');
                    },
                    error: function(res){
                        console.log('Không gửi được tin nhắn, vui lòng thử lại!');
                        _closest_box.find('.btn-send-chat-message').removeClass('active');
                    }
                });

            }else{
                alert('Vui lòng chọn file trước khi gửi!');
            }
        }

        $('body').on('click', '.btn-video-call', function(){
            func_click_to_call_stringee($(this), true);
        })
        $('body').on('click', '.btn-audio-call', function(){
            func_click_to_call_stringee($(this), false);
        })

        function func_click_to_call_stringee(_that, is_video){
            if($('div#modal-comming-call.show').length > 0){
                return;
            }
            if(!stringeeUserId){
                alert('Cần tải lại trang để thực hiện chức năng này');
                window.location.reload();
            }
            var call_to_number = _that.closest('.chat-box').attr('data-chat-to').replace('room_', '');          
            var fullname = _that.closest('.chat-box').attr('data-client-name');          
            var current_id = _that.closest('.chat-box').attr('current_id');
            var myName = _that.closest('.chat-box').attr('data-my-name');          
            // testCall2(call_to_number, is_video);
            var fromNumber = stringeeUserId;
            currentID = stringeeUserId;
            var fromAlias = $('.logo-username').text();
            // call = new StringeeCall2(stringeeClient, fromNumber, call_to_number, is_video);
            call = new StringeeCall2(stringeeClient, fromAlias, call_to_number, is_video);
            settingCallEvent(call);
            call.makeCall(function (res) {
                if (res.r == 0) {
                    // console.log(call);
                    console.log('make call success');
                    setCallStatus('Calling...');
                    // sendInfoToCall(call, {update_name: $('.logo-username').text()});
                    socket.emit('send_to_groups', ['room_'+call.toNumber, {type: 'update_calling_member', update_name: $('.logo-username').text()}])
                
                    // $('#incomingcallBox').show();
                    $('.incomingCallFrom').html(call_to_number);
                    show_hide_call_button_action(false);
                    $('#modal-comming-call.calling').removeClass('calling');

                    $('#modal-comming-call .modal-title').text('Cuộc gọi đi');
                    $('#modal-comming-call .right-body h3').html('Bạn đang gọi <span class="incomingCallFrom">'+fullname+'</span>');
                    $('#modal-comming-call .body-comming-call .avatar').attr('src', '/chatapi/get-avatar/room_'+call_to_number);
                    $('#modal-comming-call').modal({
                        backdrop: 'static',
                        keyboard: false
                    });

                    // send_push_message_to_other_client(call_to_number, 'Cuộc gói đến từ '+myName, myName + ' đang gọi bạn', 'https://tdoctor.vn?from-push=1&u='+currentID, 'https://tdoctor.vn/chatapi/get-avatar/'+currentID, 'new_call');
                }else{
                    send_push_message_to_other_client(call_to_number, 'Cuộc gói nhỡ từ '+myName, myName + ' đã gọi bạn', 'https://tdoctor.vn?from-push=1&u='+currentID, 'https://tdoctor.vn/chatapi/get-avatar/'+currentID, 'miss_call');
                }
            });
        }

        function func_video_call_to_room(_that){
            console.log('video call');
            var _closest_box = _that.closest('.chat-box');
            var message = 'attachment';
            if(message != ''){
                var chat_to = _closest_box.attr('data-chat-to');
                var create_room = _closest_box.attr('data-chat-room');
                var myName = _closest_box.attr('data-my-name');
                var clientName = _closest_box.attr('data-client-name');
                var currentID = _closest_box.attr('current_id');

                $.ajax({
                    type: 'POST',
                    url: '/chatapi/get-token',
                    data: [],
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function(res) {
                        console.log(res);
                        // location.reload();
                        if(res.status == true){
                            localStorage.setItem('current_access_token', res.data.access_token);
                            socket.emit('send_to_groups', [chat_to, {type: 'create_new_video_room', chat_to: chat_to, create_room: create_room, currentID: currentID, clientName: clientName, myName: myName }]);
                        }else{
                            console.log('Không gửi được tin nhắn, vui lòng thử lại!');
                        }
                    },
                    error: function(res){
                        console.log('Không gửi được tin nhắn, vui lòng thử lại!');
                    }
                });

            }else{
                alert('Vui lòng chọn file trước khi gửi!');
            }
        }

        $('body').on('click', '.image-upload-input-button', function(event){
            event.preventDefault();
            $(this).closest('form').find('.image-upload-input').trigger('click');
        });
        $('body').on('click', '.chat-box', function(event){
            $('.chat-box.active').removeClass('active');
            $(this).addClass('active');
        })
    

    
</script>

<style type="text/css">
    .icon-call-video, .icon-call-audio {
    display: none;
}
</style>
<div class="list-chat-items">

</div>
<div class="chat-box-origin chat-box active" style="display:none" data-id="" current_id="room_{{Session::get('user')->user_id}}" current_id_real="{{Session::get('user')->user_id}}">
    <div class="chat-head">
        <div class="chat-box-container">
            <span class="name"><span class="avatar"><img src="/public/patient/images/icon-patient.jpg" alt="IMG" /></span><span class="title-chat">Name</span></span>
            <span class="group-botton"><button class="bi-mini-chat"><i class="fas fa-minus"></i><i class="fas fa-plus"></i></button><button class="bi-close-chat"><i class="fas fa-close"></i></button>
                <div class="box-chat-list-actions" name="actions" role="toolbar"><span class="icon-call-video tojvnm2t a6sixzi8 abs2jz4q a8s20v7p t1p8iaqh k5wvi7nf q3lfd5jv pk4s997a bipmatt0 cebpdrjk qowsmv63 owwhemhu dp1hu0rb dhp61c6y iyyx5f41"><div aria-label="Start a video chat with An Vũ" class="oajrlxb2 gs1a9yip g5ia77u1 mtkw9kbi tlpljxtp qensuy8j ppp5ayq2 goun2846 ccm00jje s44p3ltw mk2mc5f4 rt8b4zig n8ej3o3l agehan2d sk4xxmp2 rq0escxv nhd2j8a9 pq6dq46d mg4g778l btwxx1t3 pfnyh3mw p7hjln8o kvgmc6g5 cxmmr5t8 oygrvhab hnxzwevs tgvbjcpo hpfvmrgz jb3vyjys rz4wbd8a qt6c0cv9 a8nywdso l9j0dhe7 i1ao9s8h esuyzwwr f1sip0of du4w35lb lzcic4wl abiwlrkh p8dawk7l" role="button" tabindex="0"><svg class="btn-video-call" role="presentation" width="26px" height="26px" viewBox="-5 -5 30 30"><path d="M19.492 4.112a.972.972 0 00-1.01.063l-3.052 2.12a.998.998 0 00-.43.822v5.766a1 1 0 00.43.823l3.051 2.12a.978.978 0 001.011.063.936.936 0 00.508-.829V4.94a.936.936 0 00-.508-.828zM10.996 18A3.008 3.008 0 0014 14.996V5.004A3.008 3.008 0 0010.996 2H3.004A3.008 3.008 0 000 5.004v9.992A3.008 3.008 0 003.004 18h7.992z" fill="#bec2c9"></path></svg><div class="s45kfl79 emlxlaya bkmhp75w spb7xbtv i09qtzwb n7fi1qx3 b5wmifdl hzruof5a pmk7jnqg j9ispegn kr520xx4 c5ndavph art1omkt ot9fgl3s rnr61an3" data-visualcompletion="ignore"></div></div></span><span class="icon-call-audio tojvnm2t a6sixzi8 abs2jz4q a8s20v7p t1p8iaqh k5wvi7nf q3lfd5jv pk4s997a bipmatt0 cebpdrjk qowsmv63 owwhemhu dp1hu0rb dhp61c6y iyyx5f41"><div aria-label="Start a voice call with An Vũ" class="oajrlxb2 gs1a9yip g5ia77u1 mtkw9kbi tlpljxtp qensuy8j ppp5ayq2 goun2846 ccm00jje s44p3ltw mk2mc5f4 rt8b4zig n8ej3o3l agehan2d sk4xxmp2 rq0escxv nhd2j8a9 pq6dq46d mg4g778l btwxx1t3 pfnyh3mw p7hjln8o kvgmc6g5 cxmmr5t8 oygrvhab hnxzwevs tgvbjcpo hpfvmrgz jb3vyjys rz4wbd8a qt6c0cv9 a8nywdso l9j0dhe7 i1ao9s8h esuyzwwr f1sip0of du4w35lb lzcic4wl abiwlrkh p8dawk7l" role="button" tabindex="0"><svg class="btn-audio-call" role="presentation" width="26px" height="26px" viewBox="-5 -5 30 30"><path d="M10.952 14.044c.074.044.147.086.22.125a.842.842 0 001.161-.367c.096-.195.167-.185.337-.42.204-.283.552-.689.91-.772.341-.078.686-.105.92-.11.435-.01 1.118.174 1.926.648a15.9 15.9 0 011.713 1.147c.224.175.37.43.393.711.042.494-.034 1.318-.754 2.137-1.135 1.291-2.859 1.772-4.942 1.088a17.47 17.47 0 01-6.855-4.212 17.485 17.485 0 01-4.213-6.855c-.683-2.083-.202-3.808 1.09-4.942.818-.72 1.642-.796 2.136-.754.282.023.536.17.711.392.25.32.663.89 1.146 1.714.475.808.681 1.491.65 1.926-.024.31-.026.647-.112.921-.11.35-.488.705-.77.91-.236.17-.226.24-.42.336a.841.841 0 00-.368 1.161c.04.072.081.146.125.22a14.012 14.012 0 004.996 4.996z" fill="#bec2c9"></path><path d="M10.952 14.044c.074.044.147.086.22.125a.842.842 0 001.161-.367c.096-.195.167-.185.337-.42.204-.283.552-.689.91-.772.341-.078.686-.105.92-.11.435-.01 1.118.174 1.926.648.824.484 1.394.898 1.713 1.147.224.175.37.43.393.711.042.494-.034 1.318-.754 2.137-1.135 1.291-2.859 1.772-4.942 1.088a17.47 17.47 0 01-6.855-4.212 17.485 17.485 0 01-4.213-6.855c-.683-2.083-.202-3.808 1.09-4.942.818-.72 1.642-.796 2.136-.754.282.023.536.17.711.392.25.32.663.89 1.146 1.714.475.808.681 1.491.65 1.926-.024.31-.026.647-.112.921-.11.35-.488.705-.77.91-.236.17-.226.24-.42.336a.841.841 0 00-.368 1.161c.04.072.081.146.125.22a14.012 14.012 0 004.996 4.996z" stroke="#bec2c9" fill="none"></path></svg><div class="s45kfl79 emlxlaya bkmhp75w spb7xbtv i09qtzwb n7fi1qx3 b5wmifdl hzruof5a pmk7jnqg j9ispegn kr520xx4 c5ndavph art1omkt ot9fgl3s rnr61an3" data-visualcompletion="ignore"></div></div></span><span class="tojvnm2t a6sixzi8 abs2jz4q a8s20v7p t1p8iaqh k5wvi7nf q3lfd5jv pk4s997a bipmatt0 cebpdrjk qowsmv63 owwhemhu dp1hu0rb dhp61c6y iyyx5f41"><div aria-label="Minimise chat" class="oajrlxb2 gs1a9yip g5ia77u1 mtkw9kbi tlpljxtp qensuy8j ppp5ayq2 goun2846 ccm00jje s44p3ltw mk2mc5f4 rt8b4zig n8ej3o3l agehan2d sk4xxmp2 rq0escxv nhd2j8a9 pq6dq46d mg4g778l btwxx1t3 pfnyh3mw p7hjln8o kvgmc6g5 cxmmr5t8 oygrvhab hnxzwevs tgvbjcpo hpfvmrgz jb3vyjys rz4wbd8a qt6c0cv9 a8nywdso l9j0dhe7 i1ao9s8h esuyzwwr f1sip0of du4w35lb lzcic4wl abiwlrkh p8dawk7l" role="button" tabindex="0" data-prevent_chattab_focus="1"><svg class="btn-mini-chat" width="26px" height="26px" viewBox="-4 -4 24 24"><line x1="2" x2="14" y1="8" y2="8" stroke-linecap="round" stroke-width="2" stroke="#bec2c9"></line></svg><div class="s45kfl79 emlxlaya bkmhp75w spb7xbtv i09qtzwb n7fi1qx3 b5wmifdl hzruof5a pmk7jnqg j9ispegn kr520xx4 c5ndavph art1omkt ot9fgl3s rnr61an3" data-visualcompletion="ignore"></div></div></span><span class="tojvnm2t a6sixzi8 abs2jz4q a8s20v7p t1p8iaqh k5wvi7nf q3lfd5jv pk4s997a bipmatt0 cebpdrjk qowsmv63 owwhemhu dp1hu0rb dhp61c6y iyyx5f41"><div aria-label="Close chat" class="oajrlxb2 gs1a9yip g5ia77u1 mtkw9kbi tlpljxtp qensuy8j ppp5ayq2 goun2846 ccm00jje s44p3ltw mk2mc5f4 rt8b4zig n8ej3o3l agehan2d sk4xxmp2 rq0escxv nhd2j8a9 pq6dq46d mg4g778l btwxx1t3 pfnyh3mw p7hjln8o kvgmc6g5 cxmmr5t8 oygrvhab hnxzwevs tgvbjcpo hpfvmrgz jb3vyjys rz4wbd8a qt6c0cv9 a8nywdso l9j0dhe7 i1ao9s8h esuyzwwr f1sip0of du4w35lb lzcic4wl abiwlrkh p8dawk7l" role="button" tabindex="0" data-prevent_chattab_focus="1"><svg class="btn-close-chat" width="26px" height="26px" viewBox="-4 -4 24 24"><line x1="2" x2="14" y1="2" y2="14" stroke-linecap="round" stroke-width="2" stroke="#bec2c9"></line><line x1="2" x2="14" y1="14" y2="2" stroke-linecap="round" stroke-width="2" stroke="#bec2c9"></line></svg><div class="s45kfl79 emlxlaya bkmhp75w spb7xbtv i09qtzwb n7fi1qx3 b5wmifdl hzruof5a pmk7jnqg j9ispegn kr520xx4 c5ndavph art1omkt ot9fgl3s rnr61an3" data-visualcompletion="ignore"></div></div></span></div>
            </span>
        </div>
    </div>
    <div class="chat-body">
        <div class="chat-box-container">
            <ul>

            </ul>       
        </div>
    </div>
    <div class="chat-footer">
        <div class="chat-box-container">
            <form class="form-upload-image-message" method="post" enctype="multipart/form-data">
                <textarea autofocus class="content-chat-input" placeholder="Nhập nội dung tin nhắn..."></textarea>
                <div class="text-right">
                    <div class="hidden">
                        <input name="chat_to" type="hidden" />
                        <input name="create_room" type="hidden" />
                        <input name="currentID" type="hidden" />
                        <input name="clientName" type="hidden" />
                        <input name="myName" type="hidden" />
                        <input name="myName" type="hidden" />
                    </div>                
                    <input placeholder="Chọn hình ảnh" class="image-upload-input" name="file" type="file" accept="image/*" />
                    
                    <svg data-togglex="tooltip" title="Chọn hình ảnh" viewBox="0 -1 17 17" height="20px" width="20px" class="image-upload-input-button a8c37x1j ms05siws hr662l2t b7h9ocf4"><g fill="none" fill-rule="evenodd"><path d="M2.882 13.13C3.476 4.743 3.773.48 3.773.348L2.195.516c-.7.1-1.478.647-1.478 1.647l1.092 11.419c0 .5.2.9.4 1.3.4.2.7.4.9.4h.4c-.6-.6-.727-.951-.627-2.151z" class="crt8y2ji" style=""></path><circle cx="8.5" cy="4.5" r="1.5" class="crt8y2ji" style=""></circle><path d="M14 6.2c-.2-.2-.6-.3-.8-.1l-2.8 2.4c-.2.1-.2.4 0 .6l.6.7c.2.2.2.6-.1.8-.1.1-.2.1-.4.1s-.3-.1-.4-.2L8.3 8.3c-.2-.2-.6-.3-.8-.1l-2.6 2-.4 3.1c0 .5.2 1.6.7 1.7l8.8.6c.2 0 .5 0 .7-.2.2-.2.5-.7.6-.9l.6-5.9L14 6.2z" class="crt8y2ji" style=""></path><path d="M13.9 15.5l-8.2-.7c-.7-.1-1.3-.8-1.3-1.6l1-11.4C5.5 1 6.2.5 7 .5l8.2.7c.8.1 1.3.8 1.3 1.6l-1 11.4c-.1.8-.8 1.4-1.6 1.3z" stroke-linecap="round" stroke-linejoin="round" class="s9lmpwuu" style=""></path></g></svg>
                    <button class="btn btn-primary btn-send-chat-message"><span class="loadersmall"></span>Gửi</button>
                </div>
            </form>
        </div>
    </div>
</div>
<style type="text/css">

</style>
<div class="chat-list-right-box" >
    <h2>Trò chuyện</h2>
    <div class="list-message-members">
        <ul>
            
        </ul>
    </div>
</div>

<!-- Modal show bệnh án-->
<div id="modal-comming-call" class="modal fade modal-lg" role="dialog" style="margin:auto;">
  <div class="modal-dialog" style="max-width: 100%;">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="display: block;">
        <button type="button" class="close hidden" data-dismissx="modal" style="display: inline-block;">&times;</button>
         <h3 class="modal-title">Cuộc gọi đến <strong></strong></h3>       
      </div>
      <div class="modal-body">
        <div class="box-show-comming-call">
            <div class="box-show-comming-call-container">
                <div class="body-comming-call">
                    <img class="avatar" src="/chatapi/get-avatar/room_454103455">
                    <div class="right-body">
                        <h3><span class="incomingCallFrom">Hồ Bun</span> đang gọi bạn</h3>
                    </div>
                    <div id="videos">
                        <br/>
                        <video id="localVideo" autoplay playsinline muted style="width: 150px;position: absolute;max-width: 20%;"></video>
                        <video id="remoteVideo" autoplay playsinline muted style="width: 100%;"></video>
                        <audio id="remoteAudio" autoplay playsinline style="width: 1px; height: 1px;display: none"></audio>
                    </div>
                </div>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <div class="list-call-action" style="display: none;">
            <button class="btn btn-primary btn-primary" id="call2HangupBtn" onclick="testHangup()">Kết thúc cuộc gọi</button>            
            <button class="btn btn-primary btn-primary" id="muteBtn" onclick="testMute()">Tắt tiếng</button>
            <button class="btn btn-primary btn-primary" id="enableVideoBtn" onclick="testDisableVideo()">Tắt video</button>
            <button class="btn btn-primary btn-primary hidden bi-hidden-real" id="switchCameraBtn" onclick="switchCamera()">Đổi camera</button>
        </div>

        <div id="incomingcallBox" style="display: none; background-color: yellow; padding: 5px; width: 600px;">
            Incoming call from: <span class="incomingCallFrom" style="color: blue"></span>

            <button onclick="testAnswer()">Answer</button>
            <button onclick="testReject()">Reject</button>
        </div>
        <div class="list-action-comming-call">
            <button type="button" class="btn btn-primary btn-warning" data-dismiss="modal" onclick="testReject()">Từ chối</button>
            <button type="button" class="btn btn-primary btn-primary btn-tra-loi-video" data-dismissx="modal" onclick="testAnswer()">Chấp nhận</button>
        </div>
      </div>
    </div>
  </div>
</div>
<audio hidden name="media"  class="call-play-audio"><source src="https://tdoctor.vn/public/v2/sounds/call.mp3" type="audio/mp3"></audio>
<audio hidden name="media"  class="message-play-audio"><source src="https://tdoctor.vn/public/v2/sounds/messenger.mp3" type="audio/mp3"></audio>
<script type="text/javascript">
    jQuery(document).ready(function($){
        
        // $('.btn-menu-chat').remove();
    })
</script>
<!-- Modal show bệnh án-->  
@endif