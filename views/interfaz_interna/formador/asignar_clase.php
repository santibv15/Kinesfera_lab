<?php
// Llamar la conexión
include "../../../bd/Conexion.php";
// Iniciar trabajo con sessiones
session_start();
// verificar que no este llegando la variable de ssesion
if (!isset($_SESSION['ID_USUARIO'])){
   echo "<script>window.location='../../interfaz_externa/login.html';</script>";
}

$id_clase = $_POST['id_clase'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/interfaz_interna/formador/asignar.css">
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

    <div  class="contenedor_principal_busqueda">
        <h1 class="titulo_busqueda">Asignación <span class="diferente_color">Clases</span></h1>
        <div class="contenedor_busqueda">
            <form action="asignar_clase.php" method="post">
     		    <input type="search" name="buscar_aprendiz" placeholder="Buscar Usuario" required class="buscar_usuario">
                 <input type="text" name="id_clase" value="<?php echo $id_clase;?>" hidden>
     		    <input type="submit" name="btn_buscar" value="Buscar" class="buscar_boton">
     	    </form>
        </div>
        
        <?php
        if (isset($_POST['btn_buscar'])){
            $id_clase = $_POST['id_clase'];
            $aprendizSearch = $_POST['buscar_aprendiz'];
            
            $conectar = new Conexion;
            $conexion = $conectar->conectarBD();
            $Search = mysqli_query($conexion,"SELECT * FROM BUSCAR_APRENDICES WHERE  NOMBRES_USUARIO  LIKE '%$aprendizSearch%' or APELLIDOS_USUARIO  LIKE '%$aprendizSearch%'");

            $numero = mysqli_num_rows($Search);
            // Verifico que el resultado de la consulta sea mayor a 0
            if ($numero > 0){
                // Rescato todos los datos de la base de datos
                while($fila = mysqli_fetch_array($Search)){
                    
        ?>
        <div class="resultados_busqueda">
            <i class='bx bx-user' id="icono_user"></i>
            <h4 class="nom_resultado"><?php echo $fila['NOMBRES_USUARIO']; ?> <?php echo $fila['APELLIDOS_USUARIO']; ?></h4>
            <h5 class="correo_resultado"><?php echo $fila['CORREO_USUARIO']; ?></h5>
            <form action="../../../controllers/crud_clase/asignacion.php" method="post">
     		    <input type="search" name="id_clase" value="<?php echo $id_clase; ?>" hidden>
                <input type="search" name="id_usuario" value="<?php echo $fila['ID_USUARIO']; ?>" hidden>
     		    <input type="submit" name="btn_asignar" value="Asignar" class="asignar_boton">
     	    </form>
        </div>
        <?php 
                } 
            }else{
        ?>
        <div class="ningun_resultado">
            <h4 class="alerta_resultado">El usuario se no encuentra regsitrado</h4>
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