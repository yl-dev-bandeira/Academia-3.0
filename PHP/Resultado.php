<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado Cadastro</title>
</head>
<body>
    <script type="text/javascript">
        // Exibe o alert com a mensagem de sucesso ou erro
        alert("<?php echo $_SESSION['mensagem']; ?>");

        // Redireciona após 2 segundos
        setTimeout(function() {
            window.location.href = "<?php echo $_SESSION['urlRedirecionamento']; ?>";
        }, 2000);
    </script>
</body>
</html>

<?php
// Limpa a sessão após o redirecionamento
unset($_SESSION['mensagem']);
unset($_SESSION['urlRedirecionamento']);
?>
