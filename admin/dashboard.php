<?php

if(!isset($_SESSION)) {
    session_start();
}

$cart = $_SESSION['cart'] ?? [];

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FoodClub`s | Admin</title>
    <link 
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" 
        rel="stylesheet" 
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" 
        crossorigin="anonymous">
</head>
<body>
<nav class="navbar bg-primary" data-bs-theme="dark">
    <div class="container">
        <a class="navbar-brand">Login de Admin</a>
        <div class="d-flex">
            <a class="btn btn-outline-light btn-sm" href="../public/cardapio.php">Voltar ao cardápio</a>
        </div>
    </div>
</nav>

<main class="container my-4">
    <h1 class="mb-3">Carrinho</h1>

    <?php if (empty($cart)): ?>
        <div class="alert alert-info">O carrinho está vazio.</div>
    <?php else: ?>
        <div id="cart-container">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Item</th>
                        <th class="text-end">Preço</th>
                        <th class="text-center">Qtd</th>
                        <th class="text-end">Subtotal</th>
                        <th class="text-center">Ações</th>
                    </tr>
                </thead>
                <tbody id="cart-items">
                    <?php $total = 0; foreach ($cart as $key => $item):
                        $subtotal = $item['preco'] * $item['qtd'];
                        $total += $subtotal;
                    ?>
                        <tr data-key="<?= htmlspecialchars($key) ?>">
                            <td><?= htmlspecialchars($item['nome']) ?> <br><small class="text-muted">(<?= htmlspecialchars($key) ?>)</small></td>
                            <td class="text-end">R$ <?= number_format($item['preco'],2,',','.') ?></td>
                            <td class="text-center"><?= intval($item['qtd']) ?></td>
                            <td class="text-end">R$ <?= number_format($subtotal,2,',','.') ?></td>
                            <td class="text-center">
                                <button class="btn btn-sm btn-danger remove-from-cart" data-key="<?= htmlspecialchars($key) ?>">Remover</button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="3" class="text-end">Total</th>
                        <th id="cart-total" class="text-end">R$ <?= number_format($total,2,',','.') ?></th>
                        <th></th>
                    </tr>
                </tfoot>
            </table>
        </div>

        <div class="d-flex gap-2">
            <button type="button" class="btn btn-danger clear-cart">Limpar carrinho</button>
            <a href="../public/cardapio.php" class="btn btn-secondary">Voltar ao cardápio</a>
        </div>
        </div>
    <?php endif; ?>

</main>

<script 
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" 
    crossorigin="anonymous"></script>

<script src="../assets/js/script.js"></script>

</body>
</html>