<?php
$products = require "./data.php";

$categories = [];
foreach ($products as $product) {
    $categories[] = $product['category'];
}
$categoriesNoRepeat = array_unique($categories);

$currentCategory = $_GET["category"] ?? 'all';
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../styles/main.css">
    <title>Инструменты</title>
</head>
<body>

<div class="container">
    <h1>Каталог</h1>

    <form action="./" method="get" id="category-form">
        <select name="category">
            <option value="all" selected>Без фильтра</option>
            <?php foreach ($categoriesNoRepeat as $category): ?>
                <?php if ($currentCategory === $category): ?>
                    <option selected value="<?= $currentCategory ?>"><?= $category ?></option>
                <?php else: ?>
                    <option value="<?= $category ?>"><?= $category ?></option>
                <?php endif; ?>
            <?php endforeach; ?>
        </select>

        <input type="submit" value="Искать">
    </form>

    <div class="catalog">
        <?php foreach ($products as $product): ?>
            <?php if (($currentCategory === $product['category'] || $currentCategory === 'all') && $product['published']): ?>
                <div class="card">
                    <h2><?= $product['name'] ?></h2>
                    <div class="image-container">
                        <?php if (!empty($product['image'])): ?>
                            <img src="<?= $product['image'][0] ?>" alt="image">
                        <?php else: ?>
                            <img src="./uploads/no_image.webp" alt="Нет фото">
                        <?php endif; ?>
                    </div>

                    <form action="./more.php" method="get">
                        <input type="hidden" name="id" value="<?= $product['id'] ?>">
                        <input type="submit" value="Подробнее">
                    </form>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>
</div>

</body>
</html>