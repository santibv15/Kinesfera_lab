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
        <h1 class= "titulo">Publicar Noticia</h1>
        <div class="main">
        <form action="../../../../controllers/crud_noticia/ingresar_noticia.php" method="post" enctype="multipart/form-data">
        <input type="text" name="titulo_noticia" placeholder="Titulo" required>
        <textarea class="Control" name="descripcion_noticia" rows="10" cols="40" placeholder="Descripcion"></textarea>
        <label>Imagen Noticia </label><input type="file" name="imagen_noticia" accept="image/*" required>
        <input type="number" name="id_usuario_noticia" value="<?php echo $_SESSION['ID_USUARIO']?>" hidden>
        <input type="submit" name="btn_form" value="Publicar">
      </form>
    </div>
</div>

</body>
</html>