<?php
class c_sesion{

    private $objUsuario;       


/**************************************/
/**************** SET *****************/
/**************************************/

    /**
     * Establece el valor de objUsuario
     */ 
    public function setObjUsuario($objUsuario){
        $this->objUsuario = $objUsuario;
    }

/**************************************/
/**************** GET *****************/
/**************************************/

        /**
     * Obtiene el valor de objUsuario
     */ 
    public function getObjUsuario(){
        return $this->objUsuario;
    }

/**************************************/
/************** FUNCIONES *************/
/**************************************/

    public function __construct(){
        session_start();
       $this->objUsuario = null;
    }

    private function iniciar($nombreUsuario, $arrayRoles){
        $_SESSION["nombreUsuario"] = $nombreUsuario;
        $_SESSION["roles"] = $arrayRoles;
    }

    public function validar($usuario, $pass){
        $objUsuarios = new c_usuario();
        $arrayUsuario = $objUsuarios->buscar($usuario);
        $resp = false;
        if($arrayUsuario != null){
            if($pass == $arrayUsuario[0]->getPass()){
                $this->setObjUsuario($arrayUsuario[0]);
                $arrayRoles = $this->getRol();
                $this->iniciar($usuario, $arrayRoles);
                $resp = true;
            }
        }
        return $resp;
    }

    public function activa(){
        $resp = false;
        if($this->getObjUsuario() != null){                      
            $resp = true;
        }
        return $resp;
    }

    public function getUsuario(){
        $resp = null;
        if($this->getObjUsuario() != null){
            $resp = $this->getObjUsuario()->getNombre();
        }
        return $resp;
    }

    public function getRol(){
        $arrayRolesUsuario = null;
        if($this->getObjUsuario() != null){
            $objUsuarioRol = new c_usuarioRol();
            $arrayRolesUsuario = $objUsuarioRol->buscar($this->getObjUsuario()->getId());
        }
        return $arrayRolesUsuario;
    }

    public function cerrar(){
        session_destroy();   
    }



}




?>