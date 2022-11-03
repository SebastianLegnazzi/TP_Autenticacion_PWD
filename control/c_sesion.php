<?php

class c_sesion{

    private $nombreUsuario;                         // consultar *1
    private $pass;
    private $objUsuario;                           // CONSULTAR *5


/**************************************/
/**************** SET *****************/
/**************************************/

    /**
     * Establece el valor de nombreUsuario
     */ 
    public function setNombreUsuario($nombreUsuario){
        $this->nombreUsuario = $nombreUsuario;
    }

    /**
     * Establece el valor de pass
     */ 
    public function setPass($pass){
        $this->pass = $pass;
    }

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
     * Obtiene el valor de nombreUsuario
     */ 
    public function getNombreUsuario(){
        return $this->nombreUsuario;
    }

    /**
     * Obtiene el valor de pass
     */ 
    public function getPass(){
        return $this->pass;
    }

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
       $this->nombreUsuario = "";
       $this->pass = "";
       $this->objUsuario = null;
       session_start();
    }

    public function iniciar($nombreUsuario, $pass){
        $this->setNombreUsuario($nombreUsuario);
        $this->setPass($pass);
        $_SESSION["nombreUsuario"]= $this->getNombreUsuario();
        $_SESSION["pass"]= $this->getPass();
    }

    public function validar(){                                          // CONSULTAR *2 y *3
        $objUsuarios = new c_usuario();
        $arrayUsuario = $objUsuarios->buscar();
        $i = 0;
        $resp = false;
        if(count($arrayUsuario) >= 1){
            while(!$resp && $i > count($arrayUsuario)){
                if($_SESSION["pass"] == $arrayUsuario[$i]->getPass() && $_SESSION["nombreUsuario"] == $arrayUsuario[$i]->getNombre()){
                    $resp = true;
                    $this->setObjUsuario($arrayUsuario[$i]);
                }else{
                    $i++;
                }
            }
        }
        return $resp;
    }

    public function activa(){
        $resp = false;
        if($this->getObjUsuario() != null){                                                    // CONSULTAR *5
            $resp = true;
        }
        return $resp;
    }

    public function getUsuario(){
        $resp = null;
        if($this->getObjUsuario() != null){                                                    // CONSULTAR *5
            $resp = $this->getObjUsuario()->getNombre();
        }
        return $resp;
    }

    public function getRol(){
        if($this->getObjUsuario() != null){
            $objUsuarioRol = new c_usuarioRol();
            $arrayRolesUsuario = $objUsuarioRol->buscar($this->getObjUsuario()->getId());     //CONSULTAR *4
        }
        return $arrayRolesUsuario;
    }

    public function cerrar(){
        session_destroy();   
        header("Location: ../vista/index.php");
    }



}




?>