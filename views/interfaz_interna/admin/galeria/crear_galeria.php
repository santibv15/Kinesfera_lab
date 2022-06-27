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

    <!--FIN DE MENU-->
    <div class="formulario__galeria">
        <h1>Publicar Imagen en Galeria</h1>
        <div class="main">
        <form class="form_galeria" action="../../../../controllers/crud_galeria/ingresar_galeria.php" method="post" enctype="multipart/form-data">
        <input class="form__campo" type="text" name="titulo_imagen" placeholder="Titulo" required>
        <textarea class="Control" name="descripcion_imagen" rows="10" cols="40" placeholder="Descripcion"></textarea>
        <div class="container_imagen">
            <label class="form_noticia">Imagen </label><input type="file" name="archivo_imagen" accept="image/*" required>
            <input class="form__campo" type="number" name="tipo_imagen" value="<?php echo $tipo?>" hidden>
        </div>
        <div class="contenedor__info">
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
        </div>
        <input class="boton_galeria" type="submit" name="btn_form" value="Publicar">
      </form>
    </div>
</div>

<a class="boton_volver-galeria" href="../publicaciones.php">Volver</a>

<script src="../../../js/interfaz_interna/menu.js"></script>
</body>
</html>