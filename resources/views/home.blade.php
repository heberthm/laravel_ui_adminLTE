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

BUSCADOR DE CLIENTES - SELECT2

================================== -->


<div class="container-fluid">
<div class="row">
          <!-- Left col -->
          <section class="col-lg-7">
            <!-- Custom tabs (Charts with tabs)-->
            <div class="card card-light">
                <div class="card-header">

                    
                    <h3 class="card-title"><span style="color: #28a745;" class="fas fa-search mr-3"></span>Buscador</h3>

                    <span class="btn-group float-right" id="btn-group-buscar">
                        <a href="#" class="btn dropdown-toggle p-0" data-toggle="dropdown" aria-haspopup="true"
                           aria-expanded="false">
                        <span class="fa fa-list"></span>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                          <a class="dropdown-item" href="javascript:btn_buscadorMedico();">Buscador de paciente por médico</a>
                          <a class="dropdown-item" href="javascript:btn_buscadorMascota();">Buscador de mascota</a>
                            <a class="dropdown-item" href="javascript:listado_mascotas();">Listado de pacientes</a>
                          <a class="dropdown-item" href="javascript:listadoClientes();">Listado de clientes</a>
                          <a class="dropdown-item" href="javascript:historial_registros();">Historial de registros realizados</a>
                        </div>
                    </span>


                </div>
                <div class="card-body">
                    <div class="form-group">
                        <!-- <label>Buscar:</label>  -->
                        <select class="livesearch form-control" id="livesearch" name="livesearch"></select>
                    </div>

                    <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarCliente" style="text-align:left"><span class="fa fa-user fa-fw" tabindex="3"></span> Agregar cliente nuevo</button>
                </div>
            </div>
            <!-- /.card-body -->
       
           





<!-- ====================================

FORMULARIO RECEPCION DE PACIENTES

=========================================  -->

 
<div class="card card-light">
                <div class="card-header">
                   
                
              
               
                <h3 class="card-title"><span style="color: #28a745;" class="fas fa-list mr-3"></span>Pacientes en espera</h3>
                  <span class="btn-group float-right" id="btn_historialIngresos">

                  <span class="btn-group float-right" id="btn_historialIngresos">
                    <a href="#" class="mr-3" data-toggle="modal" data-target="#modalAgregarListaEspera"><i class="fas fa-plus" style="color: #1566EB;" 
                    title="Agregar nuevo cliente" ></i></a>
                  </span>   

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
                    <div class="form-group">

<!--  ============================================

FORMULARIO  CLIENTES PARA AGREGA A LISTA DE ESPERA

================================================== -->
             
       <form id="form_clientes" name="form_clientes" method="POST">
          <!--  SELECT2 PARA LOS CLIENTES -->

               @csrf 
        
         <div class="container">
             <div class="row">
                <input type="hidden" name="TxtPerfil" id="TxtPerfil"  value=" <?php echo ucwords(@$_SESSION["perfil"])?>">
                <div id="example" class="mostrar_inputs"> 
                   <input type="text" id="medico" name="medico">
                   <input type="hidden" id="id_registro" name="id_medico">
                   <div class="col-md-2">
                      <div class="form-group">
                         <label for="Id_cliente">Id cliente</label>
                         <input type="text" name="Id_cliente" id="Id_cliente" class="form-control text-capitalize" onkeypress="return handleEnter(this, event)" required autocomplete="off" readonly>
                      </div>
                   </div>
                   <div class="col-md-2">
                      <div class="form-group">
                         <label for="cedula">Cédula</label>
                         <input type="text" name="cedula" id="cedula" class="form-control text-capitalize" onkeypress="return handleEnter(this, event)" required autocomplete="off" readonly>
                      </div>
                   </div>
                   <div class="col-md-4">
                      <div class="form-group">
                         <label for="nombre_cliente">cliente</label>
                         <input type="text" name="nombre_cliente" id="nombre_cliente" class="form-control text-capitalize" onkeypress="return handleEnter(this, event)" required autocomplete="off" readonly>
                      </div>
                   </div>
                   <div class="col-md-2">
                      <div class="form-group">
                         <label for="nombre_mascota">mascota</label>
                         <input type="text" name="nombre_mascota" id="nombre_mascota" class="form-control text-capitalize" onkeypress="return handleEnter(this, event)" required autocomplete="off" readonly>
                      </div>
                   </div>
                   <div class="col-md-2">
                      <div class="form-group">
                         <label for="telefono">Teléfono</label>
                         <input type="text" name="telefono" id="telefono" class="form-control text-capitalize" onkeypress="return handleEnter(this, event)" required autocomplete="off" readonly>
                      </div>
                   </div>
                   <div class="col-md-2">
                      <div class="form-group">
                         <label for="Celular">Celular</label>
                         <input type="text" name="celular" id="celular" class="form-control text-capitalize" onkeypress="return handleEnter(this, event)" required autocomplete="off" readonly>
                      </div>
                   </div>
                   <div class="col-md-2">
                      <div class="form-group">
                         <label for="Hora">Hora llegada</label>
                         <input type="text" name="TxtHora" id="TxtHora" class="form-control" onfocus="window.document.form_reloj.reloj.blur()">
                      </div>
                   </div>
                   <input type="hidden" name="TxtFecha" <?php $fecha = date( "Y-m-d")?> value="<?php echo $fecha?>">
                </div>
               
              <!--  
                <button class="btn btn-info" data-toggle="modal" data-target="#modalAgregarCliente" style="text-align:left"><span class="fa fa-user fa-fw" ></span> Agregar cliente nuevo</button>
              -->  
    </form>
</div>

       
<!-- ==================================

DATATABLE LISTA DE ESPERA

====================================== -->


       <div class="row">
           <div class="col-lg-12">
             <div class="form-group">
               <table id="Table_listado_espera" class="table dt-responsive" style="width:100%">
                   <thead>
                      <tr>
                                        
                         <th>hora</th>
                         <th>Cliente</th>
                         <th>mascota</th>
                         <th>Responsable</th>
                         <th></th>
                      </tr>
                  </thead>

                        <tbody>
                          <td style="text-align:center;"> <span> No hay citas en lista de espera </span> </td>
                        </tbody>    

                   
              </table>
         
         
         
         
            </div>
         </div>
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

       
          


<!-- =============================

CALENDAR - AGENDAR  AGENDA MEDICA
================================== -->

            <div class="card">
            <div class="card card-light">
                <div class="card-header">
                    <h3 class="card-title"><span style="color: #28a745;" class="fas fa-calendar mr-3"></span>Agenda de citas</h3>

                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-success float-right" data-toggle="modal" data-target="#ModalCalendar">
                        Agregar cita
                    </button>
                </div>
                <div class="card-body">
                    <div class="container">
                        <div id="calendar"></div>
                        <div id="loading" style="display: none;">
                            <img id="loading-image" src="../img/loader.gif" alt="Cargando..." />
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>

       
       
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>






<!-- =======================

   MODAL FULLCALENDAR CITAS 

 =========================== -->


 <div class="modal" tabindex="-1" role="dialog" id="ModalCalendar">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><span style="color:#28a745;" class="fas fa-calendar mr-3"></span>Calendario citas</h5>


        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <div class="container2">
          <div id='calendar2'></div>
          <div id="loading2" style="display:none;">
            <img id="loading-image" src="../img/loader.gif" alt="Cargando..." />
          </div>
        </div>

      </div>
      <div class="modal-footer">
        <!-- <button type="button" class="btn btn-primary">Guardar</button>  -->
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>



<!-- ===========================================

 VENTAMA MODAL FULLCALENDAR - GUARDAR 

================================================ -->



<div class="modal fade" id="ModalAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">




  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><span style="color:#28a745;" class="fas fa-edit mr-3"></span>Agendar citas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">


        <form method="POST" id="users_form" action="{{ url('fullcalendareventmaster/create') }}">




          <div class="row">

            <div class="col-md-6">

              <div class="form-group">

                <label for="title" class="control-label">Cliente &nbsp; 

                  <span class="btn-group float-right" id="btn_historialIngresos">
                    <a href="#" class="mr-3" data-toggle="modal" data-target="#modalAgregarCliente"><i class="fas fa-plus" style="color: #1566EB;" 
                    title="Agregar nuevo cliente" ></i></a>
                  </span>   

                </label>

                <input type="text" name="cliente" class="typeahead form-control text-capitalize" id="cliente"   required autocomplete="off">

              <!--
                @if ($errors->has('cliente'))
                    <small class="form-text text-danger"> {{ $errors->first('cliente') }} </small>
                @endif
   
              -->

              </div>

            </div>


            <div class="col-md-3">

              <div class="form-group">

                <label for="Mascota" class="control-label">mascota</label>

                <input type="text" name="mascota" class="typeahead form-control text-capitalize" id="mascota" required autocomplete="off">

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
              </div>
            </div>


            <div class="col-md-5">

              <div class="form-group">

                <label for="Telefono" class="control-label">Tel / Cel</label>

                <input type="tel" name="telefono" class="form-control text-capitalize" id="telefono" required onkeypress="return isNumber(event)">

              </div>

            </div>




            <div class="col-md-7">

              <div class="form-group">

                <label for="CboMedico" class="control-label">Médico</label>


                <select class="form-control text-capitalize" name="medico" id="medico" onkeypress="return handleEnter(this, event)" required>
                  <option value="" selected="selected" style='color: #cccccc'>Seleccionar médico</option>

                  <option value="Eduardo Correa medina">Eduardo Correa medina</option>
                  <option value="Eliana Buitrago Rosales">Eliana Buitrago Rosales</option>



                </select>

              </div>
            </div>

            </div>




         

          <div class="row">

            <div class="col-md-5">


              <div class="form-group">

                <label for="Servicios" class="control-label">Servicios</label>

                <select name="servicio" id="servicio" class="form-control text-capitalize" required  onChange="update()">

                  <option value="" style='color: #cccccc'>Seleccionar servicio </option>

                  <option style="color:#1560F6;" value="#1560F6" >Consulta médica</option>

                  <option style="color:#0CA46A;" value="#0CA46A">Procedimiento</option>

                  <option style="color:#840CA4;" value="#840CA4" >Control médico</option>

                  <option style="color: #D51051;" value="#D51051" >Cirugía</option>

                  <option style="color:#FF8C00;" value="#FF8C00">Todo el día </option>

                </select>
              </div>
            </div>





            <div class="col-md-2">

              <div class="form-group">

                <label for="color" class="control-label">Col</label>

                <input type="color" id="color" name="color" value="#1560F6" class="form-control text-capitalize" required autocomplete="off">

              </div>
            </div>



            <div class="col-md-5">

              <div class="form-group">

                <label for="descripcion" class="control-label">Comentario</label>

                <input type="text" name="descripcion" class="form-control" id="descripcion" autocomplete="off">
              </div>
            </div>

          </div>



          <div class="row">

            <div class="col-md-3">

              <div class="form-group">

                <label for="hora_ini" class="control-label">Hora ini</label>

                <input type="text" name="hora_ini" class="form-control" id="hora_ini" readonly>
              </div>
            </div>





            <div class="col-md-3">

              <div class="form-group">

                <label for="hora_fin" class="control-label">Hora fin</label>

                <input type="text" name="end" class="form-control" id="hora_fin" readonly>

              </div>
            </div>





            <div class="col-md-3">

              <div class="form-group">

                <label for="fecha_actual" class=" control-label">Fecha</label>

                <input type="text" name="fecha_actual" class="form-control" id="fecha_actual" readonly>

              </div>
            </div>

          </div>



          <!--    <div class="form-group">
        <label for="start" class="col-sm-2 control-label">Fecha inicial</label>
  
      -->
        <div class="col-sm-10">
         
          <input type="hidden" name="start" class="form-control" id="start" readonly>
         
        </div>

        
      		<input type="hidden" id="title" name="title" >
        
          <input type="hidden" id="color" >

          <input type="hidden" name="userId" class="form-control" id="userId" value="{{ Auth::user()->id }}" readonly>

          

          <!-- 
          <div class="form-group">
        <label for="end" class="col-sm-2 control-label">Fecha final</label>

  -->
          <div class="col-sm-10">
        
          <input type="hidden" name="end" class="form-control" id="end" readonly>
        
        </div>
    
      </div>

    

      <!--     
            
       <div id="enlace_listado">  
                          
            <p><a href="crearClientes.php"><i class="fa fa-user fa-2x"></i>&nbsp; Crear cliente nuevo</a>   </p> 
                          
       </div>
  
   -->

      <div class="modal-footer">

        <button type="submit" id="agregar_cita" name="agregar_cita" class="btn btn-primary">Guardar</button>
      
        <button type="button" id="salir" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>

      </div>

    </div>
  </div>
</div>

</form>
</div>

</div>




<!-- ===============================================

VENTANA MODAL EDITAR DATOS DEL CALENDARIO

==================================================== -->




<div class="modal fade" id="ModalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">


  <div class="modal-dialog modal-lg">
  
  <div class="modal-content">
  
  <div class="modal-header">
   
      <h5 class="modal-title"><span style="color:#28a745;" class="fas fa-edit mr-3"></span>Editar citas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
     
           <span aria-hidden="true">&times;</span>
     
        </button>
    
      </div>

      <div class="modal-body">


        <form method="GET" id="editar_calendario" action="{{ url('fullcalendareventmaster/Update_event/id') }}">




          <div class="row">

            <div class="col-md-6">

              <div class="form-group">

                <label for="title" class="control-label">Cliente</label>


                <input type="text" name="cliente" class="form-control text-capitalize" id="cliente"   maxlength="35"  autofocus required autocomplete="off">

              </div>

            </div>



            <div class="col-md-3">

              <div class="form-group">

                <label for="Mascota" class="control-label">mascota</label>

                <input type="text" name="mascota" class="typeahead form-control text-capitalize" id="mascota"  maxlength="14"  required autocomplete="off">

              </div>
            </div>




            <div class="col-md-3">

              <div class="form-group">

                <label for="Especie" class="control-label">Especie</label>

                <input type="text" name="especie" class="typeahead form-control text-capitalize" id="especie" required autocomplete="off">

              </div>
            </div>


            <div class="col-md-5">

                <div class="form-group">

                  <label for="Telefono" class="control-label">Tel / Cel</label>

                  <input type="text" name="telefono" class="form-control text-capitalize" id="telefono" required onkeypress="return isNumber(event)">

                </div>

            </div>





            <div class="col-md-7">

              <div class="form-group">

                <label for="CboMedico" class="control-label">Médico</label>


                <select class="form-control text-capitalize" name="medico" id="medico" onkeypress="return handleEnter(this, event)" required>
                  <option value="" selected="selected" style='color: #cccccc'>Seleccionar médico</option>

                  <option value="Eduardo Correa medina">Eduardo Correa medina</option>
                  <option value="Eliana Buitrago Rosales">Eliana Buitrago Rosales</option>



                </select>

              </div>
            </div>

            </div>




         

          <div class="row">

            <div class="col-md-5">


              <div class="form-group">

                <label for="Servicios" class="control-label">Servicios</label>

                <select name="servicios" id="servicios" class="form-control text-capitalize" required  onChange="editColor()">

               
                  <option value="">Seleccione un servicio </option>

                  <option style="color:#1560F6;" value="#1560F6" >Consulta médica</option>

                  <option style="color:#0CA46A;" value="#0CA46A">Procedimiento</option>

                  <option style="color:#840CA4;" value="#840CA4" >Control médico</option>

                  <option style="color: #D51051;" value="#D51051" >Cirugía</option>

                  <option style="color:#FF8C00;" value="#FF8C00">Todo el día </option>



                </select>
              </div>
            </div>





            <div class="col-md-2">

              <div class="form-group">

                <label for="color" class="control-label">Color</label>

                <input type="color"  id="color2" name="color"  value="#1560F6" class="form-control text-capitalize" required autocomplete="off">

              </div>
            </div>



            <div class="col-md-5">

              <div class="form-group">

                <label for="descripcion" class="control-label">Comentario</label>

                <input type="text" name="descripcion" class="form-control" id="descripcion" autocomplete="off">
              </div>
            </div>

          </div>



          <div class="row">

            <div class="col-md-3">

              <div class="form-group">

                <label for="hora_ini" class="control-label">Hora ini</label>

                <input type="text" name="hora_ini" class="form-control" id="hora_ini" readonly>
              </div>
            </div>





            <div class="col-md-3">

              <div class="form-group">

                <label for="hora_fin" class="control-label">Hora fin</label>

                <input type="text" name="end" class="form-control" id="hora_fin" readonly>

              </div>
            </div>





            <div class="col-md-3">

              <div class="form-group">

                <label for="fecha_actual" class=" control-label">Fecha</label>

                <input type="text" name="fecha_actual" class="form-control" id="fecha_actual" readonly>

              </div>
            </div>

          </div>



          <!--    <div class="form-group">
<label for="start" class="col-sm-2 control-label">Fecha inicial</label>

-->
          <div class="col-sm-10">
            <input type="hidden" name="start" class="form-control" id="start" readonly>
          </div>


          <input type="hidden" name="titulo" id="titulo" >


          <!-- 
<div class="form-group">
<label for="end" class="col-sm-2 control-label">Fecha final</label>

-->
          <div class="col-sm-10">
            <input type="hidden" name="end" class="form-control" id="end" readonly>
          </div>
      </div>


      <input type="hidden" name="id" class="form-control" id="id" readonly>

     

    <input type="hidden" name="userId" class="form-control" id="userId" value="{{ Auth::user()->id }}" readonly>  
      

      <!--     

<div id="enlace_listado">  
         
<p><a href="crearClientes.php"><i class="fa fa-user fa-2x"></i>&nbsp; Crear cliente nuevo</a>   </p> 
         
</div>

-->

      <div class="modal-footer">

        <button type="submit" id="Editar_cita" name="Editar_cita" class="btn btn-primary">Guardar</button>
        <button type="button" id="salir" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>

      </div>

    </div>
  </div>
</div>

</form>
</div>

</div>





 <!--=====================================

    MODAL AGREGAR CLIENTE

======================================-->

<div class="modal fade" id="modalAgregarCliente" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    


<div class="modal-dialog modal-lg">
  
  <div class="modal-content">
  
  <div class="modal-header">
   
      <h5 class="modal-title"><span style="color:#28a745;" class="fas fa-user mr-3"></span>Agregar cliente</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
     
           <span aria-hidden="true">&times;</span>
     
        </button>
    
      </div>

      <div class="modal-body">


        <form method="POST" id="form_crear_cliente" action="{{ url('clientes') }}" >

     <!--  <input type="hidden" name="_token" value="{{csrf_token()}}">   -->


          <div class="row">

            <div class="col-md-3">

              <div class="form-group"  >

                <label for="Cedula" class="control-label">Cédula</label>


                <input type="number" name="cedula" class="form-control" id="cedula" autofocus required autocomplete="off">

             
                <div class="alert-message" id="cedulaError"></div>
                 
              </div>

            </div>



            <div class="col-md-5">

              <div class="form-group">

                <label for="Nombre" class="control-label">Nombre</label>

                <input type="text" name="nombre" class="typeahead form-control text-capitalize" id="nombre" required autocomplete="off">

                 <div class="alert-message" id="nombreError"></div>
                
              </div>
            </div>




            <div class="col-md-4">
              <div class="form-group">

                <label for="telefono" class="control-label">Tel/Cel.</label>

                <input type="text" name="celular" class="form-control" id="celular" required autocomplete="off">
                
                  <div class="alert-message" id="celularError"></div>
                           
               </div>
            </div>


            <div class="col-md-8">

                <div class="form-group">

                  <label for="direccion" class="control-label">Dirección</label>

                  <input type="text" name="direccion" class="form-control text-capitalize" id="direccion" required onkeypress="return isNumber(event)">

                    <div class="alert-message" id="direccionError"></div>

                </div>

            </div>







         

            <div class="col-md-4">

              <div class="form-group">

                <label for="barrio" class="control-label">Barrio</label>

                <input type="text"  id="barrio" name="barrio"  class="form-control text-capitalize" required autocomplete="off">

                <div class="alert-message" id="barrioError"></div>

              </div>
            </div>



            <div class="col-md-12">

              <div class="form-group">

                <label for="email" class="control-label">Email</label>

                <input type="email" name="email" class="form-control" id="email" autocomplete="off">
 
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
              
              
                  <input type="hidden" name="userId" class="form-control" id="userId" value="{{ Auth::user()->id }}" readonly>  
              
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
                 
                        
                    <form method="POST" id="form_lista_espera" action="{{ url('/mascotas') }}" >
                    
              
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
                              <input type="text" class="form-control motivo" name="motivo" required>
                            </div>
                          </div>
                                  



                          </div>
                     
                          
              
                                          
                        </div>
              
                  
              
              
              
              
                        <!-- 
              <div class="form-group">
              <label for="end" class="col-sm-2 control-label">Fecha final</label>
              
              -->
              
              
                  <input type="hidden" name="userId" class="form-control" id="userId" value="{{ Auth::user()->id }}" readonly>  
              
                  <input type="hidden" name="id_cliente" class="form-control" id="id_cliente" readonly>  
                    
                    
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
    placeholder: 'Buscar cliente...',
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
  
  
  //===================================================

   // SELECT DEPENDIENTES buscarcliente - buscarmascota
  
   //===================================================

   $('.selectBuscarCliente').on('change', function() {
   
    $.ajaxSetup({
      headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });


         let $modal = $('#modalAgregarListaEspera');
         let $form = $modal.find('#form_lista_espera');
    
         let id_cliente = this.value;
        // let mascota = $('.buscarMascota').html('');

         $("#buscarMascota").html('');

        
              
         
           $.ajax({
               url: 'buscarmascota',
               type: 'POST',
               dataType: 'json',
               data: {
                   id_cliente: id_cliente
               },
               success: function (data) {
                

               
                  if (data.success) {
                      //  $('#buscarMascota').html('<option value="">Seleccinar mascota</option>');
                          $('.BuscMascota').css("display", "block");
                          $('.motivoConsulta').css("display", "block");
                          $('.motivo').focus();
                                                            
                            
                            $.each(data.mascotas, function(key, value) {
                            $('#buscarMascota').append('<option value="'+ key.id_cliente +'">'+ value.nombre+ ' - ' +value.especie +'</option>');
                           
                          }); 

                             
                        } else {

                          $('.BuscMascota').css("display", "none");
                          $('.motivoConsulta').css("display", "none");
                         
                          toastr["warning"]("El cliente no tiene mascota registrada.", "Información");

                        }  

                                         
                       
                      }
         
           });   

         
                

   
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
      events: SITEURL + "home",
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
           
            placement: 'top',
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
       // $('#ModalEdit #email').val(event.email);

        $('#ModalEdit #medico').val(event.medico);
        $('#ModalEdit #descripcion').val(event.descripcion);
          
      //  $('#ModalEdit #servicios').val(event.title);
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
    toastr.success(message, 'Mensaje');
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
      events: SITEURL + "home",
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
    toastr.success(message, 'Mensaje');
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

          toastr["success"]("Evento guardado correctamente.", "Información");




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
        $('#especie').val(data.especie);
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
          toastr["success"]("los datos se han guardado correctamente", "Mensaje");




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
                        toastr["success"]("los datos se han guardado correctamente", "Información");
      

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
				var select = document.getElementById('servicio');
				var option = select.options[select.selectedIndex];

				document.getElementById('color').value = option.value;
		   	document.getElementById('title').value = option.text;
			}

	
</script>




<!-- =========================================

VINCULAR SELECT COLOR CON SERVICIOS - EDITAR

============================================ -->


 <script type="text/javascript">
 

  	function editColor() {
				var select = document.getElementById('servicios');
				var option = select.options[select.selectedIndex];

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
    $('#Table_listado_espera').DataTable({


      rowReorder: {
            selector: 'td:nth-child'
        },
       
      
           processing: true,
           serverSide: true,
           "paging": false,
           "info": false,
           "filter": false,
            responsive: true,
          
           type: "GET",
           ajax: "{{ url('listado_cliente') }}",
        
           columns: [
                      
                    { data: 'nombre', name: 'nombre' },
                    { data: 'celular', name: 'celular' },
                    { data: 'direccion', name: 'direccion' },
                    { data: 'barrio', name: 'barrio' },
                    {data: 'action', orderable: false},
                 ],
          order: [[0, 'desc']],

          "language": {
              "decimal": ",",
              "thousands": ".",
              "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
              "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
              "infoPostFix": "",
              "infoFiltered": "(filtrado de un total de _MAX_ registros)",
              "loadingRecords": "Cargando...",
              "lengthMenu": "Mostrar _MENU_ registros",
              "paginate": {
                  "first": "Primero",
                  "last": "Último",
                  "next": "Siguiente",
                  "previous": "Anterior"
              },
              "processing": "Procesando...",
              "search": "Buscar:",
              "searchPlaceholder": "Término de búsqueda",
              "zeroRecords": "No se encontraron resultados",
              "emptyTable": "Ningún dato disponible en esta tabla",
              "aria": {
                  "sortAscending":  ": Activar para ordenar la columna de manera ascendente",
                  "sortDescending": ": Activar para ordenar la columna de manera descendente"
              },
       
          }
      
    });
   

//============================================
// AGREGAR CLIENTE A LISTA DE ESPERA
//============================================

     
          $('#form_clientes').off('submit').on('submit', function (event) {

            $('#agregar').attr('disabled', true);

            event.preventDefault();

            $.ajax({
                url: "insertar_datos_tabla.php",
                method: "POST",
                data: $(this).serialize(),
                dataType: "json",
                success: function(data) {

                    $('#agregar').prop("required", true);
                    $('#CboMedico').val("");
                    $('#buscar_clientes').empty();
                    $('#form_clientes')[0].reset();

                    table.ajax.reload();


                }

            });

        });

    });

</script>


@endsection