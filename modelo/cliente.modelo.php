<?php
require_once '../driver.php';

class ClienteModelo
{
    private $enlace;

    function __construct()
    {
        $this->enlace = new DMysqli();
    }

    function saludar()
    {
        return 'ESTE MENSAJE VIENE DEL MODELO';
    }

//    function eliminarcliente($id){
//        $consulta = "DELETE FROM cliente WHERE id =" .$id;
//        return $this->enlace->query($consulta);

function agregarcliente ($nombre, $apellido, $edad) {
        $consulta = Sprintf( "INSERT INTO cliente VALUES (DEFAULT,'%s', '%s',%d, DEFAULT )",$nombre, $apellido, $edad);
        return $this->enlace->query($consulta);
}

    function desactivarCliente($id){
        $consulta = "UPDATE cliente set activo = 0 WHERE id =" .$id;
        return $this->enlace->query($consulta);

    }
    
    function obtenerclientes(){
        $consulta = "SELECT * FROM cliente WHERE activo = 1";
        return $this->enlace->multiples_datos($consulta);

    }
}