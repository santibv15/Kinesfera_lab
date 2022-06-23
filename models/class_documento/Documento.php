<?php
include("../../bd/conexion.php");
class Documento extends Conexion{
    private $id_documento;
    private $titulo_documento;
    private $descripcion_documento;
    private $archivo_documento;
    private $paginas_documento;
    private $imagen_documento;
    private $tema_documento;
    private $clase_documento;

    public function __construct(String $titulo_documento,String $descripcion_documento,String $archivo_documento,int $paginas_documento,String $imagen_documento,int $tema_documento,int $clase_documento){
        $this->titulo_documento=$titulo_documento;
        $this->descripcion_documento=$descripcion_documento;
        $this->archivo_documento=$archivo_documento;
        $this->paginas_documento=$paginas_documento;
        $this->imagen_documento=$imagen_documento;
        $this->tema_documento=$tema_documento;
        $this->clase_documento=$clase_documento;
    }

    public function insertDocumento(){
        $conectar = new Conexion;
        $conexion = $conectar->conectarBD();

        $insert= mysqli_prepare($conexion,"INSERT INTO DOCUMENTO_PUBLICO (TITULO_DOCUMENTO,DESCRIPCION_DOCUMENTO,ARCHIVO_DOCUMENTO,PAGINAS_DOCUMENTO,IMAGEN_DOCUMENTO,TEMA_DOCUMENTO,CLASE_DOCUMENTO) VALUES (?,?,?,?,?,?,?)");
        $insert->bind_param("sssisii",$this->titulo_documento,$this->descripcion_documento,$this->archivo_documento,$this->paginas_documento,$this->imagen_documento,$this->tema_documento,$this->clase_documento);
        $insert->execute();
    }

    public function updateDocumento(int $id_documento,String $titulo_documento,String $descripcion_documento,String $archivo_documento,int $paginas_documento,String $imagen_documento,int $tema_documento,int $clase_documento){
        $this->id_documento=$id_documento;
        $this->titulo_documento=$titulo_documento;
        $this->descripcion_documento=$descripcion_documento;
        $this->archivo_documento=$archivo_documento;
        $this->paginas_documento=$paginas_documento;
        $this->imagen_documento=$imagen_documento;
        $this->tema_documento=$tema_documento;
        $this->clase_documento=$clase_documento;

        $conectar = new Conexion;
        $conexion = $conectar->conectarBD();

        $insert= mysqli_prepare($conexion,"CALL EDITAR_DOCUMENTO(?,?,?,?,?,?,?,?);");
        $insert->bind_param("isssisii",$this->id_documento,$this->titulo_documento,$this->descripcion_documento,$this->archivo_documento,$this->paginas_documento,$this->imagen_documento,$this->tema_documento,$this->clase_documento);
        $insert->execute();
    }


    public function deleteDocumento(int $id_documento){
        $this->id_documento = $id_documento;

        $conectar = new Conexion;
        $conexion = $conectar->conectarBD();

        $insert= mysqli_prepare($conexion,"CALL DELETE_DOCUMENTO(?)");
        $insert->bind_param("i",$this->id_documento);
        $insert->execute();
    }

    public function getTitulo(){
        return $this->titulo_documento;
    }

    public function getImagen(){
        return $this->imagen_documento;
    }


}