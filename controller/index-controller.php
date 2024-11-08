<?php

require_once '../model/order.php';

$message = null;

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    if(key_exists('customerName', $_POST)){
        $order = new order($_POST['customerName']);

        $message = "Commande faite";
    }
}


require_once '../view/index-view.php';