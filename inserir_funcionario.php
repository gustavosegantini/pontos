<?php
include '../conexao.php';

$nome = $_POST['nome'];
$email = $_POST['email'];
$cargo = $_POST['cargo'];
$data_admissao = $_POST['data_admissao'];
$cpf = $_POST['cpf'];

$sql = "INSERT INTO funcionarios (nome, email, cargo, data_admissao, cpf) VALUES ('$nome', '$email', '$cargo', '$data_admissao', '$cpf')";

if ($conn->query($sql) === TRUE) {
    echo "Funcionário cadastrado com sucesso";
} else {
    echo "Erro: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>