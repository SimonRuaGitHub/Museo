<?php
class TecnicasGestion
{
      private $registros;

	  public function consultarTecnicas($conexion)
	  {
             $query = "SELECT codigo,nombre,descripcion FROM tecnicas";

             $sqlEx =  $conexion -> prepare($query);
             $sqlEx -> execute();
             $this->registros = $sqlEx -> fetchAll(PDO::FETCH_ASSOC);
             
             return $this->registros;
	  }	

	  public function insertarTecnica($tecnica,$conexion)
      {
             $ins = "INSERT INTO tecnicas(nombre,descripcion) VALUES(?,?)";

             $sqlEx = $conexion -> prepare($ins);
             $sqlEx -> execute(  array( $tecnica->getNombre() , $tecnica->getDescripcion() ) );

             return "true";
      }

      public function eliminarTecnica($nombre,$conexion)
      {
            $ins = "DELETE FROM tecnicas WHERE nombre = ?";

            $sqlEx = $conexion -> prepare($ins);
            $sqlEx -> execute( array( $nombre ) );

            return "true";
      }

      public function actualizarTecnica($tecnica,$conexion,$nombre)
      {
             $ins = "UPDATE tecnicas  SET nombre = :nuevoNom , descripcion = :nuevaDesc
                     WHERE nombre = :nombre";

             $sqlEx = $conexion -> prepare($ins);
             $sqlEx -> bindParam(':nombre' , $nombre);
             $sqlEx -> bindParam(':nuevoNom' , $tecnica->getNombre());
             $sqlEx -> bindParam(':nuevaDesc' , $tecnica->getDescripcion());
             $sqlEx -> execute();

             return "true";
      }
}

?>