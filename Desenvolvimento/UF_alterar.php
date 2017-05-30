<!DOCTYPE html>
<html lang="pt-br">
<head>

    <meta charset="utf-8">
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
    <?php
    if($_GET){

    $id = $_GET['id'];
    require_once("conexao/conexao.php");

        $query = mysqli_query($con,"SELECT `siglaUf`, `estado` 
                                                  FROM `uf`
                                                  WHERE `siglaUf` = '$id';");
        $prod = mysqli_fetch_array($query);
    ?>
    <H4>Alterar</H4>
    <form action="UF_alterarProc.php" method="get">
            <table >
                <tr>
                    <td class="tabelaCadastro"><label>Sigla:</label></td>
                    <td class="tabelaCadastro"> <input type="text" name="sigla" value="<?php echo $prod['siglaUf']?>" readonly ></td>
                </tr>
                <tr>
                    <td class="tabelaCadastro"><label>Estado:</label></td>
                    <td class="tabelaCadastro"> <input type="text" name="estado" value="<?php echo $prod['estado']?>" required></td>
                </tr>
            </table>
        <br/>
            <input type="submit" name="gravar" value="Gravar">
        </form>
    <?php } ?>
    </body>
</html>
