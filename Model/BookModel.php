<?php
class BookModel{
    private $db;
    function __construct(){
       $this->db = new PDO('mysql:host=localhost;'.'dbname=db_books;charset=utf8','root','');
    }

    function getBooks(){
        $sentencia = $this->db->prepare( "select * from books");
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
   
    function getBook($id){
            $sentencia = $this->db->prepare( "SELECT * FROM books WHERE id_book=?");
            $sentencia->execute(array($id));
            $libro = $sentencia-> fetch(PDO::FETCH_OBJ);
            return $libro;
    }

} 