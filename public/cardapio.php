    <?php 
    $pratos = [
        "feijoada" => [
            "nome" => "Feijoada",
            "descricao" => "Tradicional prato brasileiro feito com feijão preto e carnes variadas.",
            "preco" => 27.90
        ],
        "Fava" => [
            "nome" => "Fava",
            "descricao" => "É um prato típico e robusto da culinária do Nordeste brasileiro, que utiliza a fava como seu ingrediente principal.",
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
        "Refrigerantes" => [
            "Coca-Cola" => ["preco" => 6.00],
            "Guaraná" => ["preco" => 5.00],
            "Fanta" => ["preco" => 5.00],
            "Sprite" => ["preco" => 5.00],

        ]
    ];

    ?>

    <!DOCTYPE html>
    <html lang="pt-BR">
    <head>
        <meta charset="utf-8">
        <title>Cardápio</title>
        <link 
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" 
            rel="stylesheet" 
            integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" 
            crossorigin="anonymous"
        >
        <link rel="stylesheet" href="../assets/css/style.css">
    </head>
    <body>

    <!--Navbar-->
    <nav class="navbar bg-primary" data-bs-theme="dark">
        <div class="container mb-2">
            <a class="navbar-brand">FoodClub's</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="../admin/login.php">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main class="container mb-5">
        <div class="text-center mb-4">
            <h1 class="cardapio-titulo mb-1">Cardápio</h1>
            <p class="text-muted">Pratos típicos e opções deliciosas para você!</p>
        </div>

        <div class="row">

            <!--Pratos-->
            <section class="col-lg-8 mb-4">
                <h2 class="mb-3">Pratos</h2>
                <div class="row g-3">
                    <?php foreach ($pratos as $prato): ?>
                        <div class="col-md-6">
                            <div class="card h-100 shadow-sm">
                                <div class="card-body d-flex flex-column">
                                    <h5 class="card-title"><?= $prato["nome"] ?></h5>
                                    <p class="card-text flex-grow-1">
                                        <?= $prato["descricao"] ?>
                                    </p>
                                    <p class="fw-bold mb-0">
                                        Preço: R$ <?= number_format($prato["preco"], 2, ',', '.') ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </section>

            <!--Bebidas-->
            <section class="col-lg-4 mb-4">
                <h2 class="mb-3">Bebidas</h2>
                <?php foreach ($bebidas as $categoria => $itens): ?>
                    <div class="card mb-3 shadow-sm">
                        <div class="card-header bg-primary text-white">
                            <strong><?= $categoria ?></strong>
                        </div>
                        <ul class="list-group list-group-flush">
                            <?php foreach ($itens as $nome => $info): ?>
                                <li class="list-group-item d-flex justify-content-between">
                                    <span><?= $nome ?></span>
                                    <span>R$ <?= number_format($info["preco"], 2, ',', '.') ?></span>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endforeach; ?>
            </section>
        </div>

        <script 
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" 
        crossorigin="anonymous">
        
        </script>
        
    </main>
    </body>
    </html>