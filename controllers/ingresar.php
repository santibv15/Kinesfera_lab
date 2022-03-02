<?php
// Llamar la conexión
include "../models/conexion.php";
// Iniciar trabajo con sessiones
session_start();

// Verificar el envio del boton(isset)
if (isset($_POST['btn'])){
// Rescato los datos del formulario
    $user = $_POST['n_usuario'];
    $clave = $_POST['contra'];
    $cargo = $_POST['cargo'];
      // Encriptar clave
    $clave_oculta = md5($clave);
// consulta de usuario y clave a la base de datos
    $consulta = mysqli_query($conexion,"SELECT * FROM usuario WHERE Nom_usuario='$user' AND Contra_usuario='$clave_oculta' AND Id_cargo='$cargo'") or die ($conexion."Problemas en la consulta");
// verifico el resultado de la consulta (0 ó 1)
    $num = mysqli_num_rows($consulta);
// Verifico el resultado de la consulta que sea mayor a 0
    if ($num != 0){
        // Rescato todos los tados de ese usuario que esten en la base de datos
        while($fila = mysqli_fetch_array($consulta)){
            // Crear Sessiones para uso interno del sistema
            $_SESSION['id_usuario'] = $fila['ID_USUARIO'];
            $_SESSION['nombre_completo'] = $fila['Nombre_completo'];
            $_SESSION['edad_usuario'] = $fila['Edad_usuario'];
            $_SESSION['tel_usuario'] = $fila['Tel_usuario'];
            $_SESSION['correo_usuario'] = $fila['Correo_usuario'];
            $_SESSION['nom_usuario'] = $fila['Nom_usuario'];
            $_SESSION['id_cargo'] = $fila['Id_cargo'];
        }
        echo "<script>alert('$user, Bienvenido')</script>";
        echo "<script>window.location='../views/interfaz_interna/formador/clase.php';</script>";

    }else{
        //Mensaje de contraseña o usuario incorrecto
        echo "<script>alert('Has escrito algo incorrectamente')</script>";
        // Redirección a parte interna del sistema
        echo "<script>window.location='../views/interfaz_externa/login.html';</script>";
        
    }
    
    
}


?>