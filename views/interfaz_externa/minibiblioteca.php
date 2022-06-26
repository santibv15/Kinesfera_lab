<?php

include "../../models/class_documento/Documento.php";

$conectar = new Conexion;
$conexion = $conectar->conectarBD();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/interfaz_externa/minibiblioteca.css">
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <title>KinesferaLab</title>
    <link rel="shortcut icon" href="../img/logos/logotipo_principal.png">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
</head>
<body>
    <!--INICIO DE MENU-->
    <header>
        <img src="../img/logos/logotipo3.png" alt="Logo Kinesfera">
        <h1>Kinesfera <span> Lab</span></h1>
        <nav>
            <a href="../../index.php">Inicio</a>
            <a href="noticias.php">Noticias</a>
            <a href="eventos.html">Eventos</a>
            <a href="minibiblioteca.php">Biblioteca</a>
            <a href="galeria.php">Galeria</a>
            <a href="login.html">Ingresar</a>
        </nav>
    </header> <br>
    <!--FIN DEL MENU-->
    <div class="contenedor_cajas contenedor1">
        <h1>BIBLIOTECA</h1>

        <!-- <div class="caja caja1" id="caja1">
            <img class="img" src="../img/interfaz_externa/biblioteca/portadas/1.jpg" alt="" >
        </div> -->


         <?php  
        $consulta = mysqli_query($conexion,"SELECT * FROM documento_publico");
        while($fila = mysqli_fetch_array($consulta)){?>
        <div class="container_cajas container_cajas1">
        
            <img src="../../controllers/crud_documento/<?php echo $fila['IMAGEN_DOCUMENTO'] ?>" alt="" class="caja-img">
               
                <h2 class="titulo_libro"><?php echo $fila['TITULO_DOCUMENTO'] ?></h2>
                <p class="copy"><?php echo $fila['DESCRIPCION_DOCUMENTO'] ?></p>
                    
                    <h4 class="autor"><span>Autoria: </span>Kinesfera Lab</h4>
                    <a href="../../controllers/crud_documento/<?php echo $fila['ARCHIVO_DOCUMENTO'] ?>" class="boton_leer">LEER LIBRO</a>
        </div>
        <?php } ?>
        </div>
        <!-- <i class='bx bxs-up-arrow' title="Laboratorio Artistico"></i> -->
    
    
                    <script src="../js/interfaz_externa/biblioteca.js"></script>
</body>
</html>
