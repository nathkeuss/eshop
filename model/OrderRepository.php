<?php

class orderRepository
{

    //je stocke le contenu de la session
    public function persistOrder($order)
    {
        session_start();
        $_SESSION['order'] = $order;

    }

    // je récupère le contenu de la session
    public function findOrder()
    {
        session_start();
        return $_SESSION['order'];

    }
}
