<?php
class LoginModel{
    private $db;
    function __construct(){
       $this->db = new PDO('mysql:host=localhost;'.'dbname=db_books;charset=utf8','root','');
    }

    function getUser($userEmail){
        $query = $this->db->prepare('SELECT * FROM users WHERE email = ?');
        $query->execute([$userEmail]);
        return $query->fetch(PDO::FETCH_OBJ);
    }
    
    function insertRegister($username, $password){
        $sentencia = $this->db->prepare("INSERT INTO users (email, password) VALUES (?, ?)");
        $sentencia->execute(array($username, $password));
    }

    function getUsers(){
        $sentencia = $this->db->prepare('select * from users WHERE email != "ariel@adm.com"');
        $sentencia->execute();
        $usuarios = $sentencia-> fetchAll(PDO::FETCH_OBJ);
        return $usuarios;
    }

    function getAdmin($email){
        $query = $this->db->prepare('SELECT rol FROM users WHERE email = ?');
        $query->execute(array($email)); 
        $admin = $query->fetchColumn();
        return $admin == "1";    
    }

    function deleteUserFromDB($id){
        $sentencia = $this->db->prepare("DELETE FROM users WHERE id_user=?");
        $sentencia->execute(array($id));
    }

    function updateUserFromDB($id){
        $sentencia = $this->db->prepare("UPDATE users SET rol = NOT rol WHERE id_user=?");
        $sentencia->execute(array($id));
    }

    function insertUser($email, $password){
        $sentencia = $this->db->prepare("INSERT INTO users (email, password) VALUES(?, ?)");
        $sentencia->execute(array($email, $password));
    } 
} 