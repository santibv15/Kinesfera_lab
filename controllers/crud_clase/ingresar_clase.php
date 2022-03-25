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
    $ruta_class = $_FILES['imagen_class']['tmp_name'];
    $destino_class = "imagen_guardada/".$imagen_class;
    $categoria_class = $_POST['categoria_class'];

    if (move_uploaded_file($ruta_class, $destino_class)) {
    
    $conectar = new Conexion;
    $conexion = $conectar->conectarBD();
    $registro = mysqli_query($conexion,"CALL INSERTS_CLASS('$nombre_class','$descrip_class','$jornada_class','$horarrio_class',$costo_class,'$tiempo_class','$destino_class',$categoria_class)");


    echo "<script>alert('Existosamente')</script>";
    echo "<script>window.location='../../views/interfaz_interna/admin/gestion_clase.php';</script>";
    }
}
?>