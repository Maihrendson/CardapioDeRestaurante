<?php

// Verificar se enviou o formulário
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $nome = $_POST['nome'];

    // Verificar se veio arquivo
    if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] == 0) {

        $arquivoTmp = $_FILES['imagem']['tmp_name'];
        $nomeArquivo = $_FILES['imagem']['name'];

        // Caminho final
        $destino = "uploads/" . basename($nomeArquivo);

        // mover arquivo para a pasta uploads/
        if (move_uploaded_file($arquivoTmp, $destino)) {
            echo "<h3>Item criado com sucesso!</h3>";
            echo "Nome: $nome <br>";
            echo "Imagem:<br>";
            echo "<img src='$destino' width='200'>";
        } else {
            echo "Erro ao salvar imagem.";
        }

    } else {
        echo "Nenhuma imagem enviada.";
    }

} else {
    echo "Acesso inválido.";
}