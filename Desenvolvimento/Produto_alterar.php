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
<?php
if($_GET){

$id = $_GET['id'];
    require_once("conexao/conexao.php");

    $query = mysqli_query($con,"SELECT `codProduto`, `nome`, `corPred`, `espessura` 
                                                FROM `produto`
                                                WHERE `codProduto` = '$id' ;");
    $prod = mysqli_fetch_array($query);
?>
<H4>ALTERAR</H4>
        <form action="Produto_alterarProc.php" method="get">
            <table >
                <tr>
                    <td class="tabelaCadastro"><label >Codigo: </label></td>
                    <td class="tabelaCadastro"><label><input name="id" type="text" readonly value="<?php echo $id;?>"> </label></td>
                </tr>
                <tr>
                    <td class="tabelaCadastro"><label>Nome:</label></td>
                    <td class="tabelaCadastro"><input type="text" name="nome" value="<?php echo $prod['nome']?>" required/></td>
                </tr>
                <tr>
                    <td class="tabelaCadastro"><label>Cor Predominante:</label></td>
                    <td class="tabelaCadastro"><input type="text" name = "cor" required value="<?php echo $prod['corPred']?>"/></td>
                </tr>
                <tr>
                    <td class="tabelaCadastro"><label>Espessura:</label></td>
                    <td class="tabelaCadastro"><input type="text" name = "espessura" required value="<?php echo $prod['espessura']?>"/></td>
                </tr>
            </table>
            <input type="submit" name="gravar" value="Gravar">

        </form>
<?php } ?>
</body>
</html>
