<?php

require_once "./Model/PublisherModel.php";
require_once "./View/PublisherView.php";
require_once "./Helpers/AuthHelper.php";


class PublisherController{

    private $model;
    private $view;
    private $AuthHelper;

    function __construct(){
        $this->model = new PublisherModel();
        $this->view = new PublisherView();
        $this->AuthHelper = new AuthHelper();
    }
    function showCategory($message=null){
        $this->AuthHelper->checkLoggedIn();
        $publishers = $this->model->getPublishers();
        $this->view->showPublishers($publishers, $message);
       
    }
    function createPublisher(){
        $this->AuthHelper->checkLoggedIn(); 
        $this->model->insertPublisher($_POST['name'], $_POST['language']);
        $this->view->showCategoryLocation();

    }
    function deletePublisher($id){
        $this->AuthHelper->checkLoggedIn(); 
    try{
        $this->model->deletePublisherFromDB($id);
        $this->view->showCategoryLocation();
    } catch (Exception $e){
        $message= "No se puede eliminar categoría debido a que tiene libros adentro";
        $this->view->showCategoryLocation($message);

    }
        
    }

    function viewFormUpdatePublisher($id){
        $this->AuthHelper->checkLoggedIn();
        $this->view->viewFormUpdatePublisher($id);
        
    }
    function updatePublisher(){
        $this->AuthHelper->checkLoggedIn(); 
        $this->model->updatePublisher($_POST['id_publisher'],$_POST['name'], $_POST['language']);
        $this->view->showCategoryLocation();
        
    }
   
    function viewPublisher($id){
        $this->AuthHelper->checkLoggedIn();
        $publisher= $this->model->getPublisherbyID($id);
        $this->view->showPublisher($publisher);
    }

    
    
    
}