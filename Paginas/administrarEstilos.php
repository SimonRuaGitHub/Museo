<?php session_start(); ?>
<?php if(isset($_SESSION['user_name'])) { ?>  
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
           <title>Estilos</title>
	   <link type="text/css" rel ="stylesheet"  href = "../decoradores/Bootstrap_libs/css/bootstrap.min.css"/>
	   <link type="text/css" rel ="stylesheet"  href = "../decoradores/estiloGestionCatalogo.css"/>
           <link type="text/css" rel ="stylesheet" href="../decoradores/dataTable/css/dataTables.bootstrap.min.css">
           <link type="text/css" rel ="stylesheet" href="../decoradores/dataTable/css/select.bootstrap.css">	
           <script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/modernizr/modernizr-1.7-development-only.js"></script>
           <script src="https://code.jquery.com/jquery-1.12.4.js"></script> 
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	   <script type = "text/javascript" src = "../Scripts/JQuery_libs/jquery-1.11.3.min.js"></script>  
	   <script type = "text/javascript" src = "../decoradores/Bootstrap_libs/js/bootstrap.min.js"></script>   
	   <script type = "text/javascript" src = "../Scripts/Validaciones/Tabla.js"></script>
           <script type = "text/javascript" src = "../Scripts/Validaciones/AñadirEstilo.js"></script>
           <script type = "text/javascript" src = "../Scripts/Validaciones/EliminarEstilo.js"></script>
           <script type = "text/javascript" src = "../Scripts/Validaciones/ActualizarEstilo.js"></script>
           <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
           <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
           <script src="../Scripts/dataTable/js/jquery.dataTables.min.js"></script>
           <script src="../Scripts/dataTable/js/dataTables.bootstrap.min.js"></script>  
           <script src="../Scripts/dataTable/js/dataTables.select.min.js"></script>
        <meta charset="UTF-8">
        <title>Estilos de obra</title>
    </head>
    <body onload="consultarTodosEstilos()">
        <?php include './Template/HeaderGC.php' ?>
        <div class="container-fluid">
            <h2>Estilos de obra</h2>
            <p>
              <div class="dropdown">
                <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">Accion
                <span class="caret"></span></button>
                 <ul class="dropdown-menu">
                     <li><a id="aActEstilo" href="#" onclick="iniciarAnadirEstilo()">Añadir</a></li>
                   <li><a id="aActEstilo" href="#" onclick="iniciarDatosActualizarEstilo()">Modificar</a></li>
                   <li><a id="aElimEstilo" href="#" onclick="iniciarEliminarEstilo()">Eliminar</a></li>
                </ul>
             </div>
           </p>
       
            <table id="tblEstilos"  class="table table-bordered table-striped table-hover" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th></th>
                  <th>Codigo</th>
                  <th>Nombre</th>
                  <th>Descripcion</th>
                </tr>
              </thead>
              <tbody>

              </tbody>
            </table>
        <!--Modal actualizar estilo -->
       <div class="modal fade" id="ModalAct" role="dialog">
         <div class="modal-dialog">
             <!-- Modal content-->
             <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">Modificacion de estilo</h4>
                   <h5>Por favor modifique los campos que crea pertinentes</h5>
                </div>
                <div class="modal-body">         
                    <form role="form">
                     <div class="container-fluid">
                        <div class="row">
                            <div class="form-group col-xs-4">
                                    <label for="txtCodigo">Codigo:*</label>
                                    <input type="text" class="form-control" id="txtCodigo" readonly>
                            </div>
                            <div class="form-group col-xs-6">
                              <label for="txtNombre">Nombre:*</label>
                              <input type="text" class="form-control" id="txtNombre">
                            </div>
                            <div class="form-group col-xs-10">
                               <label for="txaDescripcion">Descripcion:</label>
		               <textarea id="txaDescripcion" rows = "2" class="form-control"></textarea>
                               <br><br>
                               <div id="DivMensaje"></div>
                            </div>
                        </div>
                     </div>
                  </form>
                </div>
                <div class="modal-footer">
                    <button type="button" id="btnAceptarAct" onclick="validarActulizarEstilo()" class="btn btn-primary">Actualizar Estilo</button>
                    <button type="button" class="btn btn-alert" data-dismiss="modal">Cancelar</button>
                </div>
            </div>
         </div>
       </div>
       <!--Modal añadir estilo -->
       <div class="modal fade" id="ModalAnadir" role="dialog">
         <div class="modal-dialog">
             <!-- Modal content-->
             <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">Añadir estilo</h4>
                   <h5>Por favor ingrese datos como minimo en los campos obligatorios</h5>
                </div>
                <div class="modal-body">         
                    <form role="form">
                     <div class="container-fluid">
                        <div class="row">
                            <div class="form-group col-xs-6">
                              <label for="txtNombreAdd">Nombre:*</label>
                              <input type="text" class="form-control" id="txtNombreAdd">
                            </div>
                            <div class="form-group col-xs-10">
                               <label for="txaDescripcionAdd">Descripcion:</label>
		               <textarea id="txaDescripcionAdd" rows = "2" class="form-control"></textarea>
                               <br><br>
                               <div id="DivMensajeAdd"></div>
                            </div>
                        </div>
                     </div>
                  </form>
                </div>
                <div class="modal-footer">
                    <button type="button" id="btnAceptarAn" onclick="validarAdicionEstilo()" class="btn btn-primary">Guardar estilo</button>
                    <button type="button" class="btn btn-alert" data-dismiss="modal">Salir</button>
                </div>
            </div>
         </div>
       </div>
       <!--Modal eliminar estilo-->
       <div class="modal fade" id="ModalEliminar" role="dialog">
         <div class="modal-dialog">
             <!-- Modal content-->
             <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">Eliminar estilo</h4>
                   <h5>Por favor ingrese datos como minimo en los campos obligatorios</h5>
                </div>
                <div class="modal-body">         
                    <form role="form">
                     <div class="container-fluid">
                        <div class="row">
                            <div class="form-group col-xs-5">
                              <label for="txtNombreElim">Nombre:*</label>
                              <input type="text" class="form-control" id="txtNombreElim" readonly>
                              <br><br>
                              <div id="DivMensajeElim"></div>
                            </div>
                        </div>
                     </div>
                  </form>
                </div>
                <div class="modal-footer">
                    <button type="button" id="btnAceptarElim" onclick="eliminarEstilo()" class="btn btn-danger">Aceptar</button>
                    <button type="button" class="btn btn-alert" data-dismiss="modal">Cancelar</button>
                </div>
            </div>
         </div>
       </div>
       </div>
    </body>
</html>
<?php                                   } ?>