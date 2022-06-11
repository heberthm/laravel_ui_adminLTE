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

                  <div class="row">
                
                      <div class="col-lg-6">
                     
                    
                      
                     
                          <button class="btn btn-outline-success ml-2" data-toggle="modal" data-target="#modalAgregarSaldoInicial" style="text-align:left"><span class="fas fa-tags mr-2" tabindex="3"></span> Saldo inicial</button>
                          <button class="btn btn-outline-info ml-2" data-toggle="modal" data-target="#modalAgregarIngreso" style="text-align:left"><span class="fas fa-plus mr-2" tabindex="3"></span> Ingresos</button>
                          <button class="btn btn-outline-danger ml-2" data-toggle="modal" data-target="#modalAgregar" style="text-align:left"><span class="fas fa-minus mr-2" tabindex="3"></span> Egresos</button>
                          
                     </div>  
                    
                    
                       <!--   <span><h5 style="text-align:right">  Saldo inicial:   </h5></span>  -->
                      
                     </div>     
                                  
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
                  
                           
               <table id="table_registros_contables" class="display" style="width:100%">
                   <thead>
                      <tr>
                                        
                         <th width="auto">Responsable</th>
                         <th  width="auto">Descripción</th>
                         <th>Saldo</th>
                         <th>Ingresos</th>
                         <th>Egresos</th>
                         <th>fecha</th>
                         <th  width="auto"></th
                     
                     </tr>
                  </thead>
                                     
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

    MODAL AGREGAR SALDO

======================================-->

<div class="modal fade" id="modalAgregarSaldoInicial" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    


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

        <form method="POST" id="form_agregar_saldo" action="{{ url('/guardar_saldo') }}" >

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

        <button type="submit" id="agregar_registro" name="agregar_registro" class="btn btn-primary loader">Guardar</button>
        <button type="button" id="salir" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>

      </div>

    </div>
  </div>
</div>

</form>
</div>


</div>




 <!--=====================================

    MODAL AGREGAR INGRESO

======================================-->

<div class="modal fade" id="modalAgregarIngreso" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    


<div class="modal-dialog modal-lg">
  
  <div class="modal-content">
  
  <div class="modal-header">
   
      <h5 class="modal-title"><span style="color:#28a745;" class="fas fa-cubes mr-3"></span>Agregar ingreso</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
     
           <span aria-hidden="true">&times;</span>
     
        </button>
    
      </div>

      <div class="modal-body">

          @if (session('error'))
          <div class="alert alert-danger">{{ session('error') }}</div>
          @endif

        <form method="POST" id="form_agregar_ingreso" action="{{ url('/agregar_ingreso') }}" >

     <!--  <input type="hidden" name="_token" value="{{csrf_token()}}">   -->


          <div class="row">

            <div class="col-md-3">

              <div class="form-group"  >

                <label for="Ingreso" class="control-label">saldo inicial</label>


                <input type="number" name="ingreso" class="form-control" id="ingreso" autofocus required autocomplete="off">

             
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

        <button type="submit" id="agregar_ingreso" name="agregar_ingreso" class="btn btn-primary loader">Guardar</button>
        <button type="button" id="salir" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>

      </div>

    </div>
  </div>
</div>

</form>
</div>


</div>










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





<!-- =========================================

 FUNCIÓN FOCUS PARA PRIMER INPUT ModalAdd

 ============================================ -->


<script>

$(document).ready(function() {
    $('#ModalAdd').on('shown.bs.modal', function () {
    $('#saldo').focus()
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

 FUNCIÓN FOCUS PARA PRIMER INPUT modalAgregarSaldoInicial

 ================================================= -->


 <script>

$(document).ready(function() {
    $('#modalAgregarSaldoInicial').on('shown.bs.modal', function () {
    $('#saldo').focus();
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


    let table =  $('#table_registros_contables').DataTable({

  
           processing: true,
           serverSide: true,
           pageLength: 5,
           paging: true,
           info: true,
           filter: true,
           responsive: true,
          
           type: "GET",
           ajax: "{{ url('registros_contable') }}",

          
           columns: [
                   
                         
                    { data: 'responsable', name: 'responsable' },   
                    { data: 'descripcion', name: 'descripcion' },     
                    { data: 'saldo', name: 'saldo' },
                    { data: 'ingreso', name: 'ingreso' },
                    { data: 'egreso', name: 'egreso' },
                    { data: 'created_at', name: 'created_at' },   
                 
                   
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                 ],
        
                   order: [[0, 'desc']],
          
          
            "language": {
                       
                
               

                //processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading..n.</span> ',
                                      
               

                   "decimal": ",",
                  "emptyTable": "No hay pacientes en lista de espera.",
                  "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
                  "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
                  "infoFiltered": "(Filtrado de _MAX_ total entradas)",
                  "infoPostFix": "",
                  "thousands": ".",
                  "lengthMenu": "Mostrar _MENU_ Entradas",
                  "loadingRecords": "Cargando...",
                  "processing": "Procesando...",
                  "search": "Buscar:",
                  "zeroRecords": "Sin resultados encontrados",
                  "paginate": {
                  "first": "Primero",
                  "last": "Ultimo",
                  "next": "Siguiente",
                  "previous": "Anterior"
                                      
               },

              },   
       
     
      
    });
   

//============================================

// AGREGAR SALDO INICIAL

//============================================


  $('#form_agregar_saldo').off('submit').on('submit', function (event) {

    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });


/* Configurar botón submit con spinner */

let btn = $('#agregar_registro') 
        let existingHTML =btn.html() //store exiting button HTML
        //Add loading message and spinner
        $(btn).html('<span class="spinner-border spinner-border-sm mr-2" role="status" aria-hidden="true"></span>Procesando...').prop('disabled', true)

        setTimeout(function() {
          $(btn).html(existingHTML).prop('disabled', false) //show original HTML and enable
        },5000) //5 seconds

            $('#agregar_registro').attr('disabled', true);

            event.preventDefault();

            try {

            $.ajax({
                url: "/guardar_saldo",
                method: "POST",
                data: $(this).serialize(),
                dataType: "json",
                success: function(data) {

                  table.ajax.reload();

                    $('#agregar_registro').prop("required", true);
                   // $('#selectBuscarCliente').html("");
                   
                    $('#form_agregar_saldo')[0].reset();
                    $('#modalAgregarListaEspera').modal('hide');
                  
                                       

                    toastr["success"]("Datos guardados correctamente.");
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

 

          

//============================================

// AGREGAR INGRESO
//============================================


  $('#form_agregar_ingreso').off('submit').on('submit', function (event) {

$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});


/* Configurar botón submit con spinner */

let btn = $('#agregar_ingreso') 
    let existingHTML =btn.html() //store exiting button HTML
    //Add loading message and spinner
    $(btn).html('<span class="spinner-border spinner-border-sm mr-2" role="status" aria-hidden="true"></span>Procesando...').prop('disabled', true)

    setTimeout(function() {
      $(btn).html(existingHTML).prop('disabled', false) //show original HTML and enable
    },5000) //5 seconds

        $('#agregar_registro').attr('disabled', true);

        event.preventDefault();

        try {

        $.ajax({
            url: "/guardar_ingreso",
            method: "POST",
            data: $(this).serialize(),
            dataType: "json",
            success: function(data) {

              table.ajax.reload();

                $('#agregar_registro').prop("required", true);
               // $('#selectBuscarCliente').html("");
               
                $('#form_agregar_saldo')[0].reset();
                $('#modalAgregarListaEspera').modal('hide');
              
                                   

                toastr["success"]("Datos guardados correctamente.");
             }

         });

        } catch(e) {
          toastr["danger"]("Se ha presentado un error.", "Información");
          }

    });







</script>





@endsection