<?php
include("../../bd/conexion.php");
class Galeria extends Conexion{
    private $id_imagen;
    private $titulo_imagen;
    private $descripcion_imagen;
    private $archivo_imagen;
    private $tipo_imagen;
    private $id_clase_imagen;
    private $id_repositorio_imagen;
    private $id_usuario_imagen;


    public function __construct(){
    }

    public function insertImagen(String $titulo_imagen,String $descripcion_imagen,String $archivo_imagen,int $tipo_imagen,int $id_clase_imagen,int $id_repositorio_imagen,int $id_usuario_imagen){
        $this->titulo_imagen = $titulo_imagen;
        $this->descripcion_imagen = $descripcion_imagen;
        $this->archivo_imagen = $archivo_imagen;
        $this->tipo_imagen= $tipo_imagen;
        $this->id_clase_imagen = $id_clase_imagen;
        $this->id_repositorio_imagen = $id_repositorio_imagen;
        $this->id_usuario_imagen = $id_usuario_imagen;
        
        $conectar = new Conexion;
        $conexion = $conectar->conectarBD();

        $insert= mysqli_prepare($conexion,"INSERT INTO IMAGENES (TITULO_IMAGEN,DESCRIPCION_IMAGEN,ARCHIVO_IMAGEN,TIPO_IMAGEN,ID_CLASE_IMAGEN,ID_REPOSITORIO_IMAGEN,ID_USUARIO_IMAGEN) VALUES (?,?,?,?,?,?,?)");
        $insert->bind_param("sssiiii",$this->titulo_imagen,$this->descripcion_imagen,$this->archivo_imagen,$this->tipo_imagen,$this->id_clase_imagen,$this->id_repositorio_imagen,$this->id_usuario_imagen);
        $insert->execute();
    }

    public function updateImagen(int $id_imagen,String $titulo_imagen,String $descripcion_imagen,String $archivo_imagen){
        $this->id_imagen = $id_imagen;
        $this->titulo_imagen = $titulo_imagen;
        $this->descripcion_imagen = $descripcion_imagen;
        $this->archivo_imagen = $archivo_imagen;

        $conectar = new Conexion;
        $conexion = $conectar->conectarBD();

        $insert= mysqli_prepare($conexion,"CALL EDITAR_GALERIA(?,?,?,?)");
        $insert->bind_param("isss",$this->id_imagen,$this->titulo_imagen,$this->descripcion_imagen,$this->archivo_imagen);
        $insert->execute();
    }

    public function deleteImagen(int $id_imagen){
        $this->id_imagen = $id_imagen;

        $conectar = new Conexion;
        $conexion = $conectar->conectarBD();

        $insert= mysqli_prepare($conexion,"CALL DELETE_GALERIA(?)");
        $insert->bind_param("i",$this->id_imagen);
        $insert->execute();
    }
}