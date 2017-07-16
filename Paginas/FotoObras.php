<?php session_start(); ?>
<?php if(isset($_SESSION['user_name'])) { ?>  
<!DOCTYPE html>
<html>
    <head>
           <title>Foto Obras</title>
	   <link type="text/css" rel ="stylesheet"  href = "../decoradores/Bootstrap_libs/css/bootstrap.min.css"/>
	   <link type="text/css" rel ="stylesheet"  href = "../decoradores/estiloGestionCatalogo.css"/>
           <link type="text/css" rel ="stylesheet" href="../decoradores/dataTable/css/select.bootstrap.css">	
           <script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/modernizr/modernizr-1.7-development-only.js"></script>
           <script src="https://code.jquery.com/jquery-1.12.4.js"></script> 
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	   <script type = "text/javascript" src = "../Scripts/JQuery_libs/jquery-1.11.3.min.js"></script>  
	   <script type = "text/javascript" src = "../decoradores/Bootstrap_libs/js/bootstrap.min.js"></script>   
           <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
           <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
           <script src="../Scripts/dataTable/js/dataTables.bootstrap.min.js"></script> 
           <meta charset="UTF-8">
    </head>
    <body>
        <?php include './Template/HeaderGC.php' ?>
        <div class="section">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                  <form id="frmRegistrarRestaurador" role="form">
                         <div class="col-sm-3"></div>
                         <div class="col-sm-6">
                             <div class="form-group">
                                   <input type="file" class="form-control">
                             </div>
                         </div>
                         <div class="col-sm-3"></div>
                  </form>
              </div>
            </div>
          </div>
        </div>
    </body>
</html>
<?php                                   } ?>