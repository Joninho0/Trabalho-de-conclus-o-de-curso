<?php
// Inclui o arquivo de conexão
include 'conexao.php';

// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Recebe os dados do formulário
    $nome_completo = $_POST['nome_completo'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $cpf = $_POST['cpf'];
    $data_nascimento = $_POST['data_nascimento'];
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);

    // Verifica se o CPF já existe no banco de dados
    $sql_check = "SELECT * FROM usuarios WHERE cpf = :cpf";
    $stmt_check = $pdo->prepare($sql_check);
    $stmt_check->execute([':cpf' => $cpf]);

    if ($stmt_check->rowCount() > 0) {
        // CPF já existe, exibe uma mensagem de erro
        echo "Erro: Este CPF já está cadastrado!";
    } else {
        // Prepara o comando SQL para inserir os dados
        $sql = "INSERT INTO usuarios (nome_completo, email, telefone, cpf, data_nascimento, senha) 
                VALUES (:nome_completo, :email, :telefone, :cpf, :data_nascimento, :senha)";
        $stmt = $pdo->prepare($sql);

        // Executa o comando com os dados
        $stmt->execute([
            ':nome_completo' => $nome_completo,
            ':email' => $email,
            ':telefone' => $telefone,
            ':cpf' => $cpf,
            ':data_nascimento' => $data_nascimento,
            ':senha' => $senha
        ]);

        // Redireciona o usuário para a página de início
        header("Location: inicio.html"); // Altere para o caminho correto da página de início
        exit(); // Encerra o script para evitar qualquer processamento adicional
    }
}
?>
