<?php
/**
 * Description of Restauradores
 *
 * clase que contiene los atributos (campos) de los Restauradores
 */
class Restauradores 
{
      private $cedula;
      private $nombres;
      private $telefono;
      private $correo;
      private $apellidos;
      
      function __construct($cedula, $nombres, $telefono, $correo, $apellidos) {
          $this->cedula = $cedula;
          $this->nombres = $nombres;
          $this->telefono = $telefono;
          $this->correo = $correo;
          $this->apellidos = $apellidos;
      }

      function getCedula() {
          return $this->cedula;
      }

      function getNombres() {
          return $this->nombres;
      }

      function getTelefono() {
          return $this->telefono;
      }

      function getCorreo() {
          return $this->correo;
      }

      function getApellidos() {
          return $this->apellidos;
      }

      function setCedula($cedula) {
          $this->cedula = $cedula;
      }

      function setNombres($nombres) {
          $this->nombres = $nombres;
      }

      function setTelefono($telefono) {
          $this->telefono = $telefono;
      }

      function setCorreo($correo) {
          $this->correo = $correo;
      }

      function setApellidos($apellidos) {
          $this->apellidos = $apellidos;
      }


}
