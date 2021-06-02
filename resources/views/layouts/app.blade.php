<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
    img{ max-width:100%;}
    .side-contacts {
      background: #f8f8f8 none repeat scroll 0 0;
      border:1px solid #D2D2D2; 
      overflow: hidden;
      width: 40%;
    }
    .primary-inbox {
      box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;
      display: flex;
      border-radius: 5px;
      flex-direction: row;
      clear: both;
      overflow: hidden;
    }
    .headind_srch { 
      padding:10px 29px 10px 20px; 
      overflow:hidden;
      border-bottom:1px solid #D2D2D2; 
      background-color: #fff; 
    }
    .recent_heading h4 {
      color: #4B7BEC;
      font-family: 'Poppins', sans-serif;
      font-weight: 700;
      font-size: 21px;
      margin: auto;
    }    
    .contact-infos h5{ 
      font-family: 'Poppins', sans-serif;
      font-weight: 600;
      font-size:15px; 
      color:#464646; 
      margin:0 0 8px 0;
    }
    .chat_date {
      font-family: 'Poppins', sans-serif;
      font-weight: 300;
      color:#464646; 
      margin:0 0 8px 0;
      font-size:13px; 
      float:right;
    }
    .contact-infos p{ 
      font-family: 'Poppins', sans-serif;
      font-size:14px; 
      color:#989898; 
      margin:auto}
    .contact-image {
      width: 10%;
      height: 10%;
    }
    .contact-infos {
      width: 90%;
      padding: 0 0 0 15px;
    }
    
    .contact-div{ 
      overflow:hidden; 
      clear:both; 
      display: flex;
      flex-direction: row;
    }
    .inbox { height: 550px; overflow-y: scroll;}

    .inbox::-webkit-scrollbar {display: none;}
    
    .active_chat{
      background-image: linear-gradient(to left, rgba(255,0,0,0), rgba(75, 123, 236,0.1));
    }
    
    .received_msg {
      width: 50%;
     }
     .received_msg p {
      font-family: 'Poppins', sans-serif;
      background: #ebebeb none repeat scroll 0 0;
      border-radius: 20px;
      color: #646464;
      font-size: 14px;
      margin: 0;
      padding: 7px 10px 7px 12px;
      width: 100%;
    }
    .time_date {
      color: #747474;
      display: block;
      font-size: 12px;
      margin: 8px 0 0;
    }
    .conversation {
      display: flex;
      flex-direction: column;
      justify-content: space-between;
      border-top:1px solid #D2D2D2; 
      border-bottom:1px solid #D2D2D2; 
      border-right:1px solid #D2D2D2; 
      padding: 10px 15px 0 25px;
      width: 60%;
    }
    .conversation h1 {
      text-align: left;
      font-family: 'Poppins', sans-serif;
      font-weight: 500;
      color: #4B7BEC;
      font-size: 20px;
      margin: 0;
    }
    
     .sent_msg p {
      font-family: 'Poppins', sans-serif;
      background: #4B7BEC  none repeat scroll 0 0;
      border-radius: 20px;
      font-size: 14px;
      margin: 0; color:#fff;
      padding: 7px 10px 7px 12px;
      width:100%;
    }
    .outgoing_msg{ 
      overflow:hidden; 
      margin:20px 0 20px;
    }
    .incoming_msg{ overflow:hidden; 
      margin:20px 0 20px;
    }
    .sent_msg {
      float: right;
      width: 50%;
    }
    .composer textarea {
      background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
      border: 1px solid #4B7BEC;
      border-radius: 3px;
      resize: none;
      margin: 10px;
      margin-left: 0;
      padding: 6px;
      color: #4c4c4c;
      font-size: 15px;
      min-height: 48px;
      width: 100%;
    }
    .avatar {
      vertical-align: middle;
      width: 40px;
      height: 40px;
      border-radius: 100px;
    }
    .composer {
      position: relative;
    }
    .messaging { 
      padding: 0 0 50px 0;
      background-color: #fff;
    }
    .feed {
      height: 100%;
      max-height: 470px;
      padding: 4px;
      overflow: scroll;
      flex-direction: column;
    }
    .feed::-webkit-scrollbar {display: none;}
    .chat_list {
      border-bottom:1px solid #D2D2D2; 
      padding: 18px 16px 10px;
      cursor: pointer;
    }
    .app {
      background-color: rgba(75, 123, 236,0.1); /* Used if the image is unavailable */
      background-position: center; /* Center the image */
      background-repeat: no-repeat; /* Do not repeat the image */
      background-size: cover; /* Resize the background image to cover the entire container */
    }
    body {
      font-family: 'Poppins', sans-serif;
    }
    </style>
    <!-- <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap-grid.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap-min.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap-reboot.css')}}"> -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" type="text/css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>
<body>
    <div id="app" class="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

</body>
</html>
