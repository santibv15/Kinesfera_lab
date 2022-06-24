<?php

include "bd/Conexion.php";

?> 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KinesferaLab</title>
    <link rel="shortcut icon" href="views/img/logos/logotipo_principal.png">
    <link rel="stylesheet" href="views/css/interfaz_externa/inicio.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">
</head>
<body>

    <main class="wapper">
    <section id="seccionprincipal">
        <header class="encabezado">
            <img src="views/img/logos/logotipo3.png" alt="Logo Kinesfera">
            <nav>
                <a href="index.php">Inicio</a>
                <a href="views/interfaz_externa/noticias.php">Noticias</a>
                <a href="views/interfaz_externa/eventos.html">Eventos</a>
                <a href="views/interfaz_externa/minibiblioteca.php">Biblioteca</a>
                <a href="views/interfaz_externa/galeria.html">Galeria</a>
                <a href="views/interfaz_externa/login.html">Ingresar</a>
            </nav> 
        </header>
        <img  class="fondo" src="views/img/interfaz_externa/inicio/principal2.jpg" alt="">
    </section>

    <section id="secondsection">
        <header>
        <h1>Corporacion Artistica</h1>
        <p>Kinesfera Lab</p></header>
        <div class="cards">
            <div class="imagen">
                <img src="views/img/interfaz_externa/inicio/imagen_uno.jpg" ></div>
                <div class="content" >
                    <h2 class="titulo_cards">Nosotros</h2>
                    <p class="texto">La búsqueda de la unión de las diferentes
                         ramas del arte a favor del desarrollo de diferentes
                        procesos de creación artística experimental. 
                        Incentivamos y apoyamos la exploración
                        e investigación en el campo de las artes visuales y 
                        plásticas, escénicas, musicales y
                        literarias en la ciudad de Medellín.</p>
                </div>
        </div>
    </section>

    <section id="threesection" >
        <header class="header2">
            <h1>Visión</h1>
            <p>Kinesfera Lab</p></header>
        <div class="cards">
            <div id="img_derecha">
                <img src="views/img/interfaz_externa/inicio/imagen_dos.jpg" ></div>
                <div  id="content_izquierda">
                    <h2 class="titulo_cards2">Metas</h2>
                    <p class="texto2">Para el año 2026 la Corporación
                        Kinesfera Lab será reconocida
                        internacionalmente por conectar
                        y desarrollar nuevas técnicas y
                        metodologías del arte emergente
                        en la ciudad de Medellín con el
                        exterior, permitiendo que las
                        investigaciones en artes sean
                        procesos abiertos que vayan más
                        allá del contexto académico.</p>
                </div>
        </div>
    </section>

    <section id="foursection">
        <header>
            <h1>Misión</h1>
            <p>Kinesfera Lab</p></header>
        <div class="cards">
            <div class="imagen">
                <img src="views/img/interfaz_externa/inicio/imagen_tres.jpg" ></div>
                <div class="content">
                    <h2 class="titulo_cards">Nuestro Objetivo</h2>
                    <p class="texto">Potenciar el desarrollo de la creación
                        artística experimental para que la
                        comunidad fundamente los diferentes
                        procesos de creación en pro de la
                        investigación y visibilidad de las
                        metodologías emergentes en el arte.</p>
                </div>
        </div>
    </section>

    <section id="fivesection" >

        <header class="header3">
            <h1>Clases</h1>
            <p>Kinesfera Lab</p></header>
            <?php
    $conectar = new Conexion;
    $conexion = $conectar->conectarBD();
    $consulta = mysqli_query($conexion,"SELECT * FROM CATEGORIA");
      
            while($fila = mysqli_fetch_array($consulta)){
        
            ?>
        <div class="caja_clase">
        <div class="container_superior">
            <div class="texto_artes">
                <h2 class="title_artes"><?php echo $fila['TIPO_CURSO']; ?></h2>
                <p class="parrafo_artes" ><?php echo $fila['DESCRIPCION_CATEGORIA']; ?></p>
                <a class="btn" href="#<?php echo $fila['TIPO_CURSO']; ?>">Ver Clase</a>
            </div>
            </div>
        </div>

        <?php
          }
?>

            </div>
    </section>
    </main>

   <!--  APARICION DE CUROS CUANDO LE DEN CLICK -->
    <article class="curso" id="Artes Visuales">
        <div class="container_click">
            <fieldset>
                <legend><h3>Clases Visuales</h3></legend>
                <div class="container_conteCurso">
                <?php
    
                $consulta = mysqli_query($conexion,"SELECT * FROM CLASE");
      
                while($fila = mysqli_fetch_array($consulta)){
                    if($fila['ID_CATEGORIA_CLASE']==1){
        
            ?>
                <div class="img"><?php echo '<img src="controllers/crud_clase/'.$fila["IMAGEN_CLASE"].'" alt="imagen curso">'; ?></div>
                <span class="nombre_curso"><?php echo $fila['NOMBRE_CLASE']; ?></span><br><br>
            <p class="contenido_curso">
                <span>Decripción </span><?php echo $fila['DESCRIPCION_CLASE']; ?><br><br>
                <span>Jornada: </span><?php echo $fila['JORNADA_CLASE']; ?><br><br>
                <span>Horario: </span> <?php echo $fila['HORARIOS_CLASE']; ?><br><br>
                <span>Costo: </span> <?php echo $fila['COSTO_CLASE']; ?> .000 <span><?php echo $fila['TIEMPO_CLASE']; ?> </span><br><br>
                <span class="fecha">Fecha de inicio: </span> 22 Junio 2022
            </p>
            <?php
          }
        }
?>
            </fieldset>
        </div>
        <a href="#fivesection" class="close">X</a>
    </article>

    <!-- SEGUNDO -->
    <article class="curso" id="Artes Escenicas">
        <div class="container_click">
            <fieldset>
                <legend><h3>Artes Escenicas</h3></legend>
                <div class="container_conteCurso">
                <?php
    
                $consulta = mysqli_query($conexion,"SELECT * FROM CLASE");
      
                while($fila = mysqli_fetch_array($consulta)){
                    if($fila['ID_CATEGORIA_CLASE']==2){
        
            ?>
                <div class="img"><?php echo '<img src="controllers/crud_clase/'.$fila["IMAGEN_CLASE"].'" alt="imagen curso">'; ?></div>
                <span class="nombre_curso"><?php echo $fila['NOMBRE_CLASE']; ?></span><br><br>
            <p class="contenido_curso">
                <span>Decripción </span><?php echo $fila['DESCRIPCION_CLASE']; ?><br><br>
                <span>Jornada: </span><?php echo $fila['JORNADA_CLASE']; ?><br><br>
                <span>Horario: </span> <?php echo $fila['HORARIOS_CLASE']; ?><br><br>
                <span>Costo: </span> <?php echo $fila['COSTO_CLASE']; ?> .000<span> <?php echo $fila['TIEMPO_CLASE']; ?> </span><br><br>
                <span class="fecha">Fecha de inicio: </span> 1 Agosto 2022
            </p>
            <?php
          }
        }
?></div>
            
            </fieldset>
        <a href="#fivesection" class="close">X</a>
    </article>

    <!-- TERCERO -->
    <article class="curso" id="Artes Literarias">
        <div class="container_click">
            <fieldset>
                <legend><h3>Artes Literarias</h3></legend>
                <div class="container_conteCurso">
                <?php
    
                $consulta = mysqli_query($conexion,"SELECT * FROM CLASE");
      
                while($fila = mysqli_fetch_array($consulta)){
                    if($fila['ID_CATEGORIA_CLASE']==3){
        
            ?>
                <div class="img"><?php echo '<img src="controllers/crud_clase/'.$fila["IMAGEN_CLASE"].'" alt="imagen curso">'; ?></div>
                <span class="nombre_curso"><?php echo $fila['NOMBRE_CLASE']; ?></span><br><br>
            <p class="contenido_curso">
                <span>Decripción </span><?php echo $fila['DESCRIPCION_CLASE']; ?><br><br>
                <span>Jornada: </span><?php echo $fila['JORNADA_CLASE']; ?><br><br>
                <span>Horario: </span> <?php echo $fila['HORARIOS_CLASE']; ?><br><br>
                <span>Costo: </span> <?php echo $fila['COSTO_CLASE']; ?> .000<span> <?php echo $fila['TIEMPO_CLASE']; ?> </span><br><br>
                <span class="fecha">Fecha de inicio: </span> 30 Abril 2022
            </p>
            <?php
          }
        }
?>
            </fieldset>

        <a href="#fivesection" class="close">X</a>
    </article>

<!-- CUATRO -->
<article class="curso" id="Artes Musicales">
        <div class="container_click">
            <fieldset>
                <legend><h3>Artes Musicales</h3></legend>
                <div class="container_conteCurso">
                <?php
    
                $consulta = mysqli_query($conexion,"SELECT * FROM CLASE");
      
                while($fila = mysqli_fetch_array($consulta)){
                    if($fila['ID_CATEGORIA_CLASE']==4){
        
            ?>
                <div class="img"><?php echo '<img src="controllers/crud_clase/'.$fila["IMAGEN_CLASE"].'" alt="imagen curso">'; ?></div>
                <span class="nombre_curso"><?php echo $fila['NOMBRE_CLASE']; ?></span><br><br>
            <p class="contenido_curso">
                <span>Decripción </span><?php echo $fila['DESCRIPCION_CLASE']; ?><br><br>
                <span>Jornada: </span><?php echo $fila['JORNADA_CLASE']; ?><br><br>
                <span>Horario: </span> <?php echo $fila['HORARIOS_CLASE']; ?><br><br>
                <span>Costo: </span> <?php echo $fila['COSTO_CLASE']; ?> .000 <span><?php echo $fila['TIEMPO_CLASE']; ?> </span><br><br>
                <span class="fecha">Fecha de inicio: </span> 15 Mayo 2022
            </p>
            <?php
          }
        }
?>
            </fieldset>
            </div>
        </div>
        <a href="#fivesection" class="close">X</a>
    </article>

    <!-- PIE DE PAGINA -->
    <footer class="pie_pagina">
        <div class="container_img">
            <img class="logo_pie_pagina" src="views/img/logos/logotipo3.png" alt="logo">
        </div>
       <div class="red_social">
           <h3 class="titulo_icono">Contactenos</h3><br>
           <p class="text_icono"><i class="fab fa-instagram-square"></i>@kinesfera.lab</p>
           <p class="text_icono"><i class="fab fa-facebook"></i>@kinesferacircoteatro</p>
           <p class="text_icono"><i class="fas fa-phone-square-alt"></i>317 6349420</p>
           <a href="mailto:Corporacion_Kinesfera@gmail.com"><i class="fas fa-envelope"></i>@Corporacion_Kinesfera@gmail.com</a>
       </div>
       <div class="container_map">
           <p class="titulo_icono"><i class="fas fa-map-marker-alt"></i>Ubicación</p>
          <!--  CIDOGO DE DIRECCION DE GOOGLE MAPS -->
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3965.7843926658848!2d-75.56184234981663!3d6.292043195423714!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e442f3301cba30d%3A0x7f3323d5c9a6bb2d!2sCl.%2099%20%2350c-38%2C%20Medell%C3%ADn%2C%20Antioquia!5e0!3m2!1ses!2sco!4v1637546585937!5m2!1ses!2sco" width="200" height="150" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
       </div>
       <div class="abajo">
        <p>Kinesfera Lab &copy; 2022</p>
       </div>
    </footer>
    </body>
</html>