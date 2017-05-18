<?php
class DataManagment
{
      public function executeStatementCrDelUp($dataSet,$con,$statement)
      {
             $sqlEx = $con->prepare($statement);
             $sqlEx -> execute($dataSet);
             
             return TRUE;
      }
      
      public function executeStatementGetAll($con,$statment)
      {
             $sqlEx = $con->prepare($statment);
             $sqlEx->execute();
             $data = $sqlEx -> fetchAll(PDO::FETCH_ASSOC);
             
             return $data;
      }
}
