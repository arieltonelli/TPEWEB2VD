<?php
require_once './libs/smarty-3.1.39/libs/Smarty.class.php';

class PublicView{
    private $smarty;
    function __construct(){
    $this->smarty = new Smarty();
    }

    function ShowHome(){
        $this->smarty->assign('titulo','Bienvenidos a The Bookshop');
        $this->smarty->display('templates/home.tpl');
       
    }

    /*function showPublicBooks($books, $publishers){
    $this->smarty->assign('titulo','Lista de Libros');
    $this->smarty->assign('books',$books);
    $this->smarty->assign('publishers',$publishers);
    $this->smarty->display('templates/publicBookList.tpl');
   
    }

   function showPublicBook($libro){
        $this->smarty->assign('libro', $libro);
        $this->smarty->display('templates/publicBookDetail.tpl');
    
    }
*/
    function showHomeLocation(){
        header("Location: ".BASE_URL."home");

    }

    
   /* function ShowBooksbyCategory($books, $publishers){
        $this->smarty->assign('titulo','Lista de Libros de la Editorial');
        $this->smarty->assign('books',$books);
        $this->smarty->assign('editorial',$publishers);
        $this->smarty->display('templates/publicPublisherDetail.tpl');
       
    }

    
    function showPublicPublishers($publishers){
        $this->smarty->assign('nombre','Lista de Editoriales');
        $this->smarty->assign('publishers',$publishers);
        $this->smarty->display('templates/publicPublisherList.tpl');
       
        }

   */

}