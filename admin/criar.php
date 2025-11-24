<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Criar Item</title>
</head>
<body>

<h2> Criar item </h2>

<form action="salvar.php" method="POST" enctype="multipart/form-data">
    <label>Nome do item:</label><br>
    <input type="text" name="nome" required><br><br>

    <label>Imagem:</label><br>
    <input type="file" name="imagem" accept="image/*" required><br><br>

    <button type="submit">Salvar</button>
</form>

</body>
</html>