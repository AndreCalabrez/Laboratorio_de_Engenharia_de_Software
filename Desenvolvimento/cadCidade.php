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

$query = mysqli_query($link,"SELECT sigla_uf, estado FROM uf;");

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
        <form action="registrarCidade.php" method="get">
            <label>UF: </label><select name="uf">
            <?php while($prod = mysqli_fetch_array($query)) { ?>
                <option value="<?php echo $prod['sigla_uf'] ?>"><?php echo $prod['estado'] ?></option>
            <?php } ?>
            </select><br />
            <label>Cidade: <input type="text" name = "cidade"></label><br />
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
