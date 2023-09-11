<?php
    require "configs/functions.php";

    if (!isset($pagina))
        exit;

?>

<div class="card">
    <div class="card-header">
        <strong>Listagem de Agendamentos</strong>

        <div class="float-end">
            <a href="cadastrar/agendamentos" class="btn btn-success btn-sm">
                <i class="fas fa-file"></i> Novo Agendamento
            </a>
            <a href="listar/agendamentos" class="btn btn-info btn-sm">
                <i class="fas fa-search"></i> Listar Agendamento
            </a>
        </div>
    </div>
    <div class="card-body">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <td>N°</td>
                    <td>Data</td>
                    <td>Visitante</td>
                    <td>Veiculo</td>
                    <td>Motorista</td>
                    <td>Hora</td>
                    <td>Motivo</td>
                    <td>N° Visitantes</td>
                    <td>Produto</td>
                </tr>
            </thead>
            <tbody>
            <!-- date_format(v.data,'%d/%m/%Y') data -->
                <?php
                $sqlAgendamentos = "select id, date_format(data,'%d/%m/%Y') data, Nome, veiculo, motorista, hora, motivo, n_visitantes, produto from agendamentos  order by data desc";
                $consultaAgendamento = $pdo->prepare($sqlAgendamentos);
                $consultaAgendamento->execute();

                while ($d = $consultaAgendamento->fetch(PDO::FETCH_OBJ)){
                    ?>
                        <tr>
                            <td><?=$d->id?></td>
                            <td><?=$d->data?></td>
                            <td><?=$d->Nome?></td>
                            <td><?=$d->veiculo?></td>
                            <td><?=$d->motorista?></td>
                            <td><?=$d->hora?></td>
                            <td><?=$d->motivo?></td>
                            <td><?=$d->n_visitantes?></td>
                            <td><?=$d->produto?></td>
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
            title: "Você deseja mesmo excluir este registro?",
            showCancelButton: true,
            confirmButtonText: "Excluir",
            cancelButtonText: "Cancelar",
        }).then((result)=>{
            if (result.isConfirmed) {
                location.href = "excluir/categorias/" + id;
            }
        })
    }
</script>