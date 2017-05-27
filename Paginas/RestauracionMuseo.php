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
    <script type = "text/javascript" src = "../Scripts/Validaciones/validarRegistroRestaurador.js"></script> 
    <script type = "text/javascript" src = "../Scripts/Validaciones/bloquearCamposNumericosObras.js"></script>
  </head>
  <body>
    <?php include './Template/HeaderJF.php' ?>
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
                  <button type="button" class="btn btn-primary" onclick="validarRegistro()">Registrar <span class="glyphicon glyphicon-pencil"></span></button>
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