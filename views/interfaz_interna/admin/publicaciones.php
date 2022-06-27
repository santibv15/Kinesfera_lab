<?php

include "../../../bd/Conexion.php";

session_start();

if (!isset($_SESSION['ID_USUARIO'])){
   echo "<script>window.location='../../interfaz_externa/login.html';</script>";
}

$conectar = new Conexion;
$conexion = $conectar->conectarBD();

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>KinesferaLab</title>
    <link rel="shortcut icon" href="../../img/logos/logotipo_principal.png">
	
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">
   <link rel="icon" type="image/x-icon" href="../assets/img/favicon.ico"/>
   <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
   <link rel="stylesheet" href="../../css/interfaz_interna/admin/publicaciones.css">
   
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
            <a href="../../../controllers/login/salir.php" onclick="return confirmSalir()">
                <div class="option option_uni">
                    <i class='bx bx-log-in' title="salir"></i>
                    <h4>Salir</h4>
                </div>
            </a>
        </div>

    </div>
    <!--fin del menu -->


        <main>
            <div class="menu_laboratorio">
                <h1>Publicaciones Kinesfera Lab</h1>
                <div class="ventanas" id="ventana1">
                    <div class="titulo ventana_noticias"><h3>Noticias</h3></div>
                    <div class="contenedor">
                    <a href= "noticia/crear_noticia.php" class="boton_ventanas boton1">Nuevo</a> 
                    <a href= "#Noticias" class="boton_ventanas boton1">ver opciones</a>
                    </div>
                    
                </div>

                <div class="ventanas">
                    <div class="titulo ventana_eventos"><h3>Eventos</h3></div>    
                    <div class="contenedor">
                    <a href="eventos/crear_eventos.php" class="boton_ventanas boton2">Nuevo</a>
                    <a href="#Eventos" class="boton_ventanas boton2">ver opciones</a>
                    </div>
                  
                </div>

                <div class="ventanas">
                <div class="titulo ventana_galeria"><h3>Galeria</h3></div>    
                    <div class="contenedor">
                    <a href="galeria/crear_galeria.php" class="boton_ventanas boton3">Nuevo</a> 
                    <a href="#Galeria" class="boton_ventanas boton3">ver opciones</a> 
                    </div>
                    
                
                </div>
                <div class="ventanas">
                <div class="titulo ventana_biblioteca"><h3>biblioteca</h3></div>    
                    <div class="contenedor">
                    <a href= "biblioteca/crear_biblioteca.php" class="boton_ventanas boton4">Nuevo</a> 
                    <a href= "#Biblioteca" class="boton_ventanas boton4">ver opciones</a> 
                    </div>
                    
                </div>
            </div>
        </main>

            <!-- NOTICIA -->
    <article class="curso" id="Noticias">
        <div class="container_click">
        <h3 class="encabzados">Opciones Noticias</h3>
            <?php  
            $consulta = mysqli_query($conexion,"SELECT * FROM noticia");
            while($fila = mysqli_fetch_array($consulta)){?>
                <div class="contenido_publico">
                    <div class="container_img"><img class ="imagen_publica" src="../../../controllers/crud_noticia/<?php echo $fila['IMAGEN_NOTICIA'] ?>" alt=""></div>
                    <p class="texto titulo_text"><?php echo $fila['TITULO_NOTICIA'] ?></p>
                    <p  class="texto"><?php echo $fila['DESCRIPCION_NOTICIA'] ?></p>
                    <div class="botones">
                        <form action="noticia/modificar_noticia.php" method="post">
                        <input type="text" name="id_noticia" value="<?php echo $fila['ID_NOTICIA']; ?>" readonly hidden> 
                        <input type="submit" class="btn_m" name="btn_update" Value="Modificar"> 
                        </form>

                        <form action="../../../controllers/crud_noticia/delete_noticia.php" method="post">
                        <input type="text" name="id_noticia" value="<?php echo $fila['ID_NOTICIA']; ?>" readonly hidden>
                        <input type="submit" class="btn_e" name="btn_delete" Value="Eliminar" onclick="return confirmEliminar_clase()"> 
                        </form>
                    </div>
                </div>
                <?php } ?>
        </div>

        <a href="#" class="close">X</a>
    </article>

    <!-- EVENTOS -->
    <article class="curso" id="Eventos">
        <div class="container_click">
        <h3 class="encabzados">Opciones Eventos</h3>
            <?php  
            $consulta = mysqli_query($conexion,"SELECT * FROM noticia");
            while($fila = mysqli_fetch_array($consulta)){?>
                <div class="contenido_publico">
                    <div class="container_img"><img class ="imagen_publica" src="../../../controllers/crud_noticia/<?php echo $fila['IMAGEN_NOTICIA'] ?>" alt=""></div>
                    <p class="texto titulo_text"><?php echo $fila['TITULO_NOTICIA'] ?></p>
                    <p  class="texto"><?php echo $fila['DESCRIPCION_NOTICIA'] ?></p>
                    <div class="botones">
                        <form action="noticia/modificar_noticia.php" method="post">
                        <input type="text" name="id_noticia" value="<?php echo $fila['ID_NOTICIA']; ?>" readonly hidden> 
                        <input type="submit" class="btn_m" name="btn_update" Value="Modificar"> 
                        </form>

                        <form action="../../../controllers/crud_noticia/delete_noticia.php" method="post">
                        <input type="text" name="id_noticia" value="<?php echo $fila['ID_NOTICIA']; ?>" readonly hidden>
                        <input type="submit" class="btn_e" name="btn_delete" Value="Eliminar" onclick="return confirmEliminar_clase()"> 
                        </form>
                    </div>
                </div>
                <?php } ?>
        </div>

        <a href="#" class="close">X</a>
    </article>

    <!-- GALERIA -->
    <article class="curso" id="Galeria">
        <div class="container_click">
        <h3 class="encabzados">Opciones Galeria</h3>
            <?php  
            $consulta = mysqli_query($conexion,"SELECT * FROM imagenes");
            while($fila = mysqli_fetch_array($consulta)){?>
                <div class="contenido_publico">
                    <div class="container_img"><img class ="imagen_publica" src="../../../controllers/crud_galeria/<?php echo $fila['ARCHIVO_IMAGEN'] ?>" alt=""></div>
                    <p class="texto titulo_text"><?php echo $fila['TITULO_IMAGEN'] ?></p>
                    <p  class="texto"><?php echo $fila['DESCRIPCION_IMAGEN'] ?></p>
                    <div class="botones">
                        <form action="galeria/modificar_galeria.php" method="post">
                        <input type="text" name="id_imagen" value="<?php echo $fila['ID_IMAGEN']; ?>" readonly hidden> 
                        <input type="submit" class="btn_m" name="btn_update" Value="Modificar"> 
                        </form>

                        <form action="../../../controllers/crud_galeria/delete_galeria.php" method="post">
                        <input type="text" name="id_imagen" value="<?php echo $fila['ID_IMAGEN']; ?>" readonly hidden>
                        <input type="submit" class="btn_e" name="btn_delete" Value="Eliminar" onclick="return confirmEliminar_clase()"> 
                        </form>
                    </div>
                </div>
                <?php } ?>
        </div>

        <a href="#" class="close">X</a>
    </article>


    <!-- BIBLIOTECA -->
    <article class="curso" id="Biblioteca">
        <div class="container_click">
        <h3 class="encabzados">Opciones Biblioteca</h3>
            <?php  
            $consulta = mysqli_query($conexion,"SELECT * FROM documento_publico");
            while($fila = mysqli_fetch_array($consulta)){?>
                <div class="contenido_publico">
                    <div class="container_img"><img class ="imagen_publica" src="../../../controllers/crud_documento/<?php echo $fila['IMAGEN_DOCUMENTO'] ?>" alt=""></div>
                    <p class="texto titulo_text"><?php echo $fila['TITULO_DOCUMENTO'] ?></p>
                    <p  class="texto"><?php echo $fila['DESCRIPCION_DOCUMENTO'] ?></p>
                    <p  class="texto"><?php echo $fila['PAGINAS_DOCUMENTO'] ?></p>
                    <div class="botones">
                        <form action="biblioteca/modificar_biblioteca.php" method="post">
                        <input type="text" name="id_documento" value="<?php echo $fila['ID_DOCUMENTO']; ?>" readonly hidden> 
                        <input type="submit" class="btn_m" name="btn_update" Value="Modificar"> 
                        </form>

                        <form action="../../../controllers/crud_documento/delete_documento.php" method="post">
                        <input type="text" name="id_documento" value="<?php echo $fila['ID_DOCUMENTO']; ?>" readonly hidden>
                        <input type="submit" class="btn_e" name="btn_delete" Value="Eliminar" onclick="return confirmEliminar_clase()"> 
                        </form>
                 </div>
                </div>
                <?php } ?>
        </div>

        <a href="#" class="close">X</a>
    </article>


    <script src="../../js/interfaz_interna/menu.js"></script>
    <script src="../../js/interfaz_interna/alertas.js"></script>
    </body>
</html>