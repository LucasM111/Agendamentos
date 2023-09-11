<?php
    if (!isset($pagina))
        exit;
?>
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
                    <td>Ativo</td>
                    <td>Opções</td>
                </tr>
            </thead>
            <tbody>
                <?php
                    $sql = "select * from usuarios order by nome";
                    $consulta = $pdo->prepare($sql);
                    $consulta->execute();

                    while ( $dados = $consulta->fetch(PDO::FETCH_OBJ) ) {
                        ?>
                        <tr>
                            <td><?=$dados->id?></td>
                            <td><?=$dados->nome?></td>
                            <td><?=$dados->login?></td>
                            <td><?=$dados->ativo?></td>
                            <td class="text-center">
                                <a href="cadastrar/usuarios/<?=$dados->id?>" title="Editar"
                                class="btn btn-success btn-sm">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="javascript:excluir(<?=$dados->id?>)" title="Excluir"
                                class="btn btn-danger btn-sm">
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
<script>
    //iniciar o dataTables
    $(document).ready(function(){
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
        }).then((result)=>{
            if (result.isConfirmed) {
                location.href = "excluir/usuarios/" + id;
            }
        })
    }
</script>