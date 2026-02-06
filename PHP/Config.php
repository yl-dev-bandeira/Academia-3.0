<?php

    $dbName = 'academia';
    $dbPassword ='';
    $dbUsername ='root';
    $dbHost='localhost';

    $conexao = new mysqli($dbHost,$dbUsername,$dbPassword,$dbName);

    // Verifica se houve erro na conexão
if ($conexao->connect_error) {
    die("Conexão falhou: " . $conexao->connect_error);
}

?>
