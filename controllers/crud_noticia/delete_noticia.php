<?php
include ("../../models/class_noticia/Noticia.php");

if (isset($_POST['btn_delete'])){

    $id_noticia = $_POST['id_noticia'];
    
    $objNoticia= new Noticia();
    $objNoticia->deleteNoticia($id_noticia);

    echo "<script>alert('La noticia ha sido eliminado Existosamente')</script>";
    echo "<script>window.location='../../views/interfaz_interna/admin/publicaciones.php';</script>";
}
?>