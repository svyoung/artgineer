<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>The Artgineer @yield('title')</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <!-- Stylesheets -->
        <link rel="stylesheet" type="text/css" href="/css/main.css">
        <link rel="stylesheet" type="text/css" href="/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">
        <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/summernote.css" rel="stylesheet">
  
        <!-- Javascripts -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <script src="/js/bootstrap.min.js"></script>
        <script src="/js/summernote.min.js"></script>
        <script src="/js/main.js"></script>
        <!-- @if (Auth::check()) -->
            <script src="/js/admin.js"></script>
        <!-- @endif -->
        
        
    </head>
    <body>

    <div class="navcontent">
        <a onclick="svyglobal.fn.showModal('/about','#aboutMe')">About</a>
        <a onclick="svyglobal.fn.showModal('/resume','#resume')">Resume</a>
        Projects
    </div>
    <div class="banner">
        <div class="bannercontent">
            <img src="/images/profile.jpg" alt="Sam">
            <strong>Sam</strong> | Software Developer. Visual Artist. Sushi Connoisseur. Travel Buff. Puppy lover. 
            <br/>
            <a href="https://www.linkedin.com/in/samisoam" target="_blank"><i class="fa fa-linkedin fa-fw"></i></a>
            <a href="https://github.com/svyoung" target="_blank"><i class="fa fa-github fa-fw"></i></a>
            <a href="http://deviantart.com/svyportfolio" target="_blank"><i class="fa fa-deviantart"></i></a>
            <a href="mailto:truong.vee@gmail.com" target="_blank"><i class="fa fa-envelope"></i></a>        </div>
    </div>

    <div class="container">
            

        <div class="search">
            <input type="text" name="search" class="form-control searchpost" placeholder="search for posts...">
        </div>

        <!-- main content -->
        <div class="main" id="mainblog">
            @yield('content')
        </div>

    </div>
    
    <div class="footer">
        Copyright &copy; {{ date('Y')}}. Sam Vicki Young
    </div>

    @if (Route::has('login'))
                <div class="top-right links">
                    @if (Auth::check())
                    <div class="login authenticated">
                        Hi {{ Auth::user()->name }}!
                        <br/><a href="{{ url('/logout') }}">Logout</a>
                    </div>          
                    @else
                    <div class="login guest">
                        <a href="{{ url('/login') }}">Login</a>
                    </div>
                    @endif
                </div>
            @endif
    
    </body>
</html>
