<?php
include("../../bd/conexion.php");
class Noticia extends Conexion{
    private $id_noticia;
    private $titulo_noticia;
    private $descripcion_noticia;
    private $imagen_noticia;
    private $id_usuario_noticia;

    public function __construct(){
      
    }

    public function insertNoticia(String $titulo_noticia,String $descripcion_noticia,String $imagen_noticia,int $id_usuario_noticia){
        $this->titulo_noticia=$titulo_noticia;
        $this->descripcion_noticia=$descripcion_noticia;
        $this->imagen_noticia=$imagen_noticia;
        $this->id_usuario_noticia=$id_usuario_noticia;

        $conectar = new Conexion;
        $conexion = $conectar->conectarBD();

        $insert= mysqli_prepare($conexion,"INSERT INTO NOTICIA (TITULO_NOTICIA,DESCRIPCION_NOTICIA,IMAGEN_NOTICIA,ID_USUARIO_NOTICIA) VALUES (?,?,?,?)");
        $insert->bind_param("sssi",$this->titulo_noticia,$this->descripcion_noticia,$this->imagen_noticia,$this->id_usuario_noticia);
        $insert->execute();
    }

    public function updateNoticia(int $id_noticia,String $titulo_noticia,String $descripcion_noticia){
        $this->id_noticia=$id_noticia;
        $this->titulo_noticia=$titulo_noticia;
       $this->descripcion_noticia=$descripcion_noticia;


        $conectar = new Conexion;
        $conexion = $conectar->conectarBD();

        $insert= mysqli_prepare($conexion,"CALL EDITAR_NOTICIA(?,?,?)");
        $insert->bind_param("iss",$this->id_noticia,$this->titulo_noticia,$this->descripcion_noticia);
        $insert->execute();
    }

    public function deleteNoticia(int $id_noticia){
        $this->id_noticia = $id_noticia;

        $conectar = new Conexion;
        $conexion = $conectar->conectarBD();

        $insert= mysqli_prepare($conexion,"CALL DELETE_NOTICIA(?)");
        $insert->bind_param("i",$this->id_noticia);
        $insert->execute();
    }

}