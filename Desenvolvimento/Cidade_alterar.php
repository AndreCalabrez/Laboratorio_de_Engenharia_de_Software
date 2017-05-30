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
<H4>CADASTRO</H4>
<?php
if($_GET){

$id = $_GET['id'];
require_once("conexao/conexao.php");

$query = mysqli_query($con,"SELECT siglaUf, estado FROM uf;");

$sql = mysqli_query($con,"SELECT c.codCidade, c.cidade, u.siglaUf 
                                       FROM cidade c,
                                            uf u 
                                        WHERE u.siglaUf = c.siglaUF
                                         AND c.codCidade = $id;");

$dados = mysqli_fetch_array($sql);
?>
    <form action="Cidade_altProc.php" method="get">
        <table >
            <tr>
                <td class="tabelaCadastro"><label>Codigo:</label></td>
                <td class="tabelaCadastro"><input type="text" name = "id" required readonly value="<?php echo $dados['codCidade'] ?>"></td>
            </tr>
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
                <td class="tabelaCadastro"><input type="text" name = "cidade" value="<?php echo $dados['cidade'] ?>" required></td>
            </tr>
        </table>
        <input type="submit" name="gravar" value="Gravar">
    </form>
<?php } ?>
</body>
</html>

