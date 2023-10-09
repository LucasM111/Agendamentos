<?php
if (!isset($pagina))
    exit;

if (!empty($id)) {
    $sqlProduto = "select * from usuarios
        where id = :id LIMIT 1";
    $consultaProduto = $pdo->prepare($sqlProduto);
    $consultaProduto->bindParam(":id", $id);
    $consultaProduto->execute();

    //recuperar os dados do sql
    $dados = $consultaProduto->fetch(PDO::FETCH_OBJ);
}

$id = $dados->id ?? NULL;
$nome = $dados->nome ?? NULL;
$login = $dados->login ?? NULL;
$ativo = $dados->ativo ?? NULL;

?>
<div class="card">
    <div class="card-header">
        <strong>Cadastro de Usuários</strong>
        <div class="float-end">
            <a href="cadastrar/usuarios" class="btn btn-success btn-sm" title="Novo registro">
                <i class="fas fa-file"></i> Novo Cadastro
            </a>
            <a href="listar/usuarios" class="btn btn-info btn-sm">
                <i class="fas fa-search"></i> Listar Cadastros
            </a>
        </div>
    </div>
    <div class="card-body">
        <form name="formCadastro" method="post" enctype="multipart/form-data" action="salvar/usuarios"
            data-parsley-validate="">
            <label for="id">ID:</label>
<<<<<<< Updated upstream
            <input type="text" name="id" id="id" class="form-control" readonly value="<?=$id?>">
            <br>

            <label for="nome">Nome de Usuário:</label>
            <input type="text" name="nome" id="nome" class="form-control" required value="<?=$nome?>"
=======
            <input type="text" name="id" id="id" class="form-control" readonly value="<?= $id ?>">
            <br>

            <label for="nome">Nome de Usuário:</label>
            <input type="text" name="nome" id="nome" class="form-control" required value=""
>>>>>>> Stashed changes
                data-parsley-required-message="Preencha o nome">
            <br>

            <label for="login">Login de Usuário:</label>
<<<<<<< Updated upstream
            <input type="text" name="login" id="login" class="form-control" required value="<?=$login?>"
=======
            <input type="text" name="login" id="login" class="form-control" required value=""
>>>>>>> Stashed changes
                data-parsley-required-message="Preencha o login">
            <br>

            <label for="senha">Senha de Usuário:</label>
            <input type="password" name="senha" id="senha" class="form-control">
            <br>

            <label for="senha2">Redigite a Senha de Usuário:</label>
            <input type="password" name="senha2" id="senha2" class="form-control">
            <br>

            <label for="ativo">Ativo?</label>
            <select name="ativo" id="ativo" class="form-control" required
                data-parsley-required-message="Selecione se está ativo">
                <option value=""></option>
                <option value="S">Sim</option>
                <option value="N">Não</option>
            </select>
            <script>
<<<<<<< Updated upstream
            $("#ativo").val("<?=$ativo?>");
=======
            $("#ativo").val("<?= $ativo ?>");
>>>>>>> Stashed changes
            </script>

            <br>

            <label for="categoria">Categoria?</label>
            <select name="categoria" id="categoria" class="form-control" required
                data-parsley-required-message="Selecione se está categoria">
                <option value=""></option>
<<<<<<< Updated upstream
                <option value="Administrador">Administrador</option>
                <option value="Cliente">Cliente</option>
            </select>
            <script>
            $("#categoria").val("<?=$categoria?>");
=======
                <option value='1'>Funcionario</option>
                <option value='0'>Cliente</option>
            </select>
            <script>
            $("#categoria").val("<?= $categoria ?>");
>>>>>>> Stashed changes
            </script>

            <br>
            <button type="submit" class="btn btn-success">
                <i class="fas fa-check"></i> Salvar/Alterar Dados
            </button>
        </form>
        <br>

        <form name="formvoltar" method="post" action="home">
            <button type="submit" class="btn btn-secondary">Voltar</button>
        </form>
    </div> <!-- fim do card-body -->
</div> <!-- fim do card -->