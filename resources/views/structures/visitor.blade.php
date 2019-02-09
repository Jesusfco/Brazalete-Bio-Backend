<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{ url('fav.ico') }}">

    <title>@yield('title')</title>
    
    

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Archivo+Black|Roboto:100,300,400,500,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Anton|Oswald:200,400,600" rel="stylesheet">
    
    {{-- <link href="{{ url('assets/sweet/sweetalert.css') }}" type="text/css" rel="stylesheet" > --}}

    <link rel="stylesheet" type="text/css" href="{{ url('styles/visitor/template.css') }}">
    {{-- <link href="{{ url('css/font-awesome.min.css') }}" rel="stylesheet"> --}}
    @yield('css')

    
</head>
<body>
{{-- 
    <header>

        <div class="container">

            <div>
                <img src="{{ url('images/logo2.png') }}" alt="">
            </div>

            <div class="links pc">
                
                <a href="{{ url('/')}}" id="homeWWW">Inicio</a>
                <a href="{{ url('/luis-guillen')}}" id="luisWWW">Luis Guillén</a>
                <a href="" id="coachWWW">Coach Mental</a>
                <a href="" id="servicesWWW">Servicios</a>
                <a href="{{ url('eventos')}}" id="eventWWW">Eventos</a>
                <a href="{{ url('blog')}}" id="blogWWW">Blog</a>
                <a href="">Contáctame</a>
                <a href="{{ url('login')}}" id="loginWWW">Login</a>
            </div>

            <div class="iconMenuContainer movil" id="activeMovMenu">
                
                <i class="fas fa-bars"></i>
                
            </div>

        </div>

    </header> --}}

    {{-- <div id="movMenu" class="centerElements inactive opacity">
        <div class="background" id="movMenuBackground">

        </div>

        <div class="movMenuContainer">
                                
            <a href="{{ url('/')}}" id="homeWWW">Inicio</a>
            <a  href="{{ url('/luis-guillen')}}" id="luisWWW">Luis Guillén</a>
            <a href="" id="coachWWW">Coach Mental</a>
            <a href="" id="servicesWWW">Servicios</a>
            <a href="{{ url('eventos')}}" id="eventWWW">Eventos</a>
            <a href="{{ url('blog')}}" id="blogWWW">Blog</a>
            <a href="">Contáctame</a>                

        </div>
    </div> --}}
    
    
    @yield('content')
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    
    
    <script> var linkToActivated = "#@yield('activeLink')WWW"; </script>
    {{-- <script src="{{ url('js/visitor/activeLink.js') }}"></script> --}}
    {{-- <script src="{{ url('js/visitor/menu.js') }}"></script> --}}
    @yield('scripts')