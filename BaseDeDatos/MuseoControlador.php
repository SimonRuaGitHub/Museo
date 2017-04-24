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
   
       case 'registrar': MuseoControlador::registrarMuseo($gestor);
       break;
   
       case 'eliminar': MuseoControlador::eliminarMuseo($gestor);
       break;
   
       case 'actualizar': MuseoControlador::actualizarMuseo($gestor);
       break;    
}

//----------------------------------------------------

class MuseoControlador
{
      /**
       * 
       * @param type $gestor
       */
      public static function buscarMuseos($gestor)
      {
            header('Content-type: application/json');
            $conexion = conexion_bd::conectar();
            $infoMuseos = $gestor->buscarMuseos($conexion);
            conexion_bd::desconectar();

            print json_encode($infoMuseos);
      }
      
      /**
       * 
       * @param type $gestor
       * imprime registrado = TRUE, caso de insercio halla sido correcta
       */
      public static function registrarMuseo($gestor)
      {
            header('Content-type: application/text');
            $nit = $_REQUEST['nit'];
            $nombre = $_REQUEST['nombre'];
            $museo = new Museo($nit,$nombre);   
            
            $con = conexion_bd::conectar();
            $registrado = $gestor->registrarMuseo($museo,$con);
            conexion_bd::desconectar();
            
            print $registrado;
      }
      
      public static function eliminarMuseo($gestor)
      {
          $nit = $_REQUEST['nit'];
          
          $con = conexion_bd::conectar();
          $eliminado = $gestor->eliminarMuseo($nit,$con);
          conexion_bd::desconectar();
          
          print $eliminado;
      }
      
      
      public static function actualizarMuseo($gestor)
      {  
            $nit = $_REQUEST['nit'];
            $nuevoNit = $_REQUEST['nuevo_nit'];
            $nuevoNombre = $_REQUEST['nuevo_nombre'];
            $museo = new Museo($nuevoNit,$nuevoNombre);   
            
            $con = conexion_bd::conectar();
            $actualizado = $gestor->actualizarMuseo($nit,$museo,$con);
            conexion_bd::desconectar();
            
            print $actualizado;
      }
}

