<?php

class CommentModel{
    private $db;
    function __construct(){
       $this->db = new PDO('mysql:host=localhost;'.'dbname=db_books;charset=utf8','root','');
    }


    function getComments(){
        $sentencia = $this->db->prepare("select * from comments");
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

}