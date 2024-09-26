<?php
$products = require './data.php';

$product = array_filter($products, function ($card) {
    if ($_GET['id'] == $card['id']) return true;
});

$product = reset($product);

if (!$product['published']) {
    die('<img src="./uploads/404.png" alt="Error">');
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../styles/more.css">
    <title><?= $product['name'] ?></title>
</head>
<body>

<div class="container">

    <div class="card">
        <div class="card_title">
            <h1><?= $product['name'] ?></h1>
            <?php if (!empty($product['image'])): ?>
            <?php foreach ($product['image'] as $image): ?>
                <div class="image_container">
                    <img src="./<?= $image ?>" alt="<?= $product['name'] ?>">
                </div>
            <?php endforeach; ?>
            <?php else: ?>
                <div class="image_container">
                    <img src="./uploads/no_image.webp" alt="Нет фото">
                </div>
            <?php endif; ?>
        </div>

        <div class="description">
            <h3>Описание</h3>
            <p><?= $product['description'] ?></p>
        </div>
    </div>

</div>

</body>
</html>