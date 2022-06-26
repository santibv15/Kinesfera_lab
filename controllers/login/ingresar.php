<?php

include "../../bd/conexion.php";

session_start();

if (isset($_POST['btn_ingresar'])){

    $correo = $_POST['correo'];
    $clave = $_POST['contra'];
    $clave_oculta = base64_encode($clave);

    $conectar = new Conexion;
    $conexion = $conectar->conectarBD();
   
        $consulta = mysqli_query($conexion,"SELECT * FROM USUARIO WHERE CORREO_USUARIO='$correo' AND CLAVE_USUARIO='$clave_oculta'") or die ($conexion."Problemas en la consulta");

        $num = mysqli_num_rows($consulta);

        if ($num != 0){
    
        while($fila = mysqli_fetch_array($consulta)){
            $_SESSION['ID_USUARIO']= $fila['ID_USUARIO'];
            $_SESSION['NOMBRES_USUARIO'] = $fila['NOMBRES_USUARIO'];
            $_SESSION['APELLIDOS_USUARIO'] = $fila['APELLIDOS_USUARIO'];
            $_SESSION['EDAD_USUARIO'] = $fila['EDAD_USUARIO'];
            $_SESSION['TELEFONO_USUARIO'] = $fila['TELEFONO_USUARIO'];
            $_SESSION['CORREO_USUARIO'] = $fila['CORREO_USUARIO'];
            $_SESSION['CLAVE_USUARIO'] = $fila['CLAVE_USUARIO'];
            $_SESSION['ID_CARGO_USUARIO'] = $fila['ID_CARGO_USUARIO'];
            $_SESSION['ESTADO_USUARIO'] = $fila['ESTADO_USUARIO'];
            
        }

        if($_SESSION['ESTADO_USUARIO']=='Inactivo'){
            echo "<script>alert('Este usuario ha sido Eliminado')</script>";
            echo "<script>window.location='../../views/interfaz_externa/login.html';</script>";
        }else if($_SESSION['ID_CARGO_USUARIO']==1){
            echo "<script>alert('Bienvenido a Kinesfera Lab Administrador')</script>";
            echo "<script>window.location='../../views/interfaz_interna/admin/gestion_usuario.php';</script>";
        }else if($_SESSION['ID_CARGO_USUARIO']==2){
            echo "<script>alert('Bienvenido a Kinesfera Lab Formador')</script>";
            echo "<script>window.location='../../views/interfaz_interna/formador/clase01.php';</script>";
        }else if($_SESSION['ID_CARGO_USUARIO']==3){
            echo "<script>alert('Bienvenido a Kinesfera Lab Aprendiz')</script>";
            echo "<script>window.location='../../views/interfaz_interna/aprendiz/aprendiz.php';</script>";
        }else if($_SESSION['ID_CARGO_USUARIO']==4){
            echo "<script>alert('Todavia no tienes acceso a la plataforma')</script>";
            echo "<script>window.location='../../views/interfaz_externa/login.html';</script>";
        }else{
            echo "Error Redireccionamiento";
        }
        

    }else{
        //Mensaje de contraseña o usuario incorrecto
        echo "<script>alert('Has escrito algo incorrectamente')</script>";
        // Redirección a parte interna del sistema
        echo "<script>window.location='../../views/interfaz_externa/login.html';</script>";
        
    }
    
    
}


?>