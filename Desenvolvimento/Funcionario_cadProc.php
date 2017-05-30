<?php
    require_once("conexao/conexao.php");

    $nome = $_GET['nome'];
    $bairro = $_GET['bairro'];
    $rua = $_GET['endereco'];
    $numero = $_GET['numero'];
    $telefone = $_GET['telefone'];
    $cpf = $_GET['cpf'];
    $login = $_GET['login'];
    $senha = $_GET['senha'];
    $funcao = $_GET['funcao'];

    $sql= "INSERT INTO funcionario (nome, rua, numero, telefone, login, senha, cpf, codBairro, funcao) 
           VALUES ('$nome','$rua','$numero', '$telefone','$login','$senha', '$cpf', '$bairro', '$funcao')";
   mysqli_query($con,$sql);
header("location: cadastrar.html");


?>