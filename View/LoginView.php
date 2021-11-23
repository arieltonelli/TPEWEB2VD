<?php
require_once './libs/smarty-3.1.39/libs/Smarty.class.php';

class LoginView{

    private $smarty;

    function __construct(){
        $this->smarty = new Smarty();
    }

    function ShowLogin($error = ""){
        $this->smarty->assign('titulo','Log In');
        $this->smarty->assign('error', $error);
        $this->smarty->display('templates/login.tpl');
    }

    function ShowHome(){
        $this->smarty->assign('titulo','Bienvenidos a The Bookshop');
        $this->smarty->display('templates/home.tpl');
       
    }

    function showHomeLocation(){
        header("Location: ".BASE_URL."home");

    }
    
    function showAdmHome($admin){
        $this->smarty->assign('tituloAdm','Bienvenido a la Base de Datos de The Bookshop');
        $this->smarty->assign('tituloUser','Bienvenido a The Bookshop');
        $this->smarty->assign('admin', $admin);
        $this->smarty->display('templates/admHome.tpl');
    }

    function showRegister($error = ""){
        $this->smarty->assign('titulo','Registrarse');
        $this->smarty->assign('error', $error);
        $this->smarty->display('templates/showRegister.tpl');
    }

    function ShowUsers($users, $admin){
        $this->smarty->assign('nombre','Lista de Usuarios');
        $this->smarty->assign('users',$users);
        $this->smarty->assign('admin',$admin);
        $this->smarty->display('templates/userList.tpl');
    }
    
    function showUsersLocation(){
        header("Location: ".BASE_URL."users");
    }

    function getAdmin($email){
        $query = $this->db->prepare('SELECT rol FROM users WHERE email = ?');
        $query->execute(array($email)); 
        $admin = $query->fetchColumn();
        return $admin == "1";    
    }
    

    function showCommentLayout(){
        $this->smarty->display('templates/commentLayoutCSR.tpl');
    }
}