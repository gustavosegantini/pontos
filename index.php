<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Ponto</title>
    <link rel="stylesheet" href="styles.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <h1>Registro de Ponto</h1>

    <form id="cpfForm">
        <label for="cpf">CPF:</label>
        <input type="text" id="cpf" name="cpf" readonly>
        <input type="submit" value="Buscar">
    </form>

    <div id="tecladoNumerico">
        <!-- O teclado numérico será gerado pelo JavaScript -->
    </div>

    <!-- Modal -->
    <div id="modal" style="display: none;">
        <div id="modalContent">
            <h2>Informações do Funcionário</h2>
            <div id="infoFuncionario"></div>
            <div id="registroInfo"></div> <!-- Adicione esta linha -->
            <button id="registrarPonto">Registrar Ponto</button>
            <button id="fecharModal">Fechar</button>
        </div>
    </div>


    <script src="scripts.js"></script>
</body>

</html>