<?php


/**
 * @author simon
 * @version 1.0
 * @created 17-feb-2016 16:22:27
 */
class Obra
{
	private $cantidad;
	private $codigo;
	private $estado;
	private $estilo;
	private $fechaCreacion;
	private $fechaEntrada;
	private $nombre;
	private $periodo;
	private $tecnica;
	private $tipo;
	private $valor;
	private $material;
	private $autor;
        private $sala;
        private $imagen;

	public function setCantidad($cantidad)
	{
		   $this->cantidad = $cantidad;
	}
	
	public function getCantidad()
	{
		   return $this->cantidad;
	}
	
	public function setCodigo($codigo)
	{
		   $this->codigo = $codigo;
	}
	
	public function getCodigo()
	{
		  return $this->codigo;
	}
	
	public function setEstado($estado)
	{
		   $this->estado = $estado;
	}
	
	public function getEstado()
	{
		  return $this->estado;
	}
	
	public function setEstilo($estilo)
	{
		   $this->estilo = $estilo;
	}
	
	public function getEstilo()
	{
		  return $this->estilo;
	}
	
	public function setFechaCreacion($fechaCreacion)
	{
		   $this->fechaCreacion = $fechaCreacion;
	}
	
	public function getFechaCreacion()
	{
		  return $this->fechaCreacion;
	}
	
	public function setFechaEntrada($fechaEntrada)
	{
		   $this->fechaEntrada = $fechaEntrada;
	}
	
	public function getFechaEntrada()
	{
		  return $this->fechaEntrada;
	}
	
	public function setNombre($nombre)
	{
		   $this->nombre = $nombre;
	}
	
    public function getNombre()
	{
		  return $this->nombre;
	}
	
	public function setPeriodo($periodo)
	{
		   $this->periodo = $periodo;
	}
	
	public function getPeriodo()
	{
		  return $this->periodo;
	}
	
	public function setTecnica($tecnica)
	{
		   $this->tecnica = $tecnica;
	}
	
	public function getTecnica()
	{
		  return $this->tecnica;
	}
	
	public function setTipo($tipo)
	{
		   $this->tipo = $tipo;
	}
	
	public function getTipo()
	{
		  return $this->tipo;
	}
	
	public function setValor($valor)
	{
		   $this->valor = $valor;
	}
	
	public function getValor()
	{
		  return $this->valor;
	}

	public function setMaterial($material)
	{
		  
		  $this->material = $material;
	}

	public function getMaterial()
	{
		   return $this->material;
	}

	public function setAutor($autor)
	{
		  
		  $this->autor = $autor;
	}

	public function getAutor()
	{
		   return $this->autor;
	}
        
        function getSala() 
        {
            return $this->sala;
        }

        function setSala($sala) {
            $this->sala = $sala;
        }
        
        function getImagen() {
            return $this->imagen;
        }

        function setImagen($imagen) {
            $this->imagen = $imagen;
        }
}
?>