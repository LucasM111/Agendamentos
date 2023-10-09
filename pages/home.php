<?php
if (!isset($pagina))
    exit;
require 'configs/functions.php';

$adm = $_SESSION['categoria'][1];
?>

</head>
<<<<<<< Updated upstream

=======
<header>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <nav class="navbar bg-body-tertiary">
            <div class="container">
                <a class="navbar-brand" href="pages/home">
                    <img src="images/Ltech.png" alt="Ltech" width="80" height="80" class="ltech">
                </a>
            </div>
        </nav>
        <div class="container-fluid">
            <a class="navbar-brand" href="pages/home">Agendamentos</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <ul>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    </ul>
                </div>
            </ul>
        </div>
    </nav>
</header>
>>>>>>> Stashed changes
<!-- ----------------------------------------------------------------------------------------------- -->
<div class='global'>

    <body class="bodyclasshome">

        <!-- Navegação -->
        <div class="containerhome">
            <div class="navigationhome">
                <ul>
                    <li>
                        <a href="#">
                            <span class='icon'>
                                <!-- link do icone -->
                                <ion-icon name="clipboard-outline"></ion-icon>
                            </span>
                            <span class="title">
                                <strong>AGENDAMENTOS</strong>
                            </span>
                        </a>
                    </li>

                    <li>
                        <a href="pages/home">
                            <span class='icon'>
                                <!-- link do icone -->
                                <ion-icon name="home-outline"></ion-icon>
                            </span>
                            <span class="title">
                                Home
                            </span>
                        </a>
                    </li>

                    <li>
                        <a href="pages/hel">
                            <span class='icon'>
                                <!-- link do icone -->
                                <ion-icon name="help-circle-outline"></ion-icon>
                            </span>
                            <span class="title">
                                HELP
                            </span>
                        </a>
                    </li>

                    <li>
                        <a href="pages/sobre">
                            <span class='icon'>
                                <!-- link do icone -->
                                <ion-icon name="information-circle-outline"></ion-icon>
                            </span>
                            <span class="title">
                                Sobre a Plataforma
                            </span>
                        </a>
                    </li>

                    <li>
                        <a href="cadastrar/motoristas">
                            <span class='icon'>
                                <!-- link do icone -->
                                <ion-icon name="accessibility-outline"></ion-icon>
                            </span>
                            <span class="title">
                                Cadastrar Motorista
                            </span>
                        </a>
                    </li>

                    <li>
                        <a href="cadastrar/veiculos">
                            <span class='icon'>
                                <!-- link do icone -->
                                <ion-icon name="car-outline"></ion-icon>
                            </span>
                            <span class="title">
                                Cadastrar Veiculo
                            </span>
                        </a>

                    </li>

                    <li>
                        <a href="cadastrar/agendamentos">
                            <span class='icon'>
                                <!-- link do icone -->
                                <ion-icon name="calendar-number-outline"></ion-icon>
                            </span>
                            <span class="title">
                                Agendar Visitas
                            </span>
                        </a>
                    </li>

                    <li>
                        <a href="cadastrar/usuarios">
                            <span class='icon'>
                                <!-- link do icone -->
                                <ion-icon name="people-circle-outline"></ion-icon>
                            </span>
                            <span class="title">
                                Cadastrar Novo Usuário
                            </span>
                        </a>
                    </li>

                    <li>
                        <a href="sair.php">
                            <span class='icon'>
                                <!-- link do icone -->
                                <ion-icon name="log-out-outline"></ion-icon>
                            </span>
                            <span class="title">
                                Sair
                            </span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

<<<<<<< Updated upstream
        <!-- MAIN -->

        <div class="mainhome">
            <div class="topbarhome">
                <div class="togglehome">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>

                <div class="userhome">
                <img src='images/Ltech.png' alt='logo'>
            </div>
            </div>
            <h2 class="text-center">Olá, <?= $_SESSION["usuarioAdm"]["nome"]; ?></h2>
        </div>
=======
        <!-- ----------------------------------------------------------------------------------------------- -->
        <?php if ($adm) : ?>
            <div class="col">
                <div class="card h-100">
                    <img src="images/cadusuario.png" class="w-50" alt="Cadastro de Usuario">
                    <div class="card-body">
                        <h5 class="card-title">Cadastro de Usuarios</h5>
                        <p class="card-text">Aqui voce poderá cadastrar o usuarios.</p>
                    </div>
                    <a href="cadastrar/usuarios" class="btn btn-info btn-sm" title="Novo registro">
                        Cadastrar Novo Usuario
                    </a>
                </div>
            </div>
        <?php endif; ?>
    </div>
>>>>>>> Stashed changes

    </body>
    </body>

    </html>