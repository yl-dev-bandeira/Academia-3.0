<?php
session_start(); // Inicia a sessão

if (isset($_POST['submit'])) {
    include_once('config.php');

    // Recebe os dados do formulário e os escapa para prevenir SQL Injection
    $nome = mysqli_real_escape_string($conexao, $_POST['nome']);
    $email = mysqli_real_escape_string($conexao, $_POST['email']);
    $telefone = mysqli_real_escape_string($conexao, $_POST['telefone']);
    $plano = mysqli_real_escape_string($conexao, $_POST['plano']);
    $senha = mysqli_real_escape_string($conexao, $_POST['senha']);
    $senha_criptografada = password_hash($senha, PASSWORD_DEFAULT);

    // Prepara o comando SQL para inserção de dados
    $sql = "INSERT INTO usuarios(nome, telefone, email, plano, senha) VALUES(?,?,?,?,?)";
    $stmt = mysqli_prepare($conexao, $sql);

    // Verifica se houve erro na preparação da query
    if ($stmt === false) {
        die('Erro na preparação da query: ' . mysqli_error($conexao));
    }

    // Associa os parâmetros da query com as variáveis
    mysqli_stmt_bind_param($stmt, "sssss", $nome, $telefone, $email, $plano, $senha_criptografada);

    // Executa a query e verifica o resultado
    if ($stmt->execute()) {
        // Cadastro bem-sucedido, armazena a mensagem na sessão
        $_SESSION['mensagem'] = "Você foi cadastrado com sucesso!";
        $_SESSION['urlRedirecionamento'] = "index.html";  // Página para onde o usuário será redirecionado
    } else {
        // Erro ao cadastrar, armazena a mensagem na sessão
        $_SESSION['mensagem'] = "Erro ao cadastrar! Tente novamente.";
        $_SESSION['urlRedirecionamento'] = "formulario_cadastro.html"; // Página de cadastro para tentar novamente
    }

    // Fecha a declaração e a conexão com o banco
    mysqli_stmt_close($stmt);
    mysqli_close($conexao);

    // Redireciona para a página de resultado
    header("Location: resultado.php");
    exit();
}
?>
