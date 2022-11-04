<?php
class c_usuario
{
    //Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto


    /**
     * Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto
     * @param array $param
     * @return object
     */
    private function cargarObjeto($param)
    {
        $objUsuario = null;
        if (array_key_exists('idusuario', $param) and array_key_exists('usnombre', $param) and array_key_exists('uspass', $param) and array_key_exists('usmail', $param) and array_key_exists('usdeshabilitado', $param)) {
            $objUsuario = new Usuario();
            if(!$objUsuario->Buscar($param["usnombre"])){
                if(!$objUsuario->cargar($param['idusuario'], $param['usnombre'], $param['uspass'], $param['usmail'], $param['usdeshabilitado'])){
                    $objUsuario = null;
                }
            }else{
                $objUsuario = null;
            }
        }
        return $objUsuario;
    }

    /**
     * Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto que son claves
     * @param array $param
     * @return object
     */
    private function cargarObjetoConClave($param)
    {
        $objUsuario = null;

        if (isset($param['idusuario'])) {
            $objUsuario = new Usuario();
            $objUsuario->buscar($param['idusuario']);
        }
        return $objUsuario;
    }


    /**
     * Corrobora que dentro del arreglo asociativo estan seteados los campos claves
     * @param array $param
     * @return boolean
     */

    private function seteadosCamposClaves($param)
    {
        $resp = false;
        if (isset($param['idusuario'])) {
            $resp = true;
        }
        return $resp;
    }

    /**
     *
     * @param array $param
     * @return boolean
     */
    public function alta($param)
    {
        $resp = false;
        $param['idusuario'] = null;  // Se comenta ya que esta line es para cuando la base de datos tiene su clave principal Usuario incrementable
        $objtUsuario = $this->cargarObjeto($param);
//        verEstructura($elObjtTabla);
        if ($objtUsuario!=null) {
            if($objtUsuario->insertar()){
                $resp = true;
            }
        }
        return $resp;
    }
    /**
     * permite eliminar un objeto
     * @param array $param
     * @return boolean
     */
    public function baja($param)
    {
        $resp = false;
        if ($this->seteadosCamposClaves($param)) {
            $objtUsuario = $this->cargarObjetoConClave($param);
            if ($objtUsuario!=null and $objtUsuario->eliminar()) {
                $resp = true;
            }
        }

        return $resp;
    }

    /**
     * permite modificar un objeto
     * @param array $param
     * @return boolean
     */
    public function modificacion($param)
    {
        //echo "Estoy en modificacion";
        $resp = false;
        if ($this->seteadosCamposClaves($param)) {
            $objtUsuario = $this->cargarObjeto($param);
            if ($objtUsuario!=null and $objtUsuario->modificar()) {
                $resp = true;
            }
        }
        return $resp;
    }

    /**
     * permite buscar un objeto
     * @param $param
     * @return array
     */
    public function buscar($param = "")
    {
        $where = " true ";
        if ($param<>null) {
            if (isset($param)) {
                $where.=" and usnombre ='".$param."'";
            }
        }
        $objUsuario= new Usuario();
        $arregloUsuarios = $objUsuario->listar($where);
        return $arregloUsuarios;
    }
}
?>