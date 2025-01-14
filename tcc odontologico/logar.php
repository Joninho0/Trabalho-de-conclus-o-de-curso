<?php
require 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $cpf = $_POST['cpf'];
    $senha = $_POST['senha'];

    // Busca o usuário pelo CPF
    $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE cpf = :cpf");
    $stmt->execute(['cpf' => $cpf]);
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($usuario && password_verify($senha, $usuario['senha'])) {
        echo "Login realizado com sucesso!";
    } else {
        echo "CPF ou senha incorretos.";
    }
}
// Redireciona o usuário para a página de início
header("Location: inicio.html"); // Altere para o caminho correto da página de início
exit(); // Encerra o script para evitar qualquer processamento adicional
?>
