<?php
include ("../../models/class_documento/Documento.php");

if (isset($_POST['btn_delete'])){

    $id_documento = $_POST['id_documento'];
    
    $objDocumento= new Documento();
    $objDocumento->deleteDocumento($id_documento);

    echo "<script>alert('La publicacion ha sido eliminado Existosamente')</script>";
    echo "<script>window.location='../../views/interfaz_interna/admin/publicaciones.php';</script>";
}
?>