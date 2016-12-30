<?php
class UsuarioGestion
{
	  private $registro;
	  
	  public function verificarUsuario($Usuario,$conexion)
	  {	      
			  $query = "SELECT * FROM usuarios
                         WHERE Usuario = :usuario AND Contraseña = :contrasena";
			  $sqlEx =  $conexion -> prepare($query);
			  $sqlEx -> bindParam(':usuario' , $Usuario->getNombreUsuario());
			  $sqlEx -> bindParam(':contrasena' , $Usuario->getContrasena());
			  $sqlEx -> execute();
			  $this->registro = $sqlEx -> fetch();

              return $this->ExisteUsuario();
	  }
	  
	  private function ExisteUsuario()
	  {	       
	  	    if(empty($this->registro))
	  	    {
	  	         return'no_existe';
	  	    }
	  	    else 
	  	    {
	  	    	$_SESSION['user_name'] = $this->registro['Usuario'];
		        $_SESSION['rol'] = $this->registro['rol'];
		        return $this->registro['rol'];
	  	    }			
	  }

	  public function insertarUsuario($Usuario,$conexion)
	  {
	  	     $ins = "INSERT INTO usuarios(rol,usuario,contraseña)
	  	             VALUES(?,?,?)";

	  	     $sqlEx =  $conexion -> prepare($ins);
	  	     $sqlEx -> execute( array( $Usuario->getRol(),$Usuario->getNombreUsuario(),$Usuario->getContrasena() ) );

	  	     return "true";
	  }

	  public function eliminarUsuario($Usuario,$conexion)
	  {
             $ins = "DELETE FROM usuarios WHERE usuario = :usuario AND contraseña = :contrasena";

             $sqlEx = $conexion -> prepare($ins);
             $sqlEx -> bindParam(':usuario' , $Usuario->getNombreUsuario());
			 $sqlEx -> bindParam(':contrasena' , $Usuario->getContrasena());
             $sqlEx -> execute();
         
             return "true";
	  }

	  public function actualizarUsuario($Usuario,$conexion,$paramUsuario,$paramContrasena)
	  {
             $ins = "UPDATE usuarios SET rol= :nuevoRol , usuario = :nuevoUsuario , contraseña = :nuevaCont
                     WHERE usuario = :usuario  AND contraseña = :contrasena";

             $sqlEx = $conexion -> prepare($ins);
             $sqlEx -> bindParam(':usuario' , $paramUsuario);
			 $sqlEx -> bindParam(':contrasena' , $paramContrasena);
			 $sqlEx -> bindParam(':nuevoRol' , $Usuario->getRol());
			 $sqlEx -> bindParam(':nuevoUsuario' , $Usuario->getNombreUsuario() );
			 $sqlEx -> bindParam(':nuevaCont' , $Usuario->getContrasena() );
			 $sqlEx -> execute();

			 return "true";
	  }
}


?>