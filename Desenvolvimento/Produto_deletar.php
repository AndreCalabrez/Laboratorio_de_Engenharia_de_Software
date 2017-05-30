<?php

require_once("conexao/conexao.php");


$id = $_GET['id']; // Recebendo o valor enviado pelo link


$sql= "DELETE FROM `produto` WHERE `codProduto` = '$id'; ";
mysqli_query($con ,$sql);


header("location: cadastrar.html");
?>


