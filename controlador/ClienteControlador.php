<?php

require_once '../modelo/cliente.modelo.php';

$ClienteModelo = new ClienteModelo();

if(!empty($_POST['Agregar'])){
    $nombre = $_POST ['nombre'];
    $apellido = $_POST ['apellido'];
    $edad = $_POST ['edad'];

    $estado = $ClienteModelo->agregarCliente($nombre, $apellido, $edad);

    if($estado == true){
        echo "Exito al agregar cliente";
        }else{
        echo  "Fallo al agregar cliente";
    }

}


if (!empty($_GET['opcion'])) {
    if ($_GET['opcion'] == "eliminar") {
        echo 'Tu lo que quieres es eliminar';
        echo '</br>';
        echo 'ID a eliminar: ' . $_GET['id'];
        $sePudo = $ClienteModelo->desactivarCliente($_GET['id']);

        if ($sePudo == true) {
            echo "Exito al eliminar";
        } else {
            echo "Fallo al eliminar";
        }
    }
}
$mensaje = $ClienteModelo->saludar();
$clientes = $ClienteModelo->obtenerclientes();
include_once '../vista/cliente.vista.php';