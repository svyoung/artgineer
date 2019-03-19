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
        <link href="https://fonts.googleapis.com/css?family=Open+Sans|Source+Code+Pro" rel="stylesheet">
        <!-- Stylesheets -->
        <link rel="stylesheet" type="text/css" href="/css/main.css">
        <link rel="stylesheet" type="text/css" href="/css/font-awesome.min.css">
        <!-- <link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css"> -->
        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/summernote.css" rel="stylesheet">
  
        <!-- Javascripts -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <script src="/js/bootstrap.min.js"></script>
        <script src="/js/summernote.min.js"></script>
        <script src="/js/main.js"></script>
        @if (Auth::check())
            <script src="/js/admin.js"></script>
        @endif
        
        
    </head>
    <body>
    <div id="header-div">
        <div id="header-text">
            <span class="text-sam">Sam</span><span class="text-young">Young</span>
            <p class="sm-icons">
                <a href="https://www.linkedin.com/in/samisoam" target="_blank"><i class="fa fa-linkedin-square fa-fw"></i></a>
                <a href="https://github.com/svyoung" target="_blank"><i class="fa fa-github fa-fw"></i></a>
                <a href="mailto:truong.vee@gmail.com" target="_blank"><i class="fa fa-envelope fa-fw"></i></a>
            </p>
            <p>
                <a id="accesscontent"><i class="fa fa-angle-down arrowlarge"></i></a>
        </div>
    </div>

    <div class="navcontent">
        <a onclick="svyglobal.fn.showModal('/about','#aboutMe')">About</a>
        <a onclick="svyglobal.fn.showModal('/resume','#resume')">Resume</a>
        <a onclick="">Projects</a>
    </div>
<!--     <div class="banner">
        <div class="bannercontent">
            <img src="/images/profile.jpg" alt="Sam">
            <strong>Sam</strong> | Software Developer. Visual Artist. Sushi Connoisseur. Travel Buff. Puppy lover. 
        </div>
    </div> -->

    <div class="search">
        <input type="text" name="search" class="form-control searchpost" placeholder="search for posts...">
    </div>

    <div class="container">
            

        

        <!-- main content -->
        <div class="main row" id="mainblog">
            @yield('content')
        </div>

    </div>
    
    <div class="footer">
        @if (Route::has('login'))
            <div class="authenticate">
                @if (Auth::check())
                <div class="login authenticated">
                    Hi {{ Auth::user()->name }}! <a href="{{ url('/logout') }}">Logout</a>
                </div>          
                @else
                <div class="login guest">
                    <a href="{{ url('/login') }}">Login</a>
                </div>
                @endif
            </div>
        @endif
        Copyright &copy; {{ date('Y')}}. Sam Vicki Young
    </div>
    
    <script>
        $('#accesscontent').click(function(){
            $('html, body').animate({
                scrollTop: $( $(".navcontent")).offset().top
            }, 500);
            return false;
        });
    </script>
    </body>
</html>
