<!DOCTYPE html>
<html>
<head>
  <title>Janela Web com Abas</title>
  <style>
    /* Estilo para a janela web */
    .janela-web {
      border: 1px solid #ccc;
      width: 300px;
      padding: 10px;
      height: 600px;
      max-height: 600px;
      overflow-y: auto;
      background-color: silver;
      position: relative;
    }
    
    /* Estilo para as abas */
    .abas {
      list-style: none;
      border-color: rgb(143, 137, 137);     
      padding: 0;
      margin: 0;
      display: flex;
    }
    
    .aba {
      padding: 20px 27.5px;
      margin-right: 5px;
      cursor: pointer;
      border: 1px solid #ccc;
      border-bottom: none;
      color: white;
      border-radius: 5px 5px 0 0;
      background-color: #e2353b;
      
    }
    
    .aba.ativa {
      background-color: #fff;
      border-bottom: 1px solid #ccc;
      color: black;
    }

    .principal{
        width: 100%;
     
        height: 100vh;
        display: flex;
        flex-direction: row;
        justify-content: center;
        justify-items: center;
        align-content: center;
        align-items: center;
        overflow: hidden;
    }

    /* Estilo para as páginas individuais */
    .pagina {
      width: 100%;
      height: calc(100% - 30px); /* Altura ajustada para acomodar as abas */
      position: absolute;
      display: none;
    }
    
    /* Mostra apenas a página ativa */
    .pagina.ativa {
      display: block;
    }

    .form-container {
    width: 300px; /* Alterado para 100% */
    background-color: #fff;
    padding: 30px;
      
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
    box-sizing: border-box; /* Adicionado para garantir que o padding não aumente a largura */
}


        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="password"],
        input[type="email"] {
            width: calc(100% - 22px);
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            outline: none;
            font-size: 14px;
        }

        input[type="text"]:focus,
        input[type="password"]:focus,
        input[type="email"]:focus {
            border-color: #e2353b;
        }

        .form-button {
            padding: 12px 20px;
            border: none;
            border-radius: 5px;
            background-color: #e2353b;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .form-button:hover {
            background-color: #4c7c7d;
        }

        .form-button:active {
            background-color: #3b5d5e;
        }

        h1 {
            text-align: center;
            margin-bottom: 30px;
            color: #e2353b;
        }

        .form-message {
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 5px;
            background-color: #ebccd1;
            color: #e2353b;
            display: none;
        }

        .form-message.success {
            background-color: #e2353b;
            color: white;
        }

        table.resultado {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    table.resultado th,
    table.resultado td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
        background-color: white; 
    }

    table.resultado th {
        background-color: white;
        color: #333;
    }

    table.resultado tr:nth-child() {
      background-color: silver;
    }

    table.resultado tr:hover {
        background-color: silver;
    }
  </style>
</head>
<body>
<div class="principal">


  <div class="janela-web">
    <ul class="abas">
      <li class="aba ativa" onclick="mostrarPagina(1)">C</li>
      <li class="aba" onclick="mostrarPagina(2)">D</li>
      <li class="aba" onclick="mostrarPagina(3)">L</li>
      
    </ul>
    <div class="pagina ativa" id="pagina1">
  
      <div class="form-container">
        <h1>Cadastro de Bombeiro</h1>
        <div class="form-message" id="formMessage"></div>
        <form id="registrationForm">
            <div class="form-group">
                <label for="login">Nome</label>
                <input type="text" id="login" name="nome" placeholder="Digite seu login" required>
            </div>
            <div class="form-group">
                <label for="senha">Senha</label>
                <input type="password" id="senha" name="senha" placeholder="Digite sua senha" required>
            </div>
            <div class="form-group">
                <label for="email">Cep</label>
                <input type="text" id="email" name="cep" placeholder="Digite seu cep" required>
            </div>
            <div class="form-group">
                <label for="email">Descrição</label>
                <input type="text" id="email" name="descricao" placeholder="Digite sua descrição" required>
            </div>
            
            <button type="button" class="form-button" onclick="submitRegistrationForm()">Enviar</button>
        </form>
      </div>
    </div>

    <div class="pagina " id="pagina2">
  
      <div class="form-container">
        <h1>Deletar Bombeiro</h1>
        <div class="form-message" id="formMessage"></div>
  <form id="registrationForm2">
    <div class="form-group">
        <label for="login">Pelo Nome</label>
        <input type="text" id="login" name="nome" placeholder="Digite o nome">
        <button type="button"  class="form-button" onclick="submitDeletionForm('N')">Enviar</button>

    </div>
    <div class="form-group">
        <label for="senha">Pelo ID</label>
        <input type="text" id="senha" name="id" placeholder="Digite o ID">
        <button type="button"  class="form-button" onclick="submitDeletionForm('I')">Enviar</button>

    </div>
</form>

      </div>
    </div>

    
    <div class="pagina " id="pagina3">
  
      <div class="form-container">
        <h1>Listar Bombeiro</h1>
        <div class="form-message" id="formMessage"></div>
        <form id="registrationForm3" >
        <div class="form-group">
        <label for="login">Pelo Nome</label>
        <input type="text" id="login" name="nome2" placeholder="Digite o nome">
        <button type="button" class="form-button"data-option="Listar1"onclick="submitListarForm()">Enviar</button>

    </div>

            
            
         
    </form>
      </div>

      <div class="lista-container">
        <h2>Lista de Bombeiros</h2>
        <div id="result" class="resultado">
          
            
          </div>
      </div>
    </div>

    
   
  




</div>

  


<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>

<script>
  function submitRegistrationForm() {
        const form = document.getElementById('registrationForm');
        const formMessage = document.getElementById('formMessage');
        const formData = new FormData(form);

        formData.append('tipoDeletar', '');

        $.ajax({
            type: 'POST',
            url: '../cadastrar.php',
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
                alert('Ta funcionando.')
            },
            error: function () {
                // Handle error and update UI
            }
        });
    }

    function submitDeletionForm(type) {
        const form = document.getElementById('registrationForm2');
        const formMessage = document.getElementById('formMessage');
        const formData = new FormData(form);

        formData.append('tipoDeletar', type);

        $.ajax({
            type: 'POST',
            url: '../deletar.php',
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
                // Handle success and update UI
            },
            error: function () {
                // Handle error and update UI
            }
        });
    }

    function submitListarForm() {
        const form = document.getElementById('registrationForm3');
        const formMessage = document.getElementById('formMessage');
        const formData = new FormData(form);

        formData.append('tipoDeletar', ''); // Assuming listar does not require tipoDeletar

        $.ajax({
            type: 'POST',
            url: '../listar.php',
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
                // Construct a table structure with received data
                var tableContent = '<table class="resultado"><tr><th>ID</th><th>Nome</th><th>Senha</th><th>Cep</th><th>Descricacao</th></tr>';
                tableContent += response; // Append the received data (table rows)

                tableContent += '</table>';

                // Replace the content of the result div with the created table
                $('#result').html(tableContent);
            },
            error: function () {
                // Handle error and update UI
            }
        });
    }
  

function mostrarPagina(numeroPagina) {
    const paginas = document.querySelectorAll('.pagina');
    const abas = document.querySelectorAll('.aba');

    paginas.forEach((pagina) => {
        pagina.classList.remove('ativa');
    });
    abas.forEach((aba) => {
        aba.classList.remove('ativa');
    });

    document.getElementById(`pagina${numeroPagina}`).classList.add('ativa');
    document.querySelectorAll('.aba')[numeroPagina - 1].classList.add('ativa');
}
</script>

</body>
</html>
