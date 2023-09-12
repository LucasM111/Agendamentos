<?php
    if (!isset($pagina))
        exit;
?>

</head>
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
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
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
<!-- ----------------------------------------------------------------------------------------------- -->

<body>
    <div class="row row-cols-1 row-cols-md-3 g-1">
        <div class="col">
            <div class="card h-100">
                <img src="images/cad.png" class="w-50" alt="Cadastro de Agendamento">
                <div class="card-body">
                    <h5 class="card-title">Gerar Agendamentos</h5>
                    <p class="card-text">Aqui voce poderá cadastrar um novo agendamento.</p>
                </div>
                <a href="cadastrar/agendamentos" class="btn btn-info btn-sm" title="Novo registro">
                    Cadastrar Novo Agendamento
                </a>
            </div>
        </div>
        <!-- ----------------------------------------------------------------------------------------------- -->
        <div class="col">
            <div class="card h-100">
                <img src="images/cadveiculo.png" class="w-50" alt="Cadastro de Veiculo">
                <div class="card-body">
                    <h5 class="card-title">Cadastro do Veiculo</h5>
                    <p class="card-text">Aqui voce poderá cadastrar o veiculo que fará a visita</p>
                </div>
                <a href="cadastrar/veiculos" class="btn btn-info btn-sm" title="Novo registro">
                    Cadastrar Novo Agendamento
                </a>
            </div>
        </div>
        <!-- ----------------------------------------------------------------------------------------------- -->
        <div class="col">
            <div class="card h-100">
                <img src="images/cadpessoa.png" class="w-50" alt="Cadastro de Motorista">
                <div class="card-body">
                    <h5 class="card-title">Cadastro de Motorista</h5>
                    <p class="card-text">Aqui voce poderá cadastrar o motorista.</p>
                </div>
                <a href="cadastrar/motoristas" class="btn btn-info btn-sm" title="Novo registro">
                    Cadastrar Novo Agendamento
                </a>
            </div>
        </div>

        <!-- ----------------------------------------------------------------------------------------------- -->
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
    </div>
    aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa

</body>

</html>