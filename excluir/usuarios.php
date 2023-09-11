<?php
    if (!isset($pagina))
        exit;

    require "configs/functions.php";

    if (empty($id)) {
        mensagem("Erro","Não foi possível excluir o registro. Tente novamente.");
    }

    //verificar se existe uma venda cadastrada com esta forma
    $sql = "select id, ativo from usuarios where id = :id limit 1";
    $consulta = $pdo->prepare($sql);
    $consulta->bindParam(":id", $id);
    $consulta->execute();

    $dados = $consulta->fetch(PDO::FETCH_OBJ);

    $ativo = "S";
    if ($dados->ativo == "S") $ativo = "N";

    echo $dados->ativo == "S";

    //excluir o registro
    $sqlExcluir = "update usuarios set ativo = :ativo where id = :id limit 1";
    $consultaExcluir = $pdo->prepare($sqlExcluir);
    $consultaExcluir->bindParam(":id", $id);
    $consultaExcluir->bindParam(":ativo", $ativo);

    if ( $consultaExcluir->execute() ){
        mensagem("Sucesso","Registro modificado com sucesso");
    } else {
        mensagem("Erro","Erro ao tentar modificar o registro");
    }