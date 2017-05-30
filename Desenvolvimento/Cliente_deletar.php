<?php

require_once("conexao/conexao.php");

$id = $_GET['id']; // Recebendo o valor enviado pelo link

$sql= "DELETE FROM cliente WHERE codCliente = $id ";
mysqli_query($con,$sql);

header("location: cadastrar.html");
?>


