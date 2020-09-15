<?php

class CrearModel extends Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function insertar($datos)
    {
        try
        {
            $query=$this->db->connect()->prepare('INSERT INTO `carteleras`(titulo,categoria,sintaxis,poster) VALUES (:titulo,:categoria,:sintaxis,:poster)');
            $query->execute(['titulo'=>$datos['titulo'], 'categoria'=>$datos['categoria'],'sintaxis'=>$datos['sintaxis'],'poster'=>$datos['poster']]);
            return true;
        }catch(PDOException $e)
        {
          echo ("El error es  : ".$e);
        }
    }
}




?>