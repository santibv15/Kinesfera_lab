<?php
include ("../../models/class_noticia/Noticia.php");

    if(isset($_POST['btn_form'])){
        $id_noticia = $_POST['id_noticia'];
        $titulo_noticia = $_POST['titulo_noticia'];
        $descripcion_noticia = $_POST['descripcion_noticia'];

        $conectar = new Conexion;
        $conexion = $conectar->conectarBD();
        $objNoticia = new Noticia ();
        $objNoticia->updateNoticia($id_noticia,$titulo_noticia,$descripcion_noticia);

        echo "<script>alert('Actualizacion Exitosa')</script>";
        echo "<script>window.location='../../views/interfaz_interna/admin/publicaciones.php';</script>";

    }

?>