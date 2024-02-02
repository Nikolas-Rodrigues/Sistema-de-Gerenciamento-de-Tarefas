<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Tarefa</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: lightgray;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }

        div {
            max-width: 400px;
            padding: 20px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        h2 {
            color: #333;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #333;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
        }

        button {
            background-color: #4caf50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
            margin-top: 10px;
        }

        button:hover {
            background-color: #45a049;
        }



        a {
            text-decoration: none;
            color: #333;
            display: block;
            margin-top: 10px;
        }
    </style>
</head>

<body>

    <div>
        <h2>Adicionar Tarefa</h2>

        <form method="post">
            <label for="descricao">Descrição:</label>
            <input type="text" id="descricao" name="descricao" required>

            <label for="responsavel">ID do Responsável:</label>
            <input type="number" id="responsavel" name="responsavel" required>

            <label for="prioridade">Prioridade:</label>
            <select id="prioridade" name="prioridade" required>
                <option value="Alta">Alta</option>
                <option value="Media">Média</option>
                <option value="Baixa">Baixa</option>
            </select>
            <br> 
            <br>

            <label for="estado">Estado:</label>
            <select id="estado" name="estado" required>
                <option value="Pendente">Pendente</option>
                <option value="Em_andamento">Em Andamento</option>
                <option value="Concluido">Concluído</option>
            </select>

            <button type="submit" onclick="popup_aviso()">Adicionar Tarefa</button>
        </form>

        <button onclick="redirecionarParaHome()">Ir para Home</button>
    </div>
    <script>
        function popup_aviso(){
            alert("Tarefa adicionada com sucesso")
        }
        function alterar_estado() {
            var idMudar = document.querySelector("#idUpdate").value;
            var opcaoSelecionada = document.querySelector('input[name="acao"]:checked').value;
            var prioridadeInput = document.querySelector("#prioridade");
            var estadoInput = document.querySelector("#estado");


        }

        function redirecionarParaHome() {
            window.location.href = 'menu.html';
        }
    </script>

</body>

</html>


