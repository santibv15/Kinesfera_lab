<?php
include ("../../bd/Conexion.php");

if (isset($_POST['btn_asignar'])){

    $id_clase = $_POST['id_clase'];
    $id_usuario = $_POST['id_usuario'];
    
    $conectar = new Conexion;
    $conexion = $conectar->conectarBD();;
   
    $consulta = mysqli_query($conexion,"DELETE FROM USUARIO_CLASE WHERE CLASE_ID=$id_clase AND USUARIO_ID=$id_usuario") ;
  
        echo "<script>alert('Accion exitosa')</script>";
        echo "<script>window.location='../../views/interfaz_interna/formador/clase01.php';</script>";
   
}
?>