<?php
require('Usuario.php');
require('UsuarioGestion.php');
require('conexion_bd.php');

session_start();

$GestorUsuarios =  new UsuarioGestion();

$opcion = $_REQUEST['accion'];

switch($opcion)
{
      case "verificar": UsuarioControlador::verificarUsuario($GestorUsuarios);
      break;

      case "insertar": UsuarioControlador::insertarUsuario($GestorUsuarios);
      break;

      case "eliminar": UsuarioControlador::eliminarUsuario($GestorUsuarios);
      break;

      case "actualizar": UsuarioControlador::actualizarUsuario($GestorUsuarios);
      break;
}
//-------------------------clase controladora--------------------------------
class UsuarioControlador
{
	  public function verificarUsuario($gUsuario)
	  {
             $Usuario = new Usuario();

             $Usuario->setNombreUsuario($_REQUEST['usuario']);
             $Usuario->setContrasena($_REQUEST['contrasena']);

             $conexion = conexion_bd::conectar();
             $validador = $gUsuario->verificarUsuario($Usuario,$conexion);
             conexion_bd::desconectar();

             print $validador;
	  }
	  
	  public function insertarUsuario($gUsuario)
	  {
		     $Usuario = new Usuario();
           
             $Usuario->setRol($_REQUEST['rol']);
             $Usuario->setNombreUsuario($_REQUEST['usuario']);
             $Usuario->setContrasena($_REQUEST['contrasena']);

             $conexion = conexion_bd::conectar();
             $validador = $gUsuario->insertarUsuario($Usuario,$conexion);
             conexion_bd::desconectar();

             print $validador;
	  }
	  
	  public function eliminarUsuario($gUsuario)
	  {
             $Usuario = new Usuario();
           
             $Usuario->setNombreUsuario($_REQUEST['usuario']);
             $Usuario->setContrasena($_REQUEST['contrasena']);

             $conexion = conexion_bd::conectar();
             $validador = $gUsuario->eliminarUsuario($Usuario,$conexion);
             conexion_bd::desconectar();

             print $validador;
	  }
	  
	  public function actualizarUsuario($gUsuario)
	  {
		     $Usuario = new Usuario();

             $nom_usuario = $_REQUEST['nombreUsuario'];
             $contrasena = $_REQUEST['contrasena'];

             $Usuario->setRol($_REQUEST['nRol']);
             $Usuario->setNombreUsuario($_REQUEST['nUsuario']);
             $Usuario->setContrasena($_REQUEST['nContrasena']);

             $conexion = conexion_bd::conectar();
             $validador = $gUsuario->actualizarUsuario($Usuario,$conexion,$nom_usuario,$contrasena);
             conexion_bd::desconectar();

             print $validador;
	  }
}
?>