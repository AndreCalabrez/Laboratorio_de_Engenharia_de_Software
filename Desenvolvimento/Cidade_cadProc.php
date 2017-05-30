<?php
    require_once("conexao/conexao.php");


    $uf = $_GET['uf'];
    $cidade = $_GET['cidade'];


    $sql= "INSERT INTO cidade (cidade, siglaUF) 
           VALUES ('$cidade', '$uf')";

    mysqli_query($con,$sql);
    header("location: cadastrar.html");
?>
