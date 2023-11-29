<?php
include("conecta.php");
$login = $_POST["login"];
$senha     = $_POST["senha"];
$cep   = $_POST["cep"];
$descricao   = $_POST["descricao"];
//SE CLICOU NO BOTÃO INSERIR

$comando = $pdo->prepare("INSERT INTO cadastro (nome, senha, cep, descricao_pessoal) VALUES (:nome, :senha, :cep, :descricao)");
$comando->bindParam(':nome', $login);
$comando->bindParam(':senha', $senha);
$comando->bindParam(':cep', $cep);
$comando->bindParam(':descricao', $descricao);
$resultado = $comando->execute();



header("Location: html/login.html");

?>



