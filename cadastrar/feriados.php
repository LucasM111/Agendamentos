<?php
require 'configs/functions.php';

// Verificar se a categoria do usuário é "funcionário" para permitir o acesso
if ($_SESSION["usuarioAdm"]["categoria"] !== "Funcionario") {
    // Se não for funcionario
    mensagem("Erro", "Voce não tem permição para acessar essa pagina");
    exit;
}
// Caso seja funcionario


if (!isset($pagina))
    exit;

//verificar se o id não está vazio
if (!empty($id)) {
    $sqlFeriados = "select * from feriados where id = :id limit 1";
    $consultaFeriados = $pdo->prepare($sqlFeriados);
    $consultaFeriados->bindParam(":id", $id);
    $consultaFeriados->execute();

    $dados = $consultaFeriados->fetch(PDO::FETCH_OBJ);
}

$id = $dados->id ?? NULL;
$data = $dados->data ?? NULL;
$feriado = $dados->feriado ?? NULL;

?>



<div class="cadastramento">
    <div class="card">
        <div class="card-header">
            <strong>Cadastro de Feriados</strong>

            <div class="float-end">
                <a href="cadastrar/feriados" class="btn btn-success btn-sm" title="Novo registro">
                    <i class="fas fa-file"></i> Cadastrar Feriados
                </a>
                <a href="listar/feriados" class="btn btn-info btn-sm">
                    <i class="fas fa-search"></i> Lista de Feriados
                </a>
            </div>
        </div>
        <div class="card-body">
            <form name="formveiculos" method="post" action="salvar/feriados" data-parsley-validate="">

                <input type="text" name="id" id="id" class="form-control" readonly value="<?= $id ?>" hidden>

                <div class="campos-obrigatorios">
                    <p>* Campos com preenchimento Obrigatório.</p>
                </div>

                <!-- Data -->
                <label for="data" class="campo-obrigatorio">Data de agendamento</label>
                <input type="text" name="data" id="data" class="form-control" required
                    data-parsley-required-message="Por favor, preencha este campo" value="<?= $data ?>">
                <br>

                <!-- Feriados -->
                <label for="feriado" class="campo-obrigatorio">Digite o nome do Feriado</label>
                <input type="text" maxlength="100" name="feriado" id="feriado" class="form-control" required
                    data-parsley-required-message="Por favor, preencha este campo" value="<?= $feriado ?>">
                <br>


                <button type="submit" class="btn btn-success">
                    <i class="fas fa-check"></i> Salvar Dados
                </button>
            </form>
            <br>
        </div>
    </div>
</div>
<br>
<br>
<script>
VMasker(document.querySelector("#data")).maskPattern("99/99/9999");

// Função para verificar campos e habilitar/desabilitar o botão de salvar
function verificarCamposFeriados() {
    // Obtém todos os valores dos campos
    var data = document.getElementById("data").value;
    var feriado = document.getElementById("feriado").value;

    // Obtém o botão de salvar
    var btnSalvar = document.querySelector("button[type='submit']");

    // Verifica se todos os campos estão preenchidos
    var todosPreenchidos = data && feriado;

    // Habilita/desabilita o botão com base na verificação
    btnSalvar.disabled = !todosPreenchidos;
}

// Adiciona o evento oninput para cada campo
document.getElementById("data").addEventListener("input", verificarCamposFeriados);
document.getElementById("feriado").addEventListener("input", verificarCamposFeriados);

// Chama a função
verificarCamposFeriados();
</script>