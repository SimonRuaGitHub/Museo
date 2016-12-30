<?php 

class Tecnicas
{     
      private $codigo;
      private $nombre;
      private $descripcion;

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