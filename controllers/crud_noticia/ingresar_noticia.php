<?php
include ("../../models/class_noticia/Noticia.php");

    if(isset($_POST['btn_form'])){
        $titulo_noticia = $_POST['titulo_noticia'];
        $descripcion_noticia = $_POST['descripcion_noticia'];
        $imagen_noticia = $_FILES['imagen_noticia']['name'];
        $imagen_type = $_FILES['imagen_noticia']['type'];
        $ruta_imagen = $_FILES['imagen_noticia']['tmp_name'];
        $destino_imagen = "imagenes_noticia/".$imagen_noticia;
        $id_usuario_noticia = $_POST['id_usuario_noticia'];

        
        if($imagen_type=='image/png' or $imagen_type=='image/jpg' or $imagen_type=='image/jpeg'){
            if (move_uploaded_file($ruta_imagen, $destino_imagen)) {


                $conectar = new Conexion;
                $conexion = $conectar->conectarBD();
                $objNoticia = new Noticia ();
                $objNoticia->insertNoticia($titulo_noticia,$descripcion_noticia,$destino_imagen,$id_usuario_noticia);

                echo "<script>alert('Publicacion Exitosa')</script>";
                echo "<script>window.location='../../views/interfaz_interna/admin/publicaciones.php';</script>";

            }
        }else{
            echo "<script>alert('Solo se admiten imagenes .jpg .jpeg o .png')</script>";
            echo "<script>window.location='../../views/interfaz_interna/admin/noticia/crear_noticia.php';</script>";

        }



    }


?>