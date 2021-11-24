<?php

class CommentModel{
    private $db;
    function __construct(){
       $this->db = new PDO('mysql:host=localhost;'.'dbname=db_books;charset=utf8','root','');
    }


    function getComments(){
        $sentencia = $this->db->prepare("select comments.* , users.email AS email from comments JOIN users ON comments.id_user = users.id_user");
        $sentencia->execute();
        $comentarios = $sentencia-> fetchAll(PDO::FETCH_OBJ);
        return $comentarios;
    }

    function getComment($id){
        $sentencia = $this->db->prepare( "SELECT * FROM comments WHERE id_comment=?");
        $sentencia->execute(array($id));
        $comentario = $sentencia-> fetch(PDO::FETCH_OBJ);
        return $comentario;
    }
    
    function deleteCommentFromDB($id){
        $sentencia = $this->db->prepare("DELETE FROM comments WHERE id_comment=?");
        $sentencia->execute(array($id));
        $response = $sentencia->execute(array($id));
    }
    
    function insertComment( $subject, $body, $score, $id_book, $id_user){
        $sentencia = $this->db->prepare("INSERT INTO comments (subject, body, score, id_book, id_user) VALUES(?, ?, ?, ?, ?)");
        $sentencia->execute(array($subject, $body, $score, $id_book, $id_user));
        return $this->db->lastInsertId();
    } 
}