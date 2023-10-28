<?php
if (!isset($pagina))
    exit;

require "configs/functions.php";

$id = trim($_POST["id"] ?? NULL);
$nome = trim($_POST["nome"] ?? NULL);
$login = trim($_POST["login"] ?? NULL);
$senha = trim($_POST["senha"] ?? NULL);
$senha2 = trim($_POST["senha2"] ?? NULL);
$ativo = trim($_POST["ativo"] ?? NULL);
$categoria = trim($_POST["categoria"] ?? NULL);


if (validarLogin($login)) {

    $nomeCompleto = $nome;
    if (validarNomeSobrenome($nomeCompleto)) {

        //verificar se os campos estão em branco
        if (empty($nome)) {
            mensagem("Erro", "Preencha o nome");
        } else if ((empty($senha)) and (empty($id))) {
            mensagem("Erro", "Preencha a senha");
        } else if ($senha != $senha2) {
            mensagem("Erro", "As senhas devem ser iguais");
        }

        //verificar se já existe o login no banco
        $sqlUsuarios = "select id from usuarios where login = :login AND id <> :id limit 1";
        $consultaUsuarios = $pdo->prepare($sqlUsuarios);
        $consultaUsuarios->bindParam(":login", $login);
        $consultaUsuarios->bindParam(":id", $id);
        $consultaUsuarios->execute();

        //recuperar os dados
        $dadosUsuarios = $consultaUsuarios->fetch(PDO::FETCH_OBJ);
        if (!empty($dadosUsuarios->id)) {
            mensagem("Erro", "Já existe alguém com este Login no sistema");
        }



        //salvar o usuario
        if (senhaValida($senha)) {
            if (empty($id)) {
                $senha = password_hash($senha, PASSWORD_DEFAULT);
                //inserir
                $sql = "insert into usuarios values (NULL, :nome, :login, :senha, :ativo, :categoria)";
                $consulta = $pdo->prepare($sql);
                $consulta->bindParam(":nome", $nome);
                $consulta->bindParam(":login", $login);
                $consulta->bindParam(":senha", $senha);
                $consulta->bindParam(":ativo", $ativo);
                $consulta->bindParam(":categoria", $categoria);
            } else if (empty($senha)) {
                //update menos na foto
                $sql = "update usuarios set nome = :nome, login =:login,
            ativo = :ativo, categoria = :categoria where id = :id LIMIT 1";
                $consulta = $pdo->prepare($sql);
                $consulta->bindParam(":nome", $nome);
                $consulta->bindParam(":login", $login);
                $consulta->bindParam(":ativo", $ativo);
                $consulta->bindParam(":categoria", $categoria);
                $consulta->bindParam(":id", $id);
            } else {
                $senha = password_hash($senha, PASSWORD_DEFAULT);
                //mudar todos os campos, inclusive a foto
                $sql = "update usuarios set nome = :nome, login =:login,
            ativo = :ativo, senha = :senha, categoria = :categoria where id = :id LIMIT 1";
                $consulta = $pdo->prepare($sql);
                $consulta->bindParam(":nome", $nome);
                $consulta->bindParam(":login", $login);
                $consulta->bindParam(":ativo", $ativo);
                $consulta->bindParam(":senha", $senha);
                $consulta->bindParam(":categoria", $categoria);
                $consulta->bindParam(":id", $id);
            }

            //executar
            if ($consulta->execute()) {
                mensagem("Sucesso!", "Registro Salvo/Atualizado com sucesso!");
            } else {
                mensagem("Erro", "Erro ao tentar Salvar/Atualizar registro!");
            }
        } else {

            mensagem("Erro", "A senha não atende aos critérios de segurança.");
        }
    } else {
        mensagem("Erro", "Preencha um Nome e Sobrenome válidos.");
    }
} else {
    mensagem("Erro", "Insira um login com pelo menos 5 caracteres.");
}
