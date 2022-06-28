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
    <link rel="stylesheet" href="../../css/interfaz_interna/formador/clase.css">
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
            <a href="../admin/explorar.php">
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

<h1 class="titulo_clase">CLASES</h1>
 <div class="nueva_clase"><a href="gestion_clase.php" >Nueva clase</a></div>                   
<div class="contenedor_principal">
<?php
    $conectar = new Conexion;
    $conexion = $conectar->conectarBD();
    $consulta = mysqli_query($conexion,"SELECT * FROM CLASE");
      
            while($fila = mysqli_fetch_array($consulta)){
        
            ?>
<div class="contenedor_cards">
    <label class = "card" for="item-1" id="selector-1">
    <?php echo '<img class="image" src="../../../controllers/crud_clase/'.$fila["IMAGEN_CLASE"].'" alt="imagen curso">'; ?>
    <p class="nom_clase"><?php echo $fila['NOMBRE_CLASE']; ?></p>
    <form action="modificar_clase.php" method="post">
   <input type="text" name="id_clase" value="<?php echo $fila['ID_CLASE']; ?>" readonly hidden> 
   <input type="submit" class="btn modificar" name="btn_update" Value="Modificar"> 
   </form>

   <form action="../../../controllers/crud_clase/delete_clase.php" method="post">
   <input type="text" name="id_clase" value="<?php echo $fila['ID_CLASE']; ?>" readonly hidden>
   <input type="submit" class="btn eliminar" name="btn_delete" Value="Eliminar" onclick="return confirmEliminar_clase()"> 
   </form>

   <form action="asignar_clase.php" method="post">
   <input type="text" name="id_clase" value="<?php echo $fila['ID_CLASE']; ?>" readonly hidden>
   <input type="submit" class="btn anadir" name="btn_anadir" Value="Aprendices"> 
   </form>

   <form action="../aprendiz/vista_clase.php" method="post">
   <input type="text" name="id_clase" value="<?php echo $fila['ID_CLASE']; ?>" readonly hidden>
   <input type="submit" class="btn ver" name="btn_anadir" Value="Ver"> 
   </form>
 </label>
</div>
<?php
          }
?>
 


   <script src="../../js/interfaz_interna/menu.js"></script>
    <script src="../../js/interfaz_interna/alertas.js"></script>  
</body>
</html>