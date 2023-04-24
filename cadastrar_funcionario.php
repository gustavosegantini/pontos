<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <title>Cadastrar Funcionário</title>
    <link rel="stylesheet" href="styles.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <h1>Cadastrar Funcionário</h1>
    <form id="cadastroFuncionario">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="nome" required>
        <br>
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required>
        <br>
        <label for="cargo">Cargo:</label>
        <input type="text" name="cargo" id="cargo" required>
        <br>
        <label for="data_admissao">Data de Admissão:</label>
        <input type="date" name="data_admissao" id="data_admissao" required>
        <br>
        <label for="cpf">CPF:</label>
        <input type="text" name="cpf" id="cpf" minlength="11" maxlength="11" required>
        <br>
        <input type="submit" value="Cadastrar Funcionário">
    </form>
    <script src="scripts.js"></script>
</body>

</html>