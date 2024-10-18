<?php

//controladores
require_once './app/controllers/controllerHelados.php';
require_once './app/controllers/controllerHeladerias.php';
require_once './app/controllers/controllerLogin.php';
require_once './app/controllers/ErrorController.php';

//url base
define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');

//Para mantener la session iniciada, antes de manejar los datos
AuthHelper::init();

//accion por defecto
$action = 'showIceCream';

// toma la accion que viene del usuario y lo pasa a los parametros
if (!empty($_GET['action'])) {
    $action = $_GET['action'];
}
$params = explode('/', $action);

// TABLA DE RUTEO
switch ($params[0]) {
    case 'showIceCream':
        $controller = new ControllerHelados();
        $controller->showIceCream();
        break;
    case 'showIceCreamParlor':
        $controller = new ControllerHeladerias();
        $controller->showIceCreamParlor();
        break;
    case 'addIceCream':
        $controller = new ControllerHelados();
        $controller->addIceCream();
        break;
    case 'addIceCreamParlor':
        $controller = new ControllerHeladerias();
        $controller->addIceCreamParlor();
        break; 
    case 'showAddIceCream':
        $controller = new ControllerHelados();
        $controller->showAddIceCream();
        break;
    case 'showAddIceCreamParlor':
        $controller = new ControllerHeladerias();
        $controller->showAddIceCreamParlor();
        break;
    case 'detailsIceCream':
        if (isset($params[1])) {
            $controller = new ControllerHelados();
            $controller->detailsIceCream($params[1]);
            break;
        } else {
            $controller = new ErrorController();
            $controller->showError();
            break;
        }
    case 'detailsIceCreamParlor':
        if (isset($params[1])) {
            $controller = new ControllerHeladerias();
            $controller->detailsIceCreamParlor($params[1]);
            break;
        } else {
            $controller = new ErrorController();
            $controller->showError();
            break;
        }
    case 'showEditIceCream':
        if (isset($params[1])) {
            $controller = new ControllerHelados();
            $controller->showEditIceCream($params[1]);
            break;
        }
    // // // case 'editIceCreamParlor':
    // // //     if (isset($params[1])) {
    // // //         $controller = new ControllerHeladerias();
    // // //         $controller->showEditIceCreamParlor($params[1]);
    // // //         break;
    // // //     }
    case 'editIceCream':
        if (isset($params[1])) {
            $controller = new ControllerHelados();
            $controller->editIceCream($params[1]);
            break;
        } else {
            $controller = new ErrorController();
            $controller->showError();
            break;
        }
    case 'editIceCreamParlor':
        if (isset($params[1])) {
            $controller = new ControllerHeladerias();
            $controller->editIceCreamParlor($params[1]);
            break;
        } else {
            $controller = new ErrorController();
            $controller->showError();
            break;
        }
    case 'deleteIceCream':
        if (isset($params[1])) {
            $controller = new ControllerHelados();
            $controller->deleteIceCream($params[1]);
            break;
        } else {
            $controller = new ErrorController();
            $controller->showError();
            break;
        }
    case 'deleteIceCreamParlor':
        if (isset($params[1])) {
            $controller = new ControllerHeladerias();
            $controller->deleteIceCreamParlor($params[1]);
            break;
        } else {
            $controller = new ErrorController();
            $controller->showError();
            break;
        }
    case 'showLogin':
        $controller = new LoginController();
        $controller->showLogin();
        break;
    case 'auth':
        $controller = new LoginController();
        $controller->auth();
        break;
    case 'logout':
        $controller = new LoginController();
        $controller->logout();
        break;
    default:
        $controller = new ErrorController();
        $controller->showError();
        break;
}
