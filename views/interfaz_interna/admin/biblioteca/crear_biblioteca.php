<?php

include "../../../../bd/Conexion.php";

session_start();

if (!isset($_SESSION['ID_USUARIO'])){
   echo "<script>window.location='../../interfaz_externa/login.html';</script>";
}
$conectar = new Conexion;
$conexion = $conectar->conectarBD();

$consulta_clase = mysqli_query($conexion,"SELECT ID_CLASE,NOMBRE_CLASE FROM CLASE");
$consulta_tema = mysqli_query($conexion,"SELECT ID_TEMA,NOMBRE_TEMA FROM TEMA");
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
        <h1>Publicar Documento</h1>
        <div class="main">
        <form action="../../../../controllers/crud_documento/ingresar_documento.php" method="post" enctype="multipart/form-data">
        <input type="text" name="titulo_documento" placeholder="Titulo" required>
        <textarea class="Control" name="descripcion_documento" rows="10" cols="40" placeholder="Descripcion"></textarea>
        <label>Documento </label><input type="file" name="archivo_documento" accept=".pdf" required>
        <input type="number" name="paginas_documento" placeholder="Cantidad de Paginas" required>
        <label>Imagen Portada </label><input type="file" name="imagen_documento" accept="image/*" required>
        <label for="tema_documento" class="input-cargo">Tema: </label> 
                <select name="tema_documento" id="tema_documento" class="input-cargo-options">
                    <?php while($datos = mysqli_fetch_array($consulta_tema)){ ?>
                    <option value="<?php echo $datos['ID_TEMA']?>"><?php echo $datos['NOMBRE_TEMA']?></option>
                    <?php } ?>
                </select>
        <label for="clase_documento" class="input-cargo">Clase: </label> 
        <select name="clase_documento" id="clase_documento" class="input-cargo-options">
                    <?php while($datos = mysqli_fetch_array($consulta_clase)){ ?>
                    <option value="<?php echo $datos['ID_CLASE']?>"><?php echo $datos['NOMBRE_CLASE']?></option>
                    <?php } ?>
                </select>
        <input type="submit" name="btn_form" value="Publicar">
      </form>
    </div>
</div>

</body>
</html>