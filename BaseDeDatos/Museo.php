<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Museo
 * metodos get y set los atributos del Museo
 *
 * @author Simon Rua
 */
class Museo 
{
    private $nit;
    private $nombre;
    
    function __construct($nit, $nombre) {
        $this->nit = $nit;
        $this->nombre = $nombre;
    }

    public function getNit() {
        return $this->nit;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function setNit($nit) {
        $this->nit = $nit;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }


}
