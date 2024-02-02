<?php
$hostname = "localhost";
$bancodedados = "projeto";
$usuario = "root";
$senha = "";

$mysqli = new mysqli($hostname, $usuario, $senha, $bancodedados);

if ($mysqli->connect_errno) {
    echo "Falha ao conectar: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
} else {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $idMudar = $_POST["idUpdate"];
        $opcaoSelecionada = $_POST["acao"];
        $modificacaoSelecionada = $_POST["modificacao"];
        $novoValor = $mysqli->real_escape_string($_POST["novoValor"]);

        if (!is_numeric($idMudar) || $idMudar < 0) {
            echo "ID inválido.";
        } else {
            if ($opcaoSelecionada === 'alterar') {
                $query = "UPDATE Tarefa SET $modificacaoSelecionada = '$novoValor' WHERE id = $idMudar";
            } elseif ($opcaoSelecionada === 'remover') {
                $query = "DELETE FROM Tarefa WHERE id = $idMudar";
            } else {
                echo "Opção inválida.";
                exit;
            }

            if ($mysqli->query($query)) {
                echo ($opcaoSelecionada === 'alterar') ? "Mudança realizada com sucesso!" : "Tarefa removida com sucesso!";
            } else {
                echo "Erro: " . $mysqli->error;
            }
        }
    }
    $mysqli->close();
}
?>
