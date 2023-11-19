<?php
if (!isset($pagina))
    exit;

//verificar se o id não está vazio
if (!empty($id)) {
    $sqlMotorista = "select * from motoristas where id = :id limit 1";
    $consultaMotorista = $pdo->prepare($sqlMotorista);
    $consultaMotorista->bindParam(":id", $id);
    $consultaMotorista->execute();

    $dados = $consultaMotorista->fetch(PDO::FETCH_OBJ);
}

$id = $dados->id ?? NULL;
$nome = $dados->nome ?? NULL;
$sobrenome = $dados->sobrenome ?? NULL;

?>



<div class="cadastramento">
    <div class="card">
        <div class="card-header">
            <strong>Cadastro de Motoristas</strong>


            <div class="float-end">
                <a href="cadastrar/motoristas" class="btn btn-success btn-sm" title="Novo registro">
                    <i class="fas fa-file"></i> Cadastrar Motorista
                </a>
                <a href="listar/motoristas" class="btn btn-info btn-sm">
                    <i class="fas fa-search"></i> Lista de Motoristas
                </a>
            </div>
        </div>
        <div class="card-body">
            <form name="formveiculos" method="post" action="salvar/motoristas" data-parsley-validate="">

                <input type="text" name="id" id="id" class="form-control" readonly value="<?= $id ?>" hidden>

                <div class="campos-obrigatorios">
                    <p>* Campos com preenchimento Obrigatório.</p>
                </div>

                <!-- Nome -->
                <label for="nome" class="campo-obrigatorio">Digite o Nome Motorista</label>
                <input type="text" maxlength="100" name="nome" id="nome" class="form-control" required
                    data-parsley-required-message="Por favor, preencha este campo" value="">
                <br>

                <!-- Sobrenome -->
                <label for="sobrenome" class="campo-obrigatorio">Digite o Sobrenome do Motorista</label>
                <input type="text" maxlength="100" name="sobrenome" id="sobrenome" class="form-control" required
                    data-parsley-required-message="Por favor, preencha este campo" value="">
                <br>


                <button type="submit" class="btn btn-success" id="btnSalvar">
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
// Função para verificar campos e habilitar/desabilitar o botão de salvar
function verificarCamposMotoristas() {
    // Obtém todos os valores dos campos
    var nome = document.getElementById("nome").value;
    var sobrenome = document.getElementById("sobrenome").value;

    // Obtém o botão de salvar
    var btnSalvar = document.getElementById("btnSalvar");

    // Verifica se todos os campos estão preenchidos
    var todosPreenchidos = nome && sobrenome;

    // Habilita/desabilita o botão com base na verificação
    btnSalvar.disabled = !todosPreenchidos;
}

// Adiciona o evento oninput para cada campo
document.getElementById("nome").addEventListener("input", verificarCamposMotoristas);
document.getElementById("sobrenome").addEventListener("input", verificarCamposMotoristas);

// Chama a função uma vez para garantir que o botão esteja no estado correto inicialmente
verificarCamposMotoristas();
</script>