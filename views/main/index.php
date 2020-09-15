<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo constant('URL')?>views/public/css/layout.css">
    <title>Inicio</title>
</head>
<body>
    <?php require_once 'views/layout/header.php' ?>

    <h1 class="center">Cartelera</h1>

    <div class="carteleras">

        <?php include_once 'models/cartelera.php';
        foreach($this->carteleras as $row)
        {
            $cartelera = new Cartelera();
            $cartelera = $row; //Le paso toda la informacion del arreglo "carteleras"
        ?>
        <div class="cartel">
    
            <div id="imagen"><?php echo '<img src="'.$cartelera->poster.'" width=100% height=100% alt="'.$cartelera->poster.'">'; ?></div>
            <img src="" alt="">
            <h1><?php echo $cartelera->titulo ?></h1> 
            <p><?php echo $cartelera->sintaxis ?></p>
            <p><?php echo $cartelera->categoria ?></p>
            <a href="<?php echo constant('URL').'main/verCartel/'.$cartelera->id ?>">Editar</a>
            <a href="<?php echo constant('URL').'main/eliminarCartel/'.$cartelera->id ?>">Eliminar</a>
    
        </div>
        <?php } ?>

    </div>

    <?php require_once 'views/layout/footer.php' ?>
</body>

</html>