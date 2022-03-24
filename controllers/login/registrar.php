<?php
    include ("../../models/class_usuario/Usuario.php");
    /* class Registrar extends Usuario{ */

        if (isset($_POST['btn_registro'])){
            
    
            $pass = $_POST['contra'];
            $pass2 = $_POST['c_contra'];
            
                if ($pass == $pass2){
                    $name = $_POST['Nombres'];
                    $lastname = $_POST['Apellidos'];
                    $edad = $_POST['edad'];
                    $tel = $_POST['n_tel'];
                    $email= $_POST['email'];
                    $cargo = $_POST['cargo'];
                    $estado = $_POST['estado'];
                            
                    $clave_oculta = md5($pass);

                    $conectar = new Conexion;
                    $conexion = $conectar->conectarBD();
                    $registro = mysqli_query($conexion,"SELECT * FROM usuario WHERE CORREO_USUARIO='$email'");
                    if ($registro->num_rows > 0){
                        echo "<script>alert('Este email ya se encuentra registrado');</script>";
                        echo "<script>window.location='../../views/interfaz_externa/login.html';</script>";
                    }else{
                        $objUsuario = new Usuario();
                        $insert= $objUsuario->createUsuario($name,$lastname,$edad,$tel,$email,$clave_oculta,$cargo,$estado);
                    
                    
                        echo "<script>alert('Registro Exitoso');</script>";
                        echo "<script>window.location='../../views/interfaz_externa/login.html';</script>";
                    }
                    
                    
                }else{
                    echo "<script>alert('Las claves no coinciden');</script>";
                    echo "<script>window.location='../../views/interfaz_externa/login.html';</script>";
                    
                }
            }

    /* } */
?>
    