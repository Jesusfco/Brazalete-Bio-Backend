@extends('structures.app')
@section('styles')
    
@endsection
@section('content')            

            <div class="panel panel-default" id="principal">
                <div class="panel-heading">
                    <div class="row">
                    
                    
                    <h5>Asosiaciones >> Lista</h5>        
                             
                    
                    
                        
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
                            <th>Assosiados</th>
                            <th>Acciones</th>
                        </thead>
                        <tbody>
                        @foreach($users as $n)
                        
                        <tr id="id{{$n->id}}">
                            <td>{{ $n->id }}</td>
                            <td>{{ $n->name }}</td>
                            <td>{{ $n->email }}</td>                            
                            <td>{{ $n->countAssosiations() }}</td>
                            <td>{{ $n->status_view() }}</td>
                            <td>
                                
                                <a href="{{ url('app/asosiaciones/crear/'.$n->id.'') }}" class="btn yellow">Crear </a>                                
                                <a href="{{ url('app/asosiaciones/ver/'. $n->id) }}" class="btn green">Ver</a>
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
