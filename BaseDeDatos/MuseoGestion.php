<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MuseoGestion
 *
 * @author Simon Rua
 */
class MuseoGestion
{
      /**
       * 
       * @param type $museo
       * @param type $conexion
       * @return boolean
       */
      public function registrarMuseo($museo,$conexion)
      {
             $query="INSERT INTO museos (ID, nombre) VALUES (?,?)";
             
             $sqlEx = $conexion->prepare($query);
             $sqlEx -> execute(array ($museo->getNit(),$museo->getNombre()) );
             
             return TRUE;
      }
      
      /**
       * 
       * @param type $nit
       * @param type $conexion
       * @return boolean
       */
      public function eliminarMuseo($nit,$conexion)
      {
           $query="DELETE FROM museos WHERE ID = :nit";
           
           $sqlEx = $conexion->prepare($query);
           $sqlEx -> bindparam(':nit',$nit); 
           $sqlEx -> execute();
           
           return TRUE;
      }
      
      /**
       * 
       * @param type $nit
       * @param type $museo
       * @param type $conexion
       * @return boolean
       */
      public function actualizarMuseo($nit,$museo,$conexion)
      {
             $query="UPDATE museos SET ID = ?,nombre = ? WHERE ID = ?";
             $paramSearch = $nit;
             $arrayParams = array( $museo->getNit(),$museo->getNombre() , $paramSearch );
             
             $sqlEx = $conexion -> prepare($query);
             $sqlEx -> execute($arrayParams);
             
             return TRUE;
      }
      
       /**
        * 
        * @param type $conexion
        * @return type $infoMuseos
        */
      public function buscarMuseos($conexion)
      {
              $query = "SELECT * FROM museos";
              
              $sqlEx = $conexion->prepare($query);
              $sqlEx->execute();
              $infoMuseos = $sqlEx -> fetchAll(PDO::FETCH_ASSOC);
              
              return $infoMuseos;
      }
}