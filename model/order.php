<?php

class order
{

    private $id;
    private $customerName;
    private $deliveryAddress;
    private $status = "cart"; //je dis que status = cart de base
    private $totalPrice = 0; //que le prix total de base est 0
    private $products = []; //et que les produits seront dans un tableau


//le construteur est une méthode "magique" car elle est appelée automatiquement
//le constructeur est appelée quand un objet est crée pour cette classe
//un objet crée pour une classe appelée "instance de class"
    public function __construct($customerName)
    {
        $this->customerName = $customerName;
        $this->id = uniqid();
    }


    public function addProduct()//fonction qui ajoute un produit et un prix si le status est cart.
    {   //le $this fait référence à l'object actuel
        //c'est à dire à $order1, ou $order2 etc
        //donc à l'objet actuel issu de la classe
        if ($this->status === "cart") {
            $this->products[] = "babybel";//j'ajoute un produit au tableau
            $this->totalPrice += 2;//j'ajoute 2 au totalPrice de base (donc 0)
        }
    }


    public function removeProduct()
    { //function qui retire le dernier produit ajouter
        if ($this->status === "cart" && !empty($this->products)) {
            array_pop($this->products);//je retire le dernier produit ajouter au tableau
            $this->totalPrice -= 2;//je retire 2 au prix total
        } else {
            throw new Exception("Vous ne pouvez pas retirer de produit dans votre panier car vous n'en possédez pas.");
        }
    }

    public function setDeliveryAddress($deliveryAddress)
    {
        if ($this->status === "cart") {
            $this->deliveryAddress = $deliveryAddress;
            $this->status === "deliveryAddressSet";
        }
    }

    public function pay()//fonction qui passe le status cart à paid pour dire qu'il peut payer
    {
        if ($this->status === "deliveryAddressSet" && !empty($this->products)) {
            $this->status = "paid";
        } else {
            throw new Exception("La commande ne peut pas être payé car vous n'avez pas mis d'adresse de livraison.");
        }
    }

    public function sendOrder()
    {
        if ($this->status === "paid") { //si il a payé
            $this->status = "sent"; //le status passe en "envoyé"
            echo "Votre commande a bien été envoyée";
        } else {
            throw new Exception("La commande ne peut pas être envoyé car vous n'avez pas encore payé.");
        }
    }

}


