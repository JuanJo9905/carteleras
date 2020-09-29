<?php

    class Main extends Controller{
        function __construct()
        {
            parent::__construct(); 
            $this->view->carteleras=[];
        }
        //Funcion para renderizar la pagina principal y mostrar todas las carteleras de la base de datos
        function render()
        {
            $carteleras = $this->model->get();
            $this->view->carteleras = $carteleras;
            $this->view->render('main/index'); //Mando la direccion que quiero acceder como parametro para que la vista lo abra
        }
        //Funcion para renderizar la pagina solo con las peliculas que cumplan con el filtro de categoria
        function filtrar()
        {
            $categoria=$_POST['filtro'];
            $carteleras=$this->model->getFiltro($categoria);
            $this->view->carteleras = $carteleras;
            $this->view->render('main/index');
        }


        //Funcion para ver una cartelera según su id que se recibe del arreglo enviado desde app.php con todos los parametros recibidos
        function verCartel($param = null)
        {
            $idCartel = $param[0];//El primer parámetro será el id del cartel
            $cartel = $this->model->getById($idCartel);
            //Para proteger el cartel de cambios se crea una sesion
            session_start();
            $_SESSION['id_verCartel']= $cartel->id;
            /////////////////////////////////////////////////////////////
            $this->view->cartel = $cartel;
            $this->view->mensaje="";
            $this->view->render('main/detalle');

        }

        //Funcion para editar la cartelera
        function editarCartelera()
        {
            //Se le asigna al valor del id el valor cargado en la sesion al momento de ingresar a editar el usuario 
            session_start();
            $id=$_SESSION['id_verCartel'];
            //Se recoge la info que ingreso el usuario para actualizar la cartelera
            $titulo   =$_POST['titulo'];
            $categoria=$_POST['categoria'];
            $sintaxis =$_POST['sintaxis'];
            //Guardar la imagen en la carpeta "posters"//
            $nombrePoster = $_FILES['img']['name'];
            $ruta         = $_FILES['img']['tmp_name'];
            $poster       = "posters/".$nombrePoster;
            //Funcion que copia el archivo en la direccion ingresada
            copy($ruta,$poster);
            //Se destruye la sesion
            unset($_SESSION['id_verCartel']);
            if($this->model->update(['id'=>$id, 'titulo'=>$titulo, 'categoria'=>$categoria, 'sintaxis'=>$sintaxis, 'poster'=>$poster]))
            {
                //Se crea un objeto de tipo Cartelera para guardar la info ejecutada en el update
                $cartelera = new Cartelera(); 
                $cartelera->id        = $id;
                $cartelera->titulo    = $titulo;
                $cartelera->categoria = $categoria;
                $cartelera->sintaxis  = $sintaxis;
                $cartelera->poster    =$poster;
                //Se manda a la vista la informacion del Cartelera y el mensaje del estado del proceso
                $this->view->cartel = $cartelera;
                $this->view->mensaje = 'Cartelera actualizada correctamente';
            }
            else{
                $this->view->mensaje = 'Algo ha salido mal';
            }
            //Cargo la página
            $this->view->render('main/detalle'); 
        }
        
        //Funcion para eliminar la cartelera (Puede mejorarse con js)
        function eliminarCartel($param = null)
        {
            $id = $param[0];
            if($this->model->delete($id))
            {
            $this->view->render('main/eliminada');
            }else{
                $this->view->render('error/index');
            }
        }

    }

?>