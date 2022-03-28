<?php
// Abrir session
session_start();
// Cerrar session
session_destroy();

// Redireccionar hacia afuera del sistema
echo "<script>window.location='../../index.php';</script>";

?>