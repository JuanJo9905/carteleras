<?php
//En ésta parte va la configuracion de la base de datos, usando las constantes que se definieron en el archivo config.php de la carpeta config
class DataBase{
   private $host;
   private $user;
   private $password;
   private $db; 

   public function __construct()
   {
       $this->host = constant('HOST');
       $this->user = constant('USER');
       $this->password = constant('PASSWORD');
       $this->db = constant('DB');
   }

   //Funcion que realiza la conexion
   function connect(){
       try{
           $connection="mysql:host=". $this->host .";dbname=". $this->db;
           $options=[
               PDO::ATTR_ERRMODE           => PDO::ERRMODE_EXCEPTION,
               PDO::ATTR_EMULATE_PREPARES  => false,
           ];
           $pdo = new PDO($connection,$this->user,$this->password,$options);
           return $pdo;
       }catch(PDOException $e)
       {
           print_r('Error connection: '.$e->getMessage());
       }
   }
}


?>