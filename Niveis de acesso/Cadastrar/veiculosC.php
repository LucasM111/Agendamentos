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
$modelo = $dados->modelo ?? NULL;
$placa = $dados->placa ?? NULL;
?>



<div class="card">
    <div class="card-header">
        <strong>Cadastro de Veiculos</strong>

        <div class="float-end">
            <a href="cadastrar/veiculos" class="btn btn-success btn-sm">
                <i class="fas fa-file"></i> Novo Veiculo
            </a>
            <a href="listar/veiculos" class="btn btn-info btn-sm">
                <i class="fas fa-search"></i> Listar Veiculo
            </a>
        </div>
    </div>
    <div class="card-body">
        <form name="formveiculos" method="post" action="salvar/veiculos" data-parsley-validate="">
            <br>

            <!-- ID -->
            <label for="id">ID:</label>
            <input type="text" name="id" id="id" class="form-control" readonly value="<?= $id ?>">
            <br>

            <!-- Modelo -->
            <label for="modelo">Digite o Modelo do Veiculo:</label>
            <input type="text" name="modelo" id="modelo" class="form-control" required data-parsley-required-message="Por favor, preencha este campo" value="">
            <br>

            <!-- Placa -->
            <label for="placa">Placa do Veiculo</label>
            <input type="text" name="placa" id="placa" class="form-control" required data-parsley-required-message="Por favor, preencha este campo" value="">
            <br>

            <button type="submit" class="btn btn-success">
                <i class="fas fa-check"></i> Salvar Dados
            </button>
        </form>
    </div>
</div>