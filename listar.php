<?php
include("conecta.php");

$nome = $_POST['nome2'];



    $comando = $pdo->prepare("SELECT * FROM cadastro WHERE nome = :nome and ativo=1");
    $comando->bindParam(':nome', $nome);
    $resultado = $comando->execute();
  
    $data = '';

    $rows = $comando->fetchAll(PDO::FETCH_ASSOC);
  
    if (empty($rows)) {
        $data .= '<tr><td colspan="number_of_columns">No data found</td></tr>';
    } else {
        foreach ($rows as $linhas) {
            $data .= '<tr>';
            foreach ($linhas as $valor) {
                $data .= '<td>' . $valor . '</td>';
            }
            $data .= '</tr>';
        }
    }

    echo $data;


?>
