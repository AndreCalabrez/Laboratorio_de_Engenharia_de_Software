<?php
    require_once("conexao/conexao.php");

    $id = $_GET['id'];
    $nome = $_GET['nome'];
    $rua = $_GET['endereco'];
    $numero = $_GET['numero'];
    $telefone = $_GET['telefone'];
    $tipo = $_GET['tipo'];
    $cpf = $_GET['cpf'];
    $bairro = $_GET['bairro'];

    $sql= "UPDATE cliente SET `nome` = '$nome', 
                              `rua`='$rua', 
                              `numero`='$numero',
                              `telefone` = '$telefone',
                              `tipo`= '$tipo', 
                              `cpfCnpj`='$cpf',
                              `codBairro`='$bairro'
                   WHERE `codCliente` = '$id'";

    mysqli_query($con,$sql);
header("location: cadastrar.html");



?>
