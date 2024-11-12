<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../public/style.css">
    <title>eshop</title>
</head>
<body>

<header>
    <h1>Fais ta commande mec</h1>
</header>

<main>

    <?php if ($message) { ?>

    <h2><?php echo $message; ?></h2>

    <?php } ?>

    <form method="POST">

        <input type="text" name="customerName">

        <button type="submit">Créer une commande</button>

    </form>
</main>

</body>
</html>