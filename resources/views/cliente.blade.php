@extends('layouts.app')


@section('content')
   
<style>

a.editable-click {
  color: green;
  border-color: green;
} 
a.editable-click.editable-disabled {
  color: black;  
  border-bottom: none;
}
a.editable-empty {
  color: gray;
  font-style: italic;
}

/*

thead {
  display:none;
}

*/

</style>
 
    <!-- Content Header (Page header) -->
    <br>


<div class="container-fluid">

<div class="row">

        <!--
          <div class="col-sm-6">
            <h1 class="m-0">Clientes</h1>
          </div><!-- /.col -->
        
          <!--

          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Clientes</li>
            </ol>
          </div><!-- /.col -->
       
        


   
    </div>
 

  

<div class="row">
<div class="col-lg-8">
        <div class="card card-light" id="card_mascotas">
              <div class="card-header" >
                <h3 class="card-title"><span  style="color:#28a745;"
                    class="fas fa-paw mr-3"></span>Mascotas registradas</h3>
              </div>
              


 <div class="card-body">
              
<!-- ==========================

DATATABLE MASCOTAS

============================== -->
     
@foreach($id_clientes as $id_cliente)
          
 @endforeach


  
 <div class="row">
   <div class="col-lg-12">
           
             
               <table id="Table_mascotas" class="table dt-responsive table-hover" style="width:100%">
                   <thead>
                      <tr>
                                        
                         <th>Mascota</th>
                         <th>Especie</th>
                         <th>Raza</th>
                         <th>Edad</th>
                         <th></th>
                      </tr>

                  </thead>

                        <tbody>
                       
                        </tbody>    

                   
              </table>
  
               
          
        
        </div> 
       </div>

        

               <input type="hidden" id="id_cliente" name="id_cliente" value="{{ $id_cliente->id_cliente }}" >  
                 <br>
                 <br>

                 <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarMascotas">
                   <span class="fa fa-plus-square fa-fw" ></span> Agregar mascota</button>

         
             
             </div>
             </div> 
          
              <!-- /.card-body -->
          </div>
          <!-- /.card -->

      
          <!-- /.col (left) -->
          <div class="col-md-4">
            <div class="card card-light">
              <div class="card-header">
                <h3 class="card-title">
                <span                    
                    style="color:#28a745;"
                    class="fas fa-user mr-3"></span>Datos del cliente</h3>
                    <h4  style="text-align: center;">
                          <div class="dropdown ml-auto">
                                  <button class="btn btn-light btn-sm dropdown-toggle" type="button"
                                          id="dropdownMenu" data-toggle="dropdown" aria-haspopup="true"
                                          aria-expanded="false">
                                    ☰
                                  </button>
                                  <div class="dropdown-menu" aria-labelledby="dropdownMenu">
                                    
                                      <button class="dropdown-item" type="button"
                                              id="btn_eliminarCliente">Eliminar cliente
                                      </button>
                                    
                                 </div>
                         </div>
                  </h4>
              </div>
              <div class="card-body">
                <!-- Date -->
                <div class="form-group">
                <table class="table">
                      <tbody  style="font-size:95%;">

           
                      <tr style="display:none;">
                     
                      <td>
                          <div class="control-label">Id_cliente</div>
                          <a href="#" id="id_cliente">{{ $id_cliente->id_cliente }}</a></td>
                      </tr>

                      <tr style="display:none;">
                     
                     <td>
                       <div class="control-label">Cédula</div>
                       <a href="#" id="cedula"">{{ $id_cliente->cedula }}</a></td>
                    </tr>
                    <span id="navbar_estado"></span>
                      <tr>
                        <td>
                        <div class="control-label">Nombre</div>
                          <a href="#" class="xedit" data-type="text"  data-pk="{{$id_cliente->id_cliente}}"  data-name="nombre">
		                    	   {{$id_cliente->nombre}}</a>
                          <a class=" ml-3 allign-middle" id="nombre" href=""></a>
                        </td>
                      </tr>
                     
                      <tr>
                        <td>
                          <div class="control-label">Celular</div>
                          <a href="#" class="xedit" data-type="text" data-pk="{{$id_cliente->id_cliente}}"  data-name="celular">{{ $id_cliente->celular }}</a>
                          <a class=" ml-3 allign-middle" id="celular" href=""></a>
                      </tr>
                      <tr>
                        <td>
                        <div class="control-label">Email</div>
                          <a href="#" class="xedit" data-type="text" data-pk="{{$id_cliente->id_cliente}}" data-name="email">{{ $id_cliente->email }}</a>
                          <a class=" ml-3 allign-middle" id="email" href=""></a>
                        </td>
                      </tr>
                      <tr>
                        <td>
                        <div class="control-label">Dirección</div>
                          <a href="#" class="xedit" data-type="text" data-pk="{{$id_cliente->id_cliente}}" data-name="direccion">{{ $id_cliente->direccion }}</a>
                          <a class=" ml-3 allign-middle" id="direccion" href=""></a>
                      </tr>
                      <tr>
                        <td>
                        <div class="control-label">barrio</div>
                          <a href="#" class="xedit" data-type="text" data-pk="{{$id_cliente->id_cliente}}" data-name="barrio" id="barrio">{{ $id_cliente->barrio }}</a>
                          <a class=" ml-3 allign-middle" id="barrio" href=""></a>
                      </tr>
                      <tr>
                     
                      <tr>
                        <td>
                        
                        <button class="btn btn-primary" data-toggle="modal" data-target="#modalEditarCliente" style="text-align:left"><span class="fa fa-edit fa-fw" tabindex="3"></span> Editar cliente</button>
                     <!--   <button class="btn btn-primary" data-toggle="modal" data-target="#modalEditarCliente" onclick="editarCliente();" >
                         <span class="fa fa-edit fa-fw" ></span> Editar datos </button>  -->
                        </td>
                      <tr>
                     
                     </tbody>
                      
                    </table>

                      

                                  
                

                <!-- /.form group -->
              </div>
             
              <!-- /.card-body -->
            </div>
            </div>
            </div>          
            <!-- /.card -->
 </div><!-- /.container-fluid -->



 <!--=====================================

    MODAL AGREGAR MASCOTAS

======================================-->

<div class="modal fade" id="modalAgregarMascotas" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    

              <div class="modal-dialog modal-lg">
                
                <div class="modal-content">
                
                    <div class="modal-header">
                  
                    <h5 class="modal-title"><span style="color:#28a745;" class="fas fa-paw mr-3"></span>Agregar mascota</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">  <span aria-hidden="true">&times;</span>
                    
                      </button>
                  
                  </div>
              
                    <div class="modal-body">
              
              
                    <form method="POST" id="form_crear_mascotas" action="{{ url('/mascotas') }}" >
                    
              
              <!--   <input type="hidden" name="_token" value="{{csrf_token()}}">  -->
          
              
              
                        <div class="row">
              
                          <div class="col-md-5">
              
                            <div class="form-group">
              
                              <label for="mascota" class="control-label">mascota</label>
              
              
                              <input type="text" name="nombre" class="form-control text-capitalize" id="nombreMascota" autofocus required autocomplete="off">
              
                            
                              <div class="alert-message" id="mascotaError"></div>
                                
                            </div>
              
                          </div>
              
              
              
                          <div class="col-md-3">
              
                            <div class="form-group">
              
                              <label for="Especie" class="control-label">Especie</label>
              
                              <select class="form-control text-capitalize" name="especie" id="especie" onkeypress="return handleEnter(this, event)" required>
                        
                                  <option value="Canino" selected="selected">Canino</option>
              
                                  <option value="Felino">Felino</option>
                                  <option value="Hamster">Hamster</option>
                                  <option value="Ave">Ave</option>
                                  <option value="Otro">Otro</option>
              
                              </select> 
              
                                <div class="alert-message" id="especieError"></div>
                              
                            </div>
                          </div>
              
              
              
              
                          <div class="col-md-4">
                            <div class="form-group">
              
                              <label for="raza" class="control-label">Raza</label>
              
                              <input type="text" name="raza" class="form-control text-capitalize" id="raza" required autocomplete="off">
                              
                                <div class="alert-message" id="razaError"></div>
                                          
                              </div>
                          </div>
              
                          
                          <div class="col-md-3">
              
                              <div class="form-group">
              
                                <label for="genero" class="control-label">Genero</label>
              
              
                                <select class="form-control text-capitalize" name="sexo" id="sexo"  required>
                                  <option value="" selected="selected" style='color: #cccccc'>Seleccionar opción</option>
              
                                  <option value="Macho">Macho</option>
                                  <option value="Hembra">Hembra</option>
              
              
              
                                </select>
              
              
                                <div class="alert-message" id="sexoError"></div>
              
                              </div>
                        </div>
              
              
              
                          <div class="col-md-2">
              
                              <div class="form-group">
              
                                <label for="edad" class="control-label">Edad</label>
              
                                <input type="text" name="edad" class="form-control text-capitalize" id="edad" value=" Años" required onkeypress="return isNumber(event)">
              
                                  <div class="alert-message" id="edadError"></div>
              
                              </div>
              
                          </div>
              
              
                      
              
                          <div class="col-md-2">
              
                            <div class="form-group">
              
                              <label for="color" class="control-label">Color</label>
              
                              <input type="text"  id="color" name="color"  class="form-control text-capitalize" required autocomplete="off">
              
                              <div class="alert-message" id="colorError"></div>
              
                            </div>
                          </div>
              
              
                          <div class="col-md-2">
              
                              <div class="form-group">
              
                                <label for="peso" class="control-label">Peso</label>
              
                                <input type="text"  id="peso" name="peso" value=" Kgrs" class="form-control text-capitalize" required autocomplete="off">
              
                                <div class="alert-message" id="pesoError"></div>
              
                              </div>
              
                          </div>
              
              
                        
                          <div class="col-md-3">
              
                            <div class="form-group">
              
                              <label for="esterilizado" class="control-label"></label>
              
                            
                              <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="esterilizado">
                                <label class="form-check-label" for="esterilizado">
                                  Esterilizado/a
                                </label>
                              </div>
              
              
                              <div class="alert-message" id="esterilizadoError"></div>
              
                            </div>
                          
                          </div>
              
              
              
              
              
              
                          <div class="col-md-12">
              
                            <div class="form-group">
              
                              <label for="caracteristicas" class="control-label">Características</label>
              
                              <input type="text" name="caracteristicas" class="form-control" id="caracteristicas" autocomplete="off">
                
                                <div class="alert-message" id="caracteristicasError"></div>
              
                            </div>
              
              
                            <div class="col-md-12">
              
                                <div class="form-group">
              
                                  <label for="foto" class="control-label">Foto</label>
              
                                  <input type="text" name="foto" class="form-control" id="foto" value="images/img_1.jpg" autocomplete="off">
              
                                  <div class="alert-message" id="caracteristicasError"></div>
              
                                </div>
              
                          </div>
              
                                          
                        </div>
              
                  
              
              </div>
              
              
              
              
                        <!-- 
              <div class="form-group">
              <label for="end" class="col-sm-2 control-label">Fecha final</label>
              
              -->
                    
              
                  <input type="hidden" name="userId" class="form-control" id="userId" value="{{ Auth::user()->id }}" readonly>  
              
                  <input type="hidden" name="id_cliente" class="form-control" id="id_cliente" value="{{ $id_cliente->id_cliente }}" readonly>  
                    
              
                    <!--     
              
              <div id="enlace_listado">  
                        
              <p><a href="crearClientes.php"><i class="fa fa-user fa-2x"></i>&nbsp; Crear cliente nuevo</a>   </p> 
                        
              </div>
              
              -->
        
                <div class="modal-footer">
        
                <button type="submit" id="agregar_mascota" name="agregar_mascota" class="btn btn-primary">Guardar</button>
                <button type="button" id="salir" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        
                </div>

            </div>
          </div>
        </div>
        
    </form>
   </div>
       
 </div>
        
 
 

 
 <!--=====================================

    MODAL EDITAR CLIENTE

======================================-->

<div class="modal fade" id="modalEditarCliente" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    


            <div class="modal-dialog modal-lg">
              
              <div class="modal-content">
              
              <div class="modal-header">
                
                  <h5 class="modal-title"><span style="color:#28a745;" class="fas fa-edit mr-3"></span>Cambiar datos del cliente</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  
                        <span aria-hidden="true">&times;</span>
                  
                    </button>
                
                  </div>
            
                  <div class="modal-body">
            
            
                    <form method="POST" id="form_editar_cliente" action="{{ url('/editarCliente/id_cliente') }}" >
            
                  <!--  <input type="hidden" name="_token" value="{{csrf_token()}}">   -->
                   
                    <input type="hidden" name="id_cliente" class="form-control" id="id_cliente" value="{{$id_cliente->id_cliente}}" autofocus required autocomplete="off">

            
                      <div class="row">
            
                        <div class="col-md-3">
            
                          <div class="form-group"  >
            
                            <label for="Cedula" class="control-label">Cédula</label>
            
            
                            <input type="number" name="cedula" class="form-control" id="cedula" value="{{$id_cliente->cedula}}" autofocus required autocomplete="off">
            
                          
                            <div class="alert-message" id="cedulaError"></div>
                              
                          </div>
            
                        </div>
            
            
            
                        <div class="col-md-5">
            
                          <div class="form-group">
            
                            <label for="Nombre" class="control-label">Nombre</label>
            
                            <input type="text" name="nombre" class="typeahead form-control text-capitalize" id="nombre" value="{{$id_cliente->nombre}}" 
                             required autocomplete="off">
            
                              <div class="alert-message" id="nombreError"></div>
                            
                          </div>
                        </div>
            
            
            
            
                        <div class="col-md-4">
                          <div class="form-group">
            
                            <label for="telefono" class="control-label">Tel/Cel.</label>
            
                            <input type="text" name="celular" class="form-control" id="celular"  value="{{$id_cliente->celular}}"  required autocomplete="off">
                            
                              <div class="alert-message" id="celularError"></div>
                                        
                            </div>
                        </div>
            
            
                        <div class="col-md-8">
            
                            <div class="form-group">
            
                              <label for="direccion" class="control-label">Dirección</label>
            
                              <input type="text" name="direccion" class="form-control text-capitalize" id="direccion"  value="{{$id_cliente->direccion}}" 
                              required onkeypress="return isNumber(event)">
            
                                <div class="alert-message" id="direccionError"></div>
            
                            </div>
            
                        </div>
            
            
               
                      
            
                        <div class="col-md-4">
            
                          <div class="form-group">
            
                            <label for="barrio" class="control-label">Barrio</label>
            
                            <input type="text"  id="barrio" name="barrio"  class="form-control text-capitalize"  value="{{$id_cliente->barrio}}" 
                             required autocomplete="off">
            
                            <div class="alert-message" id="barrioError"></div>
            
                          </div>
                        </div>
            
            
            
                        <div class="col-md-12">
            
                          <div class="form-group">
            
                            <label for="email" class="control-label">Email</label>
            
                            <input type="email" name="email" class="form-control" id="email"  value="{{$id_cliente->email}}"  autocomplete="off">
              
                              <div class="alert-message" id="emailError"></div>
            
                          </div>
                        </div>
            
                      </div>
            
            
            
            
                      <!-- 
            <div class="form-group">
            <label for="end" class="col-sm-2 control-label">Fecha final</label>
            
            -->
                  
            
                <input type="hidden" name="userId" class="form-control" id="userId" value="{{ Auth::user()->id }}" readonly>  
                  
            
                  <!--     
            
            <div id="enlace_listado">  
                      
            <p><a href="crearClientes.php"><i class="fa fa-user fa-2x"></i>&nbsp; Crear cliente nuevo</a>   </p> 
                      
            </div>
            
            -->
            
                  <div class="modal-footer">
            
                    <button type="submit" id="editar_cliente" name="editar_cliente" class="btn btn-primary">Guardar</button>
                    <button type="button" id="salir" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            
                  </div>
            
                </div>
              </div>
            </div>
            
        </form>
   </div>
        
        
</div>
                



<!--  =======================================

MODAL TRASPASAR MASCOTA A OTRO CLIENTE

============================================-->

<div class="modal" id="modalTraspasarMascota" class="modal fade" role="dialog" style="overflow:hidden;">


  <div class="modal-dialog">

    <div class="modal-content">

      <div class="modal-header">

      
        <h5 class="modal-title"><span style="color:#28a745;" class="fas fa-paw mr-3"></span>Traspasar mascota a otro propietario</h5>
        
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">

          <span aria-hidden="true">&times;</span>

        </button>
      </div>

      <div class="modal-body">
       
                 @if (session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                 @endif
                        
                    <form method="POST" id="form_lista_espera" action="{{ url('/ajax-autocomplete-search') }}" >
                    
              
                <!-- <input type="hidden" name="_token" value="{{csrf_token()}}"> -->
          
              
              
                <div class="row">

                     <div class="col-6">

                              <div class="form-group">
                                                         
              
                                <select class="selectBuscarCliente"  name="selectBuscarCliente" id="selectBuscarCliente" style="width:100%;" required>   </select>
                                   
                     
              
                              </div>
                        </div>


      </div>
      <div class="modal-footer">

         <button type="button" class="btn btn-primary">Guardar</button>

         <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        

        </form>
       </div>  
     </div>
  </div>
</div>



<!-- ========================================

MOSTRAR SPINNER AL CARGAR PAGINA

========================================== -->


<script type="text/javascript">

$(window).on('load', function () {
      setTimeout(function () {
    $(".loader-page").css({visibility:"hidden",opacity:"0"})
  }, 1000);
     
});
</script>






<!-- =======================================

DESHABILITAR CLICK DERECHO

============================================ -->

<script>

$(document).ready(function () {
   $("body").on("contextmenu",function(e){
     return false;
   });
});

</script>



<!-- ==========================================

DESHABILITAR TECLAS CRTL, U, F12

===============================================  -->

<script type="text/javascript">
   $(document).keydown(function (event) {
    if (event.keyCode == 123) { 
        return false;
    }
});
</script>



<!-- ========================================== 

DETERMINAR VALOR DE CHECKBOX ESTERILIZADO

=============================================== -->

<script>

$('#esterilizado').on('click', function(event) {
    event.preventDefault();
    
    $.ajax({
        url: '/tasks/change-status',
        method: 'POST',
        data: {
            task: {
                id: yourId,
                status: true
            }
        }
    }).done(function(data) {
        //If using the controller above you this should spit out the task model in JSON so you can easily use it within your scripts here
    });
});


</script>






<script type="text/javascript">

let today = new Date();


 $('#clock').countdown('2022/07/21')
.on('update.countdown', function(event) {
 // var format = '%H:%M:%S';
  if(event.offset.totalDays > 0) {
    format = 'Falta' +' ' +  '%-d día' +' '+'para vencer el periodo ';
  }
/*
  if(event.offset.weeks > 0) {
    format = '%-w semana%!w ' + format;
  }
*/

  $(this).html(event.strftime(format));
})
.on('finish.countdown', function(event) {
  $(this).html('El periodo de prueba ha terminado!')
    .parent().addClass('disabled');

});
</script>





 <!-- =========================================

 MOSTRAR MASCOTAS

==============================================  -->



<script type = "text/javascript" >
  
  $(document).ready(function() {

     $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


    let id =$('#id_cliente').val();
 

    let table =  $('#Table_mascotas').DataTable({
  
           processing: true,
           serverSide: true,
           paging: false,
           info: false,
           filter: false,
           responsive: true,
           autoWidth: false,
    
          
           type: "GET",

           ajax: '/listado_mascotas/'+id,
   
   
                 
           columns: [
                   
                  
                    { data: 'nombre', name: 'nombre' },         
                    { data: 'especie', name: 'especie' },     
                    { data: 'raza', name: 'raza' },
                    { data: 'edad', name: 'edad' },
                   
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                 ],
        
                   order: [[0, 'desc']],
    
             "language": {
                
              /*  "processing": '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading..n.</span> ',  */
                           
                "emptyTable": "El cliente no tiene mascotas registradas."
                    
                },
       
     
      
    });


//==================================================

// AGREGAR MASCOTA

// ==================================================




$('#form_crear_mascotas').off('submit').on('submit', function (event) {

$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});


/* Configurar botón submit con spinner */

let btn = $('#agregar_mascota') 
    let existingHTML =btn.html() //store exiting button HTML
    //Add loading message and spinner
    $(btn).html('<span class="spinner-border spinner-border-sm mr-2" role="status" aria-hidden="true"></span>Procesando...').prop('disabled', true)

    setTimeout(function() {
      $(btn).html(existingHTML).prop('disabled', false) //show original HTML and enable
    },5000) //5 seconds

        $('#agregar_mascota').attr('disabled', true);

        event.preventDefault();

        try {

        $.ajax({
            url: "/mascotas",
            method: "POST",
            data: $(this).serialize(),
            dataType: "json",
            success: function(data) {

              table.ajax.reload();
               
               
                $('#form_crear_mascotas')[0].reset();
                $('#modalAgregarMascotas').modal('hide');
                                                      

                toastr["success"]("Mascota creada correctamente.");
              


            }

         });

        } catch(e) {
          toastr["danger"]("Se ha presentado un error.");
          }

    });






// ======================================= 

//  ELIMINAR MASCOTA 

// ========================================= 


$('body').on('click', '.deletePost', function (e) {


  let id = $(this).data("id");

    e.preventDefault();
    
    swal({
            title: "Esta seguro de eliminar?",
            text: "La acción es permanente!",
            type: "warning",
            showCancelButton: !0,
            confirmButtonText: "Si, Eliminar",
            cancelButtonText: "No, cancelar",
            reverseButtons: !0
     
          }).then(function (e) {

            if (e.value === true) {
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

                $.ajax({
                  type: 'delete',
                  url: '/eliminar_mascota/'+id,
                   
                   
                    success: function (data) {

                      if (data) {
                            swal("Registro eliminado correctamente!", data.message, "success");
                            table.ajax.reload();
                         //  $('#table_mascotas').html(data);
                        
                
                        } else {
                            swal("Error!", data.message, "error");
                        }
                    }
                });

            } else {
                e.dismiss;
            }

        }, function (dismiss) {
            return false;
        })

      });

    });




 /*

 let id = $(this).data("id");

e.preventDefault();

      $.ajax({
          type: 'delete',
          url: '/eliminar_mascota/'+id,
                
                  
          success: function (data) {

            table.ajax.reload();
            toastr["success"]("Mascota eliminada correctamente.");
            
          }
      });

    
  });


});

*/


</script>



<!--

<script type="text/javascript">
   
   $(document).ready(function() {

    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

     $('#form_crear_mascotas').on('submit', function(event) {

     event.preventDefault();

 
/* Configurar botón submit con spinner */

        let btn = $('#agregar_mascota') 
        let existingHTML =btn.html() //store exiting button HTML
        //Add loading message and spinner
        $(btn).html('<span class="spinner-border spinner-border-sm mr-2" role="status" aria-hidden="true"></span>Procesando...').prop('disabled', true)

        setTimeout(function() {
          $(btn).html(existingHTML).prop('disabled', false) //show original HTML and enable
        },5000) //5 seconds


             
        $('#mascotaError').text('');
        $('#especieError').text('');
        $('#razaError').text('');
        $('#sexoError').text('');
        $('#colorError').text('');
        $('#pesoError').text('');
        $('#esterilizadoError').text('');
        $('#caracteristicasError').text('');
                 
            $.ajax({
              url: "/mascotas",
              method: "POST",
              data: $(this).serialize(),
              dataType: "json",
              success: function(data) {

           
                 /* 
                    
                var trHTML = '';
                  $.each(data, function (key,value) {
                    trHTML += 
                        '<tr><td style="display:none">' + value.id_cliente + 
                        '</td><td>' + value.especie + 
                        '</td><td>' + value.raza + 
                        '</td><td>' + value.edad + 
                      
                        '</td></tr>';     
                  });

                    $('#table_mascotas #lista_mascotas').append(trHTML);

                */
                   
              
                  location.reload(true);

              //  $('#table_mascotas').html(data);
                
                                      
                            
                    
                        $('#form_crear_mascotas')[0].reset();
                        $('#modalAgregarMascotas').modal('hide');
                     //   $('#agregar_cliente').attr('disabled', true);

                    // $('#table-body').html(data);
                       
                        toastr["success"]("los datos se han guardado correctamente");

            
                        
                          

                  },

                  error: function(response) {
                    $('#mascotaError').text(response.responseJSON.errors.mascota);
                    $('#especieError').text(response.responseJSON.errors.especie);
                    $('#razaError').text(response.responseJSON.errors.raza);
                    $('#sexoError').text(response.responseJSON.errors.sexo);
                    $('#colorError').text(response.responseJSON.errors.color);
                    $('#pesoError').text(response.responseJSON.errors.peso);
                    $('#esterilizadoError').text(response.responseJSON.errors.esterilizado);
                    $('#caracteristicasError').text(response.responseJSON.errors.caracteristicas);
                }



                
              });

          });

      });    

    

  </script>

    -->


<!-- =========================================

EDITAR DATOS DEL CLIENTE
==============================================  -->

<script>
    $(document).ready(function() {
      
      $('#form_editar_cliente').off('submit').on('submit', function (e) {
           
          e.preventDefault();

          //  let id_cliente = $('#id_cliente').val();

           // Update Data

        $.ajaxSetup({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

                      
/* Configurar botón submit con spinner */

        let btn = $('#editar_cliente') 
        let existingHTML =btn.html() //store exiting button HTML
        //Add loading message and spinner
        $(btn).html('<span class="spinner-border spinner-border-sm mr-2" role="status" aria-hidden="true"></span>Procesando...').prop('disabled', true)

        setTimeout(function() {
          $(btn).html(existingHTML).prop('disabled', false) //show original HTML and enable
        },5000) //5 seconds

       

            $.ajax({
               
                url: '/editarCliente/' +id_cliente,
                type: "POST",
                data: $(this).serialize(),
                dataType: "json",

                success: function (data) {
                 // $('#form_editar_cliente')[0].reset();
                  $('#modalEditarCliente').modal('hide');
                  $("#editar_cliente"). attr("disabled", true);
                     //   $('#agregar_cliente').attr('disabled', true);
                        toastr["success"]("los datos se han editado correctamente");
                     
                        location.reload(true);
                },
                error:function(error){
                    console.log(error);
                }
            });
        });

    });

</script>


<!-- =========================================

ELIMINAR DATOS DE MASCOTA

==============================================  -->

<script>

$(document).on('click', '.eliminar_mascota', function (event) {
    event.preventDefault();
     let id = $(this).data('id');
    swal({
            title: "Esta seguro de eliminar?",
            text: "La acción es permanente!",
            type: "warning",
            showCancelButton: !0,
            confirmButtonText: "Si, Eliminar",
            cancelButtonText: "No, cancelar",
            reverseButtons: !0
     
          }).then(function (e) {

            if (e.value === true) {
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

                $.ajax({
                    type: 'post',
                    url: '/eliminar_mascota/' +id,
                    data: {id:id},
                    dataType: 'JSON',
                    success: function (data) {

                      if (data.success === true) {
                            swal("Registro eliminado correctamente!", data.message, "success");
                           location.reload(true);
                         //  $('#table_mascotas').html(data);
                        
                
                        } else {
                            swal("Error!", data.message, "error");
                        }
                    }
                });

            } else {
                e.dismiss;
            }

        }, function (dismiss) {
            return false;
        })
      });

    


</script>






<!-- ================================================

 FUNCIÓN FOCUS PARA PRIMER INPUT modalEditarCliente

 ================================================= -->


 <script>

$(document).ready(function() {
    $('#modalEditarCliente').on('shown.bs.modal', function () {
    $('#cedula').focus();
   // $('#agregar_cliente').attr('enabled','enabled');

  });
});

</script>




<!-- ============================================

 FUNCIÓN LISTADO DE MASCOTAS 

 ================================================ -->

 <script>

/*

function getlist_mascotas() {
      let $card = $('#card_mascotas');
      let $table = $card.find('#Table_mascotas');
      $card.find('.loader_icon').addClass('loader');
      $.getJSON("/listado_mascotas", {id_cliente:id_cliente}, function (data) {
        let list = [];
        $.each(data, function (key, val) {
          list.push(val);
       
        });

      });
    }   

        $table.find('tbody').html(list);
*/

 </script>



<!-- ============================================

 FUNCIÓN ESTADO DE TIEMPO DE PRUEBA DE SOFTWARE

 ================================================ -->


<script>

$(document).ready(function() {


function estado_prueba() {
    let fecha_termino = '2022-05-19';
    let prueba = '0';
    let estado = '1';

    let dias_restantes = diff_days(fecha_termino);
    if (estado == 1) {
      $('#navbar_estado').addClass('text-warning');
      if (prueba == 1) {
        $('#navbar_estado').html('Quedan ' + (30 + dias_restantes) + ' días de prueba');
        $('#navbar_estado').show();
      } else {
        if (dias_restantes <= -25) {
          $('#navbar_estado').html('Quedan ' + (30 + dias_restantes) + ' para desactivación. Haga click para renovar.');
          $('#navbar_estado').addClass('text-danger');
          $('#navbar_estado').show();
        } else if (dias_restantes <= -7) {
          $('#navbar_estado').html('El pago de su plan se encuentra atrasado. Haga click aquí para para renovar.');
          $('#navbar_estado').show();
        }
      }
    } else {
      $('#navbar_estado').html('Su plan se encuentra desactivado, haga click para activar');
      $('#navbar_estado').show();
    }
  }

});

</script>




<!-- ================================= 

RESET SELECT2: selectBuscarCliente

================================= -->


<script>
 $('.selectBuscarCliente').select2({
  //  allowClear: true,
    placeholder: 'Buscar cliente...',
    language: "es",
    minimumInputLength: 3,
    

    
    ajax: {
      
      url: '/ajax-autocomplete-search',

      dataType: 'json',
      delay: 250,

      
      processResults: function(data) {
     
        

         return {
          results: $.map(data, function(item) {
            return {
              text: item.nombre,
              id: item.id_cliente
             
              
             
            }

          
         
            // location.href = '/clientes/' + id
            // window.location.href =('clientes/id');      

            //  window.location.href =('/clientes'+ item['id']);  
          })

          

        };
      
       
        
       
       // $('.selectBuscarCliente').find(':selected').text();

      // $('#selectBuscarCliente :selected').text();

             
      },


      cache: true,

    }

    

  });


</script>





<!-- ============================================

 FUNCIÓN FOCUS PARA PRIMER INPUT ModalCrearMascotas

 ================================================ -->


 <script>

$(document).ready(function() {
    $('#modalAgregarMascotas').on('shown.bs.modal', function () {
    $('#nombreMascota').focus()
  });
});

</script>


<!-- ============================================

 FUNCIÓN Edit

 ================================================ -->


 <script>

/*

$('#edit').on('click', function () {
        let id = $(this).data('id');
         
        // ajax
        $.ajax({
            type:"POST",
            url: '/editarCliente',
            data: { id_cliente: id_cliente },
            dataType: 'json',
            success: function(res){
              $('#ajaxBookModel').html("Edit Book");
              $('#ajax-book-model').modal('show');
              $('#id_cliente').val(res.id_cliente);
              $('#title').val(res.title);
              $('#code').val(res.code);
              $('#author').val(res.author);
           }
        });
    });

*/

</script>




<!--  ============================================

EDIATAR DATOS DE CLIENTES

================================================= -->

<!-- Event -->

<script>

$(document).ready(function() {

  $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
   

$('#cedula').editable({
                mode:'inline',  
                url: 'editarCliente/{id_cliente}',
                title: "Cédula del cliente",
                pk: cliente.id_cliente,
                value: cliente.cedula,
                type: 'text',
                emptytext: 'Sin indicar',
                placement: "right",
                validate: function (value) {
                    if ($.trim(value) == '') {
                        return 'Falta ingresar valores';
                    }
                },
                success: function (response, newValue) {
                    $('#cedula').attr("href", 'Céd:' + newValue);
                }
            });


 

            $('#nombre').editable({
                mode:'inline',  
                url: 'editarCliente/{id_cliente}',
                title: "Cédula del cliente",
                pk: cliente.id_cliente,
                value: cliente.nombre,
                type: 'text',
                emptytext: 'Sin indicar',
                placement: "right",
                validate: function (value) {
                    if ($.trim(value) == '') {
                        return 'Falta ingresar valores';
                    }
                },
                success: function (response, newValue) {
                    $('#nombre').attr("href", 'Nom:' + newValue);
                }
            });



     });


</script>





<!-- ============================================

 FUNCIÓN X-EDITABLE BOOTSTRAP

 ================================================ -->


 <script>


  $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });

 

$.fn.editable.defaults.mode = 'inline';

  $('.nombre').editable({
      url: 'editarCliente/'+id_cliente,
      pk: id,
      type:"text",
      validate:function(value){
        if($.trim(value) === '')
        {
          return 'This field is required';
        }
      }
    });



</script>





@endsection
