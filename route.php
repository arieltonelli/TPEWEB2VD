<?php
require_once "Controller/BookController.php";

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');



    // lee la acción
    if (!empty($_GET['action'])) {
        $action = $_GET['action'];
    } else {
        $action = 'home'; // acción por defecto si no envían
    }

    $params = explode('/', $action);

    $bookController = new BookController();

    // determina que camino seguir según la acción
    switch ($params[0]) {
        case 'home': 
            $bookController->showHome(); 
            break;
        case 'createBook': 
            $bookController->createBook(); 
            break;
      case 'deleteBook': 
            $bookController->deleteBook($params[1]); 
            break;
/*          case 'updateBook': 
            $bookController->updateBook($params[1]); 
            break;
*/        case 'viewBook': 
            $bookController->viewBook($params[1]); 
            break;
        default: 
            echo('404 Page not found'); 
            break;
  
        }
