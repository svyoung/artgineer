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
        <link href="https://fonts.googleapis.com/css?family=Open+Sans|Open+Sans+Condensed:300|Source+Code+Pro" rel="stylesheet">
        <!-- Stylesheets -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
        <!-- <link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css"> -->
        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/summernote.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="/css/main.css">
  
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
    {{--<div id="introduction-load">--}}
        {{--<div class="intro-container">--}}
            {{--<div class="intro-name">--}}
                {{--<div class="intro-ani intro-sam fadeIn">Sam</div>--}}
                {{--<div class="intro-ani intro-young fadeIn2">Young</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
    <header id="header-main">
        <div id="header-div" onclick="location.href='http://samvyoung.com';">
            <div id="header-text" class="header-floating">
                <span class="text-sam">Sam</span><span class="text-young">Young</span>
            </div>
        </div>

        <div class="hamburger-menu" onclick="svyglobal.fn.showMobileMenu(this)"></div>
        <nav class="navcontent">
            <div>
                <ul class="menu">
                    <li>01<a href="#about-me">About</a></li>
                    <li>02<a onclick="svyglobal.fn.showModal('/resume','#resume')">Resume</a></li>
                    <li>03<a onclick="">Projects</a></li>
                    <li>04<a onclick="svyglobal.fn.showModal('/contact','#contact')">Contact</a></li>
                </ul>
                <ul class="social">
                    <li><a href="https://www.linkedin.com/in/samisoam" target="_blank"><i class="fab fa-linkedin"></i></i></a></li>
                    <li><a href="https://github.com/svyoung" target="_blank"><i class="fab fa-github"></i></a></li>
                    <li><a href="mailto:truong.vee@gmail.com" target="_blank"><i class="fa fa-envelope fa-fw"></i></a></li>
                </ul>
            </div>
        </nav>
    </header>



    <div class="container">
        <section id="about-me">
            <div class="about-intro-text">
                <h1 class="h1_1">Hello and welcome to my page. I'm </h1> <h1 class="h1_2">Sam Young.</h1> <h1 class="h1_3">I'm a software engineer based in California. I build applications on the web and am always looking to step out of my comfort zone to learn and experience new technologies. Currently, I am pretty great at:</h1>
                <ul class="tech-stack">
                    <li><code>PHP</code></li>
                    <li><code>JavaScript</code></li>
                    <li><code>Python</code></li>
                    <li><code>HTML5</code></li>
                    <li><code>CSS3</code></li>
                    <li><code>Node</code></li>
                    <li><code>SQL</code></li>
                    <li><code>NoSQL</code></li>
                    <li><code>React</code></li>
                    <li><code>Symfony</code></li>
                    <li><code>Laravel</code></li>
                    <li><code>Django</code></li>
                </ul>
                <h1 class="h1_3">While this website is mainly a display of my technical skillset, I am also storing some of my more creative works -- drawings, and maybe, MAYBE in the future, my romance novels. Feel free to explore and drop me a note if you have inquiries.</h1>
            </div>
        </section>
        <section id="resume">
        </section>
        <section id="projects">
        </section>

        <!-- main content -->
        <div class="main row" id="mainblog">
            @yield('content')
        </div>

        {{--<div class="footer">--}}
            {{--@if (Route::has('login'))--}}
                {{--<div class="authenticate">--}}
                    {{--@if (Auth::check())--}}
                        {{--<div class="login authenticated">--}}
                            {{--Hi {{ Auth::user()->name }}! <a href="{{ url('/logout') }}">Logout</a>--}}
                        {{--</div>--}}
                    {{--@else--}}
                        {{--<div class="login guest">--}}
                            {{--<a href="{{ url('/login') }}">Login</a>--}}
                        {{--</div>--}}
                    {{--@endif--}}
                {{--</div>--}}
            {{--@endif--}}
            {{--Copyright &copy; {{ date('Y')}}. Sam Vicki Young--}}
        {{--</div>--}}
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
