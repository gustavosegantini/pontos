<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <title>Registro de Ponto</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <h1>Registro de Ponto</h1>
    <form action="registrar_ponto.php" method="post">
        <label for="funcionario_id">Funcionário:</label>
        <select name="funcionario_id" id="funcionario_id">
            <?php
            include 'conexao.php';
            $sql = "SELECT id, nome FROM funcionarios";
            $result = $conn->query($sql);

            while ($row = $result->fetch_assoc()) {
                echo '<option value="' . $row['id'] . '">' . $row['nome'] . '</option>';
            }
            $conn->close();
            ?>
        </select>
        <br>
        <label for="data">Data:</label>
        <input type="date" name="data" id="data" required>
        <br>
        <label for="hora_entrada">Hora de Entrada:</label>
        <input type="time" name="hora_entrada" id="hora_entrada" required>
        <br>
        <label for="hora_saida">Hora de Saída:</label>
        <input type="time" name="hora_saida" id="hora_saida">
        <br>
        <label for="observacoes">Observações:</label>
        <textarea name="observacoes" id="observacoes"></textarea>
        <br>
        <input type="submit" value="Registrar Ponto">
    </form>
</body>

</html>