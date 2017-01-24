<?php
require('Obra.php');
require('ObrasGestion.php');
require('conexion_bd.php');

$Obra = new Obra();
$GestorObras = new ObrasGestion();
$opcion = $_REQUEST['accion'];

switch($opcion)
{
      case "insertar": ObrasControlador::registrarObra($GestorObras,$Obra);
      break;

      case "eliminar":  ObrasControlador::eliminarObra($GestorObras);
      break;

      case "actualizar": ObrasControlador::actualizarObra($GestorObras,$Obra);
      break;

      case "consultar": ObrasControlador::consultarObras($GestorObras);
      break;
}
//-------------------------clase controladora--------------------------------
class ObrasControlador
{
      private function cargarParametros($Obra) 
      {
                  $estilo = ($_REQUEST['estilo'] == "" ? null:$_REQUEST['estilo']);
                  $tecnica = ($_REQUEST['tecnica'] == "" ? null:$_REQUEST['tecnica']);
                  $material = ($_REQUEST['material'] == "" ? null:$_REQUEST['material']);
		  $autores = ($_REQUEST['autores'] == "" ? null:$_REQUEST['autores']);

		 //Campos Obligatorios
		  $Obra->setCodigo($_REQUEST['codigo']);
		  $Obra->setNombre($_REQUEST['nombre']);
		  $Obra->setTipo($_REQUEST['tipo']);
		  $Obra->setPeriodo($_REQUEST['periodo']);
		  $Obra->setFechaCreacion($_REQUEST['fechaCreacion']);
		  $Obra->setFechaEntrada($_REQUEST['fechaEntrada']);
		  $Obra->setValor($_REQUEST['valor']);
		  $Obra->setCantidad($_REQUEST['cantidad']);
		  $Obra->setEstado($_REQUEST['estado']);

		   //Campos opcionales
		  $Obra->setEstilo($estilo);
		  $Obra->setTecnica($tecnica);
		  $Obra->setMaterial($material);
		  $Obra->setAutor($autores);
      }

      public function registrarObra($GestorObras,$Obra)
      {
      	        $con = null;
                self::cargarParametros($Obra);
                
                //envia mensaje de "true"
	        $con = conexion_bd::conectar();
	        $GestorObras->registrarObra($Obra,$con);
		conexion_bd::desconectar();
      }

      public function actualizarObra($GestorObras,$Obra)
      {
             $con = null;
             $mensaje = null;
             $codigoObra = $_REQUEST['codigoViejo'];
             self::cargarParametros($Obra);

             $con = conexion_bd::conectar();
		     $mensaje = $GestorObras->actualizarObra($Obra,$codigoObra,$con);
		     conexion_bd::desconectar();

		     print $mensaje;
      }


      public function consultarObras($GestorObras)
      {
             $con = null;
             $infoObras = null;

             $con = conexion_bd::conectar();
	     $infoObras = $GestorObras->consultarObras($con);
	     conexion_bd::desconectar();

	     print json_encode($infoObras);
      }

     public function eliminarObra($GestorObras)
     {
     	    $con = null;
     	    $mensaje = null;
            $codigoObra = $_REQUEST['codigo'];

            $con = conexion_bd::conectar();
            $mensaje = $GestorObras->eliminarObra($codigoObra,$con);
	    conexion_bd::desconectar();

	    print $mensaje;
     }
}


?>