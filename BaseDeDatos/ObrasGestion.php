<?php

class ObrasGestion
{
	 public function registrarObra($obra,$conexion)
	 {
            $ins = "INSERT INTO obras(ID,tipo, nombre,fecha_creacion,periodo,fecha_entrada,material,valor,cantidad,estado,autores,cod_tecnica,cod_estilo) 
                    VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)";

            $sqlEx = $conexion -> prepare($ins);
            $sqlEx -> execute(array( 
                                       $obra->getCodigo(),$obra->getTipo(), $obra->getNombre(),$obra->getFechaCreacion(),
            	                       $obra->getPeriodo(),$obra->getFechaEntrada(),$obra->getMaterial(),$obra->getValor(),
            	                       $obra->getCantidad(),$obra->getEstado(),$obra->getAutor(),$obra->getTecnica(),$obra->getEstilo()
            	                   )
                      );     

            echo TRUE;
	 }

     public function consultarObras($conexion)
     {         
              $query = "SELECT obras.ID, obras.tipo, obras.nombre, obras.fecha_creacion, obras.periodo, 
                               obras.fecha_entrada, obras.material, obras.valor, obras.cantidad, 
                               obras.estado, obras.autores, museos.nombre AS museo,
                               tecnicas.nombre AS tecnica , estilos.nombre AS estilo
                        FROM obras 
                        LEFT JOIN tecnicas ON obras.cod_tecnica = tecnicas.codigo
                        LEFT JOIN estilos ON obras.cod_estilo = estilos.Codigo
                        LEFT JOIN museos ON obras.ID_museo = museos.ID";

              $sqlEx =  $conexion -> prepare($query);
              $sqlEx -> execute();
              $infoObras = $sqlEx -> fetchAll(PDO::FETCH_ASSOC);
              
              return $infoObras;
     }

     public function actualizarObra($Obra,$codigo,$conexion)
     {
             $ins = "UPDATE obras  SET ID = ?,tipo = ?,nombre = ?,fecha_creacion = ?,periodo = ?,fecha_entrada = ?,material = ?,
                                       valor = ?,cantidad = ?,estado = ?,autores = ?,cod_tecnica = ?,cod_estilo = ?
                     WHERE ID = :codigo";

             $sqlEx = $conexion -> prepare($ins);
             $sqlEx -> bindParam(':codigo' , $codigo);
             $sqlEx -> execute(array( 
                                       $obra->getCodigo(),$obra->getTipo(), $obra->getNombre(),$obra->getFechaCreacion(),
                                       $obra->getPeriodo(),$obra->getFechaEntrada(),$obra->getMaterial(),$obra->getValor(),
                                       $obra->getCantidad(),$obra->getEstado(),$obra->getAutor(),$obra->getTecnica(),$obra->getEstilo()
                                   ));

             return "true";
     }

     public function eliminarObra($codigo,$conexion)
     {
             $ins = "DELETE FROM obras WHERE ID = :codigo";

             $sqlEx = $conexion -> prepare($ins);
             $sqlEx -> bindParam(':codigo' , $codigo);
             $validador = $sqlEx -> execute();

             return $validador;
     }
}

?>