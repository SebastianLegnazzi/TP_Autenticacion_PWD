<?php
class c_rol
{
    //Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto


    /**
     * Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto
     * @param array $param
     * @return object
     */
    private function cargarObjeto($param)
    {
        $objRol = null;

        if (array_key_exists('idrol', $param) and array_key_exists('rodescripcion', $param)) {
            $objRol = new Rol();
            if(!$objRol->cargar($param['idrol'], $param['rodescripcion'])){
                $objRol = null;
            }
        }
        return $objRol;
    }

    /**
     * Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto que son claves
     * @param array $param
     * @return object
     */
    private function cargarObjetoConClave($param)
    {
        $objRol = null;

        if (isset($param['idrol'])) {
            $objRol = new Rol();
            $objRol->buscar($param['idrol']);
        }
        return $objRol;
    }


    /**
     * Corrobora que dentro del arreglo asociativo estan seteados los campos claves
     * @param array $param
     * @return boolean
     */

    private function seteadosCamposClaves($param)
    {
        $resp = false;
        if (isset($param['idrol'])) {
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
        $param['idrol'] =null;  // Se comenta ya que esta line es para cuando la base de datos tiene su clave principal Rol incrementable
        $objtRol = $this->cargarObjeto($param);
//        verEstructura($elObjtTabla);
        if ($objtRol!=null) {
            if($objtRol->insertar()){
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
            $objtRol = $this->cargarObjetoConClave($param);
            if ($objtRol!=null and $objtRol->eliminar()) {
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
            $objtRol = $this->cargarObjeto($param);
            if ($objtRol!=null and $objtRol->modificar()) {
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
    public function buscar($param)
    {
        $where = " true ";
        if ($param<>null) {
            if (isset($param['idrol'])) {
                $where.=" and idrol ='".$param['idrol']."'";
            }
        }
        $objRol= new Rol();
        $arregloRols = $objRol->listar($where);
        return $arregloRols;
    }
}
?>