<?php
class PublisherModel{
    private $db;
    function __construct(){
       $this->db = new PDO('mysql:host=localhost;'.'dbname=db_books;charset=utf8','root','');
    }

    function getPublishers(){
        $sentencia = $this->db->prepare( "select * from publishers");
        $sentencia->execute();
        $editoriales = $sentencia-> fetchAll(PDO::FETCH_OBJ);
        return $editoriales;
    }
    
    function insertPublisher($name, $language){
        $sentencia = $this->db->prepare("INSERT INTO publishers(name, language) VALUES(?, ?)");
        $sentencia->execute(array($name, $language));
        
    } 
    function deletePublisherFromDB($id){
        $sentencia = $this->db->prepare("DELETE FROM publishers WHERE id_publisher=?");
        $sentencia->execute(array($id));
    }
   
    function getPublisherByID($id){
            $sentencia = $this->db->prepare( "SELECT * FROM publishers WHERE id_publisher=?");
            $sentencia->execute(array($id));
            $editorial = $sentencia-> fetch(PDO::FETCH_OBJ);
            return $editorial;
    }

    function updatePublisher($id, $name, $language){
        $sentencia = $this->db->prepare("UPDATE publishers SET name=?, language=? WHERE id_publisher=?");
        $sentencia->execute(array($name, $language, $id));
    }
} 