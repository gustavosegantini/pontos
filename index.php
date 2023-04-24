<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <title>Registro de Ponto</title>
    <link rel="stylesheet" href="styles.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <h1>Registro de Ponto</h1>
    <form id="cpfForm">
        <label for="cpf">CPF:</label>
        <input type="text" name="cpf" id="cpf" minlength="11" maxlength="11" readonly>
        <br>
        <div id="tecladoNumerico">
            <!-- Adicione os botões do teclado numérico aqui -->
        </div>
        <br>
        <input type="submit" value="Confirmar CPF">
    </form>
    <!-- Modal -->
    <div id="modal" style="display: none;">
        <div id="modalContent">
            <h2>Informações do Funcionário</h2>
            <div id="infoFuncionario"></div>
            <button id="registrarPonto">Registrar Ponto</button>
            <button id="fecharModal">Fechar</button>
        </div>
    </div>
    <script src="scripts.js"></script>
</body>

</html>