<?php
if (!isset($_SESSION)) {
    session_start();
}

header('Content-Type: application/json; charset=utf-8');

$action = $_POST['action'] ?? $_GET['action'] ?? null;

if (!$action) {
    echo json_encode(['success' => false, 'msg' => 'Ação não informada']);
    exit;
}

if ($action === 'add') {
    $key = $_POST['key'] ?? null;
    $nome = $_POST['nome'] ?? null;
    $preco = isset($_POST['preco']) ? floatval($_POST['preco']) : 0.0;

    if (!$key || !$nome) {
        echo json_encode(['success' => false, 'msg' => 'Dados incompletos']);
        exit;
    }

    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    if (isset($_SESSION['cart'][$key])) {
        $_SESSION['cart'][$key]['qtd'] += 1;
    } else {
        $_SESSION['cart'][$key] = [
            'nome' => $nome,
            'preco' => $preco,
            'qtd' => 1
        ];
    }

    echo json_encode(['success' => true, 'cart' => $_SESSION['cart']]);
    exit;

} elseif ($action === 'clear') {
    unset($_SESSION['cart']);
    echo json_encode(['success' => true, 'cart' => []]);
    exit;

} elseif ($action === 'get') {
    $cart = $_SESSION['cart'] ?? [];
    echo json_encode(['success' => true, 'cart' => $cart]);
    exit;

} elseif ($action === 'remove') {
    $key = $_POST['key'] ?? $_GET['key'] ?? null;
    if (!$key) {
        echo json_encode(['success' => false, 'msg' => 'Chave não informada']);
        exit;
    }

    if (isset($_SESSION['cart'][$key])) {
        unset($_SESSION['cart'][$key]);
    }

    $cart = $_SESSION['cart'] ?? [];
    echo json_encode(['success' => true, 'cart' => $cart]);
    exit;

} else {
    echo json_encode(['success' => false, 'msg' => 'Ação desconhecida']);
    exit;
}

?>
