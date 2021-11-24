<?php

require_once "./Model/CommentModel.php";
require_once "./View/ApiView.php";





class ApiCommentController{

    private $model;
    private $view;
    private $AuthHelper;

    function __construct(){
        $this->model = new CommentModel();
        $this->view = new ApiView();
       
    }
    
    function obtenerComentarios(){
        $comentarios = $this->model->getComments();
        return $this->view->response($comentarios, 200);
    }
    
    /*function obtenerComentario($params =null){
       $idComentario = $params[":ID"];
       $comentario = $this->model->getComment($idComentario);
       if($comentario){
       return $this->view->response($comentario, 200);
       }
       else { 
           return $this->view->response("El Comentario con el id=$idComentario no existe", 404);
       
       }
    }*/

    function eliminarComentario($params = null){

        $idComentario = $params[":ID"];
        $comentario = $this->model->getComment($idComentario);
        if($comentario){
        $this->model->deleteCommentFromDB($idComentario);
        return $this->view->response("El comentario con el id = $idComentario fue eliminado", 200);
        }
        else{
           return $this->view->response("El comentario con el id = $idComentario no existe", 404);
        }  
    }

    function insertarComentario(){
    $body = $this->getBody();
    $ultimoID = $this->model->insertComment($body->subject, $body->body, $body->score, $body->id_book, $body->id_user);
    if ($ultimoID != 0) {
        return $this->view->response("El comentario en el libro = $body->id_book fue incertado con exito", 200);
        }
        else{
           return $this->view->response("ERROR: El comentario en el libro = $body->id_book no pudo ser insertado", 404);
        }  
    }
    
    // Devuelve el body del request
    private function getBody() {
        //trae lo que le mandaron en el body
       $bodyString = file_get_contents("php://input");
       //devuelve el string en tipo objeto
       return json_decode($bodyString);
    }

}