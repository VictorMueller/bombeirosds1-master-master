<?php
include("conecta1.php");

$nOcorrencia = $_GET["nOcorrencia"];

try {
    $pdo->beginTransaction();

    // Desativar temporariamente as restrições de chave estrangeira
    $pdo->exec('SET foreign_key_checks = 0');

    // Excluir o registro da tabela "paciente" em cascata
    $comando = $pdo->prepare("DELETE FROM paciente WHERE nOcorrencia=?");
    $comando->execute([$nOcorrencia]);

    // Reativar as restrições de chave estrangeira
    $pdo->exec('SET foreign_key_checks = 1');

    $pdo->commit();

    header("Location: pesquisar.php");
} catch (Exception $e) {
    $pdo->rollBack();
    echo "Erro: " . $e->getMessage();
}
?>
