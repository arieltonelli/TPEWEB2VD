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
            $loginController->admHome(); // home logueado o registrado
            break;
        case 'users': 
            $loginController->showUsers(); // muestra lista de usuarios al administrador
            break;
        case 'deleteUser': 
            $loginController->deleteUser($params[1]); //elimina usuario el administrador
            break;
        case 'updateUser':
            $loginController->updateUser($params[1]); // cambia el rol del usuario desde la lista de usuarios (admin)
            break;
        case 'createUser':
            $loginController->createUser(); // crea usuario nuevo (administrador)
            break;
        case 'home': 
            $loginController->showHome(); // pantalla de inicio de la web
            break;
        case 'books': 
            $bookController->showBooks(); // lista de libros
            break;
        case 'createBook': 
            $bookController->createBook(); // crea libro desde la lista de libros (admin)
            break;
        case 'deleteBook': 
            $bookController->deleteBook($params[1]); // elimina libro (admin)
            break;
        case 'updateBook': 
            $bookController->updateBook(); // botón que edita libro desde el formulario de edición (admin)
            break;
        case 'updatePublisher': 
            $publisherController->updatePublisher(); // botón que edita una editorial desde el formulario de edición (admin)
            break;
        case 'formUpdateBook': 
            $bookController->viewFormUpdateBook($params[1]); // muestra el formulario para editar UN libro (admin)
            break;
        case 'formUpdatePublisher': 
            $publisherController->viewFormUpdatePublisher($params[1]); // muestra el formulario para editar UNA editorial (admin)
            break;
        case 'viewBook': 
            $bookController->viewBook($params[1]); // muestra detalle de libro
            break;
        case 'category': 
            $publisherController->showCategory(); // muestra la lista de editoriales (categoría)
            break;
        case 'createPublisher': 
            $publisherController->createPublisher(); // botón que crea una nueva editorial desde formulario en lista de editoriales
            break;
        case 'deletePublisher': 
            $publisherController->deletePublisher($params[1]); // botón que elimina UNA editorial desde lista de editoriales
            break;
        case 'viewPublisher': 
            $bookController->viewBooksByCategory($params[1]); // muestra detalle de una editorial determinada (categoría)
            break;
        default: 
            echo('404 Page not found'); // otras urls
            break;
        }
