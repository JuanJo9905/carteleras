<?php
//Este es el controlador base del que se crearan todos los demás
    class Controller
    {
        function __construct()
        {
            //echo 'Controlador base';
  
            $this->view = new View(); //Creo una variable(objeto) de nombre 'view' e instancio la clase View para que genere una vista
        }

        //Se crea una funcion para que cargue el modelo para los controladores hijo
        function loadModel($model)
        {
          $url = 'models/'.$model.'model.php';
          //Valido si el archivo existe
          if(file_exists($url))
          {
              require $url;
              //Creo un objeto 'model'  
              $modelName = $model.'Model';
              $this->model = new $modelName; //Se crea una variable de tipo objeto que instancia la clase 'nuevoModel' del archivo 'nuevomodel' para poder usar sus funciones
          }
        }
    }
?> 