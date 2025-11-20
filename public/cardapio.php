<?php 
$pratos = [
    "feijoada" => [
        "nome" => "Feijoada",
        "descricao" => "Tradicional prato brasileiro feito com feijão preto e carnes variadas.",
        "preco" => 27.90
    ],
    "Fava" => [
        "nome" => "Fava",
        "descricao" => "é um prato típico e robusto da culinária do Nordeste brasileiro, que utiliza a fava como seu ingrediente principal.",
        "preco" => 40.00
    ],
    "arrumadinho" => [
        "nome" => "Arrumadinho",
        "descricao" => "Prato típico do Nordeste brasileiro, que combina feijão verde com carne seca desfiada, arroz branco e farofa.",
        "preco" => 25.00
    ],
    "rubacão" => [
        "nome" => "Rubacão",
        "descricao" => "Prato tradicional da culinária nordestina, feito com feijão macassa, arroz, carne seca, linguiça e temperos regionais.",
        "preco" => 30.00
    ],
    "lasanha" => [
        "nome" => "Lasanha",
        "descricao" => "Prato italiano feito com camadas de massa, molho de tomate, carne moída, queijo e temperos.",
        "preco" => 22.50
    ],
    "pizza" => [
        "nome" => "Pizza",
        "descricao" => "Massa assada coberta com molho de tomate, queijo e diversos ingredientes como pepperoni.",
        "preco" => 45.00
    ],
    "hamburguer" => [
        "nome" => "Hambúrguer",
        "descricao" => "Pão, hambúrguer, queijo, alface, tomate e molho.",
        "preco" => 15.00
    ],
    "coxinha" => [
        "nome" => "Coxinha",
        "descricao" => "Salgadinho frito em formato de gota, recheado com frango desfiado e temperado.",
        "preco" => 8.00
    ],
    "pastel" => [
        "nome" => "Pastel",
        "descricao" => "Massa fina e crocante recheada com diversos ingredientes, frita até dourar.",
        "preco" => 8.00
    ],
    "empada" => [
        "nome" => "Empada",
        "descricao" => "Torta salgada feita com massa, recheio de frango ou camarão.",
        "preco" => 5.00
    ]
]; 
$bebidas = [
    "refrigerante" => [
        "coca cola" => [
            "preco" => 6.00
        ],
        "guaraná" => [
            "preco" => 5.00
        ],
        "fanta" => [
            "preco" => 5.00
        ],
        "sprite" => [
            "preco" => 5.00
        ]
    ]
];
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <title>Cardápio</title>
</head>
<body>

<header>
    <h1>Cardápio</h1>
</header>

<main>
    <section>
        <h2>Pratos</h2>
        <ul>
            <?php foreach ($pratos as $prato): ?>
                <li>
                    <strong><?= $prato["nome"] ?></strong><br>
                    <?= $prato["descricao"] ?><br>
                    Preço: R$ <?= number_format($prato["preco"], 2, ',', '.') ?>
                </li>
                <br>
            <?php endforeach; ?>
        </ul>
    </section>

    <section>
        <h2>Bebidas</h2>

        <?php foreach ($bebidas as $categoria => $itens): ?>
            <h3><?= $categoria ?></h3>
            <ul>
                <?php foreach ($itens as $nome => $info): ?>
                    <li>
                        <?= $nome ?> — R$ <?= number_format($info["preco"], 2, ',', '.') ?>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php endforeach; ?>

    </section>
</main>
</body>
</html>