<?php
include("../../bd/conexion.php");
class Clase extends Conexion{
    private $id_clase;
    private $nombre_clase;
    private $descrip_clase;
    private $jornada_clase;
    private $horario_clase;
    private $costo_clase;
    private $tiempo_clase;
    private $imagen_clase;
    private $categoria_clase;


    public function __construct(){
    }

    public function createClase(String $nombre_clase,String $descrip_clase,String $jornada_clase,String $horario_clase,String $costo_clase,String $tiempo_clase,String $imagen_clase,int $categoria_clase){
        $this->nombre_clase = $nombre_clase;
        $this->descrip_clase = $descrip_clase;
        $this->jornada_clase = $jornada_clase;
        $this->horario_clase = $horario_clase;
        $this->costo_clase = $costo_clase;
        $this->tiempo_clase = $tiempo_clase;
        $this->imagen_clase = $imagen_clase;
        $this->categoria_clase = $categoria_clase;
           
        $conectar = new Conexion;
        $conexion = $conectar->conectarBD();

        $insert= mysqli_prepare($conexion,"CALL INSERTS_CLASS (?,?,?,?,?,?,?,?)");
        $insert->bind_param("ssssdssi",$this->nombre_clase,$this->descrip_clase,$this->jornada_clase,$this->horario_clase,$this->costo_clase,$this->tiempo_clase,$this->imagen_clase,$this->categoria_clase);
        $insert->execute();
        
    }

    public function deleteClase(int $id_clase){
        $this->id_clase = $id_clase;

        $conectar = new Conexion;
        $conexion = $conectar->conectarBD();

        $insert= mysqli_prepare($conexion,"CALL DELETE_CLASE(?)");
        $insert->bind_param("i",$this->id_clase);
        $insert->execute();
    }

    public function updateClase(int $id_clase,String $nombre_clase,String $descrip_clase,String $jornada_clase,String $horario_clase,String $costo_clase,String $tiempo_clase,String $imagen_clase,int $categoria_clase){
        $this->id_clase = $id_clase;
        $this->nombre_clase = $nombre_clase;
        $this->descrip_clase = $descrip_clase;
        $this->jornada_clase = $jornada_clase;
        $this->horario_clase = $horario_clase;
        $this->costo_clase = $costo_clase;
        $this->tiempo_clase = $tiempo_clase;
        $this->imagen_clase = $imagen_clase;
        $this->categoria_clase = $categoria_clase;
           
        $conectar = new Conexion;
        $conexion = $conectar->conectarBD();

        $insert= mysqli_prepare($conexion,"CALL UPDATE_CLASS (?,?,?,?,?,?,?,?,?)");
        $insert->bind_param("isssssssi",$this->id_clase,$this->nombre_clase,$this->descrip_clase,$this->jornada_clase,$this->horario_clase,$this->costo_clase,$this->tiempo_clase,$this->imagen_clase,$this->categoria_clase);
        $insert->execute();
        
    }
}