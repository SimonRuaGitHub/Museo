<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
       <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
       <title>Pagina principal</title>
       <link type="text/css" rel ="stylesheet"  href = "../decoradores/Bootstrap_libs/css/bootstrap.min.css"/>
	   <link type="text/css" rel ="stylesheet"  href = "../decoradores/estiloIngreso.css"/>
	   <script type = "text/javascript" src = "../Scripts/JQuery_libs/jquery-1.11.3.min.js"></script>
	   <script type = "text/javascript" src = "../Scripts/Validaciones/validarIngreso.js"></script>
</head>
<body background="../Imagenes/galeriaOscura.jpg">
<?php if(empty($_SESSION['user_name'])) { ?>
       </br></br></br>
       <form id = "frmLogin" align = "center" >
		   <label id="lblcontenedor" for = "contenedor" align = "center">CONTROL DE USUARIOS</label>
		   <label id="lblMensaje"></label>
		   <div id = "contenedor" align = "center">
		        </br>
               <div class="input-group">
                   <div class="input-group-addon"><span class="glyphicon glyphicon-user"></span></div>				
		           <input type= "text" name="nombre" id= "txtNombreUsuario" placeholder="Usuario o email" class= "form-control"/>			   
				</div>
				</br>
				<div class="input-group">
                   <div class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></div>
		           <input type= "password" id= "pswContrasena" placeholder="Contraseña" class= "form-control"/>
				</div>
                </br>				
		        <button type= "button" id="btnRegistrar" class = "btn btn-primary" onclick = "validarDatos()">				
				         Iniciar sesion&nbsp;<span class="glyphicon" aria-hidden="true"></span>
				</button>	
				</br></br>
	       </div>
	   </form>
<div class="copyright" align="center">
     <p class="text-muted" >Simon Felipe Rua Vargas &nbsp; &copy; &nbsp; 2016</p>
</div>
<?php                                   } ?>
<!--  Perfil !-->
     
<?php 
      if(isset($_SESSION['user_name'])) 
	  { 
	     header('Location: GestionCatalogo.php');
	  } 
?>
</body>
</html>