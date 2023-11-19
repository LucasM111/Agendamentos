<?php
if (!isset($pagina))
    exit;

//print_r($_POST);
//print_r($_FILES);
require "configs/functions.php";
require "configs/conexao.php";

if (!$_POST)
    mensagem("Erro", "Requisição inválida");

//recuperar os dados digitados no formulário
// print_r($_POST);
$id = trim($_POST["id"] ?? NULL);
$data = trim($_POST["data"] ?? NULL);
$feriado = trim($_POST["feriado"] ?? NULL);


//verificar se esses campos estão em branco
if (empty($data))
    mensagem("Erro", "Preencha a data");
if (empty($feriado))
    mensagem("Erro", "Preencha o feriado");

$data = formatarData($data);

//verificar se vamos dar um insert ou um update
if (empty($id)) {
    //insert
    $sql = "insert into feriados values (NULL, :data, :feriado)";
    $consulta = $pdo->prepare($sql);
    $consulta->bindParam(":data", $data);
    $consulta->bindParam(":feriado", $feriado);
} else {
    //update
    $sql = "update feriados set data = :data, feriado = :feriado where id = :id limit 1";
    $consulta = $pdo->prepare($sql);
    $consulta->bindParam(":data", $data);
    $consulta->bindParam(":feriado", $feriado);
    $consulta->bindParam(":id", $id);
}

if ($consulta->execute()) {
    mensagem("Sucesso", "Registro salvo/alterado com sucesso");
} else {
    mensagem("Erro", "Não foi possível salvar ou alterar o registro");
}
