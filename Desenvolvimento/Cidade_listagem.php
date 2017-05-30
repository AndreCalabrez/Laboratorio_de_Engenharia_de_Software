<!DOCTYPE html>
<html lang="pt-br">
<head>


    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Sistema de Corte</title>

    <!-- Bootstrap core CSS -->
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="dist/css/estilo.css" rel="stylesheet">
</head>
<body>

    <ul class="nav nav-justified">
    <li class="active" >
        <div>
            <H4>LISTAGEM</H4>
<?php
require_once("conexao/conexao.php");


$query = mysqli_query($con,"SELECT c.codCidade, c.cidade, u.siglaUf 
                                       FROM cidade c,
                                            uf u 
                                        WHERE u.siglaUf = c.siglaUF;");
?>

<table  style="width: 400px; height: 140px" >
    <tr>
        <td>
            Código
        </td>
        <td>
            Cidade
        </td>
        <td>
            UF
        </td>
        <td colspan="2">
            OPÇÕES
        </td>
    </tr>
    <?php while($prod = mysqli_fetch_array($query)) { ?>

    <tr>
        <td>
            <label><?php echo $prod['codCidade'] ?></label>
        </td>
        <td>
            <label><?php echo $prod['cidade'] ?></label>
        </td>
        <td>
            <label><?php echo $prod['siglaUf'] ?></label>
        </td>
        <td>
            <a href="Cidade_deletar.php?id=<?php echo $prod['codCidade']?>">
                <img src="_img/excluir.jpg" height="20" width="20" /></a>
        </td>
        <td>
            <a href="Cidade_alterar.php?id=<?php echo $prod['codCidade']?>">
                <img  src="_img/alterar.png" height="20" width="20" /></a>
        </td>
    </tr>
    <?php } ?>


</table>
    </div>
</li>
<li class="active">
    <div id="div_conteudo">
        <H4>CADASTRO </H4>
        <?php
        require_once("conexao/conexao.php");

        $query = mysqli_query($con,"SELECT siglaUf, estado FROM uf;");

        ?>
        <form action="Cidade_cadProc.php" method="get">
            <table >
                <tr>
                    <td class="tabelaCadastro"><label>UF: </label></td>
                    <td class="tabelaCadastro"><select name="uf">
                            <?php while($prod = mysqli_fetch_array($query)) { ?>
                                <option value="<?php echo $prod['siglaUf'] ?>"><?php echo $prod['estado'] ?></option>
                            <?php } ?>
                        </select></td>
                </tr>
                <tr>
                    <td class="tabelaCadastro"><label>Cidade:</label></td>
                    <td class="tabelaCadastro"><input type="text" name = "cidade" required></td>
                </tr>
            </table>
            <input type="submit" name="gravar" value="Gravar">
        </form>


</body>
</html>