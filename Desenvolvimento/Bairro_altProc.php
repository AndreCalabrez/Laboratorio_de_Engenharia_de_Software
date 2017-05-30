<?php
    require_once("conexao/conexao.php");

$id = $_GET['idBairro'];
$cod_cidade = $_GET['cb_cidade'];
$bairro = $_GET['bairro'];


$sql= "UPDATE `bairro` SET `bairro`= '$bairro', `codCidade` = '$cod_cidade' 
              WHERE `codBairro` = '$id'";
$queryExec = mysqli_query($con, $sql) or die ("Erro: ".mysqli_error($con));
header("location: cadastrar.html");

?>

