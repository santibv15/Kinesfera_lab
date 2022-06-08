<?php

    class Conexion{
        function conectarBD(){
            //variables que guardan los datos para conectar la bd
            $server ="localhost:3306";//CORREGIR SIEMPREE
            $usuario = "root";
            $clave = "";
            $baseDatos = "kinesfera_lab";

            //codigo que conecta a la base de datos
            $cadenaConexion = mysqli_connect($server,$usuario,$clave,$baseDatos) or die ("Error en la conexion");

            if($cadenaConexion){
                return $cadenaConexion;
            }
        }
    }
?>