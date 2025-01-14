<?php
// Configurações de conexão com o banco de dados
$host = 'localhost';
$dbname = 'banco_odonto'; // Substitua pelo nome do seu banco
$user = 'root';            // Substitua pelo seu usuário do MySQL
$pass = '';                // Substitua pela sua senha do MySQL, se houver

try {
    // Criando uma nova conexão PDO
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
    // Configurando o PDO para lançar exceções em caso de erro
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Caso ocorra um erro de conexão, exibe uma mensagem de erro
    die("Erro de conexão: " . $e->getMessage());
}
?>
