<?php
    require_once("conexao/conexao.php");


    $nome = $_GET['nome'];
    $rua = $_GET['endereco'];
    $numero = $_GET['numero'];
    $telefone = $_GET['telefone'];
    $tipo = $_GET['tipo'];
    $cpf = $_GET['cpf'];
    $bairro = $_GET['bairro'];

    $sql= "INSERT INTO cliente (nome, rua,numero, telefone, tipo, cpfCnpj, codBairro) 
           VALUES ('$nome','$rua','$numero','$telefone', '$tipo', '$cpf', $bairro)";
    mysqli_query($con,$sql);

    header("location: cadastrar.html");
?>
