<?php

require('dbh.php');

class Burgers extends Dbh{
    // In this class we use named (:name) prepared statements to query the db
    // connect method comes from parent class dbh

    public function getBurgers() {
        $sql = 'SELECT * FROM burgers ORDER BY created_at';
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();

        $burgers = $stmt->fetchAll();
        return $burgers;
    }

    public function searchBurgers($input) {
        // search for string including value of $input; wildcard % represents zero or more chars
        $search = "%$input%"; 
        $sql = "SELECT * FROM burgers WHERE name LIKE :name OR type LIKE :type OR roll LIKE :roll"; 
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute(['name'=>$search, 'type'=>$search, 'roll'=>$search]);

        $burgers = $stmt->fetchAll();
        return $burgers;
    }
    
    public function getBurger($id) {
        $sql = "SELECT * FROM burgers WHERE id = :id"; 
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute(['id'=>$id]);

        $burger = $stmt->fetch();
        return $burger;
    }

    public function deleteBurger($id) {
        $sql = "DELETE FROM burgers WHERE id = :id";;
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute(['id'=>$id]);

        header('Location: ./index.php');
    }

    public function addBurger($name,$type,$roll,$ingredients,$email) {           
        $name = $this->testInput($name);
        $type = $this->testInput($type);
        $roll = $this->testInput($roll);
        $ingredients = $this->testInput($ingredients);
        $email = $this->testInput($email);

        $sql = "INSERT INTO burgers(name, type, roll, ingredients, email) VALUES(:name, :type, :roll, :ingredients, :email)";
        
        $stmt = $this->connect()->prepare($sql);
        // execute statement (orders of values in the array  must be the same as in query string)
        $stmt->execute(['name'=>$name,'type'=>$type,'roll'=>$roll, 'ingredients'=>$ingredients, 'email'=>$email]); 

        header('Location: ./index.php');
    }

    private function testInput($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }   

}