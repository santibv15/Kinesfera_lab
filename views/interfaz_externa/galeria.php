<?php

include "../../models/class_documento/Documento.php";

$conectar = new Conexion;
$conexion = $conectar->conectarBD();

?>

<!DOCTYPE html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>KinesferaLab</title>
        <link rel="shortcut icon" href="../img/logos/logotipo_principal.png">
        <link rel="stylesheet" href="../css/interfaz_externa/galeria.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">
	    
        <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    </head>
    <body>
        <!-- COMIENZO MENU -->
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
       <!--  FIN MENU -->

       <!-- COMIENZO PORTAFOLIO -->
       <section class="container-grid">
       <?php  
        $consulta = mysqli_query($conexion,"SELECT * FROM imagenes");
        while($fila = mysqli_fetch_array($consulta)){?>
           <img src="../../controllers/crud_galeria/<?php echo $fila['ARCHIVO_IMAGEN'] ?>" alt="realizado por: KaterineMS@gmail.com " class="img img-<?php echo $fila['TIPO_IMAGEN'] ?>">
           <?php } ?>
           <div class="container-img">
                <img src="" alt="" class="img-show">
                <i class="bx bx-x"></i>
                <p class="copy"></p>
           </div>
        </section>
       <script src="../js/interfaz_externa/galeria.js"></script>
    </body>
</html>