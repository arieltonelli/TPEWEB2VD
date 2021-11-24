<?php
require_once 'libs/Router.php';
require_once "Controller/ApiCommentController.php";

// crea el router
$router = new Router();

// define la tabla de ruteo
$router->addRoute('comentarios', 'GET', 'ApiCommentController', 'obtenerComentarios'); 
$router->addRoute('comentarios/:ID', 'GET', 'ApiCommentController', 'obtenerComentario');
$router->addRoute('comentarios/:ID', 'DELETE', 'ApiCommentController', 'eliminarComentario');
$router->addRoute('comentarios', 'POST', 'ApiCommentController', 'insertarComentario');


// rutea
$router->route($_GET["resource"], $_SERVER['REQUEST_METHOD']);