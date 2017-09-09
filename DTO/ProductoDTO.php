<?php 
	/**
	* 
	*/
	class ProductoDTO
	{
		private $id;
		private $referencia;		
		private $descripcion;
		private $isVerificado;		
		private $proveedor;		
		private $categoria;		
		private $inventario;		
		

		public function __construct($id, $referencia, $descripcion, $proveedor, $categoria, $inventario){
			
			$this->id = $id;
			$this->referencia = $referencia;
			$this->descripcion = $descripcion;
			$this->proveedor = $proveedor;
			$this->categoria = $categoria;
			$this->inventario = $inventario;
			

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
	    public function getReferencia()
	    {
	        return $this->referencia;
	    }

	    /**
	     * @param mixed $referencia
	     *
	     * @return self
	     */
	    public function setReferencia($referencia)
	    {
	        $this->referencia = $referencia;

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

	    /**
	     * @return mixed
	     */
	    public function getIsVerificado()
	    {
	        return $this->isVerificado;
	    }

	    /**
	     * @param mixed $isVerificado
	     *
	     * @return self
	     */
	    public function setIsVerificado($isVerificado)
	    {
	        $this->isVerificado = $isVerificado;

	        return $this;
	    }

	    /**
	     * @return mixed
	     */
	    public function getProveedor()
	    {
	        return $this->proveedor;
	    }

	    /**
	     * @param mixed $proveedor
	     *
	     * @return self
	     */
	    public function setProveedor($proveedor)
	    {
	        $this->proveedor = $proveedor;

	        return $this;
	    }

	    /**
	     * @return mixed
	     */
	    public function getCategoria()
	    {
	        return $this->categoria;
	    }

	    /**
	     * @param mixed $categoria
	     *
	     * @return self
	     */
	    public function setCategoria($categoria)
	    {
	        $this->categoria = $categoria;

	        return $this;
	    }

	    /**
	     * @return mixed
	     */
	    public function getInventario()
	    {
	        return $this->inventario;
	    }

	    /**
	     * @param mixed $inventario
	     *
	     * @return self
	     */
	    public function setInventario($inventario)
	    {
	        $this->inventario = $inventario;

	        return $this;
	    }


	    function __toString(){
			echo "id: ". $this->getId(). " referencia: ". $this->getReferencia(). " descripcion". $this->getDescripcion(). " proveedor: ". $this->getProveedor(). " categoria: ". $this->getCategoria(). " inventario: ". $this->getInventario();

		}	

}

 ?>