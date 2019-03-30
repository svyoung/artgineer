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
        <link href="https://fonts.googleapis.com/css?family=Karla|Open+Sans|Open+Sans+Condensed:300|Source+Code+Pro" rel="stylesheet">
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
    </header>
    <div class="hamburger-menu" onclick="svyglobal.fn.showMobileMenu(this)"></div>
    <nav class="navcontent">
        <div>
            <ul class="menu">
                <li data-section="about-me">_About</li>
                <li data-section="resume">_Resume</li>
                <li data-section="projects">_Projects</li>
                <li data-section="contact">_Contact</li>
            </ul>
            <ul class="social">
                <li><a href="https://www.linkedin.com/in/samisoam" target="_blank"><i class="fab fa-linkedin"></i></i></a></li>
                <li><a href="https://github.com/svyoung" target="_blank"><i class="fab fa-github"></i></a></li>
                <li><a href="mailto:truong.vee@gmail.com" target="_blank"><i class="fa fa-envelope fa-fw"></i></a></li>
            </ul>
        </div>
    </nav>


    <div class="container">
        <section id="front-intro">
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
        <section id="about-me">
            <div class="about-container">
                <h1>> About</h1>
                <div class="about-wrapper">
                    <div class="about-image"></div>
                    <p>Hello and welcome to my humble virtual abode. My name is Sam and I am a software developer specializing in the web. I started out as a front end designer when I was 12 and decided to learn HTML and CSS. I had a further interest in dynamic back end technologies and played around with PHP using Wordpress and now here I am! I am now experienced in front and back end and always looking to learn new skills! Besides web development, I am also skilled in art such as drawing and animation, whether it is traditional or digitial. Please take a look at my resume if you are interested in more!</p>

                    <p>This website was created with Laravel 5+, MySQL as database, and JavaScript for 80% of the featured functionality and is fully responsive. You can find the source in my <a href="http://github.com/svyoung" target="_blank">GitHub</a>. :)</p>
                </div>
            </div>
        </section>
        <section id="resume">
        </section>
        <section id="projects">
            <div class="projects-container">
                <h1>> Projects</h1>
                <div class="projects-content">
                    <div>
                        <i class="fas fa-tools"></i>
                    </div>
                    <div>
                        <p>Hi there! Sadly, this portion is under construction. Yes yes this is the most important section too! I am sorry for the inconvenience and will get this up ASAP. In the meantime, please go to my <a href="https://github.com/svyoung" target="_blank">Github</a> to check out what I've been working on. </p>
                    </div>
                </div>
            </div>
        </section>
        <section id="contact">
            <div class="contact-container">
                <h1>> Contact</h1>
                <div class="contact-content">
                    I am always open for new projects and ideas. Currently I am interested in remote opportunities and roles that are heavier on data-driven and full stack development. If you think there might be a fit somewhere, feel free to drop me a note! Besides business inquries and you think I am awesome, I'd love to hear about that too!
                    <a class="contact-button" href="mailto:truong.vee@gmail.com">Email Sam</a>
                </div>
            </div>
        </section>


        <section id="footer">
            <ul class="social">
                <li><a href="https://www.linkedin.com/in/samisoam" target="_blank"><i class="fab fa-linkedin"></i></i></a></li>
                <li><a href="https://github.com/svyoung" target="_blank"><i class="fab fa-github"></i></a></li>
                <li><a href="mailto:truong.vee@gmail.com" target="_blank"><i class="fa fa-envelope fa-fw"></i></a></li>
            </ul>
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
            Copyright &copy; {{ date('Y')}}. Sam Vicki Young
        </section>
    </div>
    

    
    <script>

    </script>
    </body>
</html>
