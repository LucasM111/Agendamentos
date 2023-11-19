<?php
if (!isset($pagina)) {
    header("Location: index.php");
}
?>

<header>
    <input type="checkbox" name="" id="chk1">
    <div class="logo">
        <h1>Agendamentos</h1>
    </div>
    <ul>
        <li class="selecionar"><a href="pages/home">Home</a></li>
        <li class="cadastros">
            <a href="pages/home">Info</a>
            <ul class="sub-menu">
                <li><a href="pages/help">Ajuda</a></li>
                <li><a href="pages/sobre">Sobre</a></li>
            </ul>
        </li>
        <li class="selecionar "><a href="cadastrar/motoristas">+ Motoristas</a></li>
        <li class="selecionar "><a href="cadastrar/veiculos">+ Veículos</a></li>
        <li class="selecionar "><a href="cadastrar/agendamentos">Agendar Visitas</a></li>
        <li class="selecionar "><a href="cadastrar/usuarios">+ Usuário</a></li>
        <li class="selecionar "><a href="cadastrar/feriados">+ Feriados</a></li>
        <li class="Sair"><a onclick="confirmarSaida()">Sair</a></li>
    </ul>

    <div class="menu">
        <label for="chk1">
            <i class="fas fa-bars"></i>
        </label>
    </div>
</header>
<script src="js/menu.js"></script>

<script>
    function confirmarSaida() {
        Swal.fire({
            title: 'Você realmente deseja sair?',
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: 'Sim',
            cancelButtonText: 'Não'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "sair.php";
            } else {
                const currentPage = window.location.href;
                window.location.href = currentPage;
            }
        });
    }
</script>