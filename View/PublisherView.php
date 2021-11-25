<?php
require_once './libs/smarty-3.1.39/libs/Smarty.class.php';

class PublisherView{
    private $smarty;
    function __construct(){
    $this->smarty = new Smarty();
    }
    function ShowPublishers($publishers, $admin){
        $this->smarty->assign('nombre','Lista de Editoriales');
        $this->smarty->assign('publishers',$publishers);
        $this->smarty->assign('admin',$admin);
        $this->smarty->display('templates/publisherList.tpl');
    }
   function showPublisher($editorial, $admin){
        $this->smarty->assign('editorial', $editorial);
        $this->smarty->assign('admin',$admin);
        $this->smarty->display('templates/publisherDetail.tpl');
    }
    function showCategoryLocation($message = null){
        header("Location: ".BASE_URL."category");
    }
    function viewFormUpdatePublisher($id, $admin){
        $this->smarty->assign('titulo', 'Modificar Editorial de la BBDD');
        $this->smarty->assign('id', $id);
        $this->smarty->assign('admin',$admin);
        $this->smarty->display('templates/formUpdatePublisher.tpl');

    }
}
