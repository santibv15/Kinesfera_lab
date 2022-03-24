<?php
include ("../../models/class_usuario/Usuario.php");

if (isset($_POST['btn_update'])){

    $id_usuario = $_POST['id_usuario'];
    $cargo = $_POST['new_cargo'];
    
    $objUsuario = new Usuario();
    $Update= $objUsuario->updateCargo($id_usuario,$cargo);

    echo "<script>alert('Actualizacion Existosa')</script>";
    echo "<script>window.location='../../views/interfaz_interna/admin/gestion_usuario.php';</script>";
}
?>