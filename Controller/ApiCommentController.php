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
    function obtenerComentario($params =null){
       $idComentario = $params[":ID"];
       $comentario = $this->model->getComment($idComentario);
       if($comentario){
       return $this->view->response($comentario, 200);
       }
       else { 
           return $this->view->response("El Comentario con el id=$idComentario no existe", 404);
       
       }
    }
}