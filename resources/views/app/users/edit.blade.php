@extends('structures.app')
@section('styles')
    
@endsection
@section('content')  

<h5><a href="{{ url('url/usuarios') }}">Usuarios</a> >> Editar Usuario</h5>   

<form class="row" action="" method="POST">
        {{ csrf_field() }}
    <div class="col l6 s12">
        <label>Nombre Completo:</label>
        <input type="text" name="name" value="{{ $user->name}}" required>
    </div>

    <div class="col l6 s12">
        <label>Correo:</label>
    <input type="email" name="email" value="{{ $user->email}}" required>
    </div>

    <div class="col l6 s12">
        <label>Contraseña:</label>
        <input type="password" name="password">
    </div>

    <div class="col l6 s12">
        <label>Telefono:</label>
        <input type="tel" name="phone" value="{{ $user->phone}}" required>
    </div>

    <div class="col l6 s12">
        <label>Tipo de Usuario:</label>
        <select name="user_type">                
            <option value="{{ $user->user_type}}">{{ $user->user_type_view() }}</option>
            <option value="1">Hijos</option>
            <option value="2">Padres</option>
            <option value="3">Externos</option>
            <option value="4">Administrador</option>
        </select>
              
    </div>

    <div class="col l6 s12">
        <label>Status:</label>
        <select name="status">                
            <option value="{{ $user->status}}">{{ $user->status_view() }}</option>
            <option value="1" selected>Activo</option>
            <option value="0">Inactivo</option>            
        </select>
        
    </div>

    <button class="btn  green">Actualizar Usuario</button>
</form>


@endsection

@section('scripts')
<script> $(document).ready(function(){
        $('select').formSelect();
      });</script>    

    @if(Session::has('msj'))

    <script>
        M.toast({html: '{{ Session::get("msj") }}', classes: 'rounded'});
    </script>
        

    @endif

@endsection