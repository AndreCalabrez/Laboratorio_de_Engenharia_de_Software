<?php
    require_once("conexao/conexao.php");

    $cod_cidade = $_GET['cb_cidade'];
    $bairro = $_GET['bairro'];

    $sql= "INSERT INTO bairro ( bairro, codCidade ) 
           VALUES ('$bairro','$cod_cidade')";
    mysqli_query($con,$sql);

    header("location: cadastrar.html");
?>

