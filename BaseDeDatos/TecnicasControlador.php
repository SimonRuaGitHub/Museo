<?php
require('conexion_bd.php');
require('TecnicasGestion.php');
require('Tecnicas.php');

$GestorTecnicas = new TecnicasGestion();

$opcion = $_REQUEST['accion'];

switch($opcion)
{
      case "retornar": TecnicasControlador::retornarTecnicas($GestorTecnicas);
      break;

      case "insertar": TecnicasControlador::insertarTecnica($GestorTecnicas);
      break;

      case "eliminar": TecnicasControlador::eliminarTecnica($GestorTecnicas);
      break;

      case "actualizar": TecnicasControlador::actualizarTecnica($GestorTecnicas);
      break;
}
//-------clase controlador--------------------------------------------------------
class TecnicasControlador
{
       public static function retornarTecnicas($gTecnicas)
       {
       	      $conexion = conexion_bd::conectar();
              $nombresTecnicas = $gTecnicas -> consultarTecnicas($conexion); 
              conexion_bd::desconectar();

              print json_encode($nombresTecnicas);
       }

       public static function insertarTecnica($gTecnicas)
       {
       	      $Tecnica = new Tecnicas();

       	      $Tecnica->setNombre($_REQUEST['nombre']);
       	      $Tecnica->setDescripcion($_REQUEST['descripcion']);

       	      $conexion = conexion_bd::conectar();
       	      $validador = $gTecnicas -> insertarTecnica($Tecnica,$conexion); //validador de insercion
       	      conexion_bd::desconectar();

       	      print $validador;
       }

       public static function eliminarTecnica($gTecnicas)
       {
              $nombre = $_REQUEST['nombre'];

       	      $conexion = conexion_bd::conectar();
       	      $validador = $gTecnicas -> eliminarTecnica($nombre,$conexion); //validador de insercion
       	      conexion_bd::desconectar();
               
              print $validador;          
       }

       public static function actualizarTecnica($gTecnicas)
       {
       	     $Tecnica = new Tecnicas();

       	     $nombre = $_REQUEST['nombre'];
       	     $Tecnica->setNombre($_REQUEST['nNombre']);
       	     $Tecnica->setDescripcion($_REQUEST['nDescripcion']);

       	     $conexion = conexion_bd::conectar();
       	     $validador = $gTecnicas -> actualizarTecnica($Tecnica,$conexion,$nombre); //validador de insercion
       	     conexion_bd::desconectar();
               
             print $validador;   
       }
}
?>