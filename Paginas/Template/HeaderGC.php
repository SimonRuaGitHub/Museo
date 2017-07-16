<!DOCTYPE html>
<header>
  <nav class="navbar navbar-default">
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
	    <li><a id="nvRegistrarObras"  href="GestionCatalogo.php">Registrar Obras</a></li>
            <li><a id="nvFotoObras" href="FotoObras.php">Foto Obra</a></li>
            <li><a id="nvInventarioObras" href="InventarioCatalogo.php">Inventario</a></li>
            <li><a id="nvEstilos" href="administrarEstilos.php">Estilos</a></li>
            <li><a id="nvTecnicas" href="administrarTecnicas.php">Tecnicas</a></li>    
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
