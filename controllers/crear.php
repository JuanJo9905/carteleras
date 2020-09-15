<?php

class Crear extends Controller{

    function __construct()
    {
        parent::__construct();
        $this->view->mensaje ="";
        
    }
    function render(){
        $this->view->render('crear/index');
    }

    function crearCartel()
    {
        $mensaje = "";
        //Obtengo el contenido de los inputs
        $titulo    = $_POST['titulo'];
        $sintaxis  = $_POST['sintaxis'];
        $categoria = $_POST['categoria'];
        //Guardar la imagen en la carpeta "posters"//
        $nombrePoster = $_FILES['img']['name'];
        $ruta         = $_FILES['img']['tmp_name'];
        $poster       = "posters/".$nombrePoster;
        //Funcion que copia el archivo en la direccion ingresada
        copy($ruta,$poster);

        if($this->model->insertar(['titulo'=>$titulo, 'categoria'=>$categoria,'sintaxis'=>$sintaxis, 'poster'=>$poster]))
        {
            $mensaje = "Poster creado";
        }
        else
        {
            $mensaje = "Poster no creado";
        }
        $this->view->mensaje = $mensaje;
        $this->render();

    }
}

?>