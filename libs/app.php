<?php
    require_once 'controllers/error.php';
    
    class App{
        function __construct() //Constructor de la clase app
        {
            //echo '<p>Nueva app</p>';

            $url = isset($_GET['url'])?$_GET['url'] : null; //Obtiene el contenido de la url que tenga despues de su direccion y se hace una condicional de linea para que cuando no tenga info en la url ésta sea 'null'
            $url = rtrim($url, '/'); //Elimina los ´/´ extra que tenga la url
            $url = explode('/', $url); //Separa las cadenas por cada '/' que tengan
           
            //Si la url es null ésta se redirigira por defecto a la vista main
            if(empty($url[0]))
            {
                $archivoController = 'controllers/main.php'; //Establezco la direccion del control al que quiero acceder
                require_once $archivoController; //Llamo dicho controlador (Pide el codigo 1 vez)
                $controller = new Main(); //Instancio la clase para poder usarla
                $controller->loadModel('main'); 
                $controller->render();
                return false;
            }
 
            $archivoController = 'controllers/' . $url[0] . '.php'; //  controllers/controlador.php
            if(file_exists($archivoController))
            {
                require_once $archivoController; //  controllers/controlador.php
                
                //Inicializar el controlador
                $controller = new $url[0]; //new controlador
                $controller->loadModel($url[0]); //Uso la funcion para cargar el modelo del controlador correspondiente(si tiene)
                
                //Numero de elementos de la url (Si tiene mas de 2 significa que la url lleva parametros)
                $nparam=sizeof($url);

                //Si existen parametros en la url los obtengo
                if($nparam > 1)
                {
                    if($nparam > 2)
                    {
                        $param =[];
                        for($i=2; $i < $nparam; $i++){
                            array_push($param, $url[$i]); //Ingreso en el arreglo los parámetros encontrados
                        }
                        $controller->{$url[1]}($param);//llamo el metodo que se encuentre en la url y le mando los parametros
                    }
                    else
                    {
                        $controller->{$url[1]}();  //Ejecuta la funcion que lleve el nombre de la segunda parte de la url
                    }
                }
                else
                {
                    $controller->render();
                }
            }
            else
            {
                $controller = new Errores();
            }

        }

    }

?>