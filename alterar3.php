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