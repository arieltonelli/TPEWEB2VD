<?php
class PublicModel{
    private $db;
    function __construct(){
       $this->db = new PDO('mysql:host=localhost;'.'dbname=db_books;charset=utf8','root','');
    }

    function getBooks(){
        $sentencia = $this->db->prepare("SELECT a.*, b.* FROM books a LEFT JOIN publishers b ON a.id_publisher = b.id_publisher");
        $sentencia->execute();
        $libros = $sentencia-> fetchAll(PDO::FETCH_OBJ);
        return $libros;
    }
    
    function getBook($id){
            $sentencia = $this->db->prepare("SELECT a.*, b.* FROM books a LEFT JOIN publishers b ON a.id_publisher = b.id_publisher WHERE id_book=?");
            $sentencia->execute(array($id));
            $libro = $sentencia-> fetch(PDO::FETCH_OBJ);
            return $libro;
    }

    function getBooksbyCategory($id){
        $sentencia = $this->db->prepare( "SELECT a.*, b.* FROM books a LEFT JOIN publishers b ON a.id_publisher = b.id_publisher WHERE name=?");
        $sentencia->execute(array($id));
        $libros = $sentencia-> fetchAll(PDO::FETCH_OBJ);
        return $libros;
    }
    
    function getPublisherByID($id){
        $sentencia = $this->db->prepare( "SELECT * FROM publishers WHERE id_publisher=?");
        $sentencia->execute(array($id));
        $editorial = $sentencia-> fetch(PDO::FETCH_OBJ);
        return $editorial;
}

} 