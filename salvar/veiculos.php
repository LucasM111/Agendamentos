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
    $sql = "update veiculos set modelo = :modelo, placa = :placa where id = :id limit 1";
    $consulta = $pdo->prepare($sql);
    $consulta->bindParam(":modelo", $modelo);
    $consulta->bindParam(":placa", $placa);
}

if ($consulta->execute()) {
    mensagem("Sucesso", "Registro salvo/alterado com sucesso");
} else {
    mensagem("Erro", "Não foi possível salvar ou alterar o registro");
}