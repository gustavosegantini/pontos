$(document).ready(function () {
    let cpf = "";
    let nextEvent = "entrada";
    let funcionarioId;

    $(".num").click(function () {
        if (cpf.length < 11) {
            cpf += $(this).data("num");
            $("#cpf").val(cpf);
        }
    });

    $("#submit").click(function () {
        if (cpf.length === 11) {
            // Buscar informações do funcionário pelo CPF
            $.post("buscar_funcionario.php", { cpf }, function (response) {
                const data = JSON.parse(response);

                if (data.success) {
                    funcionarioId = data.funcionario.id;
                    nextEvent = data.nextEvent;

                    // Atualizar informações no modal
                    $("#nome").text("Nome: " + data.funcionario.nome);
                    $("#cargo").text("Cargo: " + data.funcionario.cargo);

                    // Exibir informações de registro de ponto, se disponíveis
                    $("#hora_entrada").text(data.hora_entrada ? "Horário de Entrada: " + data.hora_entrada : "");
                    $("#intervalo_inicio").text(data.intervalo_inicio ? "Início do Intervalo: " + data.intervalo_inicio : "");
                    $("#intervalo_fim").text(data.intervalo_fim ? "Fim do Intervalo: " + data.intervalo_fim : "");
                    $("#hora_saida").text(data.hora_saida ? "Horário de Saída: " + data.hora_saida : "");

                    // Exibir o modal
                    showModal();
                } else {
                    alert("CPF não encontrado.");
                }
            });
        }
    });

    function showModal() {
        const modal = document.getElementById("modal");
        const span = document.getElementsByClassName("close")[0];

        modal.style.display = "block";

        span.onclick = function () {
            modal.style.display = "none";
        };

        window.onclick = function (event) {
            if (event.target === modal) {
                modal.style.display = "none";
            }
        };
    }

    $("#confirmar").click(function () {
        $.post("registrar_ponto.php", { funcionarioId, nextEvent }, function (response) {
            const data = JSON.parse(response);

            if (data.success) {
                alert("Registro de " + nextEvent + " confirmado.");
                location.reload();
            } else {
                alert("Erro ao registrar o ponto.");
            }
        });
    });
});
