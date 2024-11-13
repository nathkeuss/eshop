<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../public/style.css">
    <title>paie</title>
</head>
<body>

<p><?php echo $message; ?></p>
<p>Numéro de commande : <?php echo $order->getId(); ?></p>
<p>Adresse : <?php echo $order->getDeliveryAddress(); ?></p>
<p><?php echo $order->getStatus(); ?></p>

<form method="POST">
    <label for="paymentMethod">paie stp</label>
    <input type="text" name="paymentMethod" placeholder="Entre tes numéros de carte bancaires">
    <button type="submit">Valider le paiement</button>
</form>

</body>
</html>