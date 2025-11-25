<?php
include ('../public/cardapio.php');

if(!isset($_SESSION)) {
    session_start();
}

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel de Admin</title>
</head>
<body>
    <h1>Bem-vindo ao Painel de Administração</h1>
    <p>Aqui você pode gerenciar o conteúdo do site.</p>
</body>
</html>