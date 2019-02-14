@extends('structures.app')

@section('styles')
    <link rel="stylesheet" type="text/css" href="https://code.jquery.com/ui/1.9.1/themes/smoothness/jquery-ui.css">
@endsection

@section('content')  

    <h5><a href="{{ url('app/asosiaciones') }}">Asosiaciones</a> >> Asosiaciones de {{$user->name }}</h5>   

    @if(count($user->assosiations) == 0)

        <h3 class="center-align">Este Usuario no cuenta con asosiaciones</h3>

    @else

    <table class="striped responsive-table">
            <thead>
                <th>#</th>
                <th>Nombre</th>
                <th>Correo</th>
                
                <th>Tipo</th>
                <th>Status</th>
                <th>Permiso de Monitoreo</th>
                <th>Acciones</th>
            </thead>
            <tbody>
            @foreach($user->assosiations as $index => $n)
            
            <tr id="id{{$n->id}}">
                <td>{{ $index + 1 }}</td>
                <td>{{ $n->assosiated->name }}</td>
                <td>{{ $n->assosiated->email }}</td>                            
                <td>{{ $n->assosiated->user_type_view() }}</td>
                <td>{{ $n->assosiated->status_view() }}</td>
                <td>{{ $n->confirmedView()}}</td>
                <td>
                    
                    @if($n->confirmed)
                    <a href="{{ URL::current() . "/permission/$n->id" }}" class="btn orange">Cancelar Permiso </a>
                    @else
                    <a href="{{ URL::current() . "/permission/$n->id" }}" class="btn green">Activar Permiso </a>
                    @endif
                    <a  onclick="eliminar({{ $n->id }}, '{{ $n->name }}')" class="btn red"> Eliminar Asosiacion</a>
                    
                </td>
            </tr>
            
            @endforeach
        </tbody>
        </table>

    @endif

@endsection

@section('scripts')        

    @if(Session::has('msj'))

    <script>
        M.toast({html: '{{ Session::get("msj") }}', classes: 'rounded'});
    </script>
        

    @endif

@endsection