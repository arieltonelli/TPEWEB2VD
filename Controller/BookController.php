<?php

require_once "./Model/BookModel.php";
require_once "./View/BookView.php";


class BookController{

    private $model;
    private $view;

    function __construct(){
        $this->model = new BookModel();
        $this->view = new BookView();
    }
    function showHome(){
        $books = $this->model->getBooks();
        $this->view->showBooks($books);
       
    }
    function createBook(){
        $this->model->insertBook($_POST['title'], $_POST['author'], $_POST['publisher'], $_POST['price']);
        $this->view->showHomeLocation();

    }
    function deleteBook($id){
        $this->model->deleteBookFromDB($id);
        $this->view->showHomeLocation();
        
    }
/*    
    function updateBook($id){
        $this->model->updateBookFromDB($id);
        $this->view->showHomeLocation();
        
    }
*/    
    function viewBook($id){
        $book= $this->model->getBook($id);
        $this->view->showBook($book);
    }
}