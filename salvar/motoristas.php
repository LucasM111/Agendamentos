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

if (!preg_match('/^[A-Za-zÀ-ÖØ-öø-ÿ\s]+$/', $nome))
    mensagem("Erro", "Insira um Nome Válido");

if (!preg_match('/^[A-Za-zÀ-ÖØ-öø-ÿ\s]+$/', $sobrenome))
    mensagem("Erro", "Insira um Sobrenome Válido");


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
}

if ($consulta->execute()) {
    mensagem("Sucesso", "Registro salvo/alterado com sucesso");
} else {
    mensagem("Erro", "Não foi possível salvar ou alterar o registro");
}