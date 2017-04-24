<?php
class conexion_bd
{   
      private static $connect;
      private static $connected;

      /**
       * 
       * @return PDO
       */
      public static function conectar()
      {
      	  if(!isset(self::$connect))
      	  {
      	     try
      	     {
      	        include 'config_conexion.php'; 
      	       	self::$connect = new PDO("mysql:host=$host_name; dbname=$database_name",$user_name, $password); //Becarefull with "=" can not be seperated from the parameter name like host and dbname, the same happens with the value parameters they have to be together like you are seeing it.
      	        self::$connect -> setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION);
      	        self::$connect -> exec("SET CHARACTER SET utf8");   
                self::$connected = TRUE;
      	     }
      	     catch(PDOException $ex)
      	     {
                   self::$connected = FALSE;
      	     	   print 'conexion fallida </br>';
                   print "ERROR: ". $ex -> getMessage() ."</br>";
                   die();
      	     }    	          	  	
      	  }
          
          return self::$connect;
      } 

      public static function desconectar()
      {
             if(isset(self::$connect))
             {
                self::$connect = null;
                self::$connected = FALSE;
             }
      }
      
      public static function getConnected()
      {
              return self::$connected;
      }
}
?>