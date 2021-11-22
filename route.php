<?php
require_once "Controller/BookController.php";
require_once "Controller/PublisherController.php";
require_once "Controller/LoginController.php";

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');



    // lee la acción
    if (!empty($_GET['action'])) {
        $action = $_GET['action'];
    } else {
        $action = 'home'; // acción por defecto si no envían
    }

    $params = explode('/', $action);

    $bookController = new BookController();
    $publisherController = new PublisherController();
    $loginController = new LoginController();

    // determina que camino seguir según la acción
    switch ($params[0]) {
        case 'login': 
            $loginController->login();  //form para loguearse
            break;
        case 'logout': 
            $loginController->logout(); // desloguearse
            break;
        case 'verify': 
            $loginController->verifyLogin(); // verificar logueo
            break;
        case 'register': 
            $loginController->register(); // Formulario de registro usuario nuevo
            break;   
        case 'verifyregister': 
            $loginController->verifyregister(); // verificar datos de registro y agrega usuario a la bd
            break;
        case 'admHome': 
            $loginController->admHome(); 
            break;
        case 'users': 
            $loginController->showUsers(); 
            break;
        case 'deleteUser': 
            $loginController->deleteUser($params[1]); 
            break;
        case 'updateUser':
            $loginController->updateUser($params[1]); 
            break;
        case 'createUser':
            $loginController->createUser(); 
            break;
        case 'home': 
            $loginController->showHome(); 
            break;
        case 'books': 
            $bookController->showBooks(); 
            break;
        case 'createBook': 
            $bookController->createBook(); 
            break;
        case 'deleteBook': 
            $bookController->deleteBook($params[1]); 
            break;
        case 'updateBook': 
            $bookController->updateBook(); 
            break;
        case 'updatePublisher': 
            $publisherController->updatePublisher(); 
            break;
        case 'formUpdateBook': 
            $bookController->viewFormUpdateBook($params[1]); 
            break;
        case 'formUpdatePublisher': 
            $publisherController->viewFormUpdatePublisher($params[1]); 
            break;
        case 'viewBook': 
            $bookController->viewBook($params[1]); 
            break;
        case 'category': 
            $publisherController->showCategory(); 
            break;
        case 'createPublisher': 
            $publisherController->createPublisher(); 
            break;
        case 'deletePublisher': 
            $publisherController->deletePublisher($params[1]); 
            break;
        case 'viewPublisher': 
            $bookController->viewBooksByCategory($params[1]); 
            break;
        default: 
            echo('404 Page not found'); 
            break;
        }
