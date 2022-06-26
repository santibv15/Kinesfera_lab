<?php
include ("../../models/class_galeria/Galeria.php");

if(isset($_POST['btn_form'])){  

    $titulo_imagen = $_POST['titulo_imagen'];
    $descripcion_imagen = $_POST['descripcion_imagen'];
    $archivo_imagen = $_FILES['archivo_imagen']['name'];
    $imagen_type = $_FILES['archivo_imagen']['type'];
    $ruta_imagen = $_FILES['archivo_imagen']['tmp_name'];
    $destino_imagen = "imagenes_galeria/".$archivo_imagen;
    $tipo_imagen = $_POST['tipo_imagen'];
    $clase_imagen = $_POST['clase_imagen'];
    $repositorio_imagen = $_POST['repositorio_imagen'];
    $id_usuario_imagen = $_POST['id_usuario_imagen'];
    
    if($imagen_type=='image/png' or $imagen_type=='image/jpg' or $imagen_type=='image/jpeg'){
        if (move_uploaded_file($ruta_imagen, $destino_imagen)) {
        $conectar = new Conexion;
        $conexion = $conectar->conectarBD();
        $objGaleria = new Galeria ($titulo_imagen,$descripcion_imagen,$destino_imagen,$tipo_imagen,$clase_imagen,$repositorio_imagen,$id_usuario_imagen);
        $objGaleria->insertImagen();

        echo "<script>alert('Publicacion Exitosa')</script>";
        echo "<script>window.location='../../views/interfaz_interna/admin/publicaciones.php';</script>";

        }
    }else{
        echo "<script>alert('Solo se admiten imagenes .jpg .jpeg o .png')</script>";
        echo "<script>window.location='../../views/interfaz_interna/admin/galeria/crear_galeria.php';</script>";

    }




}


/* $objGaleria->updateImagen(2,'ujuX2','hoy','imagen.jpg',3,1,1);
$objGaleria->deleteImagen(2); */
