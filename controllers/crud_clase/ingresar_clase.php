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

    /*if($imagen_type!=='image/png' or $imagen_type!=='image/jpg' or $imagen_type!=='image/jpeg'){
        echo "<script>alert('Solo se admiten archivos .jpg .jpeg o .png')</script>";
        echo "<script>window.location='../../views/interfaz_interna/formador/gestion_clase.php';</script>";
    }else{

    if($imagen_size>600000){
        echo "<script>alert('El Tamaño del archivo sobrepasa lo establecido')</script>";
        echo "<script>window.location='../../views/interfaz_interna/admin/gestion_clase.php';</script>";
    }else{  */


    if (move_uploaded_file($ruta_class, $destino_class)) {
    
    $conectar = new Conexion;
    $conexion = $conectar->conectarBD();
    $registro = mysqli_query($conexion,"CALL INSERTS_CLASS('$nombre_class','$descrip_class','$jornada_class','$horarrio_class',$costo_class,'$tiempo_class','$destino_class',$categoria_class)");
    $consulta = mysqli_query($conexion,"SELECT * FROM CLASE") or die ($conexion."Problemas en la consulta");
    $num = mysqli_num_rows($consulta);

        if ($num != 0){
    
        while($fila = mysqli_fetch_array($consulta)){
            $_SESSION['ID_CLASE']= $fila['ID_CLASE'];
            $_SESSION['NOMBRE_CLASE'] = $fila['NOMBRE_CLASE'];
            $_SESSION['DESCRIPCION_CLASE'] = $fila['DESCRIPCION_CLASE'];
            $_SESSION['JORNADA_CLASE'] = $fila['JORNADA_CLASE'];
            $_SESSION['HORARIOS_CLASE'] = $fila['HORARIOS_CLASE'];
            $_SESSION['COSTO_CLASE'] = $fila['COSTO_CLASE'];
            $_SESSION['TIEMPO_CLASE'] = $fila['TIEMPO_CLASE'];
            $_SESSION['IMAGEN_CLASE'] = $fila['IMAGEN_CLASE'];
            $_SESSION['ID_CATEGORIA_CLASE'] = $fila['ID_CATEGORIA_CLASE'];        
        }


    echo "<script>alert('Existosamente')</script>";

    echo "<script>window.location='../../views/interfaz_interna/formador/gestion_clase.php';</script>";

                }
            }
        }

 /*   }
} */

?>