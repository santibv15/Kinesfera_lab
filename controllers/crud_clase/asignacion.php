<?php
include ("../../bd/Conexion.php");

if (isset($_POST['btn_asignar'])){

    $id_clase = $_POST['id_clase'];
    $id_usuario = $_POST['id_usuario'];
    
    $conectar = new Conexion;
    $conexion = $conectar->conectarBD();;
   
    $consulta = mysqli_query($conexion,"SELECT * FROM USUARIO_CLASE WHERE CLASE_ID =$id_clase AND USUARIO_ID=$id_usuario") ;
    $num = mysqli_num_rows($consulta);

    if ($num > 0){
        echo "<script>alert('Al usuario ya se le asigno esta clase')</script>";
        echo "<script>window.location='../../views/interfaz_interna/formador/clase01.php';</script>";
    }else{
        $registro = mysqli_query($conexion,"INSERT INTO USUARIO_CLASE (USUARIO_ID,CLASE_ID) VALUES ($id_usuario,$id_clase)");

        echo "<script>alert('Asignacion Exitosa')</script>";
        echo "<script>window.location='../../views/interfaz_interna/formador/clase01.php';</script>";
    }
}
?>