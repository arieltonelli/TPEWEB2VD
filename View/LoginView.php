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
    
    function showAdmHome($admin){
        $this->smarty->assign('titulo','Bienvenido administrador/a');
        $this->smarty->assign('admin', $admin);
        $this->smarty->display('templates/admHome.tpl');
    }

    function showRegister($error = ""){
        $this->smarty->assign('titulo','Registrarse');
        $this->smarty->assign('error', $error);
        $this->smarty->display('templates/showRegister.tpl');
    }

    function ShowUsers($users){
        $this->smarty->assign('nombre','Lista de Usuarios');
        $this->smarty->assign('users',$users);
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
    
}