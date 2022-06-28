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
    <link rel="stylesheet" href="../../css/interfaz_interna/aprediz/vista.css">
    <title>KinesferaLab</title>
    <link rel="shortcut icon" href="../../img/logos/logotipo_principal.png">
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
            <a href="../admin/publicaciones.php"  >
                <div class="option" >
                    <i class='bx bxs-folder-open'  title="Laboratorio Artistico"></i>
                    <h4>Laboratorio Artistico</h4>
                </div>
            </a>
            <?php }else if($_SESSION['ID_CARGO_USUARIO']==3){?>
                <a href="../aprendiz/clase_aprendiz.php"  class="selected">
                <div class="option">
                    <i class='bx bxs-home' title="inicio"></i>
                    <h4>Clases</h4>
                </div>
            </a>
                <?php }?>
            <a href="#">
                <div class="option">
                    <i class='bx bx-world' title="Explorar"></i>
                    <h4>Explorar</h4>
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
        <!--FIN DE MENU-->
 
        <?php
 $id_miclase=$_POST['id_clase'];
$conectar = new Conexion;
$conexion = $conectar->conectarBD();
    $infoClase = mysqli_query($conexion,"SELECT * FROM CLASE WHERE ID_CLASE=$id_miclase");
      
            while($fila = mysqli_fetch_array($infoClase)){
        
?>
<div class="contenedor_principal">
<h1 class="titulo_miclase"><?php echo $fila['NOMBRE_CLASE']; ?><h1>
<div class="container_miclase">
    <div class="contenido_miclase">
    <div class="cont_miclase"><img src="../../../controllers/crud_clase/<?php echo $fila['IMAGEN_CLASE']; ?>" alt="" class="imagen_miclase"></div>
    <p class="texto_miclase"><?php echo $fila['DESCRIPCION_CLASE']; ?><p>
    <?php
      }?>
    </div>

    <?php
    $consultaClase = mysqli_query($conexion,"SELECT * FROM USUARIO_CLASE WHERE CLASE_ID=$id_miclase");
      
    while($fila = mysqli_fetch_array($consultaClase)){
        $id_usuario=$fila['USUARIO_ID'];
        
        $consultaUsuario = mysqli_query($conexion,"SELECT * FROM USUARIO WHERE ID_USUARIO=$id_usuario");
      
            while($fila = mysqli_fetch_array($consultaUsuario)){

    ?>


    <h1 class="title_aprendiz">Aprendiz</h1>
    <div class="resultados_busqueda">
            <i class='bx bx-user' id="icono_user"></i>
            <h4 class="nom_resultado"><?php echo $fila['NOMBRES_USUARIO']; ?> <?php echo $fila['APELLIDOS_USUARIO']; ?></h4>
            <h5 class="correo_resultado"><?php echo $fila['CORREO_USUARIO']; ?></h5>
            <?php if($_SESSION['ID_CARGO_USUARIO']==1 or $_SESSION['ID_CARGO_USUARIO']==2){?>
            <form action="../../../controllers/crud_clase/desunir_clase.php" method="post">
     		    <input type="search" name="id_clase" value="<?php echo $id_miclase; ?>" hidden>
                <input type="search" name="id_usuario" value="<?php echo $fila['ID_USUARIO']; ?>" hidden>
     		    <input type="submit" name="btn_asignar" value="Eliminar" class="asignar_boton">
     	    </form>
            <?php }else{ ?>
                <div class="espacio"></div>
            <?php } ?>
    </div>
    <?php
   }
          }
    ?>
</div>


    <script src="../../js/interfaz_interna/menu.js"></script>
    <script src="../../js/interfaz_interna/alertas.js"></script>  
</body>
</html>