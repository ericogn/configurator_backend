<?php

class User {
    public $email;
    public $password;

    public $firstname;
    public $lastname;
    public $company;
    public $multiplier;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function changePassword(){
        $query = "UPDATE `user` 
        SET 
        password=:password 
        WHERE email=:email";

        $stmt = $this->conn->prepare($query);

        $stmt->bindValue(':password', password_hash($this->password, PASSWORD_DEFAULT), PDO::PARAM_STR);
        $stmt->bindParam(":email", $this->email);

        if($stmt->execute()){
            return true;
        }
        return false;   
    }

    public function changeUserData(){
        //firstname
        //lastname
        //company
        //multiplier

        $query = "UPDATE `user`
        SET 
        firstname=:firstname,
        lastname=:lastname,
        company=:company,
        multiplier=:multiplier
        WHERE email=:email";

        $this->firstname=htmlspecialchars(strip_tags($this->firstname));
        $this->lastname=htmlspecialchars(strip_tags($this->lastname));
        $this->company=htmlspecialchars(strip_tags($this->company));
        $this->multiplier=htmlspecialchars(strip_tags($this->multiplier));
        $this->email=htmlspecialchars(strip_tags($this->email));

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":firstname", $this->firstname);
        $stmt->bindParam(":lastname", $this->lastname);
        $stmt->bindParam(":company", $this->company);
        $stmt->bindParam(":multiplier", $this->multiplier);
        $stmt->bindParam(":email", $this->email);

        if($stmt->execute()){
            return true;
        }
        return false;  
    }

    public function deleteUser(){

        //still in tests
        $query = "DELETE FROM `user` WHERE email =:email;
        DELETE FROM `details` WHERE email =:email;
        DELETE FROM `projectsaver` WHERE email=:email";

        $this->email=htmlspecialchars(strip_tags($this->email));

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":email", $this->email);
    }
}

?>
