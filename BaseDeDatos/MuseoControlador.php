<?php
require('./conexion_bd.php');
require('./MuseoGestion.php');
require('./Museo.php');

$gestor = new MuseoGestion();
$opcion = $_REQUEST['accion'];

switch($opcion)
{
       case 'retornarTodos': MuseoControlador::buscarMuseos($gestor);
       break;
}

//----------------------------------------------------

class MuseoControlador
{
      public static function buscarMuseos($gestor)
      {
            header('Content-type: application/json');
            $conexion = conexion_bd::conectar();
            $infoMuseos = $gestor->buscarMuseos($conexion);
            conexion_bd::desconectar();

            print json_encode($infoMuseos);
      }
}

