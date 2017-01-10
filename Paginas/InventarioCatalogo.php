<?php session_start(); ?>
<?php if(isset($_SESSION['user_name'])) { ?>  
<!DOCTYPE html>
<html>
<head>
           <title>Inventario Catalogo</title>
           <!--ESTILOS -->
	   <link type="text/css" rel ="stylesheet"  href = "../decoradores/Bootstrap_libs/css/bootstrap.min.css"/>
	   <link type="text/css" rel ="stylesheet"  href = "../decoradores/estiloGestionCatalogo.css"/>
           <link type="text/css" rel="stylesheet" href="../decoradores/dataTable/css/dataTables.bootstrap.min.css">
           <link type="text/css" rel="stylesheet" href="../decoradores/dataTable/css/select.bootstrap.css">
	   <!-- SCRIPTS -->
           <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
	   <script type = "text/javascript" src = "../Scripts/JQuery_libs/jquery-1.11.3.min.js"></script>  
	   <script type = "text/javascript" src = "../decoradores/Bootstrap_libs/js/bootstrap.min.js"></script>   
	   <script type = "text/javascript" src = "../Scripts/Validaciones/Tabla.js"></script>
           <script src="../Scripts/dataTable/js/jquery.dataTables.min.js"></script>
           <script src="../Scripts/dataTable/js/dataTables.bootstrap.min.js"></script>  
           <script src="../Scripts/dataTable/js/dataTables.select.min.js"></script>
	   <meta charset = "utf-8">
</head>
<body onload="consultarTodasObras()">
 <header>
  <nav class="navbar navbar-custom">
   <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
     <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand">
	      <img src="../Imagenes/museo.png">
	  </a>
     </div>

    <!-- Collect the nav links, forms,  and other content for toggling -->
     <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
	  <li><a id="nvRegistrarObras" class="active" href="http://localhost/Museo/Paginas/GestionCatalogo.php">Registrar Obras</a></li>
          <li><a id="nvInventarioObras" href="http://localhost/Museo/Paginas/InventarioCatalogo.php">Inventario</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a id = "UsuarioNom"><span class="glyphicon glyphicon-user"></span> &nbsp;<?php print $_SESSION['user_name'] ?></a></li>
        <form class="navbar-form navbar-left">
           <a id="btnCerrarSesion" class="btn btn-danger" href="CerrarSesion.php">
		       <span class="glyphicon" aria-hidden="true"></span>&nbsp;Cerrar sesion
		   </a>
        </form>  
        </li>
      </ul>
     </div><!-- /.navbar-collapse -->
   </div><!-- /.container-fluid -->
  </nav>
 </header>
   
        <h2>Obras</h2>
        <p>
           <div class="dropdown">
             <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">Accion
             <span class="caret"></span></button>
             <ul class="dropdown-menu">
               <li><a id="aAct" href="#">Actualizar obra seleccionada</a></li>
               <li><a id="aElim" href="#">Eliminar obra seleccionada</a></li>
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
              <th>Museo</th>
              <th>Tecnica</th>
              <th>Estilo</th>
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
                  <p>¿Esta seguro de borrar la obra?.</p>
                  <p id="obra"></p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-warning" data-dismiss="modal">Aceptar</button>
                  <button type="button" class="btn btn-alert" data-dismiss="modal">Cancelar</button>
                </div>
            </div>
         </div>
       </div>
</body>

</html>
<?php                                   } ?>

