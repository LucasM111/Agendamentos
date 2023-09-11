<?php
    /*
    session_start();

    if (!isset($_SESSION["nome"]))
        header("Location: index.php");

    echo $_SESSION["nome"];
    echo "<br>";
    echo $_SESSION["admin"]["login"];
    */

    $senha = 1234;
    echo password_hash($senha,PASSWORD_DEFAULT);
    