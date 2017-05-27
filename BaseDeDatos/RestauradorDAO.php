<?php
include('./DataManagment.php');
/**
 * Description of RestauradorDAO
 * clase para establecer sentencias SQL
 */
class RestauradorDAO 
{
      private static $ST_INSERT="INSERT INTO restauradores(Cedula,Nombres,Apellidos,Telefono,Correo)
                                 VALUES(?,?,?,?,?)";
      private static $ST_UPDATE="UPDATE restauradores "
                                 . "SET `Cedula`= ?, `Nombres`= ?, `Telefono` = ?, `Correo` = ?, `Apellidos`= ? "
                                 . "WHERE `Cedula` = ?";
      private static $ST_DELETE="DELETE FROM restauradores WHERE cedula = ?";
      private static $ST_QUERY_ALL="SELECT * FROM restauradores";
      private $dataManager;
      
      function __construct() 
      {
          $this->dataManager = new DataManagment();
      }

      /**
       * 
       * @param type $restaurador
       * @param type $con
       * @return type boolean
       */
      public function registrarRestaurador($restaurador,$con)
      {
              $dataSet = array($restaurador->getCedula(),$restaurador->getNombres(),
                               $restaurador->getApellidos(),$restaurador->getTelefono(),
                               $restaurador->getCorreo());
              
              $val = $this->dataManager->executeStatementCrDelUp($dataSet, $con, self::$ST_INSERT);
              
              return $val;
      }
      
       /**
        * 
        * @param type $cedula
        * @param type $con
        * @return type
        */
      public function eliminarRestaurador($cedula,$con)
      {
              $dataSet = array($cedula);
              
              $val = $this->dataManager->executeStatementCrDelUp($dataSet, $con, self::$ST_DELETE);
              
              return $val;
      } 
      
      /**
       * 
       * @param type $restaurador
       * @param type $cedula
       * @param type $con
       * @return type
       */
      public function actualizarRestaurador($restaurador,$cedula,$con)
      {
              $dataSet = array($restaurador->getCedula(),$restaurador->getNombres(),  
                               $restaurador->getTelefono(),$restaurador->getCorreo(),
                               $restaurador->getApellidos()
                               ,$cedula);
             
              $val = $this->dataManager->executeStatementCrDelUp($dataSet, $con, self::$ST_UPDATE);
              
              return $val;
      }
     
      /**
       * 
       * @param type $con
       * @return type 
       */
      public function consultarTodosRestauradores($con)
      {
             $infoRestauradores = $this->dataManager->executeStatementGetAll($con, self::$ST_QUERY_ALL);
             
             return $infoRestauradores;
      }
      

}
