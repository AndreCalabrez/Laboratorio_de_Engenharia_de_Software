<?php
require_once("conexao/conexao.php");


$cod = $_GET['idDisco'];
$marca = $_GET['marca'];
$modelo = $_GET['modelo'];
$espessura = $_GET['espessura'];
$diametro = $_GET['diametro'];
$t_trabalho = $_GET['t_trabalho'];


$sql = "UPDATE `disco` SET `marca` = '$marca', 
              `modelo` = '$modelo', `espessura` = '$espessura', 
              `diametro` = '$diametro', `tempoTrabalho` = '$t_trabalho'
        WHERE `codDisco` = $cod";

$queryExec = mysqli_query($con, $sql) or die ("Erro: ".mysqli_error($con));
header("location: cadastrar.html");


?>
