@extends('structures.app')

@section('styles')
    <link rel="stylesheet" type="text/css" href="https://code.jquery.com/ui/1.9.1/themes/smoothness/jquery-ui.css">
@endsection

@section('content')  

<h5><a href="{{ url('app/asosiaciones') }}">Asosiaciones</a> >> Editar Usuario</h5>   

<h5>Crear nueva asosiacion para: {{ $user->name }}</h5>
<form class="row" action="" method="POST" onsubmit="return validateForm()">
        {{ csrf_field() }}
    <div class="col l12 s12">
        <label>Buscar Usuarios a Relacionar:</label>
        <input class="autocomplete" id="search" type="text" required>
        <input type="hidden" name="assosiated_id" id="assosiated_id" required>
    </div>

    

    <button class="btn  green">Relacionar Usuarios</button>
</form>


@endsection

@section('scripts')
    
    <script> 

        $(document).ready(function(){
            $('select').formSelect();
        });

    </script>    

    @if(Session::has('msj'))

    <script>
        M.toast({html: '{{ Session::get("msj") }}', classes: 'rounded'});
    </script>
        

    @endif

    <script src="https://code.jquery.com/ui/1.9.1/jquery-ui.min.js" integrity="sha256-UezNdLBLZaG/YoRcr48I68gr8pb5gyTBM+di5P8p6t8=" crossorigin="anonymous"></script>  
    <script>
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        
  
        function validateForm() {
  
         
  
          let id = $('#assosiated_id').val();
            
          console.log(id);
            if(id == null) {
  
              alert('Seleccione un Usuario de las sugerencias');
              return false;
  
            } else {
  
              return true;
  
            }         
  
        }      
            
  
    let sugest = [];
  
    $(document).ready(function() {
  
      let link = "{{ url('app/asosiaciones/sugest')}}";			
  
      $('#search').autocomplete({
  
        source: function(request, response) {
  
          $.ajax({
            method: 'GET',
            url: link,
            dataType: "json",
            data: {term: request.term },
  
            success: function(data) {
              console.log(data);
              
  
              let works = [];
              for(let d of data) {
                works.push({value: d.name, data: d.id});
              }
              
  
              response(works);
            }
  
          });
  
        }, // another stuff
  
        minLength: 3,
        select: function(event, ui) {
          
          $('#assosiated_id').val(ui.item.data);
          
        }
  
      });
  
    });      
    
  
    
  </script>

@endsection