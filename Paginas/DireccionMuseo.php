<!DOCTYPE html>
<?php session_start(); ?>
<?php if(isset($_SESSION['user_name'])) { ?>  
<html>
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <script type="text/javascript" src="http://netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="../decoradores/estiloDireccionMuseo.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="../Scripts/Validaciones/Direccion.js"></script>
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
          <a class="navbar-brand" href="#"><span>Museumlucky</span></a>
        </div>
        <div class="collapse navbar-collapse" id="navbar-ex-collapse">
          <ul class="nav navbar-nav navbar-right">
            <li>
              <a><span class="glyphicon glyphicon-user"></span> <?php print $_SESSION['user_name'] ?></a>
            </li>
            <li>
                  <form class="navbar-form navbar-left">
                   <a id="btnCerrarSesion" class="btn btn-danger" href="CerrarSesion.php">
		       <span class="glyphicon" aria-hidden="true"></span>&nbsp;Cerrar sesion
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
          <div class="col-md-offset-3 col-md-6">
              <button class="btn btn-warning" onclick="consultarValorTotalObras()">Obtener total</button>
              <div class="col-12">
                <hr>
              </div>
              <div class="col-xs-5">
                <input id="txtValorTotal" type="text" class="form-control" placeholder="valor total obras">
              </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
<?php                                   } ?>