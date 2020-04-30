<?php 

 class Dbh {
     private $host = 'localhost';
     private $user = 'root';
     private $password = '';
     private $dbName = 'burger_wizard';
 
     protected function connect(){
         try{
         $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbName;
         $pdo = new PDO($dsn,$this->user,$this->password);
         // setting attr is optional but its recomended to set up default fetch mode,
         $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);   
         return $pdo;
         
         } catch (PDOException $e){
             exit('Connection Error: ' . $e->getMessage() );
         }
     }
 }