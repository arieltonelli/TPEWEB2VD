<?php
require_once './libs/smarty-3.1.39/libs/Smarty.class.php';

class BookView{
    private $smarty;
    function __construct(){
    $this->smarty = new Smarty();
    }

    function ShowBooks($books, $publishers){
    $this->smarty->assign('titulo','Lista de Libros');
    $this->smarty->assign('books',$books);
    $this->smarty->assign('publishers',$publishers);
    $this->smarty->display('templates/bookList.tpl');
   
    }

   function showBook($libro){
        $this->smarty->assign('libro', $libro);
        $this->smarty->display('templates/bookDetail.tpl');
    
    }

    function showBooksLocation(){
        header("Location: ".BASE_URL."books");

    }

    function viewFormUpdateBook($id, $libro, $editoriales){
        $this->smarty->assign('titulo', 'Modificar Libro de la BBDD');
        $this->smarty->assign('id', $id);
        $this->smarty->assign('libro', $libro);
        $this->smarty->assign('editoriales', $editoriales);
        $this->smarty->display('templates/formUpdateBook.tpl');

    }
    
    function ShowBooksbyCategory($books, $publishers){
        $this->smarty->assign('titulo','Lista de Libros');
        $this->smarty->assign('books',$books);
        $this->smarty->assign('editorial',$publishers);
        $this->smarty->display('templates/publisherDetail.tpl');
       
    }

     function showLoginLocation(){
         header("Location: ".BASE_URL."login");

     }
}