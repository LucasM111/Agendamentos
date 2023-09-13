<?php
require "configs/functions.php";

if (!isset($pagina))
    exit;


if (!$_POST)
    mensagem("Erro", "Requisição inválida");

//recuperar os dados digitados no formulário
// print_r($_POST);
$id = trim($_POST["id"] ?? NULL);
$nome = trim($_POST["nome"] ?? NULL);
$veiculo = trim($_POST["veiculo"] ?? NULL);
$motorista = trim($_POST["motorista"] ?? NULL);
$data = trim($_POST["data"] ?? NULL);
$hora = trim($_POST["hora"] ?? NULL);
$motivo = trim($_POST["motivo"] ?? NULL);
$n_visitantes = trim($_POST["n_visitantes"] ?? NULL);
$produto = trim($_POST["produto"] ?? NULL);

//verificar se esses campos estão em branco
if (empty($nome))
    mensagem("Erro", "Preencha o nome");

if (empty($veiculo))
    mensagem("Erro", "Preencha o veiculo");

if (empty($motorista))
    mensagem("Erro", "Preencha o motorista");

if (empty($data))
    mensagem("Erro", "Preencha a data");

if (empty($hora))
    mensagem("Erro", "Preencha a hora");

if (empty($motivo))
    mensagem("Erro", "Preencha o motivo");

if (empty($n_visitantes))
    mensagem("Erro", "Preencha o numero de visitantes");
    else if($n_visitantes <= 0 || $n_visitantes > 9){
        mensagem("Erro","O numero permitido de pessoas é apenas de 9");
    }

if (empty($produto))
    mensagem("Erro", "Preencha o produto");

$data = formatarData($data);

$dataatual = date('m/d/Y');

if($data < $dataatual){
    mensagem("Erro","Data Invalida");
}

//verificar se vamos dar um insert ou um update
if (empty($id)) {
    //insert
    $sql = "insert into agendamentos values (NULL, :nome, :veiculo, :motorista, :data, :hora, :motivo, :n_visitantes, :produto)";
    $consulta = $pdo->prepare($sql);
    $consulta->bindParam(":nome", $nome);
    $consulta->bindParam(":veiculo", $veiculo);
    $consulta->bindParam(":motorista", $motorista);
    $consulta->bindParam(":data", $data);
    $consulta->bindParam(":hora", $hora);
    $consulta->bindParam(":motivo", $motivo);
    $consulta->bindParam(":n_visitantes", $n_visitantes);
    $consulta->bindParam(":produto", $produto);
} else {
    //update
    $sql = "update agendamentos set nome = :nome, veiculo = :veiculo, motorista = :motorista, data = :data, hora = :hora, motivo = :motivo, n_visitantes = :n_visitantes, produto = :produto where id = :id limit 1";
    $consulta = $pdo->prepare($sql);
    $consulta->bindParam(":nome", $nome);
    $consulta->bindParam(":veiculo", $veiculo);
    $consulta->bindParam(":motorista", $motorista);
    $consulta->bindParam(":data", $data);
    $consulta->bindParam(":hora", $hora);
    $consulta->bindParam(":motivo", $motivo);
    $consulta->bindParam(":n_visitantes", $n_visitantes);
    $consulta->bindParam(":produto", $produto);
}



if ($consulta->execute()) {
    mensagem("Sucesso", "Registro salvo/alterado com sucesso");
} else {
    mensagem("Erro", "Não foi possível salvar ou alterar o registro");
}
