<?php
require_once './libs/smarty-3.1.39/libs/Smarty.class.php';
class BookView{
    private $smarty;
    function __construct(){
    $this->smarty = new Smarty();
    }

    function ShowBooks($books){
    $this->smarty->assign('titulo','Lista de Libros');
    $this->smarty->assign('books',$books);
    $this->smarty->display('templates/bookList.tpl');
   
    }

   function showBook($libro){
        $this->smarty->assign('libro', $libro);
        $this->smarty->display('templates/bookDetail.tpl');
    
    }

    function showHomeLocation(){
        header("Location: ".BASE_URL."home");

    }

    
}
