<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    // listing 0304
    class ShopProduct
    {
        public $title = "default product";
        public $producerMainName = "main name";
        public $producerFirstName = "first name";
        public $price = 0;
    }

    $product1 = new ShopProduct();
    $product2 = new ShopProduct();
    var_dump($product1);
    echo $product1->producerFirstName;
    var_dump($product2);

    ?>
</body>
</html>