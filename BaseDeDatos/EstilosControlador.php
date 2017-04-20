<?php
require('conexion_bd.php');
require('EstilosGestion.php');
require('Estilos.php');

$GestorEstilos = new EstilosGestion();

$opcion = $_REQUEST['accion'];

switch($opcion)
{
      case "retornar": EstilosControlador::retornarEstilos($GestorEstilos);
      break;

      case "insertar": EstilosControlador::insertarEstilo($GestorEstilos);
      break;

      case "eliminar": EstilosControlador::eliminarEstilo($GestorEstilos);
      break;

      case "actualizar": EstilosControlador::actualizarEstilo($GestorEstilos);
      break;
}

//------------------clase controladora------------------------------------
class EstilosControlador
{
       public static function retornarEstilos($gEstilos)
       {
       	      $conexion = conexion_bd::conectar();
              $nombresEstilos = $gEstilos -> consultarEstilos($conexion); 
              conexion_bd::desconectar();

              print json_encode($nombresEstilos);
       }

       public static function insertarEstilo($gEstilos)
       {
       	      $estilo = new Estilos();

       	      $estilo->setNombre($_REQUEST['nombre']);
       	      $estilo->setDescripcion($_REQUEST['descripcion']);

       	      $conexion = conexion_bd::conectar();
       	      $validador = $gEstilos -> insertarEstilo($estilo,$conexion); //validador de insercion
       	      conexion_bd::desconectar();

       	      print $validador;
       }

       public static function eliminarEstilo($gEstilos)
       {
              $nombre = $_REQUEST['nombre'];

       	      $conexion = conexion_bd::conectar();
       	      $validador = $gEstilos -> eliminarEstilo($nombre,$conexion); //validador de insercion
       	      conexion_bd::desconectar();
               
              print $validador;          
       }

       public static function actualizarEstilo($gEstilos)
       {
       	     $estilo = new Estilos();

             $estilo->setCodigo($_REQUEST['codigo']);
       	     $estilo->setNombre($_REQUEST['nNombre']);
       	     $estilo->setDescripcion($_REQUEST['nDescripcion'] == "" ? null:$_REQUEST['nDescripcion']);

       	     $conexion = conexion_bd::conectar();
       	     $validador = $gEstilos -> actualizarEstilo($estilo,$conexion); //validador de insercion
       	     conexion_bd::desconectar();
               
             print $validador;   
       }
}
?>