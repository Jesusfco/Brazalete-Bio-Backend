@extends('structures.visitor')

@section('title', 'Login || Brazalete Biomedica')
@section('activeLink', 'login')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ url('css/visitor/login.css') }}">    
@endsection

@section('content') 

<div class="cardSpace" style="background-image: url({{ url('img/login.jpg') }})">



        <div class="loginCardModule">
            <h2 id="bienvenida">INICIA SESIÓN</h2>
    
            <img id="logo" src="{{url('img/logo.jpg')}}">
    
            <br>
    
    
    
            <div id="formSpace">
    
                <form method="POST" action="">
                    
                    {{ csrf_field() }}
    
                    <input name="email" type="email" placeholder="Correo" #focus><br>    
                    <input  name="password" type="password" placeholder="Contraseña"><br>        
    
                    <button type="submit" class="btn black">Iniciar sesión</button>
                    
    
                </form>
    
                <p>¿Olvidaste tu Contraseña?</p>
    
                <a href="{{ url('/auth/facebook') }}" class="btn btn-facebook"><i class="fa fa-facebook"></i> Facebook</a>
            </div>
    
    
        </div>
    </div>    
    
@endsection