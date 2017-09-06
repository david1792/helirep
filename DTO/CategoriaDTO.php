<?php 
	/**
	* 
	*/
	class CategoriaDTO
	{
		private $id;
		private $descripcion;		
				
				
				
		

		public function __construct($id, $descripcion){
			
			$this->id = $id;
			$this->descripcion = $descripcion;
			
			
			
			

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
	    public function getDescripcion()
	    {
	        return $this->descripcion;
	    }

	    /**
	     * @param mixed $descripcion
	     *
	     * @return self
	     */
	    public function setDescripcion($descripcion)
	    {
	        $this->descripcion = $descripcion;

	        return $this;
	    }

	    


	    function __toString(){
			echo "id: ". $this->getId(). " descripcion". $this->getDescripcion();

		}	
		

	}

 ?>