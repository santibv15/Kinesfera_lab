<?php
include "../models/conexion.php";

if (isset($_POST['btn'])){
    
$pass = $_POST['contra'];
$pass2 = $_POST['c_contra'];

    if ($pass == $pass2){
        $name = $_POST['n_completo'];
        $edad = $_POST['edad'];
        $tel = $_POST['n_tel'];
        $email= $_POST['email'];
        $usu = $_POST['n_usuario'];
        $cargo = $_POST['cargo'];
        
        
        
        $clave_oculta = md5($pass);
        
        $registro = mysqli_query($conexion,"INSERT INTO usuario (Nombre_completo,Edad_usuario,Tel_usuario,Correo_usuario,Nom_usuario,Contra_usuario,Id_cargo) VALUES ('$name','$edad','$tel','$email','$usu','$clave_oculta','$cargo')") or die ($conexion."Problemas en el crear");
        
        echo "<script>alert('Registro Exitoso');</script>";
        echo "<script>window.location='../views/interfaz_externa/login.html';</script>";
        
    }else{
        echo "<script>alert('Las claves no coinciden');</script>";
        echo "<script>window.location='../views/interfaz_externa/login.html';</script>";
        
    }
}
?>