<?php
include '../conexao.php';

$cpf = $_POST['cpf'];

$sqlFuncionario = "SELECT id FROM funcionarios WHERE cpf='$cpf'";
$resultFuncionario = $conn->query($sqlFuncionario);
$funcionario = $resultFuncionario->fetch_assoc();
$funcionario_id = $funcionario['id'];

$data = date('Y-m-d');
$hora_entrada = date('H:i:s');

$sqlRegistro = "INSERT INTO registro_pontos (funcionario_id, data, hora_entrada) VALUES ('$funcionario_id', '$data', '$hora_entrada')";

if ($conn->query($sqlRegistro) === TRUE) {
    echo "Ponto registrado com sucesso";
} else {
    echo "Erro: " . $sqlRegistro . "<br>" . $conn->error;
}

$conn->close();
?>