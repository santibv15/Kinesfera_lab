<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/interfaz_externa/style_login.css">
</head>
<body>
    <div class="formulario">
        <h1>Nueva Clase</h1>
        <div class="main">
        <form action="../../../controllers/crud_clase/ingresar_clase.php" method="post" enctype="multipart/form-data">
        <input type="text" name="nombre_class" placeholder="Nombre" required><br><br>
        <textarea name="descrip_class" rows="10" cols="40" placeholder="Descripcion"></textarea><br><br>
        <label for="jornada_class" class="input-cargo"> Jornada </label> 
                <select name="jornada_class" id="jornada_class" class="input-jornada-options">
                    <option value="Manana">Mañana</option>
                    <option value="Tarde">Tarde</option>
                    <option value="Noche">Noche</option>
                </select><br><br>
        <input type="text" name="horarrio_class" placeholder="Horario" required><br><br>
       <input type="text" name="costo_class" placeholder="Costo" required><br><br>
       <label for="tiempo_class" class="input-tiempo">Tiempo Pago</label> 
                <select name="tiempo_class" id="tiempo_class" class="input-tiempo-options">
                    <option value="Quincenal">Quincenal</option>
                    <option value="Mensual">Mensual</option>
                    <option value="Semestral">Semestral</option>
                </select><br><br>
       <label>Imagen de Portada </label><input type="file" name="imagen_class" accept="image/*" required><br><br>
       <label for="categoria_class" class="input-categoria">Categoria</label> 
                <select name="categoria_class" id="categoria_class" class="input-categoria-options">
                    <option value="1">Artes Visuales</option>
                    <option value="2">Artes Escenicas</option>
                    <option value="3">Artes Literarias</option>
                    <option value="4">Artes Musicales</option>
                </select><br><br>
        <input type="submit" name="btn_class" value="Publicar">
      </form>
    </div>
</div>

</body>
</html>