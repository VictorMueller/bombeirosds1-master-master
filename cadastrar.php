<?php
include("conecta.php");
$nome = $_POST["nome"];
$senha  = $_POST["senha"];
$cep  = $_POST["cep"];
$descricao   = $_POST["descricao"];


$comando = $pdo->prepare("INSERT INTO cadastro (nome, senha, cep, descricao,ativo) VALUES (:nome, :senha, :cep, :descricao,1)");
$comando->bindParam(':nome', $nome);
$comando->bindParam(':senha', $senha);
$comando->bindParam(':cep', $cep);
$comando->bindParam(':descricao', $descricao);
$resultado = $comando->execute();





?>



