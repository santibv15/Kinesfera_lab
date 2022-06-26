<?php
include "../../bd/conexion.php";

if (isset($_POST['btn_class'])){

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
            $registro = mysqli_query($conexion,"CALL INSERTS_CLASS('$nombre_class','$descrip_class','$jornada_class','$horarrio_class',$costo_class,'$tiempo_class','$destino_class',$categoria_class)");
        
            echo "<script>alert('Se ha Creado una clase Existosamente')</script>";
            echo "<script>window.location='../../views/interfaz_interna/formador/clase01.php';</script>";
        }
    }else{
        echo "<script>alert('Solo se admiten archivos .jpg .jpeg o .png')</script>";
        echo "<script>window.location='../../views/interfaz_interna/formador/gestion_clase.php';</script>";

    }
}
        

?>