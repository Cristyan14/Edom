<?php

require_once 'vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

include_once("config.php"); // Inclua a configuração do banco de dados

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $igreja = $_POST['igreja'];
    $telefone = $_POST['telefone'];
    $lote = $_POST['lote'];
    $cep = $_POST['cep'];
    date_default_timezone_set('America/Sao_Paulo');
    $data_inscricao = date("Y-m-d H:i:s");

    // Previne injeção de SQL
    $cpf = $conexao->real_escape_string($cpf);

    // Consulta ao banco de dados para verificar se o CPF já está cadastrado
    $sql = "SELECT * FROM pessoa WHERE cpf='$cpf'";
    $query = $conexao->query($sql);

    if ($query->num_rows > 0) {
        header("Location: index.php");
        exit();
    } else {
        $comando = "INSERT INTO pessoa (nome, cpf, telefone, igreja, email, lote, cep, pagamento_final, data_inscricao) 
                    VALUES ('$nome', '$cpf', '$telefone', '$igreja', '$email', '$lote', '$cep', null, '$data_inscricao')";

        if ($conexao->query($comando) === TRUE) {
            // Removido o código de envio de e-mail
            sleep(7);
            if ($lote == 1) {
                header("Location: https://mpago.la/32m31y6");
            } elseif ($lote == 2) {
                header("Location: https://www.mercadopago.com.br/checkout/v1/redirect?pref_id=547002861-677f20e4-903d-4e0d-a597-e1df9619fd20");
            } elseif ($lote == 3) {
                header("Location: https://www.mercadopago.com.br/checkout/v1/redirect?pref_id=547002861-9fd5f3e1-528a-4dfc-a2de-e6c3e71b22a9");
            }
            exit();
        } else {
            echo "Erro ao registrar os dados: " . $conexao->error;
        }
    }
}
?>
