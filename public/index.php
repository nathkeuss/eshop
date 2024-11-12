<?php

require_once('../controller/OrderController.php');
require_once('../controller/ErrorController.php');

//récupère l'url actuelle
$requestUri = $_SERVER['REQUEST_URI'];

//découpe l'url actuelle pour ne récupérer que la fin
// si l'url demandée est "http://localhost/piscine-eshop/public/test"
//$enduri contient "test"
$uri = parse_url($requestUri, PHP_URL_PATH);
$endUri = str_replace('/eshop/public/', '', $uri);
$endUri = trim($endUri, '/');


// en fonction de la valeur de $endUri on charge le bon contrôleur
if ($endUri === "order") {
    $indexController = new OrderController();
    $indexController->index();
}
else if ($endUri === "add-product") {
    $orderController = new OrderController();
    $orderController->addProduct();
}
else {
    $errorController = new ErrorController();
    $errorController->notFound();
}




