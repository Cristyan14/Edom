<?php
 
 if(isset($_POST['submit'])){

 include_once("config.php");
   $email = $_POST['email'];
   $nome = $_POST['nome'];
   $igreja = $_POST['igreja'];
   $telefone = $_POST['telefone'];

   $lote = $_POST['lote'];
   $cep = $_POST['cep'];
   $logradouro = $_POST['logradouro'];
   $numero = $_POST['numero'];
   $cidade = $_POST['cidade'];
   $estado = $_POST['estado'];
   $comando = "INSERT INTO pessoa(nome,telefone,igreja,email,lote,cep,pagamento_final) VALUES('$nome', '$telefone', '$igreja', '$email', '$lote','$cep', 'Ok')";
   $result = $conexao->query($comando);
  
 }
 ?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
 <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">  
 <meta charset="UTF-8">
 <meta http-equiv="cache-control" content="max-age=0" />
 <meta http-equiv="cache-control" content="no-cache" />
 <meta http-equiv="expires" content="0" />
 <meta http-equiv="expires" content="Tue, 01 Jan 1980 1:00:00 GMT" />
 <meta http-equiv="pragma" content="no-cache" />
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <link rel="stylesheet" href="css/style.css">
 <script src="js/lote.js"></script>
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
 <title>EDOM - 10º Edição</title>
 <link rel="icon" type="image/x-icon" href="img/logo.png">

 <script src="js/validar.js"></script>
 <script src="js/endereco.js"></script>


</head>
<body>




<h1 style="color:black;">Compra Reprovada!</h1>








 <script src="js/mobile.js"></script>
 <script src="js/lote.js"></script>
 <script src="js/validar.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
     integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
     crossorigin="anonymous"></script>
 <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


</body>
</html>