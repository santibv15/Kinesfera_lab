<?php
include ("../../models/class_clase/Clase.php");

if (isset($_POST['btn_delete'])){

    $id_clase = $_POST['id_clase'];
    
    $objClase= new Clase();
    $objClase->deleteClase( $id_clase);

    echo "<script>alert('La clase ha sido eliminado Existosamente')</script>";
    echo "<script>window.location='../../views/interfaz_interna/formador/clase01.php';</script>";
}
?>