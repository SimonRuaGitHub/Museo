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
    <?php include './Template/HeaderDM.php'; ?>
    <div class="section">
      <div class="container">
        <div class="row">
          <div class="col-md-offset-3 col-md-6">
              <button class="btn btn-warning" onclick="consultarValorTotalObras()">Obtener total</button>
              <div class="col-12">
                <hr>
              </div>
              <input id="txtValorTotal" type="text" class="form-control" placeholder="valor total obras" readonly>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
<?php                                   } ?>