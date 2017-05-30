<?php
    require_once("conexao/conexao.php");

    $uf = $_GET['sigla'];
    $estado = $_GET['estado'];


    $sql= "INSERT INTO uf (siglaUf, estado ) 
           VALUES ('$uf', '$estado')";
    mysqli_query($con,$sql);

    header("location: cadastrar.html");

?>