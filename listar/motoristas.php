<?php
require "configs/functions.php";

// Verificar se a categoria do usuário é "funcionário" para permitir o acesso
if ($_SESSION["usuarioAdm"]["categoria"] !== "Funcionario") {
    // Redirecionar ou mostrar mensagem de erro
    mensagem("Erro", "Voce não tem permição para acessar essa pagina");

    exit; // encerrar o script
}

if (!isset($pagina))
    exit;
?>
<div class="cadastramento">
    <div class="card">
        <div class="card-header">
            <strong>Listagem de Motoristas</strong>

            <div class="float-end">
                <a href="cadastrar/motoristas" class="btn btn-success btn-sm" title="Novo registro">
                    <i class="fas fa-file"></i> Novo Cadastro de Motorista
                </a>
                <a href="listar/motoristas" class="btn btn-info btn-sm">
                    <i class="fas fa-search"></i> Listar Cadastros
                </a>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-hover table-bordered table-striped">
                <thead>
                    <tr>
                        <td>Nome</td>
                        <td>Sobrenome</td>
                        <td width="100px">Excluir</td>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sqlMotoristas = "select * from motoristas order by nome";
                    $consultaMotoristas = $pdo->prepare($sqlMotoristas);
                    $consultaMotoristas->execute();

                    while ($d = $consultaMotoristas->fetch(PDO::FETCH_OBJ)) {
                    ?>
                        <tr>
                            <td><?= $d->nome ?></td>
                            <td><?= $d->sobrenome ?></td>
                            <td class="text-center">
                                <a href="cadastrar/motoristas/<?= $d->id ?>" title="Editar" class="btn btn-success btn-sm">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="javascript:excluir(<?= $d->id ?>)" title="Excluir" class="btn btn-danger btn-sm">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>
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
            title: "Você deseja mesmo excluir este registro?",
            showCancelButton: true,
            confirmButtonText: "Excluir",
            cancelButtonText: "Cancelar",
        }).then((result) => {
            if (result.isConfirmed) {
                location.href = "excluir/motorista/" + id;
            }
        })
    }
</script>