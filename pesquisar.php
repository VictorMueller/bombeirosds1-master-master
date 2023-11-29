<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesquisar</title>
    <style>
        body {
            font-family: 'Effra Heavy', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
        }

        .logo {
            display: block;
            margin: 20px auto;
        }

        .um {
            text-align: center;
            font-size: 24px;
            margin-bottom: 10px;
        }

        .dois {
            text-align: center;
            color: #555;
            margin-bottom: 20px;
        }

        .tres {
            max-width: 300px;
            margin: 0 auto;
        }

        .caixa {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            box-sizing: border-box;
        }

        .usuario,
        .senha {
            margin-bottom: 20px;
        }

        .entrar {
            background-color: #4CAF50;
            color: white;
            padding: 10px;
            width: 100%;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        .entrar:hover {
            background-color: #45a049;
        }

        .cadastro {
            text-align: center;
            margin-top: 20px;
        }

        a {
            text-decoration: none;
            color: #007BFF;
        }

        a:hover {
            text-decoration: underline;
        }

        #mensagemErro {
            color: red;
            margin-bottom: 10px;
            text-align: center;
        }

        /* Adicionei o estilo abaixo */
        select, input, button {
            margin: 10px;
        }

        .container {
            margin: 20px;
        }

        .tabela {
            width: 100%;
            border-collapse: collapse;
        }

        .tabela th, .tabela td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        .campo4 {
            margin-top: 20px;
            text-align: center;
        }

        .continuar {
            text-decoration: none;
            background-color: #007BFF;
            color: white;
            padding: 10px;
            border-radius: 5px;
            font-size: 16px;
        }

        .continuar:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <select id="pesquisa">
        <option value="1">Nome</option>
        <option value="2">Idade</option>
        <option value="3">CPF</option>
        <option value="4">Telefone</option>
    </select>
    <input size="5" type="text" id="texto">
    <button onclick="pesquisar();">OK</button>

    <div class="container">
        <table border="1" class="tabela">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Idade</th>
                    <th>CPF</th>
                    <th>Telefone</th>
                    <th colspan="2">Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $url = 0;
                    if (isset($_GET["o"])) {
                        $meuselect = $_GET["o"];
                        $url = 1;
                        $texto = $_GET["t"];
                    }
                    include_once("listar2.php");
                    if (!empty($lista_usuarios)) {
                        foreach ($lista_usuarios as $linha) {
                            echo '<tr>
                                    <td>' . $linha['nOcorrencia'] . '</td>
                                    <td>' . $linha['Nomepac'] . '</td>
                                    <td>' . $linha['Idadepac'] . '</td>
                                    <td>' . $linha['CPFpac'] . '</td>
                                    <td>' . $linha['Telefone'] . '</td>
                                    <td><a href="excluir2.php?nOcorrencia=' . $linha['nOcorrencia'] . '"><h3>Excluir</h3></a></td>
                                    <td><a href="alterar2.php?nOcorrencia=' . $linha['nOcorrencia'] . '"><h3>Alterar</h3></a></td>
                                </tr>';
                        }
                    }
                ?>
            </tbody>
        </table>
    </div>


    <div class="campo4">
        <a class="continuar" id="continuar" name="continuar" href="../pagina1.html">Voltar</a>
    </div>

    <div class="lista-container">
            <h2>Lista de Paciente</h2>
            <div id="result" class="resultado">
            
                
            </div>
        </div>
        </div>

    <script>
        function pesquisar() {
            p = pesquisa.value;
            t = texto.value;
            window.open("listar2.php?o=" + p + "&t=" + t, "_self");
        }

        $.ajax({
            type: 'POST',
            url: 'listar2.php?o=" + p + "&t=" + t, "_self',
            data: formData,
            p = pesquisa.value;
            t = texto.value;
            processData: false,
            contentType: false,
            success: function (response) {
              
                var tableContent = '<table class="resultado"><tr><th>ID</th><th>Nome</th><th>Idade</th><th>CPF</th><th>Telefone</th></tr>';
                tableContent += response;

                tableContent += '</table>';

               
                $('#result').html(tableContent);
            },
            error: function () {
               
            }
        });
    </script>
</body>
</html>
