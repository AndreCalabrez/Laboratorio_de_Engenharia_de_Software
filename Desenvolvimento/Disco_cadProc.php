<?php
    require_once("conexao/conexao.php");

    $marca = $_GET['marca'];
    $modelo = $_GET['modelo'];
    $espessura = $_GET['espessura'];
    $diametro = $_GET['diametro'];
    $t_trabalho = $_GET['t_trabalho'];

    $sql= "INSERT INTO `disco` (`marca`, `modelo`, `espessura`, `diametro`, `tempoTrabalho`) 
         VALUES ('$marca','$modelo','$espessura',' $diametro','$t_trabalho')";
    mysqli_query($con,$sql);
    header("location: cadastrar.html");
?>

