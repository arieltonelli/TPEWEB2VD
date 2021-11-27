<?php

require_once "./Model/BookModel.php";
require_once "./View/BookView.php";
require_once "./Model/PublisherModel.php";
require_once "./Helpers/AuthHelper.php";
require_once "./Model/LoginModel.php";


class BookController{

    private $model;
    private $view;
    private $publisherModel;
    private $AuthHelper;
    private $loginModel;

    function __construct(){
        $this->model = new BookModel();
        $this->view = new BookView();
        $this->publisherModel = new PublisherModel();
        $this->AuthHelper = new AuthHelper();
        $this->loginModel = new LoginModel();
    }
    
    function showBooks(){
        $this->AuthHelper->checkLoggedIn();
        $admin = $this->loginModel->getAdmin($_SESSION["email"]);
        $books = $this->model->getBooks();
        $publishers = $this->publisherModel->getPublishers();
        $this->view->showBooks($books, $publishers, $admin);
    }

    function createBook(){
        $this->AuthHelper->checkLoggedIn();
        /*if (isset($_POST[])){*/
        $this->model->insertBook($_POST['title'], $_POST['author'], $_POST['id_publisher'], $_POST['price']);
        $this->view->showBooksLocation();
    }

    function deleteBook($id){
        $this->AuthHelper->checkLoggedIn(); 
        $this->model->deleteBookFromDB($id);
        $this->view->showBooksLocation();
    }
   
    function updateBook(){
        $this->AuthHelper->checkLoggedIn();
        $this->model->updateBook($_POST['id_book'], $_POST['title'], $_POST['author'], $_POST['id_publisher'], $_POST['price']);
        $this->view->showBooksLocation();
    }

    function viewFormUpdateBook($id){
        $this->AuthHelper->checkLoggedIn();
        $libro=$this->model->getBook($id);
        $editoriales=$this->publisherModel->getPublishers();
        $admin = $this->loginModel->getAdmin($_SESSION["email"]);
        $this->view->viewFormUpdateBook($id, $libro, $editoriales, $admin);
    }

    function viewBook($id){
        $this->AuthHelper->checkLoggedIn();
        $book= $this->model->getBook($id);
        $admin = $this->loginModel->getAdmin($_SESSION["email"]);
        $usuario = $this->loginModel->getUser($_SESSION["email"]);
        $this->view->showBook($book, $admin, $usuario);
    }

    function viewBooksByCategory($id){
        $this->AuthHelper->checkLoggedIn();
        $books = $this->model->getBooksbyCategory($id);
        $publisher = $this->publisherModel->getPublisherByID($id);
        $admin = $this->loginModel->getAdmin($_SESSION["email"]);
        $this->view->showBooksbyCategory($books, $publisher, $admin);
    }

    function checkLoggedIn(){
        session_start();
        if(!isset($_SESSION["email"])){
            $this->view->showLoginLocation();
        }
    }
}