<?php
require "configs/functions.php";

?>
<div class="cadastramento">
    <div class="card">
        <div class="card-header">
            <strong>Listagem de Feriados</strong>

            <div class="float-end">
                <a href="cadastrar/feriados" class="btn btn-success btn-sm" title="Novo registro">
                    <i class="fas fa-file"></i> Novo Cadastro de Feriados
                </a>
                <a href="listar/feriados" class="btn btn-info btn-sm">
                    <i class="fas fa-search"></i> Listar Cadastros
                </a>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-hover table-bordered table-striped">
                <thead>
                    <tr>
                        <td>Data</td>
                        <td>Feriado</td>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sqlferiados = "select date_format(data, '%d/%m/%Y') as data, feriado from feriados order by year(data), data";

                    $consultaferiados = $pdo->prepare($sqlferiados);
                    $consultaferiados->execute();

                    while ($d = $consultaferiados->fetch(PDO::FETCH_OBJ)) {
                    ?>
                    <tr>
                        <td><?= $d->data ?></td>
                        <td><?= $d->feriado ?></td>

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
            location.href = "excluir/feriados/" + id;
        }
    })
}
</script>