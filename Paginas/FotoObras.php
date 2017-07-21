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
           <script type = "text/javascript" src = "../Scripts/Validaciones/cargarOpciones.js"></script>
           <script type = "text/javascript" src = "../Scripts/Validaciones/validarRegistroObras.js"></script>
           <script type = "text/javascript" src = "../Scripts/Validaciones/cargarFotos.js"></script>
           <meta charset="UTF-8">
    </head>
    <body onload="cargarObrasNombres()">
      <?php include './Template/HeaderGC.php' ?>
        <div class="section">
          <div class="container">
            <div class="row">
              <div class="col-lg-12">
                         <div class="col-md-4"></div>
                         <div class="col-md-5">
                             <h3>Imagenes de las obras</h3>
                             <br>
                                <div class="form-group">
                                      <label class="control-label">Seleccionar obra: *</label>
                                          <input id="nombreObra" name="nombreObra" list="nombresObras"/>
                                       <datalist id="nombresObras">
                                       </datalist>
                                </div>
                                <div class="form-group">
                                      <label class="control-label" for="Nombres">Anexar foto obra: *</label>
                                      <input id="imagen" name="fotoObra" type="file"/>
                                </div>
                                <br>
                                <button type="button" class="btn btn-success" onclick="guardarImagen()">Guardar 
                                    <span class="glyphicon glyphicon-save-file"></span></button>
                                <br>
                                <button type="button" class="btn btn-success" onclick="cargarObrasFotos()">Consultar Fotos 
                                    <span class="glyphicon glyphicon-search"></span></button>
                                <br>
                                <br>
                                <br>
                                 <img id="foto">
                             <br>
                             <br>
                             <label id="mensajeFoto"></label>
                         </div>
                         <div class="col-md-3"></div>
              </div>
            </div>
          </div>
        </div>
    </body>
</html>
<?php                                   } ?>