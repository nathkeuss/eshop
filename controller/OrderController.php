<?php

require_once '../model/order.php';
require_once '../model/orderRepository.php';

class OrderController
{

    public function index()
    {
        $message = null;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (key_exists('customerName', $_POST)) {

                try {

                    // je créer une instance de la classe Order
                    // avec ces propriétés par défaut (date de création, client, montant etc)
                    $order = new order($_POST['customerName']);
                    // j'instancie la class orderRepository
                    //j'appelle une de ses méthodes, persistOrder
                    //qui permet de stocker la commande créée
                    $orderRepository = new orderRepository();
                    $orderRepository->persistOrder($order);
                    $message = 'Commande faite';

                } catch (Exception $exception) {
                    $message = $exception->getMessage();
                }
            }
        }


        require_once '../view/create-order-view.php';
    }

    public function addProduct()
    {

        $message = null;

        //j'instancie la classe orderRepository
        //j'appelle une de ses méthodes, findOrder
        //qui permet de récupérer la commande actuellement en session pour l'utilisateur

        $orderRepository = new orderRepository();
        $order = $orderRepository->findOrder();
        try {
            //j'ajoute un produit à la commande
            $order->addProduct();
            //je la save
            $orderRepository->persistOrder($order);
            $message = 'Produit ajouté';
        } catch (Exception $exception) {
            $message = $exception->getMessage();
        }

        require_once '../view/add-product-view.php';
    }

    public function removeProduct() {

        $message = null;
        $orderRepository = new orderRepository();
        $order = $orderRepository->findOrder();

        try {
            $order->removeProduct();
            $orderRepository->persistOrder($order);
            $message = 'Produit supprimé';
        } catch (Exception $exception) {
            $message = $exception->getMessage();
        }
        require_once '../view/remove-product-view.php';
    }

    public function setDeliveryAddress()
    {
        //j'instancie la class orderRepository
        $orderRepository = new orderRepository();
        //j'appelle une de ses méthodes
        $order = $orderRepository->findOrder();

        $message = null;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            if (key_exists('deliveryAddress', $_POST)) {

                try {
                    //je dis que l'adresse de livraison sera celle mise dans le formulaire
                    $order->setDeliveryAddress($_POST['deliveryAddress']);

                    $message = "Adresse de livraison ajoutée";

                } catch (Exception $exception) {
                    $message = $exception->getMessage();
                }
            }
        }


        require_once '../view/add-delivery-address-view.php';
    }


}

