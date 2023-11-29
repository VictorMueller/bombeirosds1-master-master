<?php
include("conecta.php");
$nome = $_POST["nome"];
$id = $_POST["id"];

if (isset($_POST['tipoDeletar'])) {
    $tipoDeletar = $_POST['tipoDeletar'];

    if ($tipoDeletar === 'N') {
        $nome = $_POST['nome'];
      
        $comando = $pdo->prepare("UPDATE cadastro SET ativo=0 WHERE id =:id");
        $comando->bindParam(':id', $id);
        $resultado = $comando->execute();
    } elseif ($tipoDeletar === 'I') {
        $id = $_POST['id'];
        
        $comando = $pdo->prepare("UPDATE cadastro SET ativo=0 WHERE id =:id");
        $comando->bindParam(':id', $id);
        $resultado = $comando->execute();
    }
}
?>
