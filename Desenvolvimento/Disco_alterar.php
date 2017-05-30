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

        $query = mysqli_query($con,"SELECT codDisco, modelo, marca, espessura, diametro, tempoTrabalho 
                                              FROM disco
                                               WHERE codDisco = $id;");
        $prod = mysqli_fetch_array($query);
        ?>
        <H4>ALTERAR</H4>
        <form action="Disco_alterarProc.php" method="get">
            <table >
                <tr>
                    <td class="tabelaCadastro"><label >Codigo: </label></td>
                    <td class="tabelaCadastro"><label><input name="idDisco" type="text" readonly value="<?php echo $id;?>"> </label></td>
                </tr>
                <tr>
                    <td class="tabelaCadastro"><label>Marca:</label></td>
                    <td class="tabelaCadastro"> <input type="text" name="marca"  value="<?php echo $prod['marca']?>" required/></td>
                </tr>
                <tr>
                    <td class="tabelaCadastro"><label>Modelo:</label></td>
                    <td class="tabelaCadastro"><input type="text" name = "modelo" value="<?php echo $prod['modelo']?>" required/></td>
                </tr>
                <tr>
                    <td class="tabelaCadastro"><label>Espessura</label></td>
                    <td class="tabelaCadastro"><input type="text" name = "espessura" value="<?php echo $prod['espessura']?>" required/></td>
                </tr>
                <tr>
                    <td class="tabelaCadastro"><label>Diametro:</label></td>
                    <td class="tabelaCadastro"><input type="text" name="diametro" required value="<?php echo $prod['diametro']?>" /></td>
                </tr>
                <tr>
                    <td class="tabelaCadastro"><label>Tempo de Trabalho:</label></td>
                    <td class="tabelaCadastro"><input type="text" name="t_trabalho" value="<?php echo $prod['tempoTrabalho']?>" required/></td>
                </tr>
            </table>
            <input type="submit" name="gravar" value="Alterar">
        </form>
    <?php } ?>
    </body>
</html>
