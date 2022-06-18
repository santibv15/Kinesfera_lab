<?php
include ("../../models/class_documento/Documento.php");

    $objDocumento = new Documento ('holi2','saludar uwu','document.docs',15,'imagen.jpg',1,1);
    /* $objDocumento->insertDocumento(); */
    
    $objDocumento->updateDocumento(2,'bai2','saludar uwu','document.docs',15,'imagen.jpg',2,3);
    echo $objDocumento->getTitulo();



