<?php 
	/**
	* 
	*/
	class ProveedorDTO
	{
		private $id;
		private $nombre;		
		private $estado;		
				
				
		

		public function __construct($id, $nombre, $estado){
			
			$this->id = $id;
			$this->nombre = $nombre;
			$this->estado = $estado;
			
			
			

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



	    function __toString(){
			echo "id: ". $this->getId(). " nombre". $this->getNombre(). " estado: ". $this->getEstado();

		}	
		

	}

 ?>