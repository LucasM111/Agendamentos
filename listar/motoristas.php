<?php
if (!isset($pagina))
    exit;
?>
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

</script>