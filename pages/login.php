<div class="log-in">
    <div class='wrapper'>
        <form name="formLogin" method="post" action="verificar.php" data-parsley-validate="">
            <h1>Login</h1>

            <div class='input-box'>
                <input type="text" name="login" id="login" class="form-control form-control-lg" required
                    data-parsley-required-message="Preencha o login por favor" placeholder="Digite seu Login">
                <i class='bx bxs-user'></i>
            </div>

            <div class='input-box'>
                <input type="password" name="senha" id="senha" class="form-control form-control-lg" required
                    data-parsley-required-message="Preencha a senha por favor" placeholder="Digite sua Senha">
                <i class='bx bxs-lock-alt'></i>
                <i class="fas fa-eye toggle-password" onclick="togglePasswordVisibility('senha')"></i>
            </div>

            <button type="submit" class="btnlog-in"> <i class="fas fa-check"></i> Efetuar Login </button>
        </form>

    </div>
    <br>
</div>

<script>
function togglePasswordVisibility(inputId) {
    var passwordInput = document.getElementById(inputId);
    var icon = document.querySelector('.toggle-password');

    if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        icon.classList.remove('fa-eye');
        icon.classList.add('fa-eye-slash');
    } else {
        passwordInput.type = 'password';
        icon.classList.remove('fa-eye-slash');
        icon.classList.add('fa-eye');
    }
}
</script>