<?php

require_once '../model/order.php';

class IndexController {

    public function index() {
        $message = null;

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            if(key_exists('customerName', $_POST)){

                try {
                    $order = new order($_POST['customerName']);
                    $message = 'Commande faite';
                } catch (Exception $exception) {
                    $message = $exception->getMessage();
                }
            }
        }


        require_once '../view/index-view.php';
    }
}

