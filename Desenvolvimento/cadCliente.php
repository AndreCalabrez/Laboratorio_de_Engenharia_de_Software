<!DOCTYPE html>
<html lang="en">
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
</head>

<body>
<?php
require_once("conexao/conexao.class.php");
$db = new db();
$link = $db->conecta_mysql();

$query_bairro = mysqli_query($link,"SELECT cod_bairro, nome_bairro FROM bairro;");



$query_cidade = mysqli_query($link,"SELECT cod_cidade, nome FROM cidade;");

?>


<div class="container">

    <!-- The justified navigation menu is meant for single line per list item.
         Multiple lines will require custom code not provided by Bootstrap. -->
    <div class="masthead">
        <h3 class="text-muted">Sistema de Corte</h3>
        <nav>
            <ul class="nav nav-justified">
                <li class="active"><a href="index.html">Home</a></li>
                <li><a href="cadastrar.html">Cadastro</a></li>
                <li><a href="cad_pedido.php">Pedido</a></li>
                <li><a href="relatorio.html">Relatorios</a></li>
            </ul>
        </nav>
    </div>

    <!-- Jumbotron -->
    <div class="jumbotron">
        <form action="registrarCliente.php" method="get">
            <label>Nome:<input type="text" name="nome"/></label><br />
            <label>Cidade:</label>
            <select name="cidade">
                <?php while($prod = mysqli_fetch_array($query_cidade)) { ?>
                    <option value="<?php echo $prod['cod_cidade'] ?>"><?php echo $prod['nome'] ?></option>
                <?php } ?>
            </select>
            <br />
            <label>Bairro: </label><select name="bairro">
                <?php while($prod = mysqli_fetch_array($query_bairro)) { ?>
                    <option value="<?php echo $prod['cod_bairro'] ?>"><?php echo $prod['nome_bairro'] ?></option>
                <?php } ?>
            </select><br />
            <label>Rua: <input type="text" name = "endereco"/></label><br />
            <label>Numero: <input type="text" name = "numero"/></label><br />
            <label>Telefone: <input type="text" name = "telefone"></label><br />
            <label>Tipo Cliente: </label><select name="tipo">
                <option value="ps">P. Fisica</option>
                <option value="pj">P. Juridica</option>
            </select><br />
            <label>CPF / CNPJ: <input type="text" name = "cpf"></label><br />
            <label>Inscrição Estadual: <input type="text" name="inscricao_estadual"></label><br />
            <input type="submit" name="gravar" value="Gravar">

        </form>
    </div>



    <!-- Site footer -->
    <footer class="footer">
        <p>&copy; 2017 Company, Inc.</p>
    </footer>

</div> <!-- /container -->



</body>
</html>

