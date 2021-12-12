<!doctype html>
<html lang="en">
   <head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>{{config('app.name')}}</title>
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
      <!-- Style Css -->
      <link rel="stylesheet" type="text/css" href="{{asset('public/css/style.css')}}">
      <!-- Global Css -->
      <link rel="stylesheet" type="text/css" href="{{asset('public/css/global.css')}}">
   </head>
   <body>
      <div class="container-fluid">
         <div class="main-content">
            <div class="row">
               <div class="col-sm-3">
                  <div class="people-list" id="people-list">
                     <div class="search">
                        <input type="text" placeholder="search">
                        <i class="fa fa-search"></i>
                     </div>
                     <ul class="list" id="user-channel-li">
                        <li class="clearfix global active-room-user-li" onclick="selectRoom('global','group')">
                           <img src="{{asset('public/images/group-chat.png')}}" class="bg-white" alt="avatar">
                           <div class="about ">
                              <big class="name">Global Group</big><br>
                              <small class="last-msg"></small>
                           </div>
                        </li>
                     </ul>
                  </div>
               </div>
               <div class="col-sm-9">
                  <div class="chat-container">
                     <ul class="chat" id="chat-li">
                     	{{-- @for($j=0;$j<10;$j++)
                        <li class="message left">
                           <img
                              class="avatar"
                              src="https://randomuser.me/api/portraits/women/17.jpg"
                              alt=""
                              />
                           <small>Shivani</small>
                           <p>Hello, I've found your friend's phone.</p>
                        </li>
                        <li class="message right">
                           <img
                              class="avatar"
                              src="https://randomuser.me/api/portraits/men/67.jpg"
                              alt=""
                              />
                           <p>Which of my friends are you talking about? :-)</p>
                        </li>
                        @endfor --}}
                     </ul>
                     <input type="text" id="message_box" class="text_input" placeholder="Message..." />
                  </div>
               </div>
            </div>
         </div>
      </div>
      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
   </body>
</html>


<div aria-live="polite" aria-atomic="true" style="">

  <div style="position: absolute; top: 20px; right: 20px;">

    <div role="alert" aria-live="assertive" aria-atomic="true" class="toast" data-autohide="false">
      <div class="toast-header bg-success" style="color:#fff;">

        <svg width="20" height="20" class="mr-2" viewBox="0 0 24 24">
      <path d="M12,2A10,10 0 0,1 22,12A10,10 0 0,1 12,22A10,10 0 0,1 2,12A10,10 0 0,1 12,2M11,16.5L18,9.5L16.59,8.09L11,13.67L7.91,10.59L6.5,12L11,16.5Z" fill="#ccc"></path>
    </svg>

        <strong class="mr-auto">Online</strong>
        <small>just now</small>
        <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
      </div>
      <div class="toast-body">
        <span id="toast-message"></span>
      </div>
    </div>
    
  </div>
</div>
<input type="hidden" name="" id="active-room" value="global">
<input type="hidden" name="" id="active-room-type" value="group">
<input type="hidden" name="" id="to_user_id" value="">
<script type="text/javascript">
   function notifToast(message){
      $('.toast').toast('hide');
      $('#toast-message').html(message);
      $('.toast').toast('show');
   }

   // Websocket
   let ws = new WebSocket("ws://localhost:8090");

   function attactUserToSocket(user_id){
      ws.onopen = function (e) {
          // Connect to websocket
          console.log('Connected to websocket');
      }
      setTimeout(function(){
         ws.send(JSON.stringify({command: "subscribe", channel: "global"}));
         ws.send(JSON.stringify({command: "register", userId: user_id}));    
         ws.send(JSON.stringify({command: "groupchat", message: `{{Auth::user()->first_name}} has just joined the chat`, channel: "global", type: "toast", user_image: "{{Auth::user()->image}}", user_name: "{{Auth::user()->first_name}}", user_id: "{{Auth::user()->id}}"}));
      },2500);
   }

   attactUserToSocket({{Auth::user()->id}});

   ws.onmessage = function(e) {
      console.log(e);
      var obj = JSON.parse(e.data);
      if(obj.type=='chat_message'){
         appendChat(obj.message, 'right', obj.user_image, obj.user_name);
      }
      if(obj.type=='toast'){
         notifToast(obj.message);
         appendUser(obj.user_id,obj.user_image,obj.user_name);
      }
   };   
   
   function sendMessageToGlobal(){
       ws.send('hello all');
   }

   function scrollChatToBottom(){
      $('.chat-container').animate({
            scrollTop: $('.chat-container')[0].scrollHeight
      }, "slow");
   }

   function appendChat(message,li_class,image,name=''){
      let messaeg_html = `<li class="message ${li_class}" style="display:none;"> <img class="avatar" src="${image}" alt=""/> <small>${name}</small> <p>${message}</p></li>`;
      $(`#chat-li`).append(messaeg_html);
      scrollChatToBottom();
      $(`#chat-li li:last-child`).fadeIn(500);
      let active_room = $(`#active-room`).val();
      $(`.${active_room} .last-msg`).html(`${message.substring(0,20)}...`);
   }

   var append_user_arr = [];

   function appendUser(user_id,user_image,user_name){
      let user_html = `<li class="clearfix chat-user-li user-${user_id}" onclick="selectRoom('user-${user_id}','one2one',${user_id})"> <img src="${user_image}" class="bg-white" alt="avatar"> <div class="about " data-id="${user_id}"> <big class="name">${user_name}</big><br><small class="last-msg"></small> </div></li>`;
      if(!$(`.user-${user_id}`)[0]){
         $(`#user-channel-li`).append(user_html);   
      }
   }

   function selectRoom(name,type,to_user_id=''){
      $(`#user-channel-li li`).removeClass('active-room-user-li');
      $(`.${name}`).addClass('active-room-user-li');
      $(`#active-room`).val(name);
      $(`#active-room-type`).val(type);
      $(`#to_user_id`).val(to_user_id);
      $(`#chat-li`).html('');
   }

   $('#message_box').keypress(function (e) {
      if (e.which == 13) {
         let msg = $(`#message_box`).val(),
             active_room = $(`#active-room`).val(),
             command_type = ($(`#active-room-type`).val()=='one2one') ? 'message' : 'groupchat';
         if(msg==''){
            alert('please enter something...'); return false;
         }
         $(`#message_box`).val('');
         appendChat(msg,'left','{{Auth::user()->image}}','{{Auth::user()->first_name}}');
         ws.send(JSON.stringify({ command: command_type, message: msg, channel: active_room, user_image: "{{Auth::user()->image}}", user_name: "{{Auth::user()->first_name}}", user_id: "{{Auth::user()->id}}", type: 'chat_message', from: "{{Auth::user()->id}}", to: $(`#to_user_id`).val() }));   
         
      }
   });
</script>