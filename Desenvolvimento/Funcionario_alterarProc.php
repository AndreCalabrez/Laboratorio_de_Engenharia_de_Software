<?php
    require_once("conexao/conexao.php");

    $id= $_GET['id'];
    $nome = $_GET['nome'];
    $bairro = $_GET['bairro'];
    $rua = $_GET['endereco'];
    $numero = $_GET['numero'];
    $telefone = $_GET['telefone'];
    $cpf = $_GET['cpf'];
    $login = $_GET['login'];
    $senha = md5($_GET['senha']);
    $funcao = $_GET['funcao'];

    $sql= "UPDATE  `funcionario` SET  `nome`='$nome', `rua` = '$rua', `numero` = '$numero', `telefone` = '$telefone', 
                   `login`='$login', `senha` = '$senha', `cpf` = '$cpf', `codBairro`='$bairro', `funcao`='$funcao'
                   WHERE `codFuncionario` = '$id'";

    $queryExec = mysqli_query($con, $sql) or die ("Erro: ".mysqli_error($con));
    header("location: cadastrar.html");


?>