<?php

include "../../../bd/Conexion.php";

session_start();

if (!isset($_SESSION['ID_USUARIO'])){
   echo "<script>window.location='../../interfaz_externa/login.html';</script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>KinesferaLab</title>
    <link rel="shortcut icon" href="../../img/logos/logotipo_principal.png">
	<link rel="stylesheet" type="text/css" href="../../css/interfaz_interna/admin/gestionUsuario.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">
   <link rel="icon" type="image/x-icon" href="../assets/img/favicon.ico"/>
   <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>

       <center><div>
        <h1>Publicaciones Kinesfera Lab</h1>
        <a href= "biblioteca/crear_biblioteca.php">Biblioteca</a>
        <a href= "noticia/crear_noticia.php">Noticia</a>
        <a href="eventos/crear_eventos.php">Eventos</a>
        <a href="galeria/crear_galeria.php">Galeria</a>
    </div></center>

    <script src="../../js/interfaz_interna/menu.js"></script>
    <script src="../../js/interfaz_interna/alertas.js"></script>
    </body>
</html>