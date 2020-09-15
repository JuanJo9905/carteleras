<?php
    class View
    {
        function __construct()
        {
          
        }

        function render($nombre)
        {
        require 'views/'.$nombre.'.php'; //Accede a la carpeta views y busca el archivo con el nombre recibido y la extension php
        }
    }
?>