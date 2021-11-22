<?php

require_once "./Model/PublisherModel.php";
require_once "./View/PublisherView.php";
require_once "./Helpers/AuthHelper.php";
require_once "./Model/LoginModel.php";


class PublisherController{

    private $model;
    private $view;
    private $AuthHelper;
    private $loginModel;

    function __construct(){
        $this->model = new PublisherModel();
        $this->view = new PublisherView();
        $this->AuthHelper = new AuthHelper();
        $this->loginModel = new LoginModel();
    }

    function showCategory(){
        $this->AuthHelper->checkLoggedIn();
        $admin = $this->loginModel->getAdmin($_SESSION["email"]);
        $publishers = $this->model->getPublishers();
        $this->view->showPublishers($publishers, $admin);
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
        $admin = $this->loginModel->getAdmin($_SESSION["email"]);
        $this->view->viewFormUpdatePublisher($id, $admin);
    }

    function updatePublisher(){
        $this->AuthHelper->checkLoggedIn(); 
        $this->model->updatePublisher($_POST['id_publisher'],$_POST['name'], $_POST['language']);
        $this->view->showCategoryLocation();
    }
   
    function viewPublisher($id){
        $this->AuthHelper->checkLoggedIn();
        $admin = $this->loginModel->getAdmin($_SESSION["email"]);
        $publisher= $this->model->getPublisherbyID($id);
        $this->view->showPublisher($publisher, $admin);
    }

    
    
    
}