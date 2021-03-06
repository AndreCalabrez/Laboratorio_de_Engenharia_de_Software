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


            $query = mysqli_query($con,"SELECT codDisco, marca FROM disco;");
            ?>


            <table  style="width: 260px; height: 80px" >
                <tr>
                    <td>
                        Código
                    </td>
                    <td>
                        Disco
                    </td>
                    <td colspan="2">
                        OPÇÕES
                    </td>
                </tr>
                <?php while($prod = mysqli_fetch_array($query)) { ?>

                    <tr>
                        <td>
                            <label> <?php echo $prod['codDisco'] ?></label>
                        </td>
                        <td>
                            <label> <?php echo $prod['marca'] ?></label>
                        </td>
                        <td>
                            <a href="Disco_deletar.php?id=<?php echo $prod['codDisco']?>">
                                <img src="_img/excluir.jpg" height="20" width="20" /></a>
                        </td>
                        <td>
                             <a href="Disco_alterar.php?id=<?php echo $prod['codDisco']?>">
                                <img  src="_img/alterar.png" height="20" width="20" /></a>
                        </td>
                    </tr>
                <?php } ?>

            </table>
        </div>
    </li>
    <li class="active">
        <div id="div_conteudo">
            <H4>CADASTRO</H4>
            <form action="Disco_cadProc.php" method="get">
                <table >
                    <tr>
                        <td class="tabelaCadastro"><label>Codigo: </label></td>
                        <td class="tabelaCadastro"><label></label></td>
                    </tr>
                    <tr>
                        <td class="tabelaCadastro"><label>Marca:</label></td>
                        <td class="tabelaCadastro"> <input type="text" name="marca" required/></td>
                    </tr>
                    <tr>
                        <td class="tabelaCadastro"><label>Modelo:</label></td>
                        <td class="tabelaCadastro"><input type="text" name = "modelo" required/></td>
                    </tr>
                    <tr>
                        <td class="tabelaCadastro"><label>Espessura</label></td>
                        <td class="tabelaCadastro"><input type="text" name = "espessura" required/></td>
                    </tr>
                    <tr>
                        <td class="tabelaCadastro"><label>Diametro:</label></td>
                        <td class="tabelaCadastro"><input type="text" name="diametro" required /></td>
                    </tr>
                    <tr>
                        <td class="tabelaCadastro"><label>Tempo de Trabalho:</label></td>
                        <td class="tabelaCadastro"><input type="text" name="t_trabalho" required/></td>
                    </tr>
                </table>
                <input type="submit" name="gravar" value="Gravar">
            </form>
            </div>
    </li>

</body>
</html>

<!-- class="bt_carrega_conteudo btn "-->