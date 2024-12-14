<?php

require_once 'vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

include_once("config.php"); // Inclua a configuração do banco de dados

if (isset($_POST['submit'])) {
    $emails = $_POST['email'];
    $nomes = $_POST['nome'];
    $igrejas = $_POST['igreja'];
    $telefones = $_POST['telefone'];
    $lotes = $_POST['lote'];
    $ceps = $_POST['cep'];

    // Verifica se $emails é um array
    if (is_array($emails)) {
        foreach ($emails as $index => $email) {
            $nome = $nomes[$index];
            $telefone = $telefones[$index];
            $cep = $ceps[$index];
            $igreja = $igrejas[$index];
            $lote = $lotes[$index];

            // Insere os dados na tabela pessoa
            $comando = "INSERT INTO pessoa(nome,telefone,igreja,email,lote,cep) 
                        VALUES('$nome', '$telefone', '$igreja', '$email', '$lote','$cep')";

            if ($conexao->query($comando) === TRUE) {
                $mail = new PHPMailer(true);
                try {
                    $mail->isSMTP();
                    $mail->SMTPDebug = 0;
                    $mail->SMTPAuth = true;
                    $mail->Username   = 'edommp2024@outlook.com';
                    $mail->Password   = 'DataShow2024!';
                    $mail->SMTPSecure = 'tls';
                    $mail->Host = 'smtp.office365.com';
                    $mail->Port = 587;
                    $mail->Timeout = 60;
                    $mail->SMTPOptions = array(
                        'ssl' => array(
                            'verify_peer' => false,
                            'verify_peer_name' => false,
                            'allow_self_signed' => true
                        )
                    );

                    $mail->setFrom('edommp2024@outlook.com', 'Mensageiros');
                    $mail->CharSet = 'UTF-8';
                    $mail->addAddress($email); // Adiciona um email de cada vez

                    $mail->isHTML(true);
                    $mail->Subject = 'Inscrição confirmada!';
                    $mail->Body    = "
                        <html>
                        <head>
                        <meta charset='UTF-8'>
                            <style>
                                body { font-family: Arial, sans-serif; }
                                .container { padding: 20px; }
                                .label { font-weight: bold; }
                            </style>
                        </head>
                        <body>
                            <div class='container'>
                                <p><span class='label'>Nome:</span> $nome</p>
                                <p><span class='label'>Email:</span> $email</p>
                                <p><span class='label'>Telefone:</span> $telefone</p>
                                <p><span class='label'>Igreja:</span> $igreja</p>
                                <p><span class='label'>CEP:</span> $cep</p>
                                <p><span class='label'>Lote:</span> $lote</p>
                                <br>
                                <p>Após realizar o pagamento, você receberá um contato em seu WhatsApp por parte da nossa equipe. Obrigado!</p>
                            </div>
                        </body>
                        </html>
                    ";
                    $mail->AltBody = 'Olá! Esta é uma mensagem automática.';
                    $mail->send();

                   

                } catch (Exception $e) {
                    echo "A mensagem não pôde ser enviada. Erro do Mailer: {$mail->ErrorInfo}";
                }
            } else {
                echo "Erro ao registrar os dados: " . $conexao->error;
            }
        }
        if ($lote == 1) {
            header("Location: https://www.mercadopago.com.br/checkout/v1/redirect?pref_id=547002861-ec1ea5f5-e85e-4255-a02f-638c398fc371");
        } elseif ($lote == 2) {
            header("Location: https://www.mercadopago.com.br/checkout/v1/redirect?pref_id=547002861-677f20e4-903d-4e0d-a597-e1df9619fd20");
        } elseif ($lote == 3) {
            header("Location: https://www.mercadopago.com.br/checkout/v1/redirect?pref_id=547002861-9fd5f3e1-528a-4dfc-a2de-e6c3e71b22a9");
        }
        exit();
    } else {
        echo "Nenhum email fornecido.";
    }
     // Redirecionamento com base no lote
   
} 

?>
