<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo constant('URL')?>views/public/css/layout.css">
    <title>Nueva cartelera</title>
</head>
<body>
    <?php include_once 'views/layout/header.php' ?>

    <h1 class="center">Crear cartelera</h1>

    <div class="center"><?php echo $this->mensaje;?></div>

    <form action="<?php echo constant('URL').'crear/'?>crearCartel" method="POST" enctype="multipart/form-data" class="center">
    <input type="text" name="titulo" placeholder="Título" required><br><br>
    <textarea name="sintaxis" id="txtarea" cols="30" rows="10" placeholder="Sintaxis" required></textarea><br><br>
    <input type="text" name="categoria" placeholder="Categoria" required><br><br>
    <input type="file" name="img" required><br><br>
    <input type="submit" value="Agregar cartel">
    </form>

    <?php include_once 'views/layout/footer.php' ?>
</body>
</html>