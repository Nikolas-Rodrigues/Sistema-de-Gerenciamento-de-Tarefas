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
        $descricao = $_POST["descricao"];
        $responsavel = $_POST["responsavel"];
        $prioridade = $_POST["prioridade"];
        $estado = $_POST["estado"];

        $inserirTarefa = "INSERT INTO Tarefa (Descricao, Id_Do_Responsavel, Prioridade, Estado) 
                          VALUES ('$descricao', '$responsavel', '$prioridade', '$estado')";

        if ($mysqli->query($inserirTarefa)) {
            echo "Tarefa adicionada com sucesso!";
        } else {
            echo "Erro ao adicionar tarefa: " . $mysqli->error;
        }
    }
    $mysqli->close();
}
?>
<html>


</html>