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
            <a href="registrar_aprendiz.php">
                <div class="option">
                    <i class='bx bx-world' title="Explorar"></i>
                    <h4>Explorar</h4>
                </div>
            </a>
            <a href="publicaciones.php" >
                <div class="option" >
                    <i class='bx bxs-folder-open'  title="Laboratorio Artistico"></i>
                    <h4>Laboratorio Artistico</h4>
                </div>
            </a>
            <?php if($_SESSION['ID_CARGO_USUARIO']==1){?>
            <a href="../admin/gestion_usuario.php" class="selected">
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

    <!--FIN DE MENU-->








     <div class="title"><h1>Gestion Usuarios</h1></div>

     <!--buscador-->
     	<div class="buscar">
              <form action="search_usuario.php" method="post">
     		<input type="search" name="buscar_usu" placeholder="Buscar Usuario" required class="buscar_usuario">
     		<input type="submit" name="btn_buscar" value="Buscar" class="buscar_boton">
     	</form>
     	</div>
        

    <table class="table">
    <thead class="head_table" >
        <tr class="title2">
            <th>Usuario</th>
            <th colspan="2">Cargo</th>
            <th colspan="2">Eliminar</th>
        </tr>

        <tr class="title2">
            <th scope="col"></th>
            <th>Formador</th>
            <th>Aprendiz</th>
            <th></th>
        </tr>
    </thead>          

    
    <?php
    $conectar = new Conexion;
    $conexion = $conectar->conectarBD();
    $consulta = mysqli_query($conexion,"CALL VER_USUARIO();");
    $Cargo_usu=4;
    $Estado_usu='Activo';

        
            while($fila = mysqli_fetch_array($consulta)){
                if ($fila['ID_CARGO_USUARIO'] == $Cargo_usu){
                    if ($fila['ESTADO_USUARIO'] ==$Estado_usu){
            ?>
           <div class="contenedor_absoluto">
            <tr  class="content_table">
            <!-- Muestro todos los datos en la tabla  -->
            <td><?php echo $fila['CORREO_USUARIO']; ?><br><?php echo $fila['NOMBRES_USUARIO']; ?> <?php echo $fila['APELLIDOS_USUARIO']; ?></td>

            <td>
                 <form action="../../../controllers/crud_usuario/update_usuario.php" method="post">
                <input type="text" name="id_usuario" value="<?php echo $fila['ID_USUARIO']; ?>" readonly hidden>
                <input type="text" name="new_cargo" value="2" readonly hidden> 
                <input type="submit" name="btn_update" Value="Asignar" class="boton_crud"  onclick="return confirmFormador()"> 
                 </form>
              </td>
               <td>
               <form action="../../../controllers/crud_usuario/update_usuario.php" method="post">
                <input type="text" name="id_usuario" value="<?php echo $fila['ID_USUARIO']; ?>" readonly hidden>
                <input type="text" name="new_cargo" value="3" readonly hidden> 
                <input type="submit" name="btn_update" Value="Asignar" class="boton_crud" onclick="return confirmAprendiz()"> 
                 </form>
              </td>
              <td>
              <form action="../../../controllers/crud_usuario/delete_usuario.php" method="post">
                <input type="text" name="id_usuario" value="<?php echo $fila['ID_USUARIO']; ?>" readonly hidden>
                <input type="text" name="estado" value="Inactivo" readonly hidden>
                <input type="submit" name="btn_delete" Value="Eliminar" class="boton_crud_eliminar" onclick="return confirmEliminar()">
                </form>
                </td>
            </tr>
        </div> 
            <?php
          }
     }
}
?>
        </table>

        <script src="../../js/interfaz_interna/menu.js"></script>
        <script src="../../js/interfaz_interna/alertas.js"></script>
</body>
</html>