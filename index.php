<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tarefas</title>
    <style>
        body {
            align-items: center;
            align-self: center;
        }

        button {
            background-color: #4caf50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 20%;
            margin-top: 10px;
        }

        button:hover {
            background-color: #45a049;


        }

        table {
            margin: auto;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid black;
            text-align: left;
            padding: 8px;
        }


        td:nth-child(1) {
            width: 50px;
        }

        td:nth-child(2) {
            width: 200px;
        }

        td:nth-child(3) {
            width: 200px;
        }

        td:nth-child(4) {
            width: 120px;
        }

        #desc_tabela {
            text-align: center;
            padding-top: 10px;
        }

        #tabela {
            font-size: 40px;

        }
    </style>
</head>

<body bgcolor="lightgray">

    <button onclick="redirecionarParaHome()">Ir para Home</button>
    <br>
    <br>
    <div id="desc_tabela">
        <text id="tabela">Tabela de Funcionarios</text>
    </div>
    <?php
    $hostname = "localhost";
    $bancodedados = "projeto";
    $usuario = "root";
    $senha = "";

    $mysqli = new mysqli($hostname, $usuario, $senha, $bancodedados);
    if ($mysqli->connect_errno) {
        echo "Falha ao conectar: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    } else {
        // Consulta para a tabela de funcionários
        $consultaFuncionarios = "SELECT * FROM Funcionario ORDER BY Id ASC";
        $resultadoFuncionarios = $mysqli->query($consultaFuncionarios);

        // Consulta para a tabela de tarefas
        $consultaTarefas = "SELECT * FROM Tarefa ORDER BY Prioridade ASC, Estado DESC";
        $resultadoTarefas = $mysqli->query($consultaTarefas);

        // Verificar se as consultas foram bem-sucedidas
        if ($resultadoFuncionarios && $resultadoTarefas) {
            // Tabela de Funcionários
            echo '<table id="funcionarioTable" class="hidden">';
            // Cabeçalho da tabela de funcionários
            echo '<tr>';
            echo '<th>ID</th>';
            echo '<th>Nome</th>';
            echo '<th>Email</th>';
            echo '<th>Telefone</th>';
            echo '</tr>';
            // Exibir os resultados da tabela de funcionários
            while ($linha = $resultadoFuncionarios->fetch_assoc()) {
                echo '<tr>';
                echo '<td>' . $linha['Id'] . '</td>';
                echo '<td>' . $linha['Nome'] . '</td>';
                echo '<td>' . $linha['Email'] . '</td>';
                echo '<td>' . $linha['Telefone'] . '</td>';
                echo '</tr>';
            }
            echo '</table>';
    ?>
            <div id="desc_tabela">
                <text id="tabela">Tabela de Tarefas</text>
            </div>
    <?php

            // Tabela de Tarefas
            echo '<table id="tarefaTable" class="hidden">';
            // Cabeçalho da tabela de tarefas
            echo '<tr>';
            echo '<th>id</th>';
            echo '<th>Descrição</th>';
            echo '<th>ID Do Responsável</th>';
            echo '<th>Prioridade</th>';
            echo '<th>Estado</th>';
            echo '</tr>';
            // Exibir os resultados da tabela de tarefas
            while ($linha = $resultadoTarefas->fetch_assoc()) {
                echo '<tr>';
                echo '<td>' . $linha['id'] . '</td>';
                echo '<td>' . $linha['Descricao'] . '</td>';
                echo '<td>' . $linha['Id_Do_Responsavel'] . '</td>';
                echo '<td>' . $linha['Prioridade'] . '</td>';
                echo '<td>' . $linha['Estado'] . '</td>';
                echo '</tr>';
            }
            echo '</table>';
        } else {
            // Se alguma consulta falhou, exibir mensagem de erro
            echo 'Erro na consulta: ' . $mysqli->error;
        }

        // Fechar a conexão
        $mysqli->close();
    }
    ?>



    <script>
        function redirecionarParaHome() {

            window.location.href = 'menu.html';
        }
    </script>

</body>

</html>