@extends('layouts.app')


@section('content')

<style>
  .calendar {

    max-width: auto;
    margin: 0, 0;
    padding: 0, 0;
    cursor: pointer;

  }

  .calendar {
    cursor: pointer;
}


.alert-message {
        color: red;
      }

  #loading {
    display: none;
    position: absolute;
    top: 50%;
    left: 40%;
    z-index: 1000;
  }

   
.mostrar_inputs{
  display: none;
}

  #loading2 {
    display: none;
    position: absolute;
    top: 50%;
    left: 40%;
    z-index: 1100;
  }

</style>


<br>



  
<!-- =============================

REGISTRO DE INGRESOS O EGRSOS 

================================== -->


<div class="container-fluid">
<div class="row">
          <!-- Left col -->
          <section class="col-lg-12">
            <!-- Custom tabs (Charts with tabs)-->
            <div class="card card-light">
                <div class="card-header">
                   
                    <h3 class="card-title"><span style="color: #28a745;" class="fas fa-database mr-3"></span>Registros contables</h3>
               </div>

             

                <div class="card-body">
                    <div class="form-group">
                    <button class="btn btn-outline-success ml-2" data-toggle="modal" data-target="#modalAgregarCliente" style="text-align:left"><span class="fas fa-tags mr-2" tabindex="3"></span> Saldo inicial</button>
                    <button class="btn btn-outline-info ml-2" data-toggle="modal" data-target="#modalAgregarCliente" style="text-align:left"><span class="fas fa-plus mr-2" tabindex="3"></span> Ingresos</button>
                    <button class="btn btn-outline-danger ml-2" data-toggle="modal" data-target="#modalAgregar" style="text-align:left"><span class="fas fa-minus mr-2" tabindex="3"></span> Egresos</button>
                       
                  </div>
                  
               </div>
            </div>
            <!-- /.card-body -->
       
  

<!-- ====================================

FORMULARIO RECEPCION DE PACIENTES

=========================================  -->


<div class="card card-light">
             
    <div class="card-header">
                   
                   <h3 class="card-title"><span style="color: #28a745;" class="fas fa-list mr-3"></span>Listado de transacciones contables</h3>
                  
                  <span class="btn-group float-right" id="btn_historialIngresos">

                
                                <a href="#" class="btn btn-transparent dropdown-toggle p-0" data-toggle="dropdown"
                                   aria-haspopup="true" aria-expanded="false">
                                <span class="fa fa-list"></span><span
                                  style="color:#212529;"></span>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                  <a class="dropdown-item" href="javascript:historial_registros();">Historial de registros realizados</a>
                                  <a class="dropdown-item" href="javascript:historial_ingresos();">Historial de pacientes en lista de espera</a>
                                </div>
                            </span> 
                
                    

                </div>
              
              
                <div class="card-body">
                   


       
<!-- ==================================
DATATABLE LISTA DE ESPERA
====================================== -->


       <div class="row">
         <div class="col-lg-12">
                  
                           
               <table id="Table_listado_espera" class="table dt-responsive" style="width:100%">
                   <thead>
                      <tr>
                                        
                         <th>hora</th>
                         <th>Cliente</th>
                         <th>mascota</th>
                         <th>Motivo</th>
                         <th></th>
                      </tr>
                  </thead>

                        <tbody>
                        
                        </tbody>    
                   
               </table>
                    
            
       </div>
      </div>

     </div>
        <!-- /.box -->
  </div>
      <!-- /.col -->

   <!-- /.card -->
 </section>
          <!-- /.Left col -->
          <!-- right col (We are only adding the ID to make the widgets sortable)-->
          <section class="col-lg-5 connectedSortable">

 



 <!--=====================================

    MODAL AGREGAR CLIENTE

======================================-->

<div class="modal fade" id="modalAgregarCliente" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    


<div class="modal-dialog modal-lg">
  
  <div class="modal-content">
  
  <div class="modal-header">
   
      <h5 class="modal-title"><span style="color:#28a745;" class="fas fa-cubes mr-3"></span>Agregar saldo inicial</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
     
           <span aria-hidden="true">&times;</span>
     
        </button>
    
      </div>

      <div class="modal-body">

          @if (session('error'))
          <div class="alert alert-danger">{{ session('error') }}</div>
          @endif

        <form method="POST" id="form_crear_cliente" action="{{ url('clientes') }}" >

     <!--  <input type="hidden" name="_token" value="{{csrf_token()}}">   -->


          <div class="row">

            <div class="col-md-3">

              <div class="form-group"  >

                <label for="Cedula" class="control-label">saldo inicial</label>


                <input type="number" name="saldo" class="form-control" id="saldo" autofocus required autocomplete="off">

             
                <div class="alert-message" id="saldoError"></div>
                 
              </div>

            </div>



            <div class="col-md-4">

              <div class="form-group">

                <label for="Nombre" class="control-label">Responsable</label>

                <input type="text" name="responsable" class="typeahead form-control text-capitalize" id="responsable" required autocomplete="off">

                 <div class="alert-message" id="responsableError"></div>
                
              </div>
            </div>




            <div class="col-md-5">
              <div class="form-group">

                <label for="telefono" class="control-label">Descripción</label>

                <input type="text" name="descripcion" class="form-control" id="descripcion" required autocomplete="off">
                
                  <div class="alert-message" id="descripcionError"></div>
                           
               </div>
            </div>
 
            </div>


      <div class="modal-footer">

        <button type="submit" id="agregar_cliente" name="agregar_cliente" class="btn btn-primary loader">Guardar</button>
        <button type="button" id="salir" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>

      </div>

    </div>
  </div>
</div>

</form>
</div>


</div>



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

                    @if (session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif

                                         
                  <form method="POST" id="form_crear_mascotas" action="{{ url('/mascotas') }}" >
                    
              
                <!-- <input type="hidden" name="_token" value="{{csrf_token()}}"> -->
          
              
              
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
              
                              <label for="esterilizado" class="control-label">Esterilizado</label>
              
                            
                              <select class="form-control text-capitalize" name="esterilizado" id="esterilizado" onkeypress="return handleEnter(this, event)" required>
                                <option value="" selected="selected" style='color: #cccccc'>Seleccionar opción</option>
              
                                <option value="Si">SI</option>
                                <option value="No">No</option>
              
              
              
                              </select>
              
              
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
              
              
                  <input type="hidden" name="userId" class="form-control" id="userId" value="" readonly>  
              
                  <input type="hidden" name="id_cliente" class="form-control" id="id_cliente" readonly>  
                    
              
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

    MODAL AGREGAR CLIENTE A LISTA DE ESPERA

==========================================-->

  
<div class="modal fade" id="modalAgregarListaEspera" aria-labelledby="exampleModalLabel" aria-hidden="true">
 
          <div class="modal-dialog">
                
                <div class="modal-content">
                
                    <div class="modal-header">
                  
                    <h5 class="modal-title"><span style="color:#28a745;" class="fas fa-user mr-3"></span>Agregar a lista de espera</h5>
                      <button
                       type="button" class="close" data-dismiss="modal" aria-label="Close">  <span aria-hidden="true">&times;</span>
                    
                      </button>
                  
                  </div>
              
                    <div class="modal-body">
                 

                    @if (session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif
                        
                    <form method="POST" id="form_lista_espera" action="{{ url('/listado_citas') }}" >
                    
              
                <!-- <input type="hidden" name="_token" value="{{csrf_token()}}"> -->
          
              
              
                <div class="row">

                     <div class="col-6">

                              <div class="form-group">
              
                                <label for="cliente" >Cliente</label>
              
              
                                <select class="selectBuscarCliente"  name="selectBuscarCliente" id="selectBuscarCliente" style="width:100%;" required>   </select>
                                       
                     
              
                              </div>
                        </div>
              
              
              
                        <div class="col-6">
              
                            
                              <div class="form-group BuscMascota" style="display:none;">
              
                                <label for="mascota">Mascota</label>
              
                                <select class="form-control"  name="buscarMascota" id="buscarMascota" style="width:100%;"  required>
                                            
              
                                </select>
              
                              </div>
              
                          </div>
              
                     
                          <div class="col-12">
                            <div class="form-group motivoConsulta" style="display:none;">
                              <label class="control-label">Motivo de consulta</label>
                              <input type="text" class="form-control motivo" name="motivo_consulta" required>
                            </div>
                          </div>
                                  



                          </div>
                     
                          
              
                                          
                        </div>
              
                  
              
              
              
              
                        <!-- 
              <div class="form-group">
              <label for="end" class="col-sm-2 control-label">Fecha final</label>
              
              -->
              
              
                  <input type="hidden" name="userId" class="form-control" id="userId" value="  " readonly>  
              
                   

                  <input type="text" name="nombreCliente" class="form-control" id="nombreCliente" autocomplete="off" >  
                 


                  <div class="form-group especie" style="display:block;">
                    <select class="form-control  buscarEspecie"  name="buscarEspecie" id="buscarEspecie"  style="width:100%;"  required>
                                        
                
                    </select>

                </div>       

                    
                    
                <div class="modal-footer">
        
                <button type="submit" id="agregar_lista_espera" name="agregar_lista_espera" class="btn btn-primary">Guardar</button>
                <button type="button" id="salir" class="btn btn-secondary salir" data-dismiss="modal">Cerrar</button>
        
                </div>

            </div>
          </div>
        </div>
        
    </form>
   </div>
       
 </div>
        


 
<!-- =======================================

MODAL ELIMINAR CITA MEDICA

============================================ -->

 <div id="confirmModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                
                <div class="modal-title">Eliminar</div>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <h4 align="center" style="margin:0;">Esta seguro de eliminar la cita?</h4>
            </div>
            <div class="modal-footer">
             <button type="button" name="ok_button" id="ok_button" class="btn btn-danger">OK</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>

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



<!-- =======================================

SELECT2 - BUSQUEDAD DE CLIENTES

============================================ -->

<script type="text/javascript">
  $('.livesearch').select2({
    placeholder: 'Buscar cliente por nombre...',
    language: "es",
    allowClear: true,
    minimumInputLength: 3,
    ajax: {
      // url: '/ajax-autocomplete-search',

      url: '{{ url("/ajax-autocomplete-search") }}',

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

      },


      cache: true,

    }

  });
  
  
  //================================================
   // SELECT2 - PASAR VALORES A VIEW BLADE - CLIENTE
  //================================================

  $('#livesearch').off('change').on('change', function() {
   
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

    let id = $(this).val();

    $.ajax({
     
   
      url: '/cliente/' +id, 

        method: "GET",
        data: $(this).serialize(),
        dataType: "json",
        success: function(data) {
   

         }

    });

    window.location.href = 'cliente/' +id;

  });
</script>







<!-- =======================================

SELECTBUSCARCLIENTE - LISTA DE ESPERA

============================================ -->

<script type="text/javascript">
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
  
  
  //===================================================

   // SELECT DEPENDIENTES buscarcliente - buscarmascota
  
   //===================================================

   $('.selectBuscarCliente').off('change').on('change', function () {

     

    $.ajaxSetup({
      headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
   
        
             
         let id_cliente = this.value;
              
         $("#buscarMascota").html('');
         $("#buscarEspecie").html('');
         
             
           $.ajax({
               url: 'buscarmascota',
               type: 'POST',
               dataType: 'json',
               data: {
                   id_cliente: id_cliente
               },
             
              
               success: function (data) {

                if (data.length > 0) {
      
                      //  $('#buscarMascota').html('<option value="">Seleccinar mascota</option>');
                          $('.BuscMascota').css("display", "block");
                          $('.motivoConsulta').css("display", "block");
                          $('.motivo').focus();
      
                                                                                             
                            
                           $.each(data, function(key, value) {
                            $('#buscarMascota').append('<option value="'+ value.nombre +'">'+ value.nombre+ ' - ' +value.especie +'</option>');
                           
                          }); 

                          $.each(data, function(key, value) {
                            $('#buscarEspecie').append('<option value="'+ value.especie +'">'+ value.especie+ '</option>');
                           
                          }); 
                  
                        

                          $('#nombreCliente').val('');
                         
                          let cliente = '';
                         

                                                   
                           cliente = $(".selectBuscarCliente").text();

                           $('#nombreCliente').val(cliente);
                              
                          
                                        
                    }else {
                           
                    toastr["warning"]("El cliente no tiene mascotas registradas.");

                    
                      } 
                     
                    }
                                    
           });   
           
 

   
  });   
</script>




<!-- ================================= 

RESET SELECT2: selectBuscarCliente

 ================================= -->


<script>

$('.selectBuscarCliente').on('select2:opening', function (e) { 
 
  $('.selectBuscarCliente').html('');

});


</script>




<!-- ================================= 

  FullCalendar  

 ================================= -->


<script>
  $(document).ready(function() {
    let SITEURL = "{{url('/')}}";

    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

    let calendar = $('#calendar').fullCalendar({

      loading: function(isLoading, view) {
        if (isLoading) {
          $('#loading').show();
        } else {
          $('#loading').hide();
        }
      },

      locale: "es",
      timezone: 'local',
      editable: true,
      defaultView: 'listDay',
      events: SITEURL + "inicio",
      //displayEventTime: true,
      // themeSystem: 'bootstrap4',

        timeFormat: "h:mm a",

        slotLabelFormat: [
          'h: (mm)a',
        ],


      header: {

        left: 'title',

      },


      events: SITEURL + "/fullcalendareventmaster",

      editable: true,
      selectable: true,
      selectHelper: true,


      
      eventRender: function(Event) {


      
        if (Event.allDay === 'true') {
          Event.allDay = true;
        } else {
          Event.allDay = false;
        }    
          
        
        
      },

     
     eventAfterRender: function(event, element) {
      element.popover({
           
            placement: 'left',
            trigger:   'hover',
            container: 'body',
            html:true,

            title: event.cliente,

            content: '<p>' + 'Mascota: ' + event.mascota +  '<p>' + 'Especie: ' + event.especie +  '<p>' + 'Teléfono: ' + 

                       event.telefono + '<p>' + 'Asignado a: ' + event.medico + '<p>' + 'Descripción: ' + event.descripcion +
                       
                       '<p>' + '<h6>' + 'Haga clic para cambiar datos. ',
        });
              
    },

  

      select: function(start, end, allDay) {

        calendar.fullCalendar('unselect');
      },


        
    
      
   //   events: SITEURL + "/fullcalendareventmaster",

     eventClick: function(event) {

  

        $('#ModalEdit #id').val(event.id);
     
          
        $('#ModalEdit #cliente').val(event.cliente);
        $('#ModalEdit #mascota').val(event.mascota);
        $('#ModalEdit #especie').val(event.especie);
        $('#ModalEdit #telefono').val(event.telefono);
       // $('#ModalEdit #email').html(event.email);

        $('#ModalEdit #medico').val(event.medico);
        $('#ModalEdit #descripcion').val(event.descripcion);
          
      //  $('#ModalEdit #servicios').html(event.title);
        $('#ModalEdit #titulo').val(event.title);
       
        $('#ModalEdit #color2').val(event.color);

        $('#ModalEdit #hora_ini').val(moment(event.start).format('hh:mm A'));
        $('#ModalEdit #hora_fin').val(moment(event.end).format('hh:mm A'));
        $('#ModalEdit #fecha_actual').val(moment(event.start).format('DD-MM-YYYY'));
       

        $('#ModalEdit').modal('show');
       


      },

    });
  });

  

  function displayMessage(message) {
    toastr.success(message);
  }
</script>


<!-- ==========================
 Calendar2  
 ========================== -->


<script>
  $(document).ready(function() {
    let SITEURL = "{{url('/')}}";

    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

    let calendar = $('#calendar2').fullCalendar({


      loading: function(isLoading, view) {
        if (isLoading) {
          $('#loading2').show();
        } else {
          $('#loading2').hide();
        }
      },



      locale: "es",
      timezone: 'local',
      editable: true,
      defaultView: "agendaDay",
      events: SITEURL + "inicio",
      displayEventTime: true,
      eventLimit: true, // allow "more" link when too many events
      minTime: "07:00",
      maxTime: "20:00",
      nowIndicator: true,
      timeFormat: "h:mm a",

      slotLabelFormat: [
        'h: (mm)a',
      ],

      // navLinks: true, 



      events: SITEURL + "/fullcalendareventmaster",
    
      eventRender: function(event, element, view) {
        if (event.allDay === 'true') {
          event.allDay = true;
        } else {
          event.allDay = false;
        }
      },
      selectable: true,
      selectHelper: true,


      select: function(start, end, allDay) {



        $('#ModalAdd #start').val(moment(start).format('YYYY-MM-DD HH:mm'));
        $('#ModalAdd #end').val(moment(end).format('YYYY-MM-DD HH:mm'));
        $('#ModalAdd #hora_ini').val(moment(start).format('hh:mm a'));
        $('#ModalAdd #hora_fin').val(moment(end).format('hh:mm a'));

        $('#ModalAdd #fecha_actual').val(moment(start).format('DD-MM-YYYY'));
       
        $('#ModalAdd').modal('show');




        //  $('#users_form').off('submit').on('submit', function(event) {

        /*

                  $('#users_form').submit(function (event) {
                 
                 

                

                    $.ajax({
                        url: SITEURL + "/fullcalendareventmaster/create",
                        method: "POST",
                        data: $(this).serialize(),
                        dataType: "json",
                        success: function(data) {

                            $('#agregar').attr('disabled', true);
                            $('#agregar')[0].reset();
                            $('#ModalAdd').modal('hide');
                            //$('#agenda_modal').modal('hide');
                          
                           

                            $('#calendar2').fullCalendar('refetchEvents');

                            $('#calendar2').fullCalendar('render');
                            $('#calendar').fullCalendar('refetchEvents');

                            toastr["success"]("los datos se han guardado correctamente", "Información");

                        }
                      
                    });

                    event.preventDefault();
                });
       
                */



        calendar.fullCalendar('unselect');

      },

      editable: true,



      eventDrop: function(event, delta) {
        let start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
        let end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
        $.ajax({
          url: SITEURL + '/fullcalendareventmaster/update',
          data: 'title=' + event.title + '&start=' + start + '&end=' + end + '&id=' + event.id,
          type: "POST",
          success: function(response) {
            displayMessage("Evento actualizado correctamente.");
            $('#calendar').fullCalendar('refetchEvents');
          }
        });
      },

      eventResize: function(event) {


        var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
        var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");

        $.ajax({
          url: SITEURL + '/fullcalendareventmaster/update',
          data: 'title=' + event.title + '&start=' + start + '&end=' + end + '&id=' + event.id +  'color=' + event.color, 
          type: "POST",
          success: function(response) {
            displayMessage("Evento actualizado correctamente.");

            $('#calendar').fullCalendar('refetchEvents');


          }
        });

      },


      eventClick: function(event) {
        let deleteMsg = confirm("Desea eliminar este evento?");
        if (deleteMsg) {
          $.ajax({
            type: "POST",
            url: SITEURL + '/fullcalendareventmaster/delete',
            data: "&id=" + event.id,
            success: function(response) {
              if (parseInt(response) > 0) {
                $('#calendar2').fullCalendar('removeEvents', event.id);
                $("#calendar").fullCalendar('refetchEvents');
                displayMessage("El evento se ha eliminado.");
              }
            }
          });
        }
      }
    });


    $('#ModalCalendar').on('shown.bs.modal', function() {
      $("#calendar2").fullCalendar('render');

      $("#calendar2").fullCalendar('refetchEvents');

    });



  });


  function displayMessage(message) {
    toastr.success(message);
  }
</script>



<!-- =========================================

INSERTAR DATOS A FULLCALENDAR

==============================================  -->


<script type="text/javascript">
  $(document).ready(function() {
    

    $('#users_form').on('submit', function(event) {

      event.preventDefault();


        /* Configurar botón submit con spinner */

        let btn = $('#agregar_cita') 
        let existingHTML =btn.html() //store exiting button HTML
        //Add loading message and spinner
        $(btn).html('<span class="spinner-border spinner-border-sm mr-2" role="status" aria-hidden="true"></span>Procesando...').prop('disabled', true)

        setTimeout(function() {
          $(btn).html(existingHTML).prop('disabled', false) //show original HTML and enable
        },5000) //5 seconds




      $.ajax({
        url: "/fullcalendareventmaster/create",
        method: "POST",
        data: $(this).serialize(),
        dataType: "json",
        success: function(data) {

          // $('#agregar').attr('disabled', true);
          $('#users_form')[0].reset();
          $('#ModalAdd').modal('hide');
          //$('#agenda_modal').modal('hide');


          $('#calendar2').fullCalendar('refetchEvents');

          $('#calendar').fullCalendar('refetchEvents');

        //  $("#calendar").fullCalendar("unselect");

          toastr["success"]("Evento guardado correctamente.");




          //document.location.reload(); 


        }

      });

    });

  });
</script>






<!-- =========================================

EDITAR DATOS DE FULLCALENDAR

==============================================  -->




<script type="text/javascript">
  $(document).ready(function() {

    $('#editar_calendario').on('submit', function(e, event) {
      e.preventDefault();

      
/* Configurar botón submit con spinner */

        let btn = $('#Editar_cita') 
        let existingHTML =btn.html() //store exiting button HTML
        //Add loading message and spinner
        $(btn).html('<span class="spinner-border spinner-border-sm mr-2" role="status" aria-hidden="true"></span>Procesando...').prop('disabled', true)

        setTimeout(function() {
          $(btn).html(existingHTML).prop('disabled', false) //show original HTML and enable
        },5000) //5 seconds



       let id=$(this).data('id');
      
      $.ajax({
        url: "/fullcalendareventmaster/update_event",
        method: "GET",
        data: $(this).serialize(),
        
        dataType: "json",
        success: function(data) {

          $('#id').val(data.id);
      

        $('#cliente').val(data.cliente);
        $('#mascota').val(data.mascota);
        $('#especie').html(data.especie);
        $('#telefono').val(data.telefono);
        $('#descripcion').val(data.descripcion);
       
        $('#ModalEdit #titulo').val(data.title);
       
        $('#ModalEdit #color2').val(data.color);

        $('#calendar').fullCalendar('refetchEvents');
        $('#fullCalModal').fullCalendar('refetchEvents');

          // $('#agregar').attr('disabled', true);
          $('#editar_calendario')[0].reset();
          $('#ModalEdit').modal('hide');
          $('#agenda_modal').modal('hide');
          toastr["success"]("los datos se han guardado correctamente");




          // $("#fullCalModal").fullCalendar('addEventSource', JSON, true); 







          // document.location.reload(); 


        }

      });

    });

  });
</script>






 <!-- =========================================

INSERTAR CLIENTE NUEVO

==============================================  -->

<script type="text/javascript">
   
   $(document).ready(function() {

    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });


        $('#form_crear_cliente').off('submit').on('submit', function (event) {

       
       
                  

        event.preventDefault();

        $('#cedulaError').text('');
        $('#nombreError').text('');
        $('#celularError').text('');
        $('#direccionError').text('');
        $('#barrioError').text('');
        $('#emailError').text('');


/* Configurar botón submit con spinner */

        let btn = $('#agregar_cliente') 
        let existingHTML =btn.html() //store exiting button HTML
        //Add loading message and spinner
        $(btn).html('<span class="spinner-border spinner-border-sm mr-2" role="status" aria-hidden="true"></span>Procesando...').prop('disabled', true)

        setTimeout(function() {
          $(btn).html(existingHTML).prop('disabled', false) //show original HTML and enable
        },5000) //5 seconds


      

            $.ajax({
              url: "clientes",
              method: "POST",
              data: $(this).serialize(),
              dataType: "json",
              success: function(data) {
                
                
                   
                        $('#form_crear_cliente')[0].reset();
                        $('#modalAgregarCliente').modal('hide');
                        $('#modalAgregarMascotas').modal('show');
                   
                     //   $('#agregar_cliente').attr('disabled', true);
                        toastr["success"]("los datos se han guardado correctamente");
      

                  },


                  error: function(response) {
                    $('#cedulaError').text(response.responseJSON.errors.cedula);
                    $('#nombreError').text(response.responseJSON.errors.nombre);
                    $('#celularError').text(response.responseJSON.errors.celular);
                    $('#direccionError').text(response.responseJSON.errors.direccion);
                    $('#barrioError').text(response.responseJSON.errors.barrio);
                    $('#emailError').text(response.responseJSON.errors.email);
                }

                   
              });

          });

                  

      });    

  </script>





<!-- =========================================

VINCULAR SELECT COLOR CON SERVICIOS - AGREGAR

============================================ -->


 <script type="text/javascript">
 

   
  	function update() {
				let select = document.getElementById('servicio');
				let option = select.options[select.selectedIndex];

				document.getElementById('color').value = option.value;
		   	document.getElementById('title').value = option.text;
			}

	
</script>




<!-- =========================================

VINCULAR SELECT COLOR CON SERVICIOS - EDITAR

============================================ -->


 <script type="text/javascript">
 

  	function editColor() {
				let select = document.getElementById('servicios');
				let option = select.options[select.selectedIndex];

				document.getElementById('color2').value = option.value;
		   	document.getElementById('titulo').value = option.text;
			}

		</script>




<!-- =========================================

 FUNCIÓN FOCUS PARA PRIMER INPUT ModalAdd

 ============================================ -->


<script>

$(document).ready(function() {
    $('#ModalAdd').on('shown.bs.modal', function () {
    $('#cliente').focus()
  });
});

</script>




<script>

   $(document).ready(function () {

    $('#buscarMascota').off('change').on('change', function () {

     
      let id_cliente = this.value;

            if(data.length > 0){
              $.ajax({
               url: 'buscarmascota',
               type: 'POST',
               dataType: 'json',
               data: {
                   id_cliente: id_cliente
               },
                    success:function(data){
                       
                       
                      $.each(data, function(key, value) {
                            $('#buscarEspecie').append('<option value="'+ value.especie +'">'+ value.especie+ '</option>');
                           
                          }); 
                    }
                }); 
            }
        });
      });
      
</script>






<!-- =====================================================

 FUNCiÓN PARA OCULTAR ELEMENTOS DE MODAL modalAgregarListaEspera

 ======================================================== -->


<script>

$(document).ready(function() {
    $('#modalAgregarListaEspera').on('hidden.bs.modal', function () {
   
      $('#selectBuscarCliente').html('');
      $('#buscarMascota').html('');
      $('#buscarEspecie').html('');
      $('#motivoConsulta').html('');
    
    //  $('.BuscMascota').css("display", "none");
    //  $('.motivoConsulta').hide();
     // $('.buscarEspecie').css("display", "none");
      $('#nombreMascota').html('');
      $('#form_lista_espera')[0].reset();
      $('#modalAgregarListaEspera').modal('hide');
      $("#nombreCliente").html('');
     // $("#nombreCliente").hide();
  
  
  });
  
});

</script>








<!-- ================================================

 FUNCIÓN FOCUS PARA PRIMER INPUT modalAgregarCliente

 ================================================= -->


 <script>

$(document).ready(function() {
    $('#modalAgregarCliente').on('shown.bs.modal', function () {
    $('#cedula').focus();
   // $('#agregar_cliente').attr('enabled','enabled');

  });
});




</script>



<!-- ===================================================

GUARDAR DATOS Y CARGAR DATATABLE JQUERY LISTA DE ESPERA

======================================================= --->

<script type = "text/javascript" >
    $(document).ready(function() {


      $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


    let table =  $('#Table_listado_espera').DataTable({

  
           processing: true,
           serverSide: true,
           paging: false,
           info: false,
           filter: false,
           responsive: true,
          
           type: "GET",
           ajax: "{{ url('listado_cliente') }}",

          
           columns: [
                   
                    { data: 'created_at', name: 'created_at' },         
                    { data: 'cliente', name: 'cliente' },     
                    { data: 'mascota', name: 'mascota' },
                    { data: 'motivo_consulta', name: 'motivo_consulta' },
                   
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                 ],
        
                   order: [[0, 'desc']],
          
          
            "language": {
                
                processing: 'Procesando...',

                //processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading..n.</span> ',
                           
                           
                    "emptyTable": "No hay pacientes en lista de espera."
                    
                },
       
     
      
    });
   

//============================================
// AGREGAR CLIENTE A LISTA DE ESPERA
//============================================


  $('#form_lista_espera').off('submit').on('submit', function (event) {

    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });


/* Configurar botón submit con spinner */

let btn = $('#agregar_lista_espera') 
        let existingHTML =btn.html() //store exiting button HTML
        //Add loading message and spinner
        $(btn).html('<span class="spinner-border spinner-border-sm mr-2" role="status" aria-hidden="true"></span>Procesando...').prop('disabled', true)

        setTimeout(function() {
          $(btn).html(existingHTML).prop('disabled', false) //show original HTML and enable
        },5000) //5 seconds

            $('#agregar').attr('disabled', true);

            event.preventDefault();

            try {

            $.ajax({
                url: "/listado_citas",
                method: "POST",
                data: $(this).serialize(),
                dataType: "json",
                success: function(data) {

                  table.ajax.reload();

                    $('#agregar').prop("required", true);
                   // $('#selectBuscarCliente').html("");
                    $('#buscarMascotas').empty();
                    $('.BuscMascota').css("display", "block");
                    $('.motivoConsulta').css("display", "block");
                    $('#nombreMascota').html("");
                    $('#form_lista_espera')[0].reset();
                    $('#modalAgregarListaEspera').modal('hide');
                    $("#nombreCliente").html('');
  
                    $('.selectBuscarCliente').val('').trigger('change');
                                       

                    toastr["success"]("Cita registrada correctamente.");
                 }

             });

            } catch(e) {
              toastr["danger"]("Se ha presentado un error.", "Información");
              }

        });

      // Delete article Ajax request.

    
 let id;

$(document).on('click', '.delete', function(){
  
  if(!confirm('seguro de borrar?')) return;

             let id = $(this).data('id');
          

            $.ajax({
              url:'eliminar_cita/'+id,
              method:"delete",
              data: { id: id},
              dataType: 'json',
              success: function (data) {
                  
                table.ajax.reload();
                toastr["success"]("Se ha eliminado la cita correctamente.");
                
              }

            });
          });
        });

 

</script>





@endsection