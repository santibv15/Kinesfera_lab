<?php
// Llamar la conexión
include "../../../bd/Conexion.php";
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
	<meta charset="utf-8">
	<title>Gestion Usuarios</title>
	<link rel="stylesheet" type="text/css" href="../css/citaciones.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">
   <link rel="icon" type="image/x-icon" href="../assets/img/favicon.ico"/>
</head>
<body>

     <div class="title"><h1>Gestion Usuarios</h1></div>

     <!--buscador-->
     	<div class="buscar">
              <form action="../../controllers/buscar_usuario.php" method="post">
     		<input type="search" name="buscar" placeholder="Buscar Usuario" required>
     		<input type="submit" name="btn_buscar" value="Buscar">
     	</form>
     	</div>
        <!--codigo Buscar-->

    <table>
    <thead bgcolor="gray">
        <tr>
            <th>Usuario</th>
            <th colspan="2">Cargo</th>
            <th colspan="2">Eliminar</th>
        </tr>

        <tr>
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

        // Rescato todos los datos de la base de datos
            while($fila = mysqli_fetch_array($consulta)){
                if ($fila['ID_CARGO_USUARIO'] == $Cargo_usu){
                    if ($fila['ESTADO_USUARIO'] ==$Estado_usu){
            ?>
            <tr>
            <!-- Muestro todos los datos en la tabla  -->
            <td><?php echo $fila['CORREO_USUARIO']; ?><br><?php echo $fila['NOMBRES_USUARIO']; ?> <?php echo $fila['APELLIDOS_USUARIO']; ?></td>

            <td>
                 <form action="../../../controllers/crud_usuario/update_usuario.php" method="post">
                <input type="text" name="id_usuario" value="<?php echo $fila['ID_USUARIO']; ?>" readonly hidden>
                <input type="text" name="new_cargo" value="2" readonly hidden> 
                <input type="submit" name="btn_update" Value=" "> 
                 </form>
              </td>
               <td>
               <form action="../../../controllers/crud_usuario/update_usuario.php" method="post">
                <input type="text" name="id_usuario" value="<?php echo $fila['ID_USUARIO']; ?>" readonly hidden>
                <input type="text" name="new_cargo" value="3" readonly hidden> 
                <input type="submit" name="btn_update" Value=" "> 
                 </form>
              </td>
              <td>
              <form action="../../../controllers/crud_usuario/delete_usuario.php" method="post">
                <input type="text" name="id_usuario" value="<?php echo $fila['ID_USUARIO']; ?>" readonly hidden>
                <input type="text" name="estado" value="Inactivo" readonly hidden>
                <input type="submit" name="btn_delete" Value=" ">
                </form>
                </td>
            </tr>
            <?php
          }
     }
}
?>
        </table>
</body>
</html>