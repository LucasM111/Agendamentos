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


                <!-- Modelo -->
                <label for="modelo">Digite o Modelo do Veiculo:</label>
                <input type="text" maxlength="20" name="modelo" id="modelo" class="form-control" required
                    data-parsley-required-message="Por favor, preencha este campo" value="<?= $modelo ?>">
                <br>

                <!-- Placa -->
                <label for="placa">Placa do Veiculo</label>
                <input type="text" maxlength="20" name="placa" id="placa" class="form-control" required
                    data-parsley-required-message="Por favor, preencha este campo" value="<?= $placa ?>">
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