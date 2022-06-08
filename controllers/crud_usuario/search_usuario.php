
    <!-- COMIENZO HTML -->
    <html>
    <head>
    <link rel="stylesheet" href="../../views/css/interfaz_interna/admin/buscador_usuario.css">
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    </head>
    <body id="body" > 
        
<header>
        <div class="icon__menu"><i class='bx bx-menu' id="btn_open"></i></div>

    </header>

    <div class="menu__side" id="menu__side">

        <div class="name__page">
            <img src="../../views/img/logos/logotipo3.png" id="icono-kinesfera" alt="">
            <h4 id="titulo-kinesfera">Kinesfera<span style="color: transparent;">_</span>Lab</h4>
        </div>

        <div class="options__menu">

            <a href="" >
                <div class="option">
                    <i class='bx bxs-home' title="inicio"></i>
                    <h4>Clases</h4>
                </div>
            </a>
            <a href="registrar_aprendiz.php">
                <div class="option">
                    <i class='bx bx-world' title="Explorar"></i>
                    <h4>Explorar</h4>
                </div>
            </a>
            <a href="" >
                <div class="option" >
                    <i class='bx bxs-folder-open'  title="Laboratorio Artistico"></i>
                    <h4>Laboratorio Artistico</h4>
                </div>
            </a>
            <a href="" class="selected">
                <div class="option" >
                    <i class='bx bxs-group' title="Laboratorio Artistico"></i>
                    <h4>Gestión de Usuarios</h4>
                </div>
            </a>
            <a href="">
                <div class="option">
                    <i class='bx bx-user' title="perfil"></i>
                    <h4>Perfil</h4>
                </div>
            </a>
            <a href="../../controllers/login/salir.php" onclick="return confirmSalir()">
                <div class="option option_uni">
                    <i class='bx bx-log-in' title="salir"></i>
                    <h4>Salir</h4>
                </div>
            </a>
        </div>

    </div>
    <main>
        
    </main>


    <!--FIN DE MENU DEL ADMINISTRADOR-->

        
    <div class="title1"><h1>Gestion Usuarios</h1></div>
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
            <?php
        include "../../bd/conexion.php";

        if (isset($_POST['btn_buscar'])){

            $usuarioSearch = $_POST['buscar_usu'];
            
            $conectar = new Conexion;
            $conexion = $conectar->conectarBD();
            $Search = mysqli_query($conexion,"SELECT * FROM BUSCAR_USUARIO WHERE  NOMBRES_USUARIO  LIKE '%$usuarioSearch%' or APELLIDOS_USUARIO  LIKE '%$usuarioSearch%'");

            $numero = mysqli_num_rows($Search);
            // Verifico que el resultado de la consulta sea mayor a 0
            if ($numero > 0){
                // Rescato todos los datos de la base de datos
                while($fila = mysqli_fetch_array($Search)){
                    
                    ?>
            <!-- Muestro todos los datos en la tabla  -->
            <td><?php echo $fila['CORREO_USUARIO']; ?><br><?php echo $fila['NOMBRES_USUARIO']; ?> <?php echo $fila['APELLIDOS_USUARIO']; ?></td>

            <td>
                 <form action="update_usuario.php" method="post">
                <input type="text" name="id_usuario" value="<?php echo $fila['ID_USUARIO']; ?>" readonly hidden>
                <input type="text" name="new_cargo" value="2" readonly hidden> 
                <input type="submit" name="btn_update" Value=" " class="boton_crud"  onclick="return confirmFormador()"> 
                 </form>
              </td>
               <td>
               <form action="update_usuario.php" method="post">
                <input type="text" name="id_usuario" value="<?php echo $fila['ID_USUARIO']; ?>" readonly hidden>
                <input type="text" name="new_cargo" value="3" readonly hidden> 
                <input type="submit" name="btn_update" Value=" " class="boton_crud" onclick="return confirmAprendiz()"> 
                 </form>
              </td>
              <td>
              <form action="delete_usuario.php" method="post" >
                <input type="text" name="id_usuario" value="<?php echo $fila['ID_USUARIO']; ?>" readonly hidden>
                <input type="text" name="estado" value="Inactivo" readonly hidden>
                <input type="submit" name="btn_delete" Value=" " class="boton_crud" onclick="return confirmEliminar()">
                </form>
                </td>
            </tr>

                            <?php      
                                    
                            
                        }

                    }else{
                        echo "<script>alert('El usuario $usuarioSearch no Existe')</script>";
                        echo "<script>window.location='../../views/interfaz_interna/admin/gestion_usuario.php';</script>";
                    }
                    
                }

            
                ?> 

            <div><a href="../../views/interfaz_interna/admin/gestion_usuario.php" class="boton_volver">Volver</a></div>
            <!-- FIN HTML -->
            </body>

            <script src="../../views/js/interfaz_interna/menu.js"></script>
            <script src="../../views/js/interfaz_interna/alertas.js"></script>
        </html>
