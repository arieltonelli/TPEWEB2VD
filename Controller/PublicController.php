<?php

require_once "./Model/PublicModel.php";
require_once "./View/PublicView.php";
require_once "./Helpers/AuthHelper.php";

class PublicController{

    private $model;
    private $view;
    private $publisherModel;
    private $bookModel;
    private $AuthHelper;


    function __construct(){
        $this->model = new PublicModel();
        $this->publicView = new PublicView();
        $this->view = new BookView();
        $this->bookModel = new BookModel();
        $this->publisherModel = new PublisherModel();
        $this->AuthHelper = new AuthHelper();
    }

    function showHome(){
        $this->publicView->showHome();  
    }

    function showPublicBooks(){
        $this->AuthHelper->checkLoggedIn();
        $books = $this->bookModel->getBooks();
        $publishers = $this->publisherModel->getPublishers();
        $this->publicView->showPublicBooks($books, $publishers);  
    }

    function viewPublicBook($id){
        $this->AuthHelper->checkLoggedIn();
        $book= $this->bookModel->getBook($id);
        $this->publicView->showPublicBook($book);
    }

    function publicViewBooksByCategory($id){
        $this->AuthHelper->checkLoggedIn();
        $books = $this->bookModel->getBooksbyCategory($id);
        $publisher = $this->publisherModel->getPublisherByID($id);
        $this->publicView->showBooksbyCategory($books, $publisher);
    }

    function showPublicCategories(){
        $this->AuthHelper->checkLoggedIn();
        $publishers = $this->publisherModel->getPublishers();
        $this->publicView->showPublicPublishers($publishers);
       
    }


}