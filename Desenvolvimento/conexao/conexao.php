<?php
    $server = "127.0.0.1";
    $user = "root";
    $pass = "";
    $db = "sistema_corte";

    $con = mysqli_connect($server, $user,$pass) or die ("Não Foi possivel conectar ao Servidor ");

    $sel_db = mysqli_select_db($con,$db) or die("Erro:".mysqli_error($con));

?>


