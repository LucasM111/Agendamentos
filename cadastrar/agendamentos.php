<?php
require 'configs/functions.php';
require 'configs/validacao.php';


if (!isset($pagina))
    exit;

//verificar se o id não está vazio
if (!empty($id)) {
    $sqlAgendamentos = "select * from agendamentos where id = :id limit 1";
    $consultaAgendamentos = $pdo->prepare($sqlAgendamentos);
    $consultaAgendamentos->bindParam(":id", $id);
    $consultaAgendamentos->execute();

    $dados = $consultaAgendamentos->fetch(PDO::FETCH_OBJ);
}

$id = $dados->id ?? NULL;
$nome = $dados->nome ?? NULL;
$veiculo = $dados->veiculo ?? NULL;
$motorista = $dados->motorista ?? NULL;
$data = $dados->data ?? NULL;
$hora = $dados->hora ?? NULL;
$motivo = $dados->motivo ?? NULL;
$n_visitantes = $dados->n_visitantes ?? NULL;
$produto = $dados->produto ?? NULL;

?>

<body>
    <div class="cadastramento">
        <div class="card">
            <div class="card-header">
                <strong>Cadastro de Agendamentos</strong>

                <div class="float-end">
                    <a href="cadastrar/agendamentos" class="btn btn-success btn-sm">
                        <i class="fas fa-file"></i> Novo Agendamento
                    </a>
                    <a href="listar/agendamentos" class="btn btn-info btn-sm">
                        <i class="fas fa-search"></i> Lista de Agendamentos
                    </a>
                </div>
            </div>
            <div class="card-body">

                <form name="formagendamentos" method="post" action="salvar/agendamentos" data-parsley-validate="">

                    <input type="text" name="id" id="id" class="form-control" readonly value="<?= $id ?>" hidden>



                    <!-- Nome -->
                    <input type="text" maxlength="100" name="nome" id="nome" class="form-control" required data-parsley-required-message="Por favor, preencha este campo" value="<<?= $_SESSION["usuarioAdm"]["nome"] ?>>" hidden>

                    <div class="campos-obrigatorios">
                        <p>* Campos com preenchimento Obrigatório.</p>
                    </div>

                    <!-- Veiculo -->
                    <label for="veiculo" class="campo-obrigatorio">Escolha o Veiculo</label>
                    <select name="veiculo" id="veiculo" class="form-control" required data-parsley-required-message="Selecione um veiculo">
                        <option value="">Selecione</option>
                        <?php
                        $sqlVeiculo = "Select * from veiculos order by Modelo";
                        $consultaVeiculo = $pdo->prepare($sqlVeiculo);
                        $consultaVeiculo->execute();

                        while ($dadosVeiculo = $consultaVeiculo->fetch(PDO::FETCH_OBJ)) {
                        ?>
                            <option value="<?= $dadosVeiculo->Modelo ?> - Placa: <?= $dadosVeiculo->placa ?>">
                                <?= $dadosVeiculo->Modelo ?>
                                - Placa: <?= $dadosVeiculo->placa ?>
                            </option>

                        <?php
                        }
                        ?>
                    </select>
                    <br>


                    <!-- Motorista -->
                    <label for="motorista" class="campo-obrigatorio">Escolha o Motorista</label>
                    <select name="motorista" id="motorista" class="form-control" required data-parsley-required-message="Selecione um Motorista">
                        <option value="">Selecione</option>
                        <?php
                        $sqlMotorista = "Select * from motoristas order by nome";
                        $consultaMotorista = $pdo->prepare($sqlMotorista);
                        $consultaMotorista->execute();

                        while ($dadosMotorista = $consultaMotorista->fetch(PDO::FETCH_OBJ)) {
                        ?>
                            <option value="<?= $dadosMotorista->nome ?> <?= $dadosMotorista->sobrenome ?>">
                                <?= $dadosMotorista->nome ?>
                                <?= $dadosMotorista->sobrenome ?>
                            </option>

                        <?php
                        }
                        ?>
                    </select>
                    <br>

                    <!-- Data do Agendamento -->
                    <label for="data" class="campo-obrigatorio">Data de agendamento</label>
                    <input type="text" name="data" id="data" class="form-control" required data-parsley-required-message="Por favor, preencha este campo" value="<?= $data ?>">
                    <br>

                    <!-- Hora do Agendamento -->
                    <label for="hora" class="campo-obrigatorio">Horário Agendamento</label>
                    <select type="time" name="hora" id="hora" class="form-control" required data-parsley-required-message="Selecione o Horário da Visita">
                        <option value="">Selecione</option>
                        <option value="09:00">09:00</option>
                        <option value="10:00">10:00</option>
                        <option value="11:00">11:00</option>
                        <option value="12:00">12:00</option>
                        <option value="14:00">14:00</option>
                        <option value="15:00">15:00</option>
                        <option value="16:00">16:00</option>
                        <option value="17:00">17:00</option>
                    </select>
                    <script>
                        $("#hora").val("<?= $hora ?>");
                    </script>
                    <br>

                    <!-- Motivo do Agendamento -->
                    <label for="motivo" class="campo-obrigatorio">Motivo do Agendamento</label>
                    <select name="motivo" id="motivo" class="form-control" required data-parsley-required-message="Selecione o motivo da visita">
                        <option value="">Selecione</option>
                        <option value="Entrega de Produtos">Entrega de Produtos</option>
                        <option value="Coleta de Produtos">Coleta de Produtos</option>
                    </select>
                    <script>
                        $("#motivo").val("<?= $motivo ?>");
                    </script>

                    <br>

                    <!-- Quantidade de pessoas que vão comparecer ao estabelecimento -->
                    <label for="n_visitantes" class="campo-obrigatorio">Digite a quantidade de visitantes</label>
                    <input type="number" min="1" max="9" oninput="validity.valid||(value='')" name="n_visitantes" id="n_visitantes" class="form-control" required data-parsley-required-message="Por favor, preencha este campo" value="<?= $n_visitantes ?>">
                    <br>

                    <!-- Produto a ser transportado, seja ele coleta, ou entrega -->
                    <label for="produto" class="campo-obrigatorio">Produto</label>
                    <input type="text" maxlength="100" name="produto" id="produto" class="form-control" required data-parsley-required-message="Por favor, preencha este campo" value="">
                    <br>

                    <button type="submit" class="btn btn-success" id="btnSalvar">
                        <i class="fas fa-check"></i> Salvar Dados
                    </button>
                </form>
                <br>

            </div>
        </div>
    </div>
</body>
<br>
<br>
<script>
    VMasker(document.querySelector("#data")).maskPattern("99/99/9999");

    // Função para verificar campos e habilitar/desabilitar o botão de salvar
    function verificarCamposAgendamentos() {
        // Obtém todos os valores dos campos
        var nome = document.getElementById("nome").value;
        var veiculo = document.getElementById("veiculo").value;
        var motorista = document.getElementById("motorista").value;
        var data = document.getElementById("data").value;
        var hora = document.getElementById("hora").value;
        var motivo = document.getElementById("motivo").value;
        var n_visitantes = document.getElementById("n_visitantes").value;
        var produto = document.getElementById("produto").value;

        // Obtém o botão de salvar
        var btnSalvar = document.getElementById("btnSalvar");

        // Verifica se todos os campos estão preenchidos
        var todosPreenchidos = nome && veiculo && motorista && data && hora && motivo && n_visitantes && produto;

        // Habilita/desabilita o botão com base na verificação
        btnSalvar.disabled = !todosPreenchidos;
    }

    // Adiciona o evento oninput para cada campo
    document.getElementById("nome").addEventListener("input", verificarCamposAgendamentos);
    document.getElementById("veiculo").addEventListener("input", verificarCamposAgendamentos);
    document.getElementById("motorista").addEventListener("input", verificarCamposAgendamentos);
    document.getElementById("data").addEventListener("input", verificarCamposAgendamentos);
    document.getElementById("hora").addEventListener("input", verificarCamposAgendamentos);
    document.getElementById("motivo").addEventListener("input", verificarCamposAgendamentos);
    document.getElementById("n_visitantes").addEventListener("input", verificarCamposAgendamentos);
    document.getElementById("produto").addEventListener("input", verificarCamposAgendamentos);

    // Chama a função uma vez para garantir que o botão esteja no estado correto inicialmente
    verificarCamposAgendamentos();
</script>