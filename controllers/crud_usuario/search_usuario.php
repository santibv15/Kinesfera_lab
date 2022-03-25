<?php
include "../../bd/conexion.php";

if (isset($_POST['btn_buscar'])){

    $usuarioSearch = $_POST['buscar_usu'];
    
    $conectar = new Conexion;
    $conexion = $conectar->conectarBD();
    $Search = mysqli_query($conexion,"SELECT * FROM USUARIO WHERE  CORREO_USUARIO  LIKE '%$usuarioSearch%'");

    $numero = mysqli_num_rows($Search);
    $cargo=4;
    // Verifico que el resultado de la consulta sea mayor a 0
    if ($numero > 0){
        // Rescato todos los datos de la base de datos
        while($fila = mysqli_fetch_array($Search)){
            if ($fila['ID_CARGO_USUARIO']!=$cargo){
                echo "<script>alert('Al usuario $usuarioSearch ya se le asigno un cargo')</script>";
                echo "<script>window.location='../../views/interfaz_interna/admin/gestion_usuario.php';</script>";
            }else{
            ?>

    <!-- COMIENZO HTML -->
        <table class="table">
    <thead class="head_table" bgcolor="gray">
        <tr class="title">
            <th>Usuario</th>
            <th colspan="2">Cargo</th>
            <th colspan="2">Eliminar</th>
        </tr>

        <tr class="title">
            <th></th>
            <th>Formador</th>
            <th>Aprendiz</th>
            <th></th>
        </tr>
    </thead> 

    <tr class="content_table">
            <!-- Muestro todos los datos en la tabla  -->
            <td><?php echo $fila['CORREO_USUARIO']; ?><br><?php echo $fila['NOMBRES_USUARIO']; ?> <?php echo $fila['APELLIDOS_USUARIO']; ?></td>

            <td>
                 <form action="update_usuario.php" method="post">
                <input type="text" name="id_usuario" value="<?php echo $fila['ID_USUARIO']; ?>" readonly hidden>
                <input type="text" name="new_cargo" value="2" readonly hidden> 
                <input type="submit" name="btn_update" Value=" "> 
                 </form>
              </td>
               <td>
               <form action="update_usuario.php" method="post">
                <input type="text" name="id_usuario" value="<?php echo $fila['ID_USUARIO']; ?>" readonly hidden>
                <input type="text" name="new_cargo" value="3" readonly hidden> 
                <input type="submit" name="btn_update" Value=" "> 
                 </form>
              </td>
              <td>
              <form action="delete_usuario.php" method="post">
                <input type="text" name="id_usuario" value="<?php echo $fila['ID_USUARIO']; ?>" readonly hidden>
                <input type="text" name="estado" value="Inactivo" readonly hidden>
                <input type="submit" name="btn_delete" Value=" ">
                </form>
                </td>
            </tr>

            <div><a href="../../views/interfaz_interna/admin/gestion_usuario.php">Volver</a></div>
            <!-- FIN HTML -->
<?php      
                    
                }
         }

    }else{
        echo "<script>alert('El usuario $usuarioSearch no Existe')</script>";
        echo "<script>window.location='../../views/interfaz_interna/admin/gestion_usuario.php';</script>";
    }
    
}
?> 
