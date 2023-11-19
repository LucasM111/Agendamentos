<?php
require 'configs/functions.php';

// Verificar se a categoria do usuário é "funcionário" para permitir o acesso
if ($_SESSION["usuarioAdm"]["categoria"] !== "Funcionario") {
    // Se não for funcionario
    mensagem("Erro", "Voce não tem permição para acessar essa pagina");
    exit;
}
// Caso seja funcionario

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
$categoria = $dados->categoria ?? NULL;


?>
<div class="cadastramento">
    <div class="card">
        <div class="card-header">
            <strong>Cadastro de Usuários</strong>
            <div class="float-end">
                <a href="cadastrar/usuarios" class="btn btn-success btn-sm" title="Novo registro">
                    <i class="fas fa-file"></i> Novo Cadastro
                </a>
                <a href="listar/usuarios" class="btn btn-info btn-sm">
                    <i class="fas fa-search"></i> Lista de Usuários
                </a>
            </div>
        </div>
        <div class="card-body">
            <form name="formCadastro" method="post" enctype="multipart/form-data" action="salvar/usuarios"
                data-parsley-validate="">

                <input type="text" name="id" id="id" class="form-control" readonly value="<?= $id ?>" hidden>

                <div class="campos-obrigatorios">
                    <p>* Campos com preenchimento Obrigatório.</p>
                </div>

                <!-- NOME -->
                <label for="nome" class="campo-obrigatorio">Nome e Sobrenome de Usuário</label>
                <input type="text" maxlength="100" name="nome" id="nome" class="form-control" required
                    value="<?= $nome ?>" data-parsley-required-message="Preencha o nome">
                <br>

                <!-- LOGIN -->
                <label for="login" class="campo-obrigatorio">Login de Usuário</label>
                <input type="text" maxlength="100" name="login" id="login" class="form-control" required
                    value="<?= $login ?>" data-parsley-required-message="Preencha o login">
                <br>

                <!-- SENHA -->
                <label for="senha" class="campo-obrigatorio">Senha de Usuário</label>
                <input type="password" maxlength="8" name="senha" id="senha" class="form-control">
                <div class="regra-senha">
                    <p>
                        <strong>
                            A Senha Deverá Conter Pelo Menos:
                        </strong><br>
                        No Máximo 8 Caracteres<br>
                        1 Letra Maiuscúla<br>
                        1 Letra Minuscúla<br>
                        1 Número
                    </p>
                </div>

                <!-- CONFIRMAÇÃO DE SENHA -->
                <label for="senha2" class="campo-obrigatorio">Redigite a Senha de Usuário</label>
                <input type="password" maxlength="8" name="senha2" id="senha2" class="form-control">
                <br>

                <!-- ATIVO OU NÃO -->
                <label for="ativo" class="campo-obrigatorio">Ativo?</label>
                <select name="ativo" id="ativo" class="form-control" required
                    data-parsley-required-message="Selecione se está ativo">
                    <option value="">Selecione</option>
                    <option value="S">Sim</option>
                    <option value="N">Não</option>
                </select>
                <script>
                $("#ativo").val("<?= $ativo ?>");
                </script>

                <br>

                <!-- CATEGORIA - Funcionario OU Cliente -->
                <label for="categoria" class="campo-obrigatorio">Categoria?</label>
                <select name="categoria" id="categoria" class="form-control" required
                    data-parsley-required-message="Selecione se está categoria">
                    <option value="">Selecione</option>
                    <option value="Funcionario">Funcionario</option>
                    <option value="Cliente">Cliente</option>
                </select>
                <script>
                $("#categoria").val("<?= $categoria ?>");
                </script>

                <br>
                <button type="submit" class="btn btn-success" id='btnSalvar'>
                    <i class="fas fa-check"></i> Salvar Dados
                </button>
            </form>
            <br>
        </div> <!-- fim do card-body -->
    </div> <!-- fim do card -->
</div>
<br>
<br>
<script>
// Função para verificar campos e habilitar/desabilitar o botão de salvar
function verificarCamposUsuarios() {
    // Obtém todos os valores dos campos
    var nome = document.getElementById("nome").value;
    var login = document.getElementById("login").value;
    var senha = document.getElementById("senha").value;
    var senha2 = document.getElementById("senha2").value;
    var ativo = document.getElementById("ativo").value;
    var categoria = document.getElementById("categoria").value;

    // Obtém o botão de salvar
    var btnSalvar = document.querySelector("button[type='submit']");

    // Verifica se todos os campos estão preenchidos
    var todosPreenchidos = nome && login && senha && senha2 && ativo && categoria;

    // Habilita/desabilita o botão com base na verificação
    btnSalvar.disabled = !todosPreenchidos;
}

// Adiciona o evento oninput para cada campo
document.getElementById("nome").addEventListener("input", verificarCamposUsuarios);
document.getElementById("login").addEventListener("input", verificarCamposUsuarios);
document.getElementById("senha").addEventListener("input", verificarCamposUsuarios);
document.getElementById("senha2").addEventListener("input", verificarCamposUsuarios);
document.getElementById("ativo").addEventListener("input", verificarCamposUsuarios);
document.getElementById("categoria").addEventListener("input", verificarCamposUsuarios);

// Chama a função uma vez para garantir que o botão esteja no estado correto inicialmente
verificarCamposUsuarios();
</script>