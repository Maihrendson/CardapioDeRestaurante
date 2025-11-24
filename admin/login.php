<?php
include('db/conexao.php');
include('../public/cardapio.php');

if(isset($_POST['username']) || isset($_POST['senha'])) {

    if(strlen($_POST['username']) == 0) {
        echo "Preencha seu usuário!!";
    } else if(strlen($_POST['senha']) == 0) {
        echo "Preencha sua senha!!";
    } else {

        $usuario = $conn->real_escape_string($_POST['username']);
        $senha = $conn->real_escape_string($_POST['senha']);

        $sql_code = "SELECT * FROM usuarios WHERE username = '$usuario' AND senha = '$senha'";
        $sql_query = $conn->query($sql_code) or die ("Falha na execução do código SQL: " . $conn->error);

        $quantidade = $sql_query->num_rows;

        if($quantidade == 1){

            $admin = $sql_query->fetch_assoc();
            if(!isset($_SESSION)) {
                session_start();
            }

            $_SESSION['id'] = $admin['id'];
            $_SESSION['nome'] = $admin['nome'];

            header("Location: index.php");

        } else {
            echo "Falha de login! Usuário ou senha incorretos";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FoodClub's | Login</title>
</head>
<body>
    <h1>Bem-vindo ao FoodClub's</h1>
    <h2>Faça seu login</h2>
    <form action ="dashboard.php" method = "POST">
        <p>
        <label for="username">Usuário:</label>
        <input type="text" id="username" name="username" required>
        </p>
        <p>
        <label for="senha">Senha:</label>
        <input type="senha" id="senha" name="senha" required>
        </p>
        <input type="submit" value="Login">
    </form>
    
</body>
<footer>
    <p>&copy;Copyright 2024, FoodClub's todos os direitos reservados.</p>
</footer>
</html>