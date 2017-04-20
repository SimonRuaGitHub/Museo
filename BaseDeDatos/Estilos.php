<?php 

class Estilos
{     
      private $codigo;
      private $nombre;
      private $descripcion;
      
      public function setCodigo($codigo)
      {
             $this->codigo = $codigo;
      }
      
     public function getCodigo()
      {
             return $this->codigo;
      }

      public function setNombre($nombre)
      {
             $this->nombre = $nombre;
      }

      public function getNombre()
      {
             return $this->nombre;
      }

      public function setDescripcion($descripcion)
      {
             $this->descripcion = $descripcion;
      }

      public function getDescripcion()
      {
             return $this->descripcion;
      }
}

?>