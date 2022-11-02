<?php
/* CREATE TABLE `rol` (
  `idrol` bigint(20) NOT NULL,
  `rodescripcion` varchar(50) NOT NULL
    ) ENGINE=InnoDB DEFAULT CHARSET=latin1;
 */
class Rol
{
	private $idRol;
	private $rolDescripcion;
	private $mensajeFuncion;

	/**************************************/
	/**************** SET *****************/
	/**************************************/

	public function setRol($idRol)
	{
		$this->idRol = $idRol;
	}
	public function setRolDescripcion($rolDescripcion)
	{
		$this->rolDescripcion = $rolDescripcion;
	}
	public function setMensajeFuncion($mensajeFuncion)
	{
		$this->mensajeFuncion = $mensajeFuncion;
	}

	/**************************************/
	/**************** GET *****************/
	/**************************************/


	public function getRol()
	{
		return $this->idRol;
	}
	public function getRolDescripcion()
	{
		return $this->rolDescripcion;
	}
	public function getMensajeFuncion()
	{
		return $this->mensajeFuncion;
	}

	/**************************************/
	/************** FUNCIONES *************/
	/**************************************/

	public function __construct()
	{
		$this->idRol = "";
		$this->rolDescripcion = "";
	}

	public function cargar($idRol, $rolDescripcion)
	{
		$this->idRol = $idRol;
		$this->rolDescripcion = $rolDescripcion;
	}

	public function insertar()
	{
		$base = new BaseDatos();
		$resp = false;
		$consulta = "INSERT INTO rol (idrol, rodescripcion) VALUES (
        " . $this->getRol() . ",
		'" . $this->getRolDescripcion() . "')";
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
		$consulta = "UPDATE rol
        SET idrol = '{$this->getRol()}',
        rodescripcion = '{$this->getRolDescripcion()}'
        WHERE idrol = '{$this->getRol()}'";
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
	 Función que busca una auto en base a un ID
	*/
	public function Buscar($idRol)
	{
		$base = new BaseDatos();
		$consulta = "SELECT * FROM rol WHERE idrol='" . $idRol . "'";
		$resp = false;
		if ($base->Iniciar()) {
			if ($base->Ejecutar($consulta)) {
				if ($rol = $base->Registro()) {
					$this->setRol($rol['idrol']);
					$this->setRolDescripcion($rol['rodescripcion']);
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
		$arregloRoles = null;
		$base = new BaseDatos();
		$consultaPersona = "SELECT * FROM rol ";
		if ($condicion != "") {
			$consultaPersona = $consultaPersona . ' WHERE ' . $condicion;
		}
		$consultaPersona .= " ORDER BY idrol ";
		if ($base->Iniciar()) {
			if ($base->Ejecutar($consultaPersona)) {
				$arregloRoles = array();
				while ($rol = $base->Registro()) {
					$objRol = new Rol();
					$objRol->Buscar($rol['idrol']);
					array_push($arregloRoles, $objRol);
				}
			} else {
				$this->setMensajeFuncion($base->getError());
			}
		} else {
			$this->setMensajeFuncion($base->getError());
		}
		return $arregloRoles;
	}

	public function eliminar()
	{
		$base = new BaseDatos();
		$resp = false;
		if ($base->Iniciar()) {
			$consulta = "DELETE FROM rol WHERE idrol= '" . $this->getRol()."'";
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
		return ("El id del Rol es: " . $this->getRol() .
			"\n La descripcion del rol es: " . $this->getRolDescripcion() . "\n");
	}
}
