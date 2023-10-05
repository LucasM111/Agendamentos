
<div class = "log-in">
    <div class = 'wrapper'>
        <form name="formLogin" method="post" action="verificar.php" data-parsley-validate="">
            <h1>Login</h1>

            <div class = 'input-box'>
            <input type="text" name="login" id="login" class="form-control form-control-lg" required data-parsley-required-message="Preencha o login por favor" placeholder="Digite seu Login">
            <i class='bx bxs-user'></i>
            </div>

            <div class = 'input-box'>
            <input type="password" name="senha" id="senha" class="form-control form-control-lg" required data-parsley-required-message="Preencha a senha por favor" placeholder="Digite sua Senha">
            <i class='bx bxs-lock-alt' ></i>
            </div>

            <button type="submit" class="btnlog-in"> <i class="fas fa-check"></i> Efetuar Login </button>
        </form>

    </div>
        <br>
</div>