<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo constant('URL')?>views/public/css/layout.css">

    <title>Editar</title>
</head>
<body>
    <?php require_once 'views/layout/header.php'?>
    
    <article class="edicion">
    <div id="main">
    <h1 class="center">Detalle de '<?php echo $this->cartel->titulo; ?>' </h1>
    
    <div class="center"><?php echo $this->mensaje;?>
    <form action="<?php echo constant('URL')?>main/editarCartelera" method="POST" enctype="multipart/form-data"> <!--Envio la info al controlador 'consulta' al metodo 'actualizarcartel'-->
       
    
    <p>
        <label for="id">ID</label><br>
        <input type="text" name="id" value="<?php echo $this->cartel->id; ?>" disabled>
        </p>

        <p>
        <label for="titulo">Titulo</label><br>
        <input type="text" name="titulo" value="<?php echo $this->cartel->titulo; ?>" required>
        </p>
 
        <p>
        <label for="categoria">Categoria</label><br>
        <input type="text" name="categoria" value="<?php echo $this->cartel->categoria; ?>" required>
        </p>

        <p>
        <label for="sintaxis">Sintaxis</label><br>
        <textarea name="sintaxis" id="txtarea" cols="30" rows="10"  required><?php echo $this->cartel->sintaxis; ?></textarea>
        </p>

        <input type="file" name="img" required><br><br>

        <input type="submit" value="Actualizar cartel">
    </form>
    </div>
    </div>
    </article>
    <?php require_once 'views/layout/footer.php'?>
</body>
</html>