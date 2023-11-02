<?php
require "configs/functions.php";

// Verificar se a categoria do usuário é "funcionário" para permitir o acesso
if ($_SESSION["usuarioAdm"]["categoria"] !== "Funcionario") {
    // Caso não seja Funcionario
    mensagem("Erro", "Voce não tem permição para acessar essa pagina");

    exit;
}
// Caso seja funcionario

if (!isset($pagina))
    exit;
?>
<div class="cadastramento">
    <div class="card">
        <div class="card-header">
            <strong>Listagem de Usuários</strong>

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
            <table class="table table-hover table-bordered table-striped">
                <thead>
                    <tr>
                        <td>ID</td>
                        <td>Nome do Usuário</td>
                        <td>Login</td>
                        <td>Categoria</td>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "select * from usuarios order by nome";
                    $consulta = $pdo->prepare($sql);
                    $consulta->execute();

                    while ($dados = $consulta->fetch(PDO::FETCH_OBJ)) {
                    ?>
                        <tr>
                            <td><?= $dados->id ?></td>
                            <td><?= $dados->nome ?></td>
                            <td><?= $dados->login ?></td>
                            <td><?= $dados->categoria ?></td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<br>
<script>
    //iniciar o dataTables
    $(document).ready(function() {
        $(".table").DataTable({
            language: {
                lengthMenu: 'Mostrar _MENU_ registros por página',
                zeroRecords: 'Sem resultados encontrados',
                info: 'Mostrando página _PAGE_ de _PAGES_',
                infoEmpty: 'Nenhum resultado',
                infoFiltered: '(Filtrando de _MAX_ resultados)',
                search: 'Busca',
            },
        });
    })

    function excluir(id) {
        Swal.fire({
            icon: "warning",
            title: "Você deseja mesmo alterar este registro?",
            showCancelButton: true,
            confirmButtonText: "Excluir",
            cancelButtonText: "Cancelar",
        }).then((result) => {
            if (result.isConfirmed) {
                location.href = "excluir/usuarios/" + id;
            }
        })
    }
</script>