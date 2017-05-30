<?php
    require_once("conexao/conexao.php");

    $nome = $_GET['nome'];
    $cor = $_GET['cor'];
    $espessura = $_GET['espessura'];

    $sql= "INSERT INTO produto (nome, corPred, espessura) 
          VALUES ('$nome','$cor', '$espessura')";
    mysqli_query($con,$sql);
header("location: cadastrar.html");
?>