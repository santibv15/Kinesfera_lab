<?php
include ("../../models/class_galeria/Galeria.php");

if(isset($_POST['btn_form'])){  

    $id_imagen = $_POST['id_imagen'];
    $titulo_imagen = $_POST['titulo_imagen'];
    $descripcion_imagen = $_POST['descripcion_imagen'];
    $archivo_imagen = $_FILES['archivo_imagen']['name'];
    $imagen_type = $_FILES['archivo_imagen']['type'];
    $ruta_imagen = $_FILES['archivo_imagen']['tmp_name'];
    $destino_imagen = "imagenes_galeria/".$archivo_imagen;
    
    if($imagen_type=='image/png' or $imagen_type=='image/jpg' or $imagen_type=='image/jpeg'){
        if (move_uploaded_file($ruta_imagen, $destino_imagen)) {
        $conectar = new Conexion;
        $conexion = $conectar->conectarBD();
        $objGaleria = new Galeria ();
        $objGaleria->updateImagen($id_imagen,$titulo_imagen,$descripcion_imagen,$destino_imagen);

        echo "<script>alert('Actualizacion Exitosa')</script>";
        echo "<script>window.location='../../views/interfaz_interna/admin/publicaciones.php';</script>";

        }
    }else{
        echo "<script>alert('Solo se admiten imagenes .jpg .jpeg o .png')</script>";
        echo "<script>window.location='../../views/interfaz_interna/admin/publicaciones.php';</script>";

    }




}

