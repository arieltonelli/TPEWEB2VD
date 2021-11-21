<?php
class BookModel{
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
    
    function insertBook($title, $author, $publisher, $price){
        $sentencia = $this->db->prepare("INSERT INTO books(title, author, id_publisher, price) VALUES(?, ?, ?, ?)");
        $sentencia->execute(array($title, $author, $publisher, $price));
        
    } 
    function deleteBookFromDB($id){
        $sentencia = $this->db->prepare("DELETE FROM books WHERE id_book=?");
        $sentencia->execute(array($id));
    }

    function updateBook($id, $title, $author, $publisher, $price){
        $sentencia = $this->db->prepare("UPDATE books SET title=?, author=?, id_publisher=?, price=? WHERE id_book=?");
        $sentencia->execute(array($title, $author, $publisher, $price, $id));
    }
   
    function getBook($id){
            $sentencia = $this->db->prepare("SELECT a.*, b.* FROM books a LEFT JOIN publishers b ON a.id_publisher = b.id_publisher WHERE id_book=?");
            $sentencia->execute(array($id));
            $libro = $sentencia-> fetch(PDO::FETCH_OBJ);
            return $libro;
    }

    function getBooksbyCategory($id){
        $sentencia = $this->db->prepare( "SELECT * from books WHERE id_publisher=?");
        $sentencia->execute(array($id));
        $libros = $sentencia-> fetchAll(PDO::FETCH_OBJ);
        return $libros;
    }

    function getPublishers(){
        $sentencia = $this->db->prepare( "select * from publishers");
        $sentencia->execute();
        $editoriales = $sentencia-> fetchAll(PDO::FETCH_OBJ);
        return $editoriales;
    }
    
} 
