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
        $novoValor = $_POST["novoValor"];

        if (!is_numeric($idMudar) || $idMudar < 0) {
            echo "ID inválido.";
        } else {
            if ($opcaoSelecionada === 'remover') {
                $query = "DELETE FROM Tarefa WHERE id = $idMudar";

                if ($mysqli->query($query)) {
                    echo "Tarefa removida com sucesso!";
                } else {
                    echo "Erro ao remover tarefa: " . $mysqli->error;
                }
            }

            if ($opcaoSelecionada === 'alterar') {
                if ($modificacaoSelecionada === "responsavel" || $modificacaoSelecionada === "descricao") {
                    $query = "UPDATE Tarefa SET $modificacaoSelecionada = '$novoValor' WHERE id = $idMudar";
                } elseif ($modificacaoSelecionada === "prioridade" || $modificacaoSelecionada === "estado") {
                    $query = "UPDATE Tarefa SET $modificacaoSelecionada = '$novoValor' WHERE id = $idMudar";
                } else {
                    echo "Opção de modificação inválida.";
                    exit;
                }

                if ($mysqli->query($query)) {
                    echo "Mudança realizada com sucesso!";
                } else {
                    echo "Erro: " . $mysqli->error;
                }
            }
        }
    }

    $mysqli->close();
}
?>
