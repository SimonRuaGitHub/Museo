<?php session_start(); ?>
<?php if(isset($_SESSION['user_name'])) { ?>  
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title> Restauradores </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link type="text/css" rel ="stylesheet"  href = "../decoradores/Bootstrap_libs/css/bootstrap.min.css"/>
    <script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/modernizr/modernizr-1.7-development-only.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script type = "text/javascript" src = "../Scripts/JQuery_libs/jquery-1.11.3.min.js"></script>  
    <script type = "text/javascript" src = "../decoradores/Bootstrap_libs/js/bootstrap.min.js"></script>
    <script type = "text/javascript" src = "../Scripts/Validaciones/RestauradoresMuseo.js"></script> 
    <script type = "text/javascript" src = "../Scripts/Validaciones/bloquearCamposNumericosObras.js"></script>
    <link href="../decoradores/decoracionRestaurador.css" rel="stylesheet" type="text/css">
  </head>
  <body>
    <div class="navbar navbar-default navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-ex-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <ul class="nav navbar-nav navbar-left">
            <a class="navbar-brand" href="#"><span>MuseumLucky</span></a>
            <li class="active">
              <a href="#">Registro Restaurador</a>
            </li>
            <li>
              <a href="#">Listado</a>
            </li>
          </ul>
        </div>
        <div class="collapse navbar-collapse" id="navbar-ex-collapse">
          <ul class="nav navbar-nav navbar-right">
            <li>
                <a href="#"><span class="glyphicon glyphicon-user"></span> <?php print $_SESSION['user_name'] ?></a>
            </li>
            <li>
              <form class="navbar-form navbar-left">
                <a id="btnCerrarSesion" class="btn btn-danger" href="CerrarSesion.php">
                   <span class="glyphicon glyphicon-triangle-left" aria-hidden="true"></span> Cerrar sesion
                </a>
             </form>  
            </li>
          </ul>
        </div>
      </div>
    </div>
    <div class="section">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <form id="frmRegistrarRestaurador" role="form">
              <div class="col-sm-3"></div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label class="control-label" for="Cedula">Cedula</label>
                  <input type="number" min="1" class="form-control" onkeypress="esNumeroNatural(event)" id="Cedula">
                  <label id="infoCedula"></label>
                </div>
                <div class="form-group">
                  <label class="control-label" for="Nombres">Nombres</label>
                  <input type="text" class="form-control"  id="Nombres">
                  <label id="infoNombres"></label>
                </div>
                <div class="form-group">
                  <label class="control-label" for="Apellidos">Apellidos</label>
                  <input type="text" class="form-control" id="Apellidos">
                   <label id="infoApellidos"></label>
                </div>
                <div class="form-group">
                  <label class="control-label" for="telefono">Telefono</label>
                  <input type="number" class="form-control" onkeypress="esNumeroNatural(event)" id="Telefono">
                  <label id="infoTelefono"></label>
                </div>
                <div class="form-group">
                  <label class="control-label" for="correo">Email</label>
                  <input type="email" class="form-control" id="Correo">
                  <label id="infoCorreo"></label>
                </div>
                <button class="btn btn-default" onclick="validarRegistro()">Registrar <span class="glyphicon glyphicon-pencil"></span></button>
                <br>
                <br>
                <label id="mensaje"></label>
              </div>
              <div class=" col-sm-3 "></div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
<?php                                   } ?>