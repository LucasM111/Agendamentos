<?php
if (!isset($pagina))
    exit;

//print_r($_POST);
//print_r($_FILES);
require "configs/functions.php";

if (!$_POST)
    mensagem("Erro", "Requisição inválida");

//recuperar os dados digitados no formulário
// print_r($_POST);
$id = trim($_POST["id"] ?? NULL);
$nome = trim($_POST["nome"] ?? NULL);
$sobrenome = trim($_POST["sobrenome"] ?? NULL);


//verificar se esses campos estão em branco
if (empty($nome))
    mensagem("Erro", "Preencha o modelo");
if (empty($sobrenome))
    mensagem("Erro", "Preencha a placa");

if (!preg_match('/^[A-Za-zÀ-ÖØ-öø-ÿ\s]{3,}$/', $nome))
    mensagem("Erro", "Insira um Nome Válido com pelo menos 3 letras");

if (!preg_match('/^[A-Za-zÀ-ÖØ-öø-ÿ\s]{3,}$/', $nome))
    mensagem("Erro", "Insira um Sobrenome Válido com pelo menos 3 letras");

// Verificar se nome e sobrenome já existem no banco de dados
$sqlVerificaExistencia = "SELECT id FROM motoristas WHERE nome = :nome AND sobrenome = :sobrenome";
$consultaVerificaExistencia = $pdo->prepare($sqlVerificaExistencia);
$consultaVerificaExistencia->bindParam(":nome", $nome);
$consultaVerificaExistencia->bindParam(":sobrenome", $sobrenome);
$consultaVerificaExistencia->execute();

// Se encontrar registros, exibe mensagem e interrompe o script
if ($consultaVerificaExistencia->rowCount() > 0) {
    mensagem("Erro", "O Motorista já está cadastrado em nosso banco de dados, confira na lista de Motoristas.");
}



//verificar se vamos dar um insert ou um update
if (empty($id)) {
    //insert
    $sql = "insert into motoristas values (NULL, :nome, :sobrenome)";
    $consulta = $pdo->prepare($sql);
    $consulta->bindParam(":nome", $nome);
    $consulta->bindParam(":sobrenome", $sobrenome);
} else {
    //update
    $sql = "update motoristas set nome = :nome, sobrenome = :sobrenome where id = :id limit 1";
    $consulta = $pdo->prepare($sql);
    $consulta->bindParam(":nome", $nome);
    $consulta->bindParam(":sobrenome", $sobrenome);
    $consulta->bindParam(":id", $id);
}

if ($consulta->execute()) {
    mensagem("Sucesso", "Registro salvo/alterado com sucesso");
} else {
    mensagem("Erro", "Não foi possível salvar ou alterar o registro");
}
