@extends('structures.app')
@section('styles')
    
@endsection
@section('content')  

<h5><a href="{{ url('url/usuarios') }}">Usuarios</a> >> Crear Usuario</h5>   

<form class="row" action="" method="POST">
        {{ csrf_field() }}
    <div class="col l6 s12">
        <label>Nombre Completo:</label>
        <input type="text" name="name" required>
    </div>

    <div class="col l6 s12">
        <label>Correo:</label>
        <input type="email" name="email" required>
    </div>

    <div class="col l6 s12">
        <label>Contraseña:</label>
        <input type="password" name="password" required>
    </div>

    <div class="col l6 s12">
        <label>Telefono:</label>
        <input type="tel" name="phone" required>
    </div>

    <div class="col l6 s12">
        <label>Tipo de Usuario:</label>
        <select name="user_type">                
            <option value="1" selected>Hijos</option>
            <option value="2">Padres</option>
            <option value="3">Externos</option>
            <option value="4">Administrador</option>
        </select>
              
    </div>

    <div class="col l6 s12">
        <label>Status:</label>
        <select name="status">                
            <option value="1" selected>Activo</option>
            <option value="0">Inactivo</option>            
        </select>
        
    </div>

    <button class="btn  green">Crear Usuario</button>
</form>


@endsection

@section('scripts')
<script> $(document).ready(function(){
        $('select').formSelect();
      });</script>    
@endsection