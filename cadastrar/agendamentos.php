<?php
require 'configs/functions.php';


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

<div class="card">
<div class="card-header">
        <strong>Cadastro de Agendamentos</strong>

        <div class="float-end">
            <a href="cadastrar/agendamentos" class="btn btn-success btn-sm">
                <i class="fas fa-file"></i> Novo Agendamento
            </a>
            <a href="listar/agendamentos" class="btn btn-info btn-sm">
                <i class="fas fa-search"></i> Listar Agendamento
            </a>
        </div>
    </div>
    </div>
    <div class="card-body">
        
        <form name="formagendamentos" method="post" action="salvar/agendamentos" data-parsley-validate="">



            <!-- Nome -->
            <label for="nome">Digite o nome do visitante:</label>
            <input type="text" name="nome" id="nome" class="form-control" required data-parsley-required-message="Por favor, preencha este campo" value="<?= $nome ?>">
            <br>

            <!-- Veiculo -->
            <label for="veiculo">Escolha o Veiculo</label>
            <select name="veiculo" id="veiculo" class="form-control" required data-parsley-required-message="Selecione um veiculo">
                <option value="">Selecione</option>
                <?php
                $sqlVeiculo = "Select * from veiculos order by Modelo";
                $consultaVeiculo = $pdo->prepare($sqlVeiculo);
                $consultaVeiculo->execute();

                while ($dadosVeiculo = $consultaVeiculo->fetch(PDO::FETCH_OBJ)) {
                ?>
                    <option value="<?= $dadosVeiculo->Modelo ?>">
                        <?= $dadosVeiculo->Modelo ?>
                    </option>

                <?php
                }
                ?>
            </select>
            <br>


            <!-- Motorista -->
            <label for="motorista">Escolha o Motorista</label>
            <select name="motorista" id="motorista" class="form-control" required data-parsley-required-message="Selecione um Motorista">
                <option value="">Selecione</option>
                <?php
                $sqlMotorista = "Select * from motoristas order by nome";
                $consultaMotorista = $pdo->prepare($sqlMotorista);
                $consultaMotorista->execute();

                while ($dadosMotorista = $consultaMotorista->fetch(PDO::FETCH_OBJ)) {
                ?>
                    <option value="<?= $dadosMotorista->nome ?>">
                        <?= $dadosMotorista->nome ?>
                    </option>

                <?php
                }
                ?>
            </select>
            <br>

            <!-- Data do Agendamento -->
            <label for="data">Data de agendamento</label>
            <input type="text" name="data" id="data" class="form-control" required data-parsley-required-message="Por favor, preencha este campo" value="<?= $data ?>">
            <br>


            <!-- Hora do Agendamento -->
            <label for="hora">Hora</label>
            <input type="time" name="hora" id="hora" class="form-control" required data-parsley-required-message="Por favor, preencha este campo" value="<?= $id ?>">
            <br>

            <!-- Motivo do Agendamento -->
            <label for="motivo">Motivo agendamento</label>
            <input type="text" name="motivo" id="motivo" class="form-control" required data-parsley-required-message="Por favor, preencha este campo" value="<?= $hora ?>">
            <br>

            <!-- Quantidade de pessoas que vão comparecer ao estabelecimento -->
            <label for="n_visitantes">Digite a quantidade de visitantes:</label>
            <input type="number" min="0" max="9" oninput="validity.valid||(value='')" name="n_visitantes" id="n_visitantes" class="form-control" required data-parsley-required-message="Por favor, preencha este campo" value="<?= $n_visitantes ?>">
            <br>

            <!-- Produto a ser transportado, seja ele coleta, ou entrega -->
            <label for="produto">Produto</label>
            <input type="text" name="produto" id="produto" class="form-control" required data-parsley-required-message="Por favor, preencha este campo" value="<?= $produto ?>">
            <br>
            
            <button type="submit" class="btn btn-success">
                <i class="fas fa-check"></i> Salvar Dados
            </button>

        </form>

    </div>
</div>


<script>
    VMasker(document.querySelector("#data")).maskPattern("99/99/9999")
</script>