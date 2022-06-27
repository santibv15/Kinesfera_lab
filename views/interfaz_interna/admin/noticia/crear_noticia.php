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
    <link rel="shortcut icon" href="../../../img/logos/logotipo_principal.png">
    <link rel="stylesheet" href="../css/interfaz_externa/style_login.css">
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../../../css/interfaz_interna/admin/publicaciones.css">
</head>
<body id="body">
<header>
        <div class="icon__menu"><i class='bx bx-menu' id="btn_open"></i></div>
    </header>

    <div class="menu__side" id="menu__side">

        <div class="name__page">
            <img src="../../../img/logos/logotipo3.png" id="icono-kinesfera" alt="">
            <h4 id="titulo-kinesfera">Kinesfera<span style="color: transparent;">_</span>Lab</h4>
        </div>

        <div class="options__menu">
            <?php if($_SESSION['ID_CARGO_USUARIO']==1 or $_SESSION['ID_CARGO_USUARIO']==2){?>
            <a href="../formador/clase01.php" >
                <div class="option">
                    <i class='bx bxs-home' title="inicio"></i>
                    <h4>Clases</h4>
                </div>
            </a>
            <?php }else if($_SESSION['ID_CARGO_USUARIO']==3){?>
                <a href="../formador/clase01.php" >
                <div class="option">
                    <i class='bx bxs-home' title="inicio"></i>
                    <h4>Clases2</h4>
                </div>
            </a>
                <?php }?>
            <a href="#">
                <div class="option">
                    <i class='bx bx-world' title="Explorar"></i>
                    <h4>Explorar</h4>
                </div>
            </a>
            <a href="publicaciones.php" class="selected">
                <div class="option" >
                    <i class='bx bxs-folder-open'  title="Laboratorio Artistico"></i>
                    <h4>Laboratorio Artistico</h4>
                </div>
            </a>
            <?php if($_SESSION['ID_CARGO_USUARIO']==1){?>
            <a href="../admin/gestion_usuario.php" >
                <div class="option" >
                    <i class='bx bxs-group' title="Laboratorio Artistico"></i>
                    <h4>Gestión de Usuarios</h4>
                </div>
            </a>
            <?php } ?>
            <a href="../aprendiz/aprendiz.php">
                <div class="option">
                    <i class='bx bx-user' title="perfil"></i>
                    <h4>Perfil</h4>
                </div>
            </a>
            <a href="../../../../controllers/login/salir.php" onclick="return confirmSalir()">
                <div class="option option_uni">
                    <i class='bx bx-log-in' title="salir"></i>
                    <h4>Salir</h4>
                </div>
            </a>
        </div>

    </div>
    <!--fin del menu -->

  
 

    <div class="formulario_noticia">
        <h1 class= "titulo">Publicar Noticia</h1>
        <div class="main">
        <form class="form_noticia" action="../../../../controllers/crud_noticia/ingresar_noticia.php" method="post" enctype="multipart/form-data">
        <input class="form__campo" type="text" name="titulo_noticia" placeholder="Titulo" required>
        <textarea class="Control " name="descripcion_noticia" rows="10" cols="40" placeholder="Descripcion"></textarea>
        <div class="container_imagen">
        <label class="form_imagen">Imagen Noticia </label><input class="" type="file" name="imagen_noticia" accept="image/*" required>
        <input type="number" class="form__campo" name="id_usuario_noticia" value="<?php echo $_SESSION['ID_USUARIO']?>" hidden>
        </div>
        <input type="submit" class="boton_noticia" name="btn_form" value="Publicar">
      </form>
    </div>
</div>

<a class="boton_volver" href="../publicaciones.php">Volver</a>


<script src="../../../js/interfaz_interna/menu.js"></script>
</body>
</html>