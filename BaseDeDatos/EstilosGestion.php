<?php
class EstilosGestion
{
        private $registros;

	  public function consultarEstilos($conexion)
	  {
             $query = "SELECT * FROM estilos";

             $sqlEx =  $conexion -> prepare($query);
             $sqlEx -> execute();
             $this->registros = $sqlEx -> fetchAll(PDO::FETCH_ASSOC);
             
             return $this->registros;
	  }	

      public function insertarEstilo($estilo,$conexion)
      {
             $ins = "INSERT INTO estilos(nombre,descripcion) VALUES(?,?)";

             $sqlEx = $conexion -> prepare($ins);
             $sqlEx -> execute(  array( $estilo->getNombre() , $estilo->getDescripcion() ) );

             return "true";
      }

      public function eliminarEstilo($nombre,$conexion)
      {
            $ins = "DELETE FROM estilos WHERE nombre = ?";

            $sqlEx = $conexion -> prepare($ins);
            $sqlEx -> execute( array( $nombre ) );

            return "true";
      }

      public function actualizarEstilo($estilo,$conexion)
      {
             $ins = "UPDATE estilos  SET nombre = :nuevoNom , descripcion = :nuevaDesc
                     WHERE codigo = :codigo";

             $sqlEx = $conexion -> prepare($ins);
             $sqlEx -> bindParam(':codigo' , $estilo->getCodigo());
             $sqlEx -> bindParam(':nuevoNom' , $estilo->getNombre());
             $sqlEx -> bindParam(':nuevaDesc' , $estilo->getDescripcion());
             $sqlEx -> execute();

             return "true";
      }

}
?>