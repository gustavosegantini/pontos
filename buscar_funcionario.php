<?php
include '../conexao.php';

$cpf = $_POST['cpf'];

$sql = "SELECT * FROM funcionarios WHERE cpf='$cpf'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $funcionario = $result->fetch_assoc();
    echo json_encode(["employee" => $funcionario, "lastRecord" => array_merge($ultimoRegistro, ["date" => $dataDoUltimoRegistro])]);

} else {
    echo "";
}

$conn->close();
?>