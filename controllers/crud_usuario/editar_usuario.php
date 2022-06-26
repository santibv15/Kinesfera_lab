<?php
include ("../../models/class_usuario/Usuario.php");

    if (isset($_POST['btn_form'])){
                    
                    $id_usuario = $_POST['id'];
                    $name = $_POST['nombre'];
                    $lastname = $_POST['apellido'];
                    $edad = $_POST['edad'];
                    $tel = $_POST['telefono'];
                    $email= $_POST['correo'];
                    $pass = $_POST['clave'];
                            
                    $clave_oculta = base64_encode($pass);

                    $conectar = new Conexion;
                    $conexion = $conectar->conectarBD();
                    
                        $objUsuario = new Usuario();
                        $insert= $objUsuario->updatePerfil($id_usuario,$name,$lastname,$edad,$tel,$email,$clave_oculta);
                    
                    
                        echo "<script>alert('Actualizacion Exitosa');</script>";
                        echo "<script>window.location='../../views/interfaz_interna/aprendiz/aprendiz.php';</script>";
                    }
                    
            
?>
    