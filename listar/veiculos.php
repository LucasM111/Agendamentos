<?php
if (!isset($pagina))
    exit;
?>

<div class="cadastramento">
    <div class="card">
        <div class="card-header">
            <strong>Listagem de Veiculos</strong>

            <div class="float-end">
                <a href="cadastrar/veiculos" class="btn btn-success btn-sm">
                    <i class="fas fa-file"></i> Novo Veiculo
                </a>
                <a href="listar/veiculos" class="btn btn-info btn-sm">
                    <i class="fas fa-search"></i> Listar Veiculo
                </a>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <td>Modelo do Veiculo</td>
                        <td>Placa</td>
                        <td width="100px">Excluir</td>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sqlMotoristas = "select * from veiculos order by modelo";
                    $consultaMotoristas = $pdo->prepare($sqlMotoristas);
                    $consultaMotoristas->execute();

                    while ($d = $consultaMotoristas->fetch(PDO::FETCH_OBJ)) {
                    ?>
                        <tr>
                            <td><?= $d->Modelo ?></td>
                            <td><?= $d->placa ?></td>
                            <td class="text-center">
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
                location.href = "excluir/veiculos/" + id;
            }
        })
    }
</script>