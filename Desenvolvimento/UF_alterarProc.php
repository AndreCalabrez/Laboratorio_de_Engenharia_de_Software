<?php
    require_once("conexao/conexao.php");

    $uf = $_GET['sigla'];
    $estado = $_GET['estado'];


    $sql= "UPDATE `uf`  SET  `estado` = '$estado'  
           WHERE `siglaUf` = '$uf';";
    $queryExec = mysqli_query($con, $sql) or die ("Erro: ".mysqli_error($con));
    header("location: cadastrar.html");



?>