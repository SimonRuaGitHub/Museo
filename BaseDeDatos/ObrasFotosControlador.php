<?php
require('Obra.php');
require('ObrasGestion.php');
require('conexion_bd.php');

$Obra = new Obra();
$GestorObras = new ObrasGestion();

/*echo $_FILES['fotoObra']['name'];
echo $_FILES['fotoObra']['tmp_name'];
echo $_REQUEST['nombreObra'];*/

$file = addslashes($_FILES['fotoObra']['tmp_name']);
$file_contents = file_get_contents($file);
$image = base64_encode($file_contents);

if (isset($_FILES['fotoObra']))
{   
    $Obra->setNombre($_REQUEST['nombreObra']);
    $Obra->setImagen($image);
    ObrasFotosControlador::guardarImagenObra($GestorObras,$Obra);
}
else 
{
    print 'file hasn´t been saved';
}

class ObrasFotosControlador
{
     public function guardarImagenObra($GestorObras,$Obra)
     {
             $con = null;

             $con = conexion_bd::conectar();
	     $response = $GestorObras->guardarImagenObra($con,$Obra);
	     conexion_bd::desconectar();

	     print $response;
     }
}



