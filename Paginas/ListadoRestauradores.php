<?php session_start(); ?>
<?php if(isset($_SESSION['user_name'])) { ?>  
<!DOCTYPE html>
<html>
<head>
           <title>Listado Restauradores</title>
	   <link type="text/css" rel ="stylesheet"  href = "../decoradores/Bootstrap_libs/css/bootstrap.min.css"/>
           <link type="text/css" rel ="stylesheet" href="../decoradores/dataTable/css/dataTables.bootstrap.min.css">
           <link type="text/css" rel ="stylesheet" href="../decoradores/dataTable/css/select.bootstrap.css">
           <script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/modernizr/modernizr-1.7-development-only.js"></script>
           <script src="https://code.jquery.com/jquery-1.12.4.js"></script> 
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	   <script type = "text/javascript" src = "../Scripts/JQuery_libs/jquery-1.11.3.min.js"></script>  
	   <script type = "text/javascript" src = "../decoradores/Bootstrap_libs/js/bootstrap.min.js"></script>   
	   <script type = "text/javascript" src = "../Scripts/Validaciones/Tabla.js"></script>
           <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
           <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
           <script src="../Scripts/dataTable/js/jquery.dataTables.min.js"></script>
           <script src="../Scripts/dataTable/js/dataTables.bootstrap.min.js"></script>  
           <script src="../Scripts/dataTable/js/dataTables.select.min.js"></script>
           <script src="../Scripts/Validaciones/bloquearCamposNumericosObras.js"></script>
           <script src="../Scripts/Validaciones/TablaRestauradores.js"></script>
           <script src="../Scripts/Validaciones/MantenerRestauradores.js"></script>
	   <meta charset = "utf-8">
</head>
<body onload="consultarTodosRestauradores()">
      <?php include './Template/HeaderJF.php' ?>
      <div class="container-fluid">
            <h2>Restauradores</h2>
            <p>
                <div class="dropdown">
                   <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">Accion
                   <span class="caret"></span></button>
                   <ul class="dropdown-menu">
                       <li><a id="aAct" href="#" onclick="iniciarActualizarRestaurador()">Actualizar</a></li>
                       <li><a id="aElim" href="#" onclick="iniciarEliminarRestaurador()" >Eliminar</a></li>
                   </ul>
                </div>
             </p>
             <table id="tblRestauradores"  class="table table-bordered table-striped table-hover" cellspacing="0" width="100%">
                <thead>
                  <tr>
                    <th></th>
                    <th>Cedula</th>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>Telefono</th>
                    <th>Correo</th>
                  </tr>
                </thead>
                <tbody>

                </tbody>
             </table>
        </div>
       <!-- Modal Eliminar -->
       <div class="modal fade" id="ModalEliminar" role="dialog">
         <div class="modal-dialog modal-sm">
             <!-- Modal content-->
             <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Atencion</h4>
                </div>
                <div class="modal-body">
                    <form role="form">
                     <div class="container-fluid">
                        <div class="row">
                            <div class="form-group col-xs-12">
                              <label for="txtCedulaElim">Cedula:</label> 
                              <input type="text" class="form-control" id="txtCedulaElim" readonly/>
                              <br>
                              <label for="txtNombresElim">Nombres:</label>
                              <input type="text" class="form-control" id="txtNombresElim" readonly/>
                              <br><br>
                              <div id="DivMensajeElim"></div>
                            </div>
                        </div>
                     </div>
                  </form>
                </div>
                <div class="modal-footer">
                    <button type="button" id="btnAceptarElim" onclick="eliminarRestaurador()" class="btn btn-danger">Aceptar</button>
                  <button type="button" class="btn btn-alert" data-dismiss="modal">Cancelar</button>
                </div>
            </div>
         </div>
       </div>
       <!---Modal Actualizar -->
         <div class="modal fade" id="ModalActRest" role="dialog">
         <div class="modal-dialog">
             <!-- Modal content-->
             <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">Modificacion de registro</h4>
                   <h5>Por favor modifique los campos que crea pertinentes</h5>
                </div>
                <div class="modal-body">         
                    <form role="form">
                     <div class="container-fluid">
                        <div class="row">
                            <div class="form-group col-xs-6">
                               <label for="txtCodigo">Cedula:*</label>
                               <input type="text" class="form-control" id="txtCedulaAct">
                            </div>
                            <div class="form-group col-xs-6">
                              <label for="txtNombre">Nombres:*</label>
                              <input type="text" class="form-control" id="txtNombresAct">
                            </div>
                            <div class="form-group col-xs-6">
                              <label for="txtNombre">Apellidos:*</label>
                              <input type="text" class="form-control" id="txtApelldiosAct">
                            </div>
                            <div class="form-group col-xs-6">
                               <label for="txtTelefono">Telefono:*</label>
		               <input type="text" id="txtTelefonoAct" class="form-control">
                            </div>
                            <div class="form-group col-xs-6">
                               <label for="txtCorreo">Correo:*</label>
                                   <input type="text" id="txtCorreoAct" class="form-control">
                            </div>
                            <div class="form-group col-xs-12">
                                <div id="DivMensajeAct"></div>
                            </div>
                        </div>
                     </div>
                  </form>
                </div>
                <div class="modal-footer">
                    <button type="button" id="btnAceptarAct" onclick="actualizarRestaurador()" class="btn btn-primary">Actualizar</button>
                    <button type="button" class="btn btn-alert" data-dismiss="modal">Salir</button>
                </div>
            </div>
         </div>
       </div>
</body>
</html>
<?php                                   } ?>