<?php
include ("../../models/class_documento/Documento.php");

    if(isset($_POST['btn_update'])){
        $id_documento = $_POST['id_documento'];
        $titulo_documento = $_POST['titulo_documento'];
        $descripcion_documento = $_POST['descripcion_documento'];
        $archivo_documento = $_FILES['archivo_documento']['name'];
        $archivo_type = $_FILES['archivo_documento']['type'];
        $ruta_archivo = $_FILES['archivo_documento']['tmp_name'];
        $destino_archivo = "archivos_docs/".$archivo_documento;
        $paginas_documento = $_POST['paginas_documento'];
        $imagen_documento = $_FILES['imagen_documento']['name'];
        $imagen_type = $_FILES['imagen_documento']['type'];
        $ruta_imagen = $_FILES['imagen_documento']['tmp_name'];
        $destino_imagen = "imagenes_docs/".$imagen_documento;
        $tema_documento = $_POST['tema_documento'];
        $clase_documento = $_POST['clase_documento'];

        if($imagen_type=='image/png' or $imagen_type=='image/jpg' or $imagen_type=='image/jpeg'){
            if($archivo_type=='application/pdf'){
                if (move_uploaded_file($ruta_imagen, $destino_imagen)) {
                    if (move_uploaded_file($ruta_archivo, $destino_archivo)) {
                        
                    $conectar = new Conexion;
                    $conexion = $conectar->conectarBD();
                    $objDocumento = new Documento ();
                    $objDocumento->updateDocumento($id_documento,$titulo_documento,$descripcion_documento,$destino_archivo,$paginas_documento,$destino_imagen,$tema_documento,$clase_documento);

                    echo "<script>alert('Actualizacion Exitosa')</script>";
                    echo "<script>window.location='../../views/interfaz_interna/admin/publicaciones.php';</script>";
                    }
                }
                }else{
                echo "<script>alert('Solo se admiten archivos pdf')</script>";
                echo "<script>window.location='../../views/interfaz_interna/admin/publicaciones.php';</script>";
            }

        }else{
            echo "<script>alert('Solo se admiten imagenes .jpg .jpeg o .png')</script>";
            echo "<script>window.location='../../views/interfaz_interna/admin/publicaciones.php';</script>";
        }
        
    }
    



