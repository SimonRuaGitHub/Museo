<?php session_start(); ?>
<?php if(isset($_SESSION['user_name'])) { ?>  
<!DOCTYPE html>
<html>
<head>
       <title>Inventario Catalogo</title>
       <!--ESTILOS -->
	   <link type="text/css" rel ="stylesheet"  href = "../decoradores/Bootstrap_libs/css/bootstrap.min.css"/>
	   <link type="text/css" rel ="stylesheet"  href = "../decoradores/estiloGestionCatalogo.css"/>
	   <!-- SCRIPTS -->
	   <script type = "text/javascript" src = "../Scripts/JQuery_libs/jquery-1.11.3.min.js"></script>  
	   <script type = "text/javascript" src = "../decoradores/Bootstrap_libs/js/bootstrap.min.js"></script>   
	   <script type = "text/javascript" src = "../Scripts/Validaciones/Tabla.js"></script>
	   <meta charset = "utf-8">
</head>
<body onload = "consultarTodasObras()">
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

    <!-- Collect the nav links, forms, and other content for toggling -->
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
     <!-- Actions in table -->
<div id = "btnAction" class="btn-group">
  <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Action <span class="caret"></span>
  </button>
  <ul class="dropdown-menu">
    <li><a href="#" onclick="actualizarObra()">Actualizar</a></li>
    <li><a href="#">Eliminar</a></li>
    <li role="separator" class="divider"></li>
    <li><a href="#">Cambiar estado</a></li>
  </ul>
</div>
     <br><br>
 <table id="tblObras" class="table table-responsive table-bordered">
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
</body>
</html>
<?php                                   } ?>

