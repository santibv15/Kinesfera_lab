<?php
// Llamar la conexión
include "../../../bd/Conexion.php";
// Iniciar trabajo con sessiones
session_start();
// verificar que no este llegando la variable de ssesion
if (!isset($_SESSION['ID_USUARIO'])){
   echo "<script>window.location='../../interfaz_externa/login.html';</script>";
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
    <link rel="stylesheet" href="../../css/interfaz_interna/formador/gestion_clase.css">
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
</head>
<body id="body">
    


<header>
        <div class="icon__menu"><i class='bx bx-menu' id="btn_open"></i></div>
    </header>

    <div class="menu__side" id="menu__side">

        <div class="name__page">
            <img src="../../img/logos/logotipo3.png" id="icono-kinesfera" alt="">
            <h4 id="titulo-kinesfera">Kinesfera<span style="color: transparent;">_</span>Lab</h4>
        </div>

        <div class="options__menu">
            <?php if($_SESSION['ID_CARGO_USUARIO']==1 or $_SESSION['ID_CARGO_USUARIO']==2){?>
            <a href="../formador/clase01.php" class="selected">
                <div class="option">
                    <i class='bx bxs-home' title="inicio"></i>
                    <h4>Clases</h4>
                </div>
            </a>
            <?php }else if($_SESSION['ID_CARGO_USUARIO']==3){?>
                <a href="../formador/clase01.php" class="selected">
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
            <a href="../admin/publicaciones.php" >
                <div class="option" >
                    <i class='bx bxs-folder-open'  title="Laboratorio Artistico"></i>
                    <h4>Laboratorio Artistico</h4>
                </div>
            </a>
            <?php if($_SESSION['ID_CARGO_USUARIO']==1){?>
            <a href="../admin/gestion_usuario.php">
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
            <a href="../../../controllers/login/salir.php" onclick="return confirmSalir()">
                <div class="option option_uni">
                    <i class='bx bx-log-in' title="salir"></i>
                    <h4>Salir</h4>
                </div>
            </a>
        </div>

    </div>

    <!--FIN DE MENU-->









    <div class="formulario">
        <div class="caja1">
            <h1>Nueva Clase</h1>
            <div class="main">
            <form action="../../../controllers/crud_clase/ingresar_clase.php" method="post" enctype="multipart/form-data">
            <input class="Control" type="text" name="nombre_class" placeholder="Nombre" required>
            

            <label for="jornada_class" class="input-cargo"> Jornada: </label> 
                    <select name="jornada_class" id="jornada_class" class="input-jornada-options">
                        <option value=></option>
                        <option value="Manana">Mañana</option>
                        <option value="Tarde">Tarde</option>
                        <option value="Noche">Noche</option>
                    </select>
            <input class="Control" type="text" name="horarrio_class" placeholder="Horario" required>
            

            <label for="tiempo_class" class="input-tiempo">Tiempo Pago: </label>
                    <select name="tiempo_class" id="tiempo_class" class="input-tiempo-options">
                        <option value=></option>
                        <option value="Quincenal" class="opciones">Quincenal</option>
                        <option value="Mensual" class="opciones">Mensual</option>
                        <option value="Semestral" class="opciones">Semestral</option>
                    </select>
                    <input class="Control" type="text" name="costo_class" placeholder="Costo" required>
           

            <label for="categoria_class" class="input-categoria">Categoria: </label>
                    <select name="categoria_class" id="categoria_class" class="input-categoria-options">
                        <option value=></option>
                        <option value="1">Artes Visuales</option>
                        <option value="2">Artes Escenicas</option>
                        <option value="3">Artes Literarias</option>
                        <option value="4">Artes Musicales</option>
                    </select>

                    <label class="Imagen_portada">Imagen de Portada </label><input type="file" name="imagen_class" class="img-selector" accept="image/*" required>

             <textarea class="Control" name="descrip_class" rows="10" cols="40" placeholder="Descripcion"></textarea>
            <input class="Control1" type="submit" name="btn_class" value="Publicar" onclick="return confirmsubirc()">
            </form>
        </div>
    </div>


    <script src="../../js/interfaz_interna/menu.js"></script>
    <script src="../../js/interfaz_interna/alertas.js"></script>
</body>
</html>