<?php
include "../../bd/conexion.php";
class Usuario extends Conexion{
    private $id_usuario;
    private $nombre_usu;
    private $apellido_usu;
    private $edad_usu;
    private $tel_usu;
    private $correo_usu;
    private $nom_usu;
    private $contra_usu;
    private $cargo_usu;
    private $estado_usu;


    public function __construct(){
    }

    public function createUsuario(String $nombre_usu,String $apellido_usu,int $edad_usu,int $tel_usu,String $correo_usu,String $contra_usu,int $cargo_usu,String $estado_usu){
        $this->nombre_usu = $nombre_usu;
        $this->apellido_usu = $apellido_usu;
        $this->edad_usu = $edad_usu;
        $this->tel_usu = $tel_usu;
        $this->correo_usu = $correo_usu;
        $this->contra_usu = $contra_usu;
        $this->cargo_usu = $cargo_usu;
        $this->estado_usu = $estado_usu;
           
        $conectar = new Conexion;
        $conexion = $conectar->conectarBD();

        $insert= mysqli_prepare($conexion,"CALL INSERTS_USUARIOS (?,?,?,?,?,?,?,?)");
        $insert->bind_param("ssiissis",$this->nombre_usu,$this->apellido_usu,$this->edad_usu,$this->tel_usu,$this->correo_usu,$this->contra_usu,$this->cargo_usu,$this->estado_usu);
        $insert->execute();
        
    }
    
    public function updateCargo(int $id_usuario,int $cargo_a){
        $this->id_usuario = $id_usuario;
        $this->cargo_usu = $cargo_a;

        $conectar = new Conexion;
        $conexion = $conectar->conectarBD();

        $insert= mysqli_prepare($conexion,"CALL ACTUALIZAR_CARGO(?,?)");
        $insert->bind_param("ii",$this->id_usuario,$this->cargo_usu);
        $insert->execute();
    }

    public function updatePerfil(int $id_usuario,String $nombre_usu,String $apellido_usu,int $edad_usu,int $tel_usu,String $correo_usu,String $contra_usu){
        $this->id_usuario = $id_usuario;
        $this->nombre_usu = $nombre_usu;
        $this->apellido_usu = $apellido_usu;
        $this->edad_usu = $edad_usu;
        $this->tel_usu = $tel_usu;
        $this->correo_usu = $correo_usu;
        $this->contra_usu = $contra_usu;

        $conectar = new Conexion;
        $conexion = $conectar->conectarBD();

        $insert= mysqli_prepare($conexion,"CALL EDITAR_USUARIO(?,?,?,?,?,?,?)");
        $insert->bind_param("issiiss",$this->id_usuario,$this->nombre_usu,$this->apellido_usu,$this->edad_usu,$this->tel_usu,$this->correo_usu,$this->contra_usu);
        $insert->execute();
    }

    public function deleteUsuario(int $id_usuario,String $estado){
        $this->id_usuario = $id_usuario;
        $this->estado_usu = $estado;

        $conectar = new Conexion;
        $conexion = $conectar->conectarBD();

        $insert= mysqli_prepare($conexion,"CALL ELIMINAR_USUARIO(?,?)");
        $insert->bind_param("is",$this->id_usuario,$this->estado_usu);
        $insert->execute();
    }

    
}

?>