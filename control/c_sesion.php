<?php

class c_sesion{

    private $nombreUsuario;                         // consultar *1
    private $pass;


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

/**************************************/
/************** FUNCIONES *************/
/**************************************/

    public function __construct(){
       $this->nombreUsuario = "";
       $this->pass = "";
       session_start();
    }

    public function iniciar($nombreUsuario, $pass){
        $this->setNombreUsuario($nombreUsuario);
        $this->setPass($pass);
        $_SESSION["nombreUsuario"]= $this->getNombreUsuario();
        $_SESSION["pass"]= $this->getPass();
    }

    public function validar(){                                          // CONSULTAR *2 y *3
        $objUsuarios = 
        if(){
            $resp = true;
        }else{
            $resp = false;
        }
    }






}




?>