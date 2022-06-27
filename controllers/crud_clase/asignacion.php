<?php
include ("../../bd/Conexion.php");

if (isset($_POST['btn_asignar'])){

    $id_clase = $_POST['id_clase'];
    $id_usuario = $_POST['id_usuario'];
    
    $conectar = new Conexion;
    $conexion = $conectar->conectarBD();
    $registro = mysqli_query($conexion,"INSERT INTO USUARIO_CLASE (USUARIO_ID,CLASE_ID) VALUES ($id_usuario,$id_clase)");

    echo "<script>alert('Asignacion Exitosa')</script>";
    echo "<script>window.location='../../views/interfaz_interna/formador/clase01.php';</script>";
}
?>