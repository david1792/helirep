<?php 
	/**
	* 
	*/
	class BodegaDTO
	{
		private $id;
		private $direccion;		
		private $nombre;		
		private $estado;		
		private $usuario_id;		
				
		

		public function __construct($id, $direccion, $nombre, $estado, $usuario_id){
			
			$this->id = $id;
			$this->direccion = $direccion;
			$this->nombre = $nombre;
			$this->estado = $estado;
			$this->usuario_id = $usuario_id;
			
			

		}

	    /**
	     * @return mixed
	     */
	    public function getId()
	    {
	        return $this->id;
	    }

	    /**
	     * @param mixed $id
	     *
	     * @return self
	     */
	    public function setId($id)
	    {
	        $this->id = $id;

	        return $this;
	    }

	    /**
	     * @return mixed
	     */
	    public function getDireccion()
	    {
	        return $this->direccion;
	    }

	    /**
	     * @param mixed $direccion
	     *
	     * @return self
	     */
	    public function setDireccion($direccion)
	    {
	        $this->direccion = $direccion;

	        return $this;
	    }

	    /**
	     * @return mixed
	     */
	    public function getNombre()
	    {
	        return $this->nombre;
	    }

	    /**
	     * @param mixed $nombre
	     *
	     * @return self
	     */
	    public function setNombre($nombre)
	    {
	        $this->nombre = $nombre;

	        return $this;
	    }

	    /**
	     * @return mixed
	     */
	    public function getEstado()
	    {
	        return $this->estado;
	    }

	    /**
	     * @param mixed $estado
	     *
	     * @return self
	     */
	    public function setEstado($estado)
	    {
	        $this->estado = $estado;

	        return $this;
	    }

	    /**
	     * @return mixed
	     */
	    public function getUsuario_id()
	    {
	        return $this->usuario_id;
	    }

	    /**
	     * @param mixed $usuario_id
	     *
	     * @return self
	     */
	    public function setUsuario_id($usuario_id)
	    {
	        $this->usuario_id = $usuario_id;

	        return $this;
	    }



	    function __toString(){
			echo "id: ". $this->getId(). " direccion: ". $this->getDireccion(). " nombre". $this->getNombre(). " estado: ". $this->getEstado(). " usuario_id: ". $this->getUsuario_id();

		}	
		

	}

 ?>