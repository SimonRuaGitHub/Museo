<?php
/**
 * Descripcion de script php: RestauradoresControlador
 * Script de controlador para invocar metodos,, para la gestion de la informacion
 * de los Restauradores
 */
require('./Restauradores.php');
require('./RestauradorDAO.php');
require('./conexion_bd.php');


$gestorDAO = new RestauradorDAO();
$opcion = $_REQUEST['accion'];

switch($opcion)
{
       case 'registrar':RestauradoresControlador::registrarRestaurador($gestorDAO);
       break;
       
       case 'eliminar':RestauradoresControlador::eliminarRestaurador($gestorDAO);
       break;
   
       case 'actualizar':RestauradoresControlador::actualizarRestuarador($gestorDAO);
       break; 
   
       case 'consultarTodos':RestauradoresControlador::consultarRestauradores($gestorDAO);
       break; 
   
       case 'test': print 'sucessful connection with service';
       break;
}
//----------------------clase controladora--------------------------------------
class RestauradoresControlador
{
       private function cargarParametros()
       {
              $cedula = $_REQUEST['cedula'];
              $nombres = $_REQUEST['nombres'];
              $apellidos = $_REQUEST['apellidos'];
              $correo = $_REQUEST['correo'];
              $telefono = $_REQUEST['telefono'];
              
              $restaurador = new Restauradores($cedula, $nombres, $telefono, $correo, $apellidos);
              
              return $restaurador;
       }
       
       public function registrarRestaurador($gestor)
       {             
              $restaurador = self::cargarParametros();   
              $response = NULL;
              
              $con = conexion_bd::conectar();
              $response = $gestor->registrarRestaurador($restaurador,$con);
              conexion_bd::desconectar();
              
              print $response;
       }
       
       public function eliminarRestaurador($gestor)
       {
              $response = NULL;
       
              $cedula = $_REQUEST['cedula'];
              
              $con = conexion_bd::conectar();
              $response = $gestor->eliminarRestaurador($cedula,$con);
              conexion_bd::desconectar();
              
              print $response;
       }
       
       public function actualizarRestuarador($gestor)
       {
              $restaurador = self::cargarParametros();   
              $response = NULL;
              
              $cedulaOriginal = $_REQUEST['cedulaOriginal'];
              
              $con = conexion_bd::conectar();
              $response = $gestor->actualizarRestaurador($restaurador,$cedulaOriginal,$con);
              conexion_bd::desconectar();
              
              print $response;
       }
       
       public function consultarRestauradores($gestor)
       {
              header('Content-type: application/json');
              
              $con = conexion_bd::conectar();
              $response = $gestor->consultarTodosRestauradores($con);
              conexion_bd::desconectar();
              
              print json_encode($response);
       }
}