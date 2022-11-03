<?php
/* CREATE TABLE `usuario` (
	`idusuario` bigint(20) NOT NULL,
	`usnombre` varchar(50) NOT NULL,
	`uspass` int(11) NOT NULL,
	`usmail` varchar(50) NOT NULL,
	`usdeshabilitado` timestamp NULL DEFAULT NULL
	) ENGINE=InnoDB DEFAULT CHARSET=latin1;
 */
class Usuario
{
	private $id;
	private $nombre;
	private $pass;
	private $mail;
	private $deshabilitado;
	private $mensajeFuncion;

	/**************************************/
	/**************** SET *****************/
	/**************************************/

	/**
	 * Establece el valor de id
	 */
	public function setId($id)
	{
		$this->id = $id;
	}

	/**
	 * Establece el valor de nombre
	 */
	public function setNombre($nombre)
	{
		$this->nombre = $nombre;
	}

	/**
	 * Establece el valor de pass
	 */
	public function setPass($pass)
	{
		$this->pass = $pass;
	}

	/**
	 * Establece el valor de mail
	 */
	public function setMail($mail)
	{
		$this->mail = $mail;
	}

	/**
	 * Establece el valor de deshabilitado
	 */
	public function setDeshabilitado($deshabilitado)
	{
		$this->deshabilitado = $deshabilitado;
	}

	/**
	 * Establece el valor de mensajeFuncion
	 */
	public function setMensajeFuncion($mensajeFuncion)
	{
		$this->mensajeFuncion = $mensajeFuncion;
	}

	/**************************************/
	/**************** GET *****************/
	/**************************************/

	/**
	 * Obtiene el valor de id
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * Obtiene el valor de nombre
	 */
	public function getNombre()
	{
		return $this->nombre;
	}

	/**
	 * Obtiene el valor de pass
	 */
	public function getPass()
	{
		return $this->pass;
	}

	/**
	 * Obtiene el valor de mail
	 */
	public function getMail()
	{
		return $this->mail;
	}

	/**
	 * Obtiene el valor de deshabilitado
	 */
	public function getDeshabilitado()
	{
		return $this->deshabilitado;
	}

	/**
	 * Obtiene el valor de mensajeFuncion
	 */
	public function getMensajeFuncion()
	{
		return $this->mensajeFuncion;
	}

	/**************************************/
	/************** FUNCIONES *************/
	/**************************************/

	public function __construct()
	{
		$this->id = "";
		$this->nombre = "";
		$this->pass = "";
		$this->mail = "";
		$this->deshabilitado = null;
		$this->mensajeFuncion = "";
	}

	public function cargar($id, $nombre, $pass, $mail, $deshabilitado)
	{
		$this->id = $id;
		$this->nombre = $nombre;
		$this->pass = $pass;
		$this->mail = $mail;
		$this->deshabilitado = $deshabilitado;
	}

	public function insertar()
	{
		$base = new BaseDatos();
		$resp = false;
		$consulta = "INSERT INTO usuario (idusuario, usnombre, uspass, usmail, usdeshabilitado) VALUES (
        " . $this->getId() . ",
		'" . $this->getNombre() . "')".",
		'" . $this->getPass() . "')".",
		'" . $this->getMail() . "')".",
		'" . $this->getDeshabilitado() . "')";
		if ($base->Iniciar()) {
			if ($base->Ejecutar($consulta)) {
				$resp =  true;
			} else {
				$this->setMensajeFuncion($base->getError());
			}
		} else {
			$this->setMensajeFuncion($base->getError());
		}
		return $resp;
	}

	public function modificar()
	{
		$resp = false;
		$base = new BaseDatos();
		$consulta = "UPDATE usuario
        SET idusuario = '{$this->getId()}',
        usnombre = '{$this->getNombre()}',
        uspass = '{$this->getPass()}',
        usmail = '{$this->getMail()}',
        usdeshabilitado = '{$this->getDeshabilitado()}'
        WHERE idusuario = '{$this->getId()}'";
		if ($base->Iniciar()) {
			if ($base->Ejecutar($consulta)) {
				$resp =  true;
			} else {
				$this->setMensajeFuncion($base->getError());
			}
		} else {
			$this->setMensajeFuncion($base->getError());
		}
		return $resp;
	}

	/*
	 Función que busca una auto en base a un usuario
	*/
	public function Buscar($usuario)
	{
		$base = new BaseDatos();
		$consulta = "SELECT * FROM usuario WHERE usnombre='" . $usuario . "'";
		$resp = false;
		if ($base->Iniciar()) {
			if ($base->Ejecutar($consulta)) {
				if ($rol = $base->Registro()) {
					$this->setId($rol['idusuario']);
					$this->setNombre($rol['usnombre']);
					$this->setPass($rol['uspass']);
					$this->setMail($rol['usmail']);
					$this->setDeshabilitado($rol['usdeshabilitado']);
					$resp = true;
				}
			} else {
				$this->setMensajeFuncion($base->getError());
			}
		} else {
			$this->setMensajeFuncion($base->getError());
		}
		return $resp;
	}

	public function listar($condicion = "")
	{
		$arregloUsuarios = null;
		$base = new BaseDatos();
		$consultaPersona = "SELECT * FROM usuario ";
		if ($condicion != "") {
			$consultaPersona = $consultaPersona . ' WHERE ' . $condicion;
		}
		$consultaPersona .= " ORDER BY idusuario ";
		if ($base->Iniciar()) {
			if ($base->Ejecutar($consultaPersona)) {
				$arregloUsuarios = array();
				while ($usuario = $base->Registro()) {
					$objUsuario = new Usuario();
					$objUsuario->Buscar($usuario['idusuario']);
					array_push($arregloUsuarios, $objUsuario);
				}
			} else {
				$this->setMensajeFuncion($base->getError());
			}
		} else {
			$this->setMensajeFuncion($base->getError());
		}
		return $arregloUsuarios;
	}

	public function eliminar()
	{
		$base = new BaseDatos();
		$resp = false;
		if ($base->Iniciar()) {
			$consulta = "DELETE FROM usuario WHERE idusuario= '" . $this->getId()."'";
			if ($base->Ejecutar($consulta)) {
				$resp =  true;
			} else {
				$this->setMensajeFuncion($base->getError());
			}
		} else {
			$this->setMensajeFuncion($base->getError());
		}
		return $resp;
	}

	public function __toString()
	{
		return ("El id del usuario es: " . $this->getId() .
			"\n El nombre del usuario es: " . $this->getNombre() .
			"\n El email del usuario es: " . $this->getMail() .
			"\n El estado del usuario es: " . $this->getDeshabilitado() . "\n");
	}
}
