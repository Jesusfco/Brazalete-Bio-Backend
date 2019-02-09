@extends('structures.app')
@section('styles')
    
@endsection
@section('content')            

<a href="{{ url('app/usuarios/crear') }}"
data-position="left" data-tooltip="Agregar Nuevo Uusario"
    class="btn-floating btn-large orange newBtn tooltipped">
    <i class="material-icons">add</i>
    </a>   
            <div class="panel panel-default" id="principal">
                <div class="panel-heading">
                    <div class="row">
                    
                    
                    <h5>Usuarios >> Lista</h5>        
                             
                    
                    
                        
                    <form method="GET" class="navbar-form">
                         <div class="input-group">
                            <input name="name" class="form-control" placeholder="Buscar Usuario" autofocus>
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="button">Buscar</button>
                            </span>
                        </div>
                    </form>     
                        
                    </div></div>
                    
                    
                </div>
                
                
                    <table class="striped responsive-table">
                        <thead>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Correo</th>
                            
                            <th>Tipo</th>
                            <th>Status</th>
                            <th>Acciones</th>
                        </thead>
                        <tbody>
                        @foreach($users as $n)
                        
                        <tr id="noticia{{$n->id}}">
                            <td>{{ $n->id }}</td>
                            <td>{{ $n->name }}</td>
                            <td>{{ $n->email }}</td>                            
                            <td>{{ $n->user_type_view() }}</td>
                            <td>{{ $n->status_view() }}</td>
                            <td>
                                
                                <a href="{{ url('app/usuarios/editar/'.$n->id.'') }}" class="btn yellow">Editar </a>
                                <a  onclick="eliminar({{ $n->id }}, '{{ $n->name }}')" class="btn red"> Eliminar</a>
                                <a href="{{ url('app/usuarios/ver/'. $n->id) }}" class="btn green">Ver</a>
                            </td>
                        </tr>
                        
                        @endforeach
                    </tbody>
                    </table>
                
                <center>
                    {{ $users->links() }}
                </center>

            </div>

            

@endsection

@section('scripts')
    
@endsection
