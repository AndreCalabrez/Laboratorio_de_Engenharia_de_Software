<?php
    require_once("conexao/conexao.php");
    $id = $_GET['id'];
    $nome_cidade = $_GET['cidade'];
    $sigla_uf = $_GET['uf'];


    $sql= "UPDATE `cidade` SET `cidade`= '$nome_cidade', `siglaUF` = '$sigla_uf'
              WHERE `codCidade` = '$id'";
    $queryExec = mysqli_query($con, $sql) or die ("Erro: ".mysqli_error($con));
    header("location: cadastrar.html");
?>