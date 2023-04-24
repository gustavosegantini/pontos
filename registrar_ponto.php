<?php
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
} elseif ($ultimoRegistro['hora_entrada'] !== NULL && $ultimoRegistro['intervalo_inicio'] === NULL) {
    $sqlRegistro = "UPDATE registro_pontos SET intervalo_inicio='$hora' WHERE id='{$ultimoRegistro['id']}'";
    $nextEvent = "início do intervalo";
} elseif ($ultimoRegistro['intervalo_inicio'] !== NULL && $ultimoRegistro['intervalo_fim'] === NULL) {
    $sqlRegistro = "UPDATE registro_pontos SET intervalo_fim='$hora' WHERE id='{$ultimoRegistro['id']}'";
    $nextEvent = "fim do intervalo";
} elseif ($ultimoRegistro['intervalo_fim'] !== NULL && $ultimoRegistro['hora_saida'] === NULL) {
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