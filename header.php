<?php
if (!isset($pagina)) {
    header("Location: index.php");
}
?>
<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- <p class = "text-white">Controle de Fluxo Veicular: Agendamento de Visitas</p> -->

    <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">

    </form>
    <!-- Navbar-->
    <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
        <li class="nav-item dropdown">
        <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="home">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="pages/sobre">Sobre a Plataforma</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="pages/help">HELP</a>
        </li>
        <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i> Olá <?= $_SESSION["usuarioAdm"]["nome"]; ?></a>
        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">

            <li><a class="dropdown-item" href="sair.php">Sair</a></li>
        </ul>
        </li>
    </ul>
</nav>
