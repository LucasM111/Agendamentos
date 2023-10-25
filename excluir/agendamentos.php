<?php
if (!isset($pagina))
    exit;

require "configs/functions.php";

if (empty($id)) {
    mensagem("Erro", "Não foi possível excluir o registro. Tente novamente.");
}

//verificar se existe um produto cadastrado com esta categoria
$sqlAgendamento = "select id from agendamentos where id = :id limit 1";
$consultaAgendamento = $pdo->prepare($sqlAgendamento);
$consultaAgendamento->bindParam(":id", $id);
$consultaAgendamento->execute();

$dados = $consultaAgendamento->fetch(PDO::FETCH_OBJ);

//excluir o registro
$sqlExcluir = "delete from agendamentos where id = :id limit 1";
$consultaExcluir = $pdo->prepare($sqlExcluir);
$consultaExcluir->bindParam(":id", $id);

if ($consultaExcluir->execute()) {
    mensagem("Sucesso", "Registro excluído com sucesso");
} else {
    mensagem("Erro", "Erro ao tentar excluir o registro");
}
