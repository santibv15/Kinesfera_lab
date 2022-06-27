<?php
include ("../../models/class_galeria/Galeria.php");

if (isset($_POST['btn_delete'])){

    $id_imagen = $_POST['id_imagen'];
    
    $objGaleria= new Galeria();
    $objGaleria->deleteImagen($id_imagen);

    echo "<script>alert('La publicaion ha sido eliminado Existosamente')</script>";
    echo "<script>window.location='../../views/interfaz_interna/admin/publicaciones.php';</script>";
}
?>