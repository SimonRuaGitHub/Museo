<?php
/**
 * Description of RestauradoresGestion:
 * Clase con la logica para la gestion de la informacion de los restauradores
 */
class RestauradoresGestion 
{
      /**
       * Metodo para dar de alta al restaurador    
      * @param Restauradores $restaurador
      * @param conexion_bd $con
       * @return boolean
       */
      public function registrarRestaurador($restaurador,$con)
      {
             $query = "INSERT INTO restauradores(Cedula,Nombres,Apellidos,Telefono,Correo)
                       VALUES(?,?,?,?,?)";
             $infoRestaurador = array($restaurador->getCedula(),$restaurador->getNombres(),
                                      $restaurador->getApellidos(),$restaurador->getTelefono(),
                                      $restaurador->getCorreo());
                     
             $sqlEx =  $con -> prepare($query);
             $sqlEx -> execute($infoRestaurador);
             
             return TRUE;
      }
      
      /**
       * Metodo para eliminar Restaurador 
       * @param type $cedula
       * @param type $con
       * @return boolean
       */
      public function eliminarRestaurador($cedula,$con)
      {
            $query = "DELETE FROM restauradores WHERE cedula = :cedula";
            
            $sqlEx = $con -> prepare($query);
            $sqlEx -> bindParam(":cedula",$cedula);
            $sqlEx -> execute();
            
            return TRUE;   
      }
      
      
      /**
       * Metodo para actualizar info de los restauradores
       * @param Restauradores $restaurador
       * @param type $cedula
       * @param type $con
       * @return boolean 
       */
      public function actualizarRestaurador($restaurador,$cedula,$con)
      {
             $st = "UPDATE restauradores SET `Cedula`= ?, `Nombres`= ?, `Telefono` = ?, `Correo` = ?, `Apellidos`= ? "
                     . "WHERE `Cedula` = ?";
             
             $infoRestaurador = array($restaurador->getCedula(),$restaurador->getNombres(),  
                                      $restaurador->getTelefono(),$restaurador->getCorreo(),$restaurador->getApellidos()
                                      ,$cedula);
             
             $sqlEx = $con->prepare($st);
             $sqlEx -> execute($infoRestaurador);
            
             //Retorna TRUE  cuando actualiza exitosamente 
             return TRUE;
      }
}
