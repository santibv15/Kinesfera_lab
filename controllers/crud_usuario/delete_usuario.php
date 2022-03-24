<?php
include ("../../models/class_usuario/Usuario.php");

if (isset($_POST['btn_delete'])){

    $id_usuario = $_POST['id_usuario'];
    $estado = $_POST['estado'];
    
    $objUsuario = new Usuario();
    $Delete= $objUsuario->deleteUsuario($id_usuario,$estado);

    echo "<script>alert('el usuario ha sido eliminado Existosamente')</script>";
    echo "<script>window.location='../../views/interfaz_interna/admin/gestion_usuario.php';</script>";
}
?>