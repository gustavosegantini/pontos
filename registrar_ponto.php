<?php
include 'conexao.php';

$funcionario_id = $_POST['funcionario_id'];
$data = $_POST['data'];
$hora_entrada = $_POST['hora_entrada'];
$hora_saida = $_POST['hora_saida'];
$observacoes = $_POST['observacoes'];

$sql = "INSERT INTO registro_pontos (funcionario_id, data, hora_entrada, hora_saida, observacoes) VALUES ('$funcionario_id', '$data', '$hora_entrada', '$hora_saida', '$observacoes')";

if ($conn->query($sql) === TRUE) {
    echo "Registro de ponto inserido com sucesso";
} else {
    echo "Erro: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>