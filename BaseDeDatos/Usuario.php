<?php
class Usuario
{
	  private $nombreUsuario;
	  private $contrasena;
	  private $rol;
  
      public function setNombreUsuario($dato)
	  {
		     $this->nombreUsuario = $dato;
	  }
	  
	  public function getNombreUsuario()
	  {
		      return $this->nombreUsuario;
	  }

	  public function setContrasena($dato)
	  {
		      $this->contrasena = $dato;
	  }
	  
	  public function getContrasena()
	  {
		      return $this->contrasena;
	  }

	  public function setRol($dato)
	  {
	  	      $this->rol = $dato;
	  }

	   public function getRol()
	  {
	  	      return $this->rol;
	  }

}
?>