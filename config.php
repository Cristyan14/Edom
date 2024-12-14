<?php
    // Configurações do banco de dados
    $dbHost = 'localhost:3306'; // Endereço do servidor de banco de dados MySQL
    $dbUsername = 'root';
    $dbPassword = '';
    $dbName = 'edom';

    // Cria a conexão com o banco de dados
    $conexao = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

    // Verifica a conexão
    if ($conexao->connect_error) {
        die("Conexão falhou: " . $conexao->connect_error);
    } else {
        // echo "Conexão efetuada com sucesso"; // Comentário opcional
    }
?>
