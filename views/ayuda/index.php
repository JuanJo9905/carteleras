<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo constant('URL')?>views/public/css/pruebas.css">
    <title>Inicio</title>
</head>
<body>
    <?php require_once 'views/layout/header.php' ?>

    <h1 class="center">Cartelera</h1><br><br><br>

    <div class="carteleras">
        
        <div class="cartel"> <!--Representa cada cartel, es el contenedor más grande-->

            <div id="imagen"><img src="posters/astronaut.jpg" alt="" id="img_cartel"></div>
            <h1 id="tit_artel">Titulo</h1> 
            <p id="desc_cartel">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ipsum ullam, eum maiores dignissimos reiciendis dolore 
             iste similique incidunt eius libero provident? Consectetur laudantium quod incidunt. Architecto laudantium nobis reiciendis.</p>
            <p id="cat_cartel">Categoria</p>
            <a href="">Editar</a>
            <a href="">Eliminar</a>

        </div>
        
        <div class="cartel"> <!--Representa cada cartel, es el contenedor más grande-->

            <div id="imagen"><img src="posters/tron border.jpg" alt="" id="img_cartel"></div>
            <h1 id="tit_artel">Titulo</h1> 
            <p id="desc_cartel">Lorem, ipsum dol? Cos reiciendis.</p>
            <p id="cat_cartel">Categoria</p>
            <a href="">Editar</a>
            <a href="">Eliminar</a>

        </div>

    </div>       

        
   
    <?php require_once 'views/layout/footer.php' ?>
</body>

</html>