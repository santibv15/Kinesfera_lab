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
    <link rel="stylesheet" href="../../css/interfaz_interna/aprediz/clase_aprendiz.css">
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
            <a href="../formador/clase01.php" >
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
            <a href="explorar.php">
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
            <a href="../aprendiz/aprendiz.php" >
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

<div class="contenedor_principal">
<?php
$id_usuario=$_SESSION['ID_USUARIO'];
$conectar = new Conexion;
$conexion = $conectar->conectarBD();

$consultaUsuario = mysqli_query($conexion,"SELECT * FROM USUARIO_CLASE WHERE USUARIO_ID=$id_usuario");

$numero = mysqli_num_rows($consultaUsuario);

if ($numero > 0){

while($fila = mysqli_fetch_array($consultaUsuario)){
    $id_miclase=$fila['CLASE_ID'];
    $consultaClase = mysqli_query($conexion,"SELECT * FROM CLASE WHERE ID_CLASE=$id_miclase");
      
            while($fila = mysqli_fetch_array($consultaClase)){
        
            ?>
<div class="contenedor_cards">
    <label class = "card" for="item-1" id="selector-1">
    <?php echo '<img class="image" src="../../../controllers/crud_clase/'.$fila["IMAGEN_CLASE"].'" alt="imagen curso">'; ?>
    <p class="nom_clase"><?php echo $fila['NOMBRE_CLASE']; ?></p>

   <form action="#" method="post">
   <input type="text" name="id_clase" value="<?php echo $fila['ID_CLASE']; ?>" readonly hidden>
   <input type="submit" class="btn ver" name="btn_anadir" Value="Ver"> 
   </form>
 </label>
</div>
<?php
          }
    }

}else{
    ?>
    <div class="ningun_resultado">
        <h4 class="alerta_resultado">Aun no te han Asignado una clase</h4>
    </div>

    <?php
        }
    ?>
 


   <script src="../../js/interfaz_interna/menu.js"></script>
    <script src="../../js/interfaz_interna/alertas.js"></script>  
</body>
</html>