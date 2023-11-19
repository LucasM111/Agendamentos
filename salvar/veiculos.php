<?php
if (!isset($pagina))
    exit;

require "configs/functions.php";

if (!$_POST)
    mensagem("Erro", "Requisição inválida");

//recuperar os dados digitados no formulário
// print_r($_POST);
$id = trim($_POST["id"] ?? NULL);
$modelo = trim($_POST["modelo"] ?? NULL);
if (!validarModeloCarro($modelo)) {
    mensagem("Erro", "Modelo do carro Invalido");
}
$placa = trim($_POST["placa"] ?? NULL);
if (!validarPlaca($placa)) {
    mensagem("Erro", "Placa inválida");
}

// Verificar se a placa do veiculo já existe no banco de dados
$sqlVerificaExistencia = "SELECT id FROM veiculos WHERE placa = :placa";
$consultaVerificaExistencia = $pdo->prepare($sqlVerificaExistencia);
$consultaVerificaExistencia->bindParam(":placa", $placa);
$consultaVerificaExistencia->execute();


if ($consultaVerificaExistencia->rowCount() > 0) {
    mensagem("Erro", "A placa já está cadastrado em nosso banco de dados com relação a algum veiculo, confira na lista de veiculos.");
}


//verificar se esses campos estão em branco
if (empty($modelo))
    mensagem("Erro", "Preencha o modelo");
if (empty($placa))
    mensagem("Erro", "Preencha o placa");

//verificar se vamos dar um insert ou um update
if (empty($id)) {
    //insert
    $sql = "insert into veiculos values (NULL, :modelo, :placa)";
    $consulta = $pdo->prepare($sql);
    $consulta->bindParam(":modelo", $modelo);
    $consulta->bindParam(":placa", $placa);
} else {
    //update
    $sql = "update veiculos set Modelo = :modelo, placa = :placa where id = :id limit 1";
    $consulta = $pdo->prepare($sql);
    $consulta->bindParam(":modelo", $modelo);
    $consulta->bindParam(":placa", $placa);
    $consulta->bindParam(":id", $id);
}

if ($consulta->execute()) {
    mensagem("Sucesso", "Registro salvo/alterado com sucesso");
} else {
    mensagem("Erro", "Não foi possível salvar ou alterar o registro");
}
