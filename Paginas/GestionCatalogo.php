<?php session_start(); ?>
<?php if(isset($_SESSION['user_name'])) { ?>  
<!DOCTYPE html>
<html>
<head>
       <title>Gestion de catalogo</title>
       <!--ESTILOS -->
	   <link type="text/css" rel ="stylesheet"  href = "../decoradores/Bootstrap_libs/css/bootstrap.min.css"/>
	   <link type="text/css" rel ="stylesheet"  href = "../decoradores/estiloGestionCatalogo.css"/>
	   <!-- SCRIPTS -->
	   <script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/modernizr/modernizr-1.7-development-only.js"></script>
	   <script type = "text/javascript" src = "../Scripts/JQuery_libs/jquery-1.11.3.min.js"></script>  
	   <script type = "text/javascript" src = "../decoradores/Bootstrap_libs/js/bootstrap.min.js"></script>   
           <script type = "text/javascript" src = "../Scripts/Validaciones/validarRegistroObras.js"></script>
	   <script type = "text/javascript" src = "../Scripts/Validaciones/bloquearCamposNumericosObras.js"></script>
           <script type = "text/javascript" src = "../Scripts/Validaciones/cargarOpciones.js"></script>
           <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
           <script src="//code.jquery.com/jquery-1.10.2.js"></script>
           <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
	   <meta charset = "utf-8">
</head>
<body onload = "cargarOpciones()">
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
	      <img src="../Imagenes/museo.png"">
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
 <form>
    <div class="container">
	  <div class="col-md-5">
        <label for="txtCodigo">Codigo:*</label>
        <input type="text" id="txtCodigo" class="form-control"/>
		<label for="txtNombre">Nombre:*</label>
        <input type="text" id="txtNombre" class="form-control"/>
		<label for="txtTipo">Tipo:*</label>
        <input type="text" id="txtTipo" class="form-control"/>   
		<label for="txtFechaCr">Fecha&nbsp;creacion:*</label>
        <input type="text" id="txtFechaCr" class="form-control"/>
		<label for="txtPeriodo">Periodo:*</label>
		<input type="text" id="txtPeriodo" class="form-control"/>
		<br>
	   <div class="col-xs-6">
		 <label for="DtEntrada">Fecha&nbsp;entrada&nbsp;museo:*</label>
		 <input type="date" id="DtEntrada"  min="1910-01-01" class="form-control"/>
		 <label for="cboxEstilo">Estilo:</label>
		 <select id="cboxEstilo" class="form-control" onclick="abrirModalEstilo()">
		     <option value="seleccione">Seleccione</option>
			 <option value="nuevo">Nuevo..</option>
		 </select>
		 <label for="cboxTecnica">Tecnica:</label>
		 <select id="cboxTecnica" class="form-control">
		      <option value="seleccione">Seleccione</option>
		      <option value="nuevo">Nuevo..</option>
		 </select>  
	    </div>
	  </div>	
      <div class="col-xs-6">
	    <div class="col-xs-5">
	      <label for="txtValor">Valor:*</label>
          <input type="number" id="txtValor" min="1"  step="0.01" onkeypress="esNumeroReal(event)" class="form-control" />
		</div>
		</br><br><br>
	    <div class="col-xs-4">
		   <label for="cboxEstado">Estado:*</label>
		   <select id="cboxEstado" class="form-control"/>
		     <option value="0">Seleccione</option>
			 <option value="1">disponible</option>
			 <option value="2">restauracion</option>
		   </select>  
		</div>
		<br><br><br>
		<div class="col-xs-4">
		   <label for="txtNombre">Cantidad:*</label>
           <input type="number" id="txtCantidad" min="1"  step="1" onkeypress="esNumeroNatural(event)" class="form-control"/>
		   </br>
		</div>
		<br><br><br><br>
		<div class="col-md-10">
		  <label for="txaMaterial">Material:</label>
		  <textarea id="txaMaterial" rows = "3" class="form-control"></textarea>
		  <br>
		  <label for="txaAutores">Autores:</label>
		  <textarea id="txaAutores" rows = "3" class="form-control"></textarea>
		  <br>
		  <input type="button" id="btnRegistrarObra" onclick="validarDatos()" class="btn btn-success animation-custom" value="Registrar Obra"/>
		<!--  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#ModalEstilo">Open Modal</button> -->
		  <br><br>
		  <div id = "DivMensaje"></div>
		</div>
      </div>	  
   </div>
 </form>
</body>
</html>
<?php                                   } ?>