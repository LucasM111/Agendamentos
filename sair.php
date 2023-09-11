<?php

    //iniciar sessao
    session_start();
    //destruir aquela sessao
    unset($_SESSION["usuarioAdm"]);
    //redirecionar
    header("Location: index.php");
?>

<!-- <script>
    function sair($_SESSION) {
        Swal.fire({
            icon: "warning",
            title: "Você deseja mesmo sair?",
            showCancelButton: true,
            confirmButtonText: "Sair",
            cancelButtonText: "Cancelar",
        }).then((result)=>{
            if (result.isConfirmed) {
                unset($_SESSION["usuarioAdm"]);
                header("Location: index.php");
            }
        })
    }
</script> -->
