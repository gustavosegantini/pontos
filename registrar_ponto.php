<?php
date_default_timezone_set('America/Sao_Paulo');
include '../conexao.php';

$cpf = $_POST['cpf'];

$sqlFuncionario = "SELECT id FROM funcionarios WHERE cpf='$cpf'";
$resultFuncionario = $conn->query($sqlFuncionario);
$funcionario = $resultFuncionario->fetch_assoc();
$funcionario_id = $funcionario['id'];

$data = date('Y-m-d');
$hora = date('H:i:s');

$sqlUltimoRegistro = "SELECT * FROM registro_pontos WHERE funcionario_id='$funcionario_id' AND data='$data' ORDER BY id DESC LIMIT 1";
$resultUltimoRegistro = $conn->query($sqlUltimoRegistro);
$ultimoRegistro = $resultUltimoRegistro->fetch_assoc();

if (!$ultimoRegistro || ($ultimoRegistro['hora_saida'] !== NULL)) {
    $sqlRegistro = "INSERT INTO registro_pontos (funcionario_id, data, hora_entrada) VALUES ('$funcionario_id', '$data', '$hora')";
    $nextEvent = "entrada";
} elseif ($ultimoRegistro['hora_entrada'] !== NULL && $ultimoRegistro['intervalo_entrada'] === NULL) {
    $sqlRegistro = "UPDATE registro_pontos SET intervalo_entrada='$hora' WHERE id='{$ultimoRegistro['id']}'";
    $nextEvent = "início do intervalo";
} elseif ($ultimoRegistro['intervalo_entrada'] !== NULL && $ultimoRegistro['intervalo_saida'] === NULL) {
    $sqlRegistro = "UPDATE registro_pontos SET intervalo_saida='$hora' WHERE id='{$ultimoRegistro['id']}'";
    $nextEvent = "fim do intervalo";
} elseif ($ultimoRegistro['intervalo_saida'] !== NULL && $ultimoRegistro['hora_saida'] === NULL) {
    $sqlRegistro = "UPDATE registro_pontos SET hora_saida='$hora' WHERE id='{$ultimoRegistro['id']}'";
    $nextEvent = "saída";
}

if ($conn->query($sqlRegistro) === TRUE) {
    echo json_encode(["success" => true, "nextEvent" => $nextEvent]);
} else {
    echo json_encode(["success" => false, "error" => $conn->error]);
}

$conn->close();
?>
