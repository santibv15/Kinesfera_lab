<?php
include "../../bd/conexion.php";

if (isset($_POST['btn_class'])){
    $id_clase = $_POST['id_clase'];
    $nombre_class = $_POST['nombre_class'];
    $descrip_class = $_POST['descrip_class'];
    $jornada_class = $_POST['jornada_class'];
    $horarrio_class = $_POST['horarrio_class'];
    $costo_class = $_POST['costo_class'];
    $tiempo_class = $_POST['tiempo_class'];
    $imagen_class = $_FILES['imagen_class']['name'];
    $imagen_size = $_FILES['imagen_class']['size'];
    $imagen_type = $_FILES['imagen_class']['type'];
    $ruta_class = $_FILES['imagen_class']['tmp_name'];
    $destino_class = "imagen_guardada/".$imagen_class;
    $categoria_class = $_POST['categoria_class'];

     if($imagen_type=='image/png' or $imagen_type=='image/jpg' or $imagen_type=='image/jpeg'){
        if (move_uploaded_file($ruta_class, $destino_class)) {
    
            $conectar = new Conexion;
        $conexion = $conectar->conectarBD();
        $registro = mysqli_query($conexion,"UPDATE CLASE SET NOMBRE_CLASE='$nombre_class',DESCRIPCION_CLASE='$descrip_class', JORNADA_CLASE='$jornada_class', HORARIOS_CLASE='$horarrio_class', COSTO_CLASE=$costo_class,TIEMPO_CLASE='$tiempo_class' ,IMAGEN_CLASE='$destino_class', ID_CATEGORIA_CLASE=$categoria_class WHERE ID_CLASE= $id_clase;
        ");
    
    
        echo "<script>alert('Actualizacion exitosa')</script>";
        echo "<script>window.location='../../views/interfaz_interna/formador/clase01.php';</script>";
                    }
    }else{
        echo "<script>alert('Solo se admiten archivos .jpg .jpeg o .png')</script>";
        echo "<script>window.location='../../views/interfaz_interna/formador/clase01.php';</script>";

            }
       
    }

?>