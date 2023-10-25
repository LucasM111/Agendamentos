<?php
if (!isset($pagina))
    exit;

require "configs/functions.php";

if (empty($id)) {
    mensagem("Erro", "Não foi possível excluir o registro. Tente novamente.");
}

//verificar se existe um produto cadastrado com esta categoria
$sqlVeiculo = "select id from veiculos where id = :id limit 1";
$consultaVeiculo = $pdo->prepare($sqlVeiculo);
$consultaVeiculo->bindParam(":id", $id);
$consultaVeiculo->execute();

$dados = $consultaVeiculo->fetch(PDO::FETCH_OBJ);

//excluir o registro
$sqlExcluir = "delete from veiculos where id = :id limit 1";
$consultaExcluir = $pdo->prepare($sqlExcluir);
$consultaExcluir->bindParam(":id", $id);

if ($consultaExcluir->execute()) {
    mensagem("Sucesso", "Registro excluído com sucesso");
} else {
    mensagem("Erro", "Erro ao tentar excluir o registro");
}
