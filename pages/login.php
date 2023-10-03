
<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-6">
            <div class="card">
                <div class="card-header text-center">
                <img src="images/Ltech.png" alt="Ltech" width="80" height="80" class = "ltech">
                    
                </div>
                <div class="card-body">
                    <form name="formLogin" method="post" action="verificar.php"
                    data-parsley-validate="">
                        <input type="text" name="login" id="login" 
                        class="form-control form-control-lg" required
                        data-parsley-required-message="Preencha o login por favor" placeholder="Digite seu Login">
                        <br>
                        <input type="password" name="senha" id="senha"
                        class="form-control form-control-lg" required
                        data-parsley-required-message="Preencha a senha por favor" placeholder="Digite sua Senha">
                        <br>
                        <button type="submit" class="btn btn-success btn-lg w-100">
                            <i class="fas fa-check"></i> Efetuar Login
                        </button>
                    </form>
                    <br>

                </div>
                <div class="card-footer text-center">
                    <p>Desenvolvido por Lucas Marques</p>
                </div>
            </div>
        </div>
    </div>
</div>
