<?php
// Llamar la conexión
include "../../../../bd/Conexion.php";
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
    <link rel="stylesheet" href="../../../css/interfaz_interna/admin/modificar.css">
    <title>KinesferaLab</title>
    <link rel="shortcut icon" href="../../../img/logos/logotipo_principal.png">
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
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
            <a href="../../formador/clase01.php">
                <div class="option">
                    <i class='bx bxs-home' title="inicio"></i>
                    <h4>Clases</h4>
                </div>
            </a>
            <?php }else if($_SESSION['ID_CARGO_USUARIO']==3){?>
                <a href="../../formador/clase01.php">
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
            <a href="../publicaciones.php" class="selected">
                <div class="option" >
                    <i class='bx bxs-folder-open'  title="Laboratorio Artistico"></i>
                    <h4>Laboratorio Artistico</h4>
                </div>
            </a>
            <?php if($_SESSION['ID_CARGO_USUARIO']==1){?>
            <a href="../gestion_usuario.php">
                <div class="option" >
                    <i class='bx bxs-group' title="Laboratorio Artistico"></i>
                    <h4>Gestión de Usuarios</h4>
                </div>
            </a>
            <?php } ?>
            <a href="../../aprendiz/aprendiz.php">
                <div class="option">
                    <i class='bx bx-user' title="perfil"></i>
                    <h4>Perfil</h4>
                </div>
            </a>
            <a href="../../login/salir.php" onclick="return confirmSalir()">
                <div class="option option_uni">
                    <i class='bx bx-log-in' title="salir"></i>
                    <h4>Salir</h4>
                </div>
            </a>
        </div>

    </div>

    <!--FIN DE MENU-->
    <div class="contenedor_cards_mod">
    <?php
        if (isset($_POST['btn_update'])){
    
            $id_noticia = $_POST['id_noticia'];
                
            $conectar = new Conexion;
            $conexion = $conectar->conectarBD();
        
           $consulta2 = mysqli_query($conexion,"SELECT * FROM NOTICIA WHERE ID_NOTICIA = $id_noticia");
            $numero2 = mysqli_num_rows($consulta2);
            
            if($numero2 > 0){
                
                while ($fila2 = mysqli_fetch_array($consulta2)){
            ?>
        <div>
           <img class="imagen_clase" src="../../../../controllers/crud_noticia/<?php echo $fila2["IMAGEN_NOTICIA"]?>" alt="imagen clase" width="400px" height="600px">
       </div>
        <h1 class="title_modificar">Modificar</h1>
        <form action="../../../../controllers/crud_noticia/update_noticia.php" method="post" enctype="multipart/form-data">
        <input class="campos" type="text" name="id_noticia" value="<?php echo $fila2['ID_NOTICIA']; ?>" readonly hidden>
        <input class="campos" type="text" class="text" name="titulo_noticia" value="<?php  echo $fila2['TITULO_NOTICIA']; ?>" required><br><br>
        <textarea name="descripcion_noticia" rows="10" cols="40"><?php  echo $fila2['DESCRIPCION_NOTICIA']; ?></textarea><br><br>
        <input type="submit" class="btn_publicar" name="btn_form" value="Publicar">
        </form>
      
                   <?php
                    
                }
                
            }
            
        }
    
        ?>
   </div>

   <script src="../../../js/interfaz_interna/menu.js"></script>
    <script src="../../../js/interfaz_interna/alertas.js"></script> 
</body>
</html>