<?php
include '../conexao.php';

$cpf = $_POST['cpf'];

$sql = "SELECT * FROM funcionarios WHERE cpf='$cpf'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $funcionario = $result->fetch_assoc();
    $funcionario_id = $funcionario['id'];

    $sqlUltimoRegistro = "SELECT * FROM registro_pontos WHERE funcionario_id='$funcionario_id' ORDER BY id DESC LIMIT 1";
    $resultUltimoRegistro = $conn->query($sqlUltimoRegistro);
    $ultimoRegistro = $resultUltimoRegistro->fetch_assoc();

    $sqlDataDoUltimoRegistro = "SELECT MAX(data) as data FROM registro_pontos WHERE funcionario_id='$funcionario_id'";
    $resultDataDoUltimoRegistro = $conn->query($sqlDataDoUltimoRegistro);
    $dataDoUltimoRegistroRow = $resultDataDoUltimoRegistro->fetch_assoc();
    $dataDoUltimoRegistro = $dataDoUltimoRegistroRow ? $dataDoUltimoRegistroRow['data'] : null;

    if ($ultimoRegistro && $dataDoUltimoRegistro) {
        echo json_encode(["employee" => $funcionario, "lastRecord" => array_merge($ultimoRegistro, ["date" => $dataDoUltimoRegistro])]);
    } else {
        echo json_encode(["employee" => $funcionario, "lastRecord" => null]);
    }
} else {
    echo "";
}

$conn->close();
?>