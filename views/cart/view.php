<!-- view.php -->
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="/app/css/styles.css">
    <title>Seu Carrinho</title>
</head>
<body>
    <h1>Seu Carrinho</h1>
    <?php if (count($cartItems) > 0): ?>
        <?php foreach ($cartItems as $item): ?>
            <div class="cart-item">
                <p>Produto ID: <?php echo $item['product_id']; ?></p>
                <p>Quantidade: <?php echo $item['quantity']; ?></p>
                <form action="index.php?controller=CartController&action=removeFromCart" method="post">
                    <input type="hidden" name="itemId" value="<?php echo $item['id']; ?>">
                    <button type="submit">Remover</button>
                </form>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>Seu carrinho está vazio.</p>
    <?php endif; ?>
</body>
</html>
