<?php

require_once "./Model/LoginModel.php";
require_once "./View/LoginView.php";
require_once "./Helpers/AuthHelper.php";

class LoginController{

    private $model;
    private $view;
    private $AuthHelper;

    function __construct(){
        $this->model = new LoginModel();

        $this->view = new LoginView();
        $this->AuthHelper = new AuthHelper();
    }

    function logout(){
        session_start();
        session_destroy();
        $this->view->ShowLogin("Te deslogueaste!");
    }

    function login(){
        $this->view->ShowLogin();

    }
    

    function verifyLogin(){
        if(!empty($_POST['email']) && !empty($_POST['password'])){
            $userEmail = $_POST['email'];
            $userPassword = $_POST['password'];
     
            //Obtengo el usuario de la base de datos
            $user = $this->model->getUser($userEmail);
     
            //Si el usuario existe y las contraseñas coinciden
            if($user && password_verify($userPassword, $user->password)){
                session_start();
                $_SESSION["email"] = $userEmail;
                $admin = $this->model->getAdmin($_SESSION["email"]);
                $this->view->showAdmHome($admin);
            }else{
                $this->view->showLogin("Acceso denegado");
            }
        }
    }

    function admHome(){
        $this->AuthHelper->checkLoggedIn();
        $admin = $this->model->getAdmin($_SESSION["email"]);
        $this->view->showAdmHome($admin);
    }

    function register(){
        $this->view->showRegister();
    }

    function verifyregister(){
        if(!empty($_POST['email']) && !empty($_POST['password'])){
            $username = $_POST['email'];
            $password = password_hash($_POST['password'],PASSWORD_BCRYPT);
            $this->model->insertRegister($username, $password);
            $this->view->showAdmHome($admin);
        }
    }
    
    function showUsers(){
        $this->AuthHelper->checkLoggedIn();
        $admin = $this->model->getAdmin($_SESSION["email"]);
        $users = $this->model->getUsers();
        $this->view->showUsers($users, $admin);
    }

    function deleteUser($id){
        $this->AuthHelper->checkLoggedIn(); 
        $this->model->deleteUserFromDB($id);
        $this->view->showUsersLocation();
    }

    function updateUser($id){
        $this->AuthHelper->checkLoggedIn();
        $this->model->updateUserFromDB($id);
        $this->view->showUsersLocation();
    }

    function createUser(){
        if(!empty($_POST['email']) && !empty($_POST['password'])){
            $username = $_POST['email'];
            $password = password_hash($_POST['password'],PASSWORD_BCRYPT);
            $this->model->insertUser($username, $password);
        }
        $this->view->showUsersLocation();
    }
}