<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo constant('URL')?>views/public/css/layout.css">
    <link rel="stylesheet" href="<?php echo constant('URL')?>views/public/css/compra.css">

    <title>Comprar</title>
</head>
<body>
<?php require_once 'views/layout/header.php'?>

<article class="compra" >

<form action="<?php echo constant('URL').'views/factura/factura.php'?>" method="POST" >        
    <div class="poster"><?php echo '<img src="'.constant('URL').$this->cartel->poster.'" alt="'.$this->cartel->poster.'" align="left">'?>
         <div class="contenido">
         <p id="titulo" name="nombre" ><?php echo $this->cartel->titulo;?></p>
         <p id="sintaxis"><?php echo $this->cartel->sintaxis;?></p>
         <p id="categoria"><?php echo $this->cartel->categoria;?></p>
         <!--Se ejecuta la operacion para el resultado(valor) de la compra-->
         <p>Cantidad: <input type="number" id="cantidad" name="cantidad" onclick="total()"></p>
         <p id="total" name="total"></p>
         <button class="btn"><a href="<?php echo constant('URL').'views/factura/factura.php'?>">Comprar</a></button>
         </div>   
    </div>
</form>
    


    <script src="http://localhost/cursophp/cartelera/views/public/js/comprar.js"></script>


</article>

<?php require_once 'views/layout/footer.php'?>
    
</body>
</html>