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

  <div id="num-pad">
    <input type="text" id="cpf" readonly>
    <div class="num" data-num="1">1</div>
    <div class="num" data-num="2">2</div>
    <div class="num" data-num="3">3</div>
    <div class="num" data-num="4">4</div>
    <div class="num" data-num="5">5</div>
    <div class="num" data-num="6">6</div>
    <div class="num" data-num="7">7</div>
    <div class="num" data-num="8">8</div>
    <div class="num" data-num="9">9</div>
    <div class="num" data-num="0">0</div>
    <div id="submit">Confirmar</div>
  </div>

  <!-- Modal -->
  <div id="modal" class="modal">
    <div class="modal-content">
      <span class="close">&times;</span>
      <h2>Detalhes do Registro de Ponto</h2>
      <p id="nome"></p>
      <p id="cargo"></p>
      <p id="hora_entrada"></p>
      <p id="intervalo_inicio"></p>
      <p id="intervalo_fim"></p>
      <p id="hora_saida"></p>
      <button id="confirmar">Confirmar Registro</button>
    </div>
  </div>

  <script src="index.js"></script>
</body>
</html>
