<!-- detail.php -->
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="/app/css/styles.css">
    <title>Detalhes do Produto</title>
</head>
<body>
    <h1><?php echo $product['name']; ?></h1>
    <img src="/app/images/<?php echo $product['image']; ?>" alt="<?php echo $product['name']; ?>">
    <p><?php echo $product['description']; ?></p>
    <p>Preço: <?php echo $product['price']; ?></p>
    <form action="index.php?controller=CartController&action=addToCart" method="post">
        <input type="hidden" name="productId" value="<?php echo $product['id']; ?>">
        <label for="quantity">Quantidade:</label>
        <input type="number" name="quantity" id="quantity" value="1" min="1">
        <button type="submit">Adicionar ao Carrinho</button>
    </form>
</body>
</html>