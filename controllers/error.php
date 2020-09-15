<?php
    class Errores extends Controller{
        function __construct()
        {
            parent::__construct();
            $this->view->mensaje = 'Error al intentar cargar la página';
            $this->view->render('error/index'); //Manda la direccion a la clase vista para que carge la página de error
            
        }
    }
 
?>