<?php

declare(strict_types=1);
require_once '../model/order.php';
require_once '../model/orderRepository.php';
require_once '../vendor/autoload.php';

class OrderController
{

    public function index(): void
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


        $loader = new \Twig\Loader\FilesystemLoader('../view');
        // je charge twig avec la configuration
        // ça me permet d'avoir une variable $twig qui contient une instance
        // de la classe twig
        // et donc pouvoir utiliser les méthodes public que twig crées
        $twig = new \Twig\Environment($loader);

        //
        echo $twig->render('create-order.twig', [
            'message' => $message,
        ]);
    }

    public function addProduct(): void
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

    public function removeProduct(): void
    {

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

    public function setDeliveryAddress(): void
    {
        //j'instancie la class orderRepository
        //pour pouvoir utiliser ses méthodes
        $orderRepository = new orderRepository();
        //j'appelle une de ses méthodes
        //pour récup une commande existante
        $order = $orderRepository->findOrder();

        $message = null;
        //je vérifie et récupère les données de la requête POST
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            if (key_exists('deliveryAddress', $_POST)) {

                //j'essaie de modifier ma commande avec l'adresse de livraison
                try {
                    //je dis que l'adresse de livraison sera celle mise dans le formulaire
                    $order->setDeliveryAddress($_POST['deliveryAddress']);
                    $orderRepository->persistOrder($order);
                    $message = "Adresse de livraison ajoutée";
                    //si la modification echoue (parce que j'ai une exception
                    // qui apparait (commande non modifiable etc)
                } catch (Exception $exception) {
                    $message = $exception->getMessage();
                }
            }
        }


        require_once '../view/add-delivery-address-view.php';
    }

    public function payment(): void
    {
        $orderRepository = new orderRepository();
        $order = $orderRepository->findOrder();

        $message = null;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            if (key_exists('paymentMethod', $_POST)) {

                try {
                    $order->pay($_POST['paymentMethod']);
                    $orderRepository->persistOrder($order);
                    $message = "Paiement validé";

                } catch (Exception $exception) {
                    $message = $exception->getMessage();
                }
            }
        }
        require_once '../view/payment-view.php';
    }


}

