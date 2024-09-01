<?php

$products = [
    [
        'title' => 'Nokia',
        'price' => 100,
        'qty' => 123,
    ],
    [
        'title' => 'Sony',
        'price' => 200,
        'qty' => 12,
    ],
    [
        'title' => 'LG',
        'price' => 150,
        'qty' => 130,
    ],
    [
        'title' => 'Nokia 2',
        'price' => 100,
        'qty' => 123,
    ],
    [
        'title' => 'Sony 2',
        'price' => 200,
        'qty' => 12,
    ],
    [
        'title' => 'LG 2',
        'price' => 150,
        'qty' => 130,
    ],
];
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body>

<div class="container">
    <div class="row">

        <?php foreach ($products as $product): ?>

            <?php require 'card.php' ?>

        <?php endforeach; ?>

    </div>
</div>

</body>
</html>
