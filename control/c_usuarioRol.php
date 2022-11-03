<?php
class c_usuarioRol
{
    //Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto


    /**
     * Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto
     * @param array $param
     * @return object
     */
    private function cargarObjeto($param)
    {
        $objUsuarioRol = null;

        if (array_key_exists('idusuario', $param) and array_key_exists('idrol', $param)) {
            $objUsuarioRol = new UsuarioRol();
            if(!$objUsuarioRol->cargar($param['idusuario'], $param['idrol'])){
                $objUsuarioRol = null;
            }
        }
        return $objUsuarioRol;
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
/*         $param['idusuario'] = null;  Se comenta ya que esta line es para cuando la base de datos tiene su clave principal UsuarioRol incrementable*/
        $objtUsuarioRol = $this->cargarObjeto($param);
//        verEstructura($elObjtTabla);
        if ($objtUsuarioRol!=null) {
            if($objtUsuarioRol->insertar()){
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
            $objtUsuarioRol = $this->cargarObjeto($param);
            if ($objtUsuarioRol!=null and $objtUsuarioRol->eliminar()) {
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
            $objtUsuarioRol = $this->cargarObjeto($param);
            if ($objtUsuarioRol!=null and $objtUsuarioRol->modificar()) {
                $resp = true;
            }
        }
        return $resp;
    }

    /**
     * permite buscar un objeto
     * @param array $param
     * @return array
     */
    public function buscar($param = "")
    {
        $where = " true ";
        if ($param<>null) {
            if (isset($param)) {
                $where.=" and idusuario ='".$param."'";
            }
        }
        $objUsuarioRol= new UsuarioRol();
        $arregloUsuarioRols = $objUsuarioRol->listar($where);
        return $arregloUsuarioRols;
    }
}
?>