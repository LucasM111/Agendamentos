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
        <li><a href="pages/home">Home</a></li>
        <li><a href="pages/help">Help</a></li>
        <li><a href="pages/sobre">Sobre</a></li>
        <li><a href="cadastrar/motoristas">+ Motoristas</a></li>
        <li><a href="cadastrar/veiculos">+ Veiculos</a></li>
        <li><a href="cadastrar/agendamentos">Agendar Visita</a></li>
        <li><a href="cadastrar/usuarios">+ Usuario</a></li>
        <li><a href="sair.php" onclick="confirmarSaida()">Sair</a></li>
    </ul>

    <div class="menu">
        <label for="chk1">
            <i class="fas fa-bars"></i>
        </label>
    </div>
</header>

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
                window.location.href = "home";
            }
        });
    }
</script>