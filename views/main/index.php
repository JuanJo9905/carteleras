<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo constant('URL')?>views/public/css/layout.css">
    <title>Inicio</title>
</head>
<body>
    <?php require_once 'views/layout/header.php'?>

    <h1 class="titulo center ">Cartelera</h1>

    <div class="carteleras">

        <!--Filtro de peliculas por categoria-->
        <form action="<?php echo constant('URL').'main/'?>filtrar" method="post">
        <input type="text" name="filtro" id="filtro">
        <input type="submit" value="Buscar">
        <br>
        </form>
        

        <?php include_once 'models/cartelera.php';
        foreach($this->carteleras as $row)
        {
            $cartelera = new Cartelera();
            $cartelera = $row; //Le paso toda la informacion del arreglo "carteleras"
        ?>
        
        <div class="cartel"> <!--Representa cada cartel, es el contenedor más grande-->

            <div id="imagen"><?php echo '<img src="'.$cartelera->poster.'" alt="'.$cartelera->poster.'">'; ?></div>
            <h1><?php echo $cartelera->titulo ?></h1> 
            <p><?php echo $cartelera->sintaxis ?></p>
            <p><?php echo $cartelera->categoria ?></p>
            <button class="btn"><a href="<?php echo constant('URL').'main/verCartel/'.$cartelera->id ?>">Editar</a></button>
            <button class="btn"><a href="<?php echo constant('URL').'main/eliminarCartel/'.$cartelera->id ?>">Eliminar</a></button>

        </div>
        
        <?php } ?>

    </div>

    <?php require_once 'views/layout/footer.php' ?>
</body>

</html>