<?php
if (!isset($pagina))
    exit;

//verificar se o id não está vazio
if (!empty($id)) {
    $sqlVeiculos = "select * from veiculos where id = :id limit 1";
    $consultaVeiculos = $pdo->prepare($sqlVeiculos);
    $consultaVeiculos->bindParam(":id", $id);
    $consultaVeiculos->execute();

    $dados = $consultaVeiculos->fetch(PDO::FETCH_OBJ);
}

$id = $dados->id ?? NULL;
$modelo = $dados->Modelo ?? NULL;
$placa = $dados->placa ?? NULL;
?>


<div class="cadastramento">
    <div class="card">
        <div class="card-header">
            <strong>Cadastro de Veiculos</strong>

            <div class="float-end">
                <a href="cadastrar/veiculos" class="btn btn-success btn-sm">
                    <i class="fas fa-file"></i> Novo Veiculo
                </a>
                <a href="listar/veiculos" class="btn btn-info btn-sm">
                    <i class="fas fa-search"></i> Lista de Veiculos
                </a>
            </div>
        </div>
        <div class="card-body">
            <form name="formveiculos" method="post" action="salvar/veiculos" data-parsley-validate="">

                <input type="text" name="id" id="id" class="form-control" readonly value="<?= $id ?>" hidden>

                <div class="campos-obrigatorios">
                    <p>* Campos com preenchimento Obrigatório.</p>
                </div>

                <!-- Modelo -->
                <label for="modelo" class="campo-obrigatorio">Digite o Modelo do Veiculo</label>
                <input type="text" maxlength="100" name="modelo" id="modelo" class="form-control" required data-parsley-required-message="Por favor, preencha este campo" value="<?= $modelo ?>">
                <br>

                <!-- Placa -->
                <label for="placa" class="campo-obrigatorio">Placa do Veiculo</label>
                <input type="text" maxlength="100" name="placa" id="placa" class="form-control" required data-parsley-required-message="Por favor, preencha este campo" value="<?= $placa ?>">
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
    // Função para verificar campos e habilitar/desabilitar o botão de salvar
    function verificarCamposVeiculos() {
        // Obtém todos os valores dos campos
        var modelo = document.getElementById("modelo").value;
        var placa = document.getElementById("placa").value;

        // Obtém o botão de salvar
        var btnSalvar = document.querySelector("button[type='submit']");

        // Verifica se todos os campos estão preenchidos
        var todosPreenchidos = modelo && placa;

        // Habilita/desabilita o botão com base na verificação
        btnSalvar.disabled = !todosPreenchidos;
    }

    // Adiciona o evento oninput para cada campo
    document.getElementById("modelo").addEventListener("input", verificarCamposVeiculos);
    document.getElementById("placa").addEventListener("input", verificarCamposVeiculos);

    // Chama a função uma vez para garantir que o botão esteja no estado correto inicialmente
    verificarCamposVeiculos();
</script>