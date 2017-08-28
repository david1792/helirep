<?php 
	/**
	* 
	*/
	class UsuarioDTO
	{
		private $id;
		private $nombre;		
		private $apellido;		
		private $contrasena;		
		private $documento;		
		private $estado;		
		private $rol;

		public function __construct($id, $nombre, $apellido, $contrasena, $documento, $estado, $rol){
			$this->id = $id;
			$this->nombre = $nombre;
			$this->apellido = $apellido;
			$this->contrasena = $contrasena;
			$this->documento = $documento;
			$this->estado = $estado;
			$this->rol = $rol;

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
	    public function getApellido()
	    {
	        return $this->apellido;
	    }

	    /**
	     * @param mixed $apellido
	     *
	     * @return self
	     */
	    public function setApellido($apellido)
	    {
	        $this->apellido = $apellido;

	        return $this;
	    }

	    /**
	     * @return mixed
	     */
	    public function getContrasena()
	    {
	        return $this->contrasena;
	    }

	    /**
	     * @param mixed $contrasena
	     *
	     * @return self
	     */
	    public function setContrasena($contrasena)
	    {
	        $this->contrasena = $contrasena;

	        return $this;
	    }

	    /**
	     * @return mixed
	     */
	    public function getDocumento()
	    {
	        return $this->documento;
	    }

	    /**
	     * @param mixed $documento
	     *
	     * @return self
	     */
	    public function setDocumento($documento)
	    {
	        $this->documento = $documento;

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
	    public function getRol()
	    {
	        return $this->rol;
	    }

	    /**
	     * @param mixed $rol
	     *
	     * @return self
	     */
	    public function setRol($rol)
	    {
	        $this->rol = $rol;

	        return $this;
	    }

	    function __toString(){
			echo "id: ". $this->getId(). " nombre: ". $this->getNombre(). " apellido". $this->getApellido(). " contraseña: ". $this->getContrasena(). " documento: ". $this->getDocumento(). " estado: ". $this->getEstado(). " rol: ". $this->getRol();

		}	
		

	}

 ?>