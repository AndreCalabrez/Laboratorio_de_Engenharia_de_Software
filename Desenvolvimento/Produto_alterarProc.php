<?php
    require_once("conexao/conexao.php");
    $id = $_GET['id'];
    $nome = $_GET['nome'];
    $cor = $_GET['cor'];
    $espessura = $_GET['espessura'];

    $sql= "UPDATE `produto` SET `nome` = '$nome', 
                                `corPred`='$cor', 
                                `espessura` = '$espessura' 
                            WHERE codProduto = $id;";
    $queryExec = mysqli_query($con, $sql) or die ("Erro: ".mysqli_error($con));
header("location: cadastrar.html");
?>