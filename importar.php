<?php
//incluir a conexao com banco de dados
require "configs/conexao.php";

$json = file_get_contents("feriados_nacionais.json");
$dados = json_decode($json);
foreach ($dados as $d) {
    $data = $d->data;
    $feriado = $d->feriado;

    $sql = "insert into feriados values (NULL, :data, :feriado)";
    $consulta = $pdo->prepare($sql);
    $consulta->bindParam(":data", $data);
    $consulta->bindParam(":feriado", $feriado);
    if ($consulta->execute()) echo "<p>{$feriado} inserido</p>";
    else echo "<p>Erro ao inserir {$feriado}</p>";
}
