// Cadastrar funcionário
$("#cadastroFuncionario").on("submit", function (e) {
    e.preventDefault();
    const data = $(this).serialize();

    $.post("inserir_funcionario.php", data, function (response) {
        alert(response);
        $("#cadastroFuncionario")[0].reset();
    });
});

// Teclado numérico
const cpfInput = $("#cpf");
for (let i = 1; i <= 9; i++) {
    $("#tecladoNumerico").append(
        `<button class="numeroTeclado" data-value="${i}">${i}</button>`
    );
}
$("#tecladoNumerico").append(`<button id="apagarCPF">Apagar</button>`);
$("#tecladoNumerico").append(`<button class="numeroTeclado" data-value="0">0</button>`);

$(".numeroTeclado").on("click", function () {
    const currentValue = cpfInput.val();
    if (currentValue.length < 11) {
        cpfInput.val(currentValue + $(this).data("value"));
    }
});

$("#apagarCPF").on("click", function () {
    cpfInput.val("");
});

// Modal
const modal = $("#modal");
const infoFuncionario = $("#infoFuncionario");

$("#cpfForm").on("submit", function (e) {
    e.preventDefault();
    const cpf = cpfInput.val();

    if (cpf.length === 11) {
        $.post("buscar_funcionario.php", { cpf }, function (response) {
            if (response) {
                const funcionario = JSON.parse(response);
                infoFuncionario.html(`
            <p>Nome: ${funcionario.nome}</p>
            <p>Cargo: ${funcionario.cargo}</p>
            <p>Entrada: ${funcionario.hora_entrada || '-'}</p>
            <p>Início do Intervalo: ${funcionario.intervalo_inicio || '-'}</p>
            <p>Fim do Intervalo: ${funcionario.intervalo_fim || '-'}</p>
            <p>Saída: ${funcionario.hora_saida || '-'}</p>
            `);
                modal.show();
            } else {
                alert("Funcionário não encontrado.");
            }
        });
    } else {
        alert("Por favor, insira um CPF válido.");
    }
});

$("#fecharModal").on("click", function () {
    modal.hide();
});

$("#registrarPonto").on("click", function () {
    const cpf = cpfInput.val();
    $.post("registrar_ponto.php", { cpf }, function (response) {
        const jsonResponse = JSON.parse(response);
        if (jsonResponse.success) {
            alert(`Ponto registrado com sucesso. Próximo registro: ${jsonResponse.nextEvent}`);
        } else {
            alert("Erro ao registrar ponto: " + jsonResponse.error);
        }
        cpfInput.val("");
        modal.hide();
    });
});