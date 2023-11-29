<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<form action="alterar2  .php" method="POST">
    <input type="text" name="nome"> 
    <input type="submit" name="nomebotao"> 
</form>
</body>
</html>
<?php
include("conecta1.php");

$nome = $_POST["nome"];
$nOcorrencia = $_GET["nOcorrencia"];

if (isset($_POST["nomebotao"])) {
    $comando = $pdo->prepare("UPDATE paciente SET Nomepac='$nome' WHERE nOcorrencia='$nOcorrencia'");
    $resultado = $comando->execute();
    header("Location: pesquisar.php");
  }

?>
