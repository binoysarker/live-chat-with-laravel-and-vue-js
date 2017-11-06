<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <title>Chat home page</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">

    <style>
        .list-group{
            overflow-y: scroll;
            height: 200px;

        }
    </style>
</head>
<body>
<div class="container" >
    <div class="row" id="app">
        <div class="col-6 offset-3">
          <h3 class="text-center list-group-item active ">Chat Room <span class="badge badge-info badge-pill">@{{numberOfUsers}}</span></h3>
          <ul class="list-group"  v-chat-scroll>

              <app-message
                      v-for='message,index in chat.messages'
                      :key='message.id'
                      :user="chat.users[index]"
                      :typing="typing"
                      :time="chat.time[index]"
                      :color='chat.colors[index]'>
                  @{{message}}
              </app-message>

          </ul>
              <input type="text" class="form-control" placeholder="write your message here..." v-model='message' @keyup.enter='senMessage' name="">
        </div>
    </div>
</div>
<script src="{{asset('js/app.js')}}"></script>
</body>
</html>