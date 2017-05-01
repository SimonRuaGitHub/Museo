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
 <?php include './Template/HeaderGC.php' ?>
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
		   <label for="txtCantidad">Cantidad:*</label>
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
                  <input type="button" id="btnRegistrarObra" onclick="validarRegistrarObra()" class="btn btn-success animation-custom" value="Registrar Obra"/>
		  <br><br>
		  <div id = "DivMensaje"></div>
		</div>
      </div>	  
   </div>
 </form>
</body>
</html>
<?php                                   } ?>