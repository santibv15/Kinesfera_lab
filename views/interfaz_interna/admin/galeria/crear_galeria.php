<?php

include "../../../../bd/Conexion.php";

session_start();

if (!isset($_SESSION['ID_USUARIO'])){
   echo "<script>window.location='../../interfaz_externa/login.html';</script>";
}
$conectar = new Conexion;
$conexion = $conectar->conectarBD();

$consulta_clase = mysqli_query($conexion,"SELECT ID_CLASE,NOMBRE_CLASE FROM CLASE");
$consulta_repositorio = mysqli_query($conexion,"SELECT ID_REPOSITORIO,NOMBRE_REPOSITORIO FROM REPOSITORIO");
$consulta_imagen = mysqli_query($conexion,"SELECT TIPO_IMAGEN FROM IMAGENES");
$tipo=1;
while($datos = mysqli_fetch_array($consulta_imagen)){
    if($datos['TIPO_IMAGEN']>5){
        $tipo=1;
    }else{
        $tipo+=1;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KinesferaLab</title>
    <link rel="shortcut icon" href="../../img/logos/logotipo_principal.png">
    <link rel="stylesheet" href="../css/interfaz_externa/style_login.css">
</head>
<body>
    <div class="formulario">
        <h1>Publicar Imagen en Galeria</h1>
        <div class="main">
        <form action="../../../../controllers/crud_galeria/ingresar_galeria.php" method="post" enctype="multipart/form-data">
        <input type="text" name="titulo_imagen" placeholder="Titulo" required>
        <textarea class="Control" name="descripcion_imagen" rows="10" cols="40" placeholder="Descripcion"></textarea>
        <label>Imagen </label><input type="file" name="archivo_imagen" accept="image/*" required>
        <input type="number" name="tipo_imagen" value="<?php echo $tipo?>" hidden>
        <label for="clase_imagen" class="input-cargo">Clase: </label> 
                <select name="clase_imagen" id="clase_imagen" class="input-cargo-options">
                    <?php while($datos = mysqli_fetch_array($consulta_clase)){ ?>
                    <option value="<?php echo $datos['ID_CLASE']?>"><?php echo $datos['NOMBRE_CLASE']?></option>
                    <?php } ?>
                </select>
        <label for="repositorio_imagen" class="input-cargo">Repositorio: </label> 
                <select name="repositorio_imagen" id="repositorio_imagen" class="input-cargo-options">
                    <?php while($datos = mysqli_fetch_array($consulta_repositorio)){ ?>
                    <option value="<?php echo $datos['ID_REPOSITORIO']?>"><?php echo $datos['NOMBRE_REPOSITORIO']?></option>
                    <?php } ?>
                </select>
        <input type="number" name="id_usuario_imagen" value="<?php echo $_SESSION['ID_USUARIO']?>" hidden>

        <input type="submit" name="btn_form" value="Publicar">
      </form>
    </div>
</div>

</body>
</html>