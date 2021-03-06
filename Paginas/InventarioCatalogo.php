<?php session_start(); ?>
<?php if(isset($_SESSION['user_name'])) { ?>  
<!DOCTYPE html>
<html>
<head>
           <title>Inventario Catalogo</title>
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
           <script type = "text/javascript" src = "../Scripts/Validaciones/EliminarObra.js"></script>
           <script type = "text/javascript" src = "../Scripts/Validaciones/ActualizarObra.js"></script>
           <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
           <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
           <script src="../Scripts/dataTable/js/jquery.dataTables.min.js"></script>
           <script src="../Scripts/dataTable/js/dataTables.bootstrap.min.js"></script>  
           <script src="../Scripts/dataTable/js/dataTables.select.min.js"></script>
           <script src="../Scripts/Validaciones/cargarOpciones.js"></script>
           <script src="../Scripts/Validaciones/validarRegistroObras.js"></script>
           <script src="../Scripts/Validaciones/bloquearCamposNumericosObras.js"></script>
	   <meta charset = "utf-8">
</head>
<body onload="consultarTodasObras();cargarOpciones();">
   <?php include './Template/HeaderGC.php' ?>
   <div class="container-fluid">
        <h2>Obras</h2>
        <p>
           <div class="dropdown">
             <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">Accion
             <span class="caret"></span></button>
             <ul class="dropdown-menu">
                 <li><a id="aAct" href="#" onclick="iniciarDatosActualizar()">Actualizar obra seleccionada</a></li>
               <li><a id="aElim" href="#" onclick="iniciarDatosEliminar()" >Eliminar obra seleccionada</a></li>
             </ul>
           </div>
        </p>
        <table id="tblObras"  class="table table-bordered table-striped table-hover" cellspacing="0" width="100%">
          <thead>
            <tr>
              <th></th>
              <th>Codigo</th>
              <th>Tipo</th>
              <th>Nombre</th>
              <th>Fecha creacion</th>
              <th>Periodo</th>
              <th>Fecha entrada</th>
              <th>Material</th>
              <th>Valor</th>
              <th>Cantidad</th>
              <th>Estado</th>
              <th>Autores</th>
              <th>Tecnica</th>
              <th>Estilo</th>
              <th>Sala</th>
            </tr>
          </thead>
          <tbody>

          </tbody>
        </table>
        <!-- Modal Eliminar-->
        <div class="modal fade" id="ModalEliminar" role="dialog">
         <div class="modal-dialog modal-sm">
             <!-- Modal content-->
             <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Atencion</h4>
                </div>
                <div class="modal-body">
                    <h5>¿Esta seguro de borrar la obra?.</h5>
                    <h4><p id="obra"></p></h4>
                </div>
                <div class="modal-footer">
                  <button type="button" id="btnAceptarElim" class="btn btn-danger" data-dismiss="modal">Aceptar</button>
                  <button type="button" class="btn btn-alert" data-dismiss="modal">Cancelar</button>
                </div>
            </div>
         </div>
       </div>
       <!-- Modal Actualizar -->
       <div class="modal fade" id="ModalAct" role="dialog">
         <div class="modal-dialog modal-lg">
             <!-- Modal content-->
             <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">Atencion</h4>
                   <h5>Por favor ingrese los siguientes campos para actualizar la obra</h5>
                </div>
                <div class="modal-body">         
                    <form role="form" onload="hola()">
                     <div class="container-fluid">
                        <div class="row">
                            <div class="form-group col-xs-4">
                                    <label for="txtCodigo">Codigo:*</label>
                                    <input type="text" class="form-control" id="txtCodigo">
                            </div>
                            <div class="form-group col-xs-8">
                              <div class="form-group col-sm-4">
                                 <label for="txtValor">Valor:*</label>
                                 <input type="number" min="1"  step="0.01" onkeypress="esNumeroReal(event)" class="form-control" id="txtValor">
                              </div>
                            </div>
                            <div class="form-group col-xs-6">
                              <label for="txtNombre">Nombre:*</label>
                              <input type="text" class="form-control" id="txtNombre">
                            </div>
                            <div class="form-group col-xs-6">
                               <div class="col-xs-6">
                                    <label for="cboxEstado">Estado:*</label>
                                    <select id="cboxEstado" class="form-control">
                                         <option value="0">Seleccione</option>
                                         <option value="1">disponible</option>
                                         <option value="2">restauracion</option>
                                    </select>
                               </div>
                            </div>
                            <div class="form-group col-xs-4">
                              <label for="txtTipo">Tipo:*</label>
                              <input type="text" class="form-control" id="txtTipo">
                            </div>
                            <div class="form-group col-xs-8">
                              <div class="form-group col-sm-4">
                                 <label for="txtCantidad">Cantidad:*</label>
                                 <input id="txtCantidad" class="form-control" type="number" min="1"  step="1" onkeypress="esNumeroNatural(event)" >
                              </div>
                            </div>
                            <div class="form-group col-xs-6">
                              <label for="txtFechaCr">Fecha creacion:*</label>
                              <input type="text" class="form-control" id="txtFechaCr">               
                            </div>
                            <div class="form-group col-xs-6">
                              <label for="txaMaterial">Material:</label>
		              <textarea id="txaMaterial" rows = "3" class="form-control"></textarea>   
                            </div>
                            <div class="form-group col-xs-6">
                              <label for="txtPeriodo">Periodo:*</label>
                              <input type="text" class="form-control" id="txtPeriodo">
                              <br><br>
                              <div class="form-group col-xs-7">
                                <label for="DtEntrada">Fecha de entrada al museo:*</label>
                                <input type="date" id="DtEntrada"  min="1910-01-01" class="form-control"/>
                                <label for="cboxEstilo">Estilo:</label>
                                <select id="cboxEstilo" class="form-control">
                                         <option value="0">Seleccione</option>
                                </select>
                                <label for="cboxTecnica">Tecnica:</label>
                                <select id="cboxTecnica" class="form-control">
                                         <option value="0">Seleccione</option>
                                </select>  
                            </div>
                            </div>
                            <div class="form-group col-xs-6">
                              <label for="txaAutores">Autores:</label>
		              <textarea id="txaAutores" rows = "3" class="form-control"></textarea>
                              <br>
                              <label for="txtSala">Sala:</label>
                              <input type="text" class="form-control" id="txtSala">
                              <br><br>
                              <div id="DivMensaje"></div>
                            </div>
                        </div>
                     </div>
                  </form>
                </div>
                <div class="modal-footer">
                    <button type="button" id="btnAceptarAct" onclick="validarActualizarObra()" class="btn btn-primary">Actualizar obra</button>
                    <button type="button" class="btn btn-alert" data-dismiss="modal">Cancelar</button>
                </div>
            </div>
         </div>
       </div>
     </div>
</body>

</html>
<?php                                   } ?>

