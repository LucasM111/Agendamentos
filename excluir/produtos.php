<?php
    if (!isset($pagina))
        exit;

    require "configs/functions.php";

    if (empty($id)) {
        mensagem("Erro","Não foi possível excluir o registro. Tente novamente.");
    }

    //verificar se existe uma venda cadastrada com esta forma
    $sqlItens = "select produtos_id from itens where produtos_id = :id limit 1";
    $consultaItens = $pdo->prepare($sqlItens);
    $consultaItens->bindParam(":id", $id);
    $consultaItens->execute();

    $dados = $consultaItens->fetch(PDO::FETCH_OBJ);

    if (!empty($dados->produtos_id)) {
        mensagem("Erro","Este produto não pode ser excluída pois existe uma venda utilizando o registro");
    }

    //excluir o registro
    $sqlExcluir = "delete from produtos where id = :id limit 1";
    $consultaExcluir = $pdo->prepare($sqlExcluir);
    $consultaExcluir->bindParam(":id", $id);

    if ( $consultaExcluir->execute() ){
        mensagem("Sucesso","Registro excluído com sucesso");
    } else {
        mensagem("Erro","Erro ao tentar excluir o registro");
    }