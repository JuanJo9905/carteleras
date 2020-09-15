<?php 

include_once 'models/cartelera.php';

class MainModel extends Model
{
    function __construct()
    {
        parent::__construct();        
    }

    //Metodo que trae la info de todas las ids
    public function get()
    {
        $items = []; //Creo un arreglo vacio
        
        try{
            $query = $this->db->connect()->query("SELECT * FROM carteleras");//Hago la conexion a la db

            while($row = $query->fetch()) //En $row voy guardando toda la informacion que traiga de la db
            {
                $item = new Cartelera(); //Creo un objeto id
                $item->id          = $row['id'];
                $item->titulo      = $row['titulo']; //En el atributo 'titulo' del objeto id guardo el contenido del espacio 'titulo' de la variable '$row'
                $item->categoria   = $row['categoria'];
                $item->sintaxis    = $row['sintaxis'];
                $item->poster      = $row['poster'];

                array_push($items, $item); //Al arreglo items le agrego el contenido del objeto $item
            }
            return $items;//Retorno el arreglo

        }catch(PDOException $e)
        {
         return [];    
        }
    }

    //Metodo que busca la informacion de un cartel determinado
    public function getById($idCartel)
    {
        $item = new Cartelera();
        $query = $this->db->connect()->prepare("SELECT * FROM carteleras where id = :cartel");
        try{

            $query->execute(['cartel'=>$idCartel]); //Ejecuta la query enviandole como parametro el cartel que se encuentra en el parametro $idCartel

            while($row = $query->fetch()) //Ciclo que va a recorrer todo el arreglo y guardar los valores obtenidos en los atributos del objeto id
            {
                $item->id         =$row['id'];
                $item->titulo     =$row['titulo'];
                $item->categoria  =$row['categoria'];
                $item->sintaxis   =$row['sintaxis'];
                $item->poster     =$row['poster'];
            }
            return $item;
        }catch(PDOException $e)
        {
            echo $e;
        }
    }
    
        //Metodo que actualiza la informacion de la cartelera
        public function update($item)
        {
            $query = $this->db->connect()->prepare("UPDATE carteleras SET titulo= :titulo , categoria = :categoria , sintaxis = :sintaxis, poster = :poster WHERE id = :id");
    
            try{
                //Ejecuto la query enviandole como parametro el id que se encuentra en el arreglo $item con los valores correspondientes
                $query->execute(['id'=>$item['id'], 'titulo'=>$item['titulo'], 'categoria'=>$item['categoria'], 'sintaxis'=>$item['sintaxis'], 'poster'=>$item['poster']]); 
                return true;
    
            }catch(PDOException $e)
            {
                return false;
            }
        }

        //Metodo que elimina la cartelera con el id recibido
        public function delete($id)
        {
            $query = $this->db->connect()->prepare("DELETE FROM carteleras WHERE id = :id");
            try
            {
                $query->execute(['id'=>$id]);
                return true;
            }
            catch(PDOException $e)
            {
                return false;
            }
        }

}


?>