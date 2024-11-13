<?php

declare(strict_types=1);
require_once ('order.php');

class orderRepository
{

    //je stocke le contenu de la session
    public function persistOrder(Order $order): void
    {
        session_start();
        $_SESSION['order'] = $order;

    }

    // je récupère le contenu de la session
    public function findOrder(): Order
    {
        session_start();
        return $_SESSION['order'];

    }
}
