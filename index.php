<?php

require_once 'config/config.php';
require_once 'models/DbModel.php';

if (!isset($_GET["controller"]))
    $_GET["controller"] = constant("DEFAULT_CONTROLLER");
if (!isset($_GET["action"]))
    $_GET["action"] = constant("DEFAULT_ACTION");

$controller_path = 'controllers/' . $_GET["controller"] . 'Controller.php';

/* Check if controller exists */
if (!file_exists($controller_path))
    $controller_path = 'controllers/' . constant("DEFAULT_CONTROLLER") . 'Controller.php';

/* Load controller */
require_once $controller_path;
$controllerName = $_GET["controller"] . 'Controller';
$controllerNameView = $_GET["controller"];
$controller = new $controllerName();

/* Check if method is defined */
$dataToView["data"] = array();
if (method_exists($controller, $_GET["action"]))
    $dataToView["data"] = $controller->{$_GET["action"]}();


/* Load views */
require_once 'views/template/header.php';
require_once 'views/' . $controllerNameView . '/' . $controller->view . '.php';
require_once 'views/template/footer.php';