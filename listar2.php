<?php
        include_once("conecta.php");
        $url = 0;
        if($url==1)
        {
            echo('teste1');
            if($meuselect==1)
            {
                $comando = $pdo->prepare("SELECT * FROM paciente WHERE Sexo LIKE '%$texto%' ");
            }
            if($meuselect==1)
            {
                $comando = $pdo->prepare("SELECT * FROM paciente WHERE Nome_hospital LIKE '%$texto%' ");
            }
            if($meuselect==1)
            {
                $comando = $pdo->prepare("SELECT * FROM paciente WHERE Nomepac LIKE '%$texto%' ");
            }
            if($meuselect==1)
            {
                $comando = $pdo->prepare("SELECT * FROM paciente WHERE Idadepac LIKE '%$texto%' ");
            }
            if($meuselect==1)
            {
                $comando = $pdo->prepare("SELECT * FROM paciente WHERE CPFpac LIKE '%$texto%' ");
            }
            if($meuselect==1)
            {
                $comando = $pdo->prepare("SELECT * FROM paciente WHERE Telefone LIKE '%$texto%' ");
            }
            if($meuselect==1)
            {
                $comando = $pdo->prepare("SELECT * FROM paciente WHERE NOMEACOM LIKE '%$texto%' ");
            }
            if($meuselect==1)
            {
                $comando = $pdo->prepare("SELECT * FROM paciente WHERE IDADEACOM LIKE '%$texto%' ");
            }
            if($meuselect==1)
            {
                $comando = $pdo->prepare("SELECT * FROM paciente WHERE Localidade LIKE '%$texto%' ");
            }

        }
        else{
 
            $comando = $pdo->prepare("SELECT * FROM paciente WHERE Idadepac LIKE '%$texto%' ");
        }
        $comando->execute();
        
        
        if ($comando->rowCount() >= 1) {
            $lista_usuarios = $comando->fetchAll();
        } else {
            echo '';
        }
        
        unset($pdo);
        unset($comando);
        
        ?>

        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Document</title>
        </head>
        <body>
            
     
        </body>
        </html>