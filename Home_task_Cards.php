
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
        'price' => 130,
        'qty' => 12,
    ],
    [
        'title' => 'Sony 2',
        'price' => 220,
        'qty' => 15,
    ],
    [
        'title' => 'LG 2',
        'price' => 160,
        'qty' => 17,
    ],
];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home task - Cards</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <style>
        h1{
            text-align: center;
            margin-bottom: 20px;
        }
        .card-wrapper {
            display: flex;
            flex-direction: row;
            width: 70%;
            margin: 0 auto;
            height: min-content;
        }
        .card:not(:last-child){
            margin-right: 10px;
        }

    </style>

</head>
<body>
    <h1>Home task - Cards</h1>
    <div class="card-wrapper">
        <?php foreach($products as $item): ?>
        <div class="card" style="width: 19rem;">
            <div class="card-body">
                <h5 class="card-title"><?php echo $item['title'] ?></h5>
                <p class="card-text">Price: <?php echo $item['price'], "$" ?></p>
                <p>Quantity: <?php echo $item['qty'], " pieces" ?></p>
                <a href="#" class="btn btn-primary">To know more</a>
            </div>
        </div>
        <?php endforeach; ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

</body>
</html>