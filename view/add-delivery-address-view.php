<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../public/style.css">
    <title>Document</title>
</head>
<body>

<p><?php echo $message; ?></p>
<p>Numéro de commande : <?php echo $order->getId(); ?></p>
<p>Adresse : <?php echo $order->getDeliveryAddress(); ?></p>

<form method="POST">
    <label for="getDeliveryAddress">addresse</label>
    <input type="text" id="address" name="deliveryAddress" placeholder="Entrez votre adresse de livraison"/>
    <button type="submit">Valider</button>
</form>


</body>
</html>
