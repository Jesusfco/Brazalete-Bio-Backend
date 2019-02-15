<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{ url('favicon1.ico') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title') || Brazalete Biomedica</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-rc.2/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ url('css/admin/structure.css') }}">
    <link href="{{url('assets/sweet/sweetalert.css')}}" rel="stylesheet">
    @yield('styles')
</head>
<body>
<div id="app">
    {{-- <nav class="black">
        <a class="menuIcon"  id="activeMovMenu">    <i class="fas fa-bars"></i></a>
    </nav> --}}
    <div class="navegation inactive opacity" id="movMenu">

        <div class="background" id="movMenuBackground"></div>

        <div class="movMenuContainer">
            <a href="{{ url('/')}}">
                <img id="logo" src="{{url('img/logo.jpg')}}">
            </a>
            
            
            <div class="links">            
                
                <a href="{{ url('app/usuarios')}}"><p>Usuarios</p></a>                                                    
                <a href="{{ url('app/asosiaciones')}}"><p>Asosiaciones</p></a>
                <a href="{{ url('app/perfil')}}"><p>Mi Perfil</p></a>            
                <a href="{{ url('logout')}}"><p>Cerrar Sesión<p></a>
            </div>

        </div>

    </div>

    <div class="content">
        <div class="margener">

        @yield('content')
        </div>
    </div>

</div>
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-rc.2/js/materialize.min.js"></script>
    <script src="{{url('assets/sweet/sweetalert.min.js')}}"></script>
    <script src="{{ url('js/menu.js') }}"></script>
    <script>let actualUrl = '{{ url()->current() }}';
         $(document).ready(function(){
            $('.tooltipped').tooltip();
        });
    </script>
    <script src="{{url('js/admin/delete.js')}}"></script>
    

    @yield('scripts')
    
</body>
</html>