<?php
    require_once("conexao/conexao.php");

    $nome = $_POST['nome'];
    $bairro = $_POST['bairro'];
    $rua = $_POST['endereco'];
    $numero = $_POST['numero'];
    $telefone = $_POST['telefone'];
    $cpf = $_POST['cpf'];
    $login = $_POST['login'];
    $senha = md5($_POST['senha']);    
    $funcao = $_POST['funcao'];

    echo $senha;

    $sql= "INSERT INTO `funcionario` (`nome`, `rua`, `numero`, `telefone`, `login`, `senha`, `cpf`, `codBairro`, `funcao`) 
           VALUES ('$nome','$rua','$numero', '$telefone','$login','$senha', '$cpf', '$bairro', '$funcao')";
   mysqli_query($con,$sql);
//header("location: cadastrar.html");


?>