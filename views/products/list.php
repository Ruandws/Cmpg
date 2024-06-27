<!-- list.php -->
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="/app/css/styles.css">
    <title>Lista de Produtos</title>
</head>
<body>
    <h1>Lista de Produtos</h1>
    <?php foreach ($products as $product): ?>
        <div class="product">
            <img src="/app/images/<?php echo $product['image']; ?>" alt="<?php echo $product['name']; ?>">
            <h2><?php echo $product['name']; ?></h2>
            <p><?php echo $product['description']; ?></p>
            <p>Preço: <?php echo $product['price']; ?></p>
            <a href="index.php?controller=ProductController&action=viewProduct&id=<?php echo $product['id']; ?>">Detalhes</a>
        </div>
    <?php endforeach; ?>
</body>
</html>
