<?php
if (!isset($pagina))
    exit;
require 'configs/functions.php';
?>

</head>
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

    </body>
    </body>

    </html>