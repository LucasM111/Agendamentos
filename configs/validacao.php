<?php
function diaUtil($data, $pdo)
{
    // Verificar se é sábado (6) ou domingo (0)
    if (date('w', strtotime($data)) == 0 || date('w', strtotime($data)) == 6) {
        return false;
    }

    $sql = "select * from feriados where data = :data limit 1";
    $consulta = $pdo->prepare($sql);
    $consulta->bindParam(":data", $data);
    $consulta->execute();

    $dados = $consulta->fetch(PDO::FETCH_OBJ);

    if (!empty($dados->id)) {
        return false;
    }

    return true; // Deu bão
}
