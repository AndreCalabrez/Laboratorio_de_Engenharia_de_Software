<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
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
    <script type="text/javascript" src="dist/js/Tabela.js"></script>


</head>

<body>
<?php

require_once("conexao/conexao.class.php");
$db = new db();
$link = $db->conecta_mysql();

$query = mysqli_query($link,"SELECT cod_disco, modelo, marca 
                                       FROM disco;");
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
        <form action="pedido.php" method="post" class="formulario">
            <label>Cliente <input type="text" name="cliente"/></label>  <input type="button" value="Buscar Cliente"><br/>
            <label>Produto <input type="text" name = "produto"/></label>  <input type="button" value="Buscar Produto"></br>
            <label> Disco </label> <select name="disco">
                <?php while($prod = mysqli_fetch_array($query)) { ?>
                    <option value="<?php echo $prod['modelo']?> - <?php echo $prod['marca']?>"><?php echo $prod['modelo']?> - <?php echo $prod['marca']?> </option>
                <?php } ?>
            </select><br/>
            <label>Largura <input type="text" name = "larg"/></label>
            <label>Altura <input type="text" name="altura"/></label>
            <label>Quantidade <input type="text" name="qtd"/></label>
            <input type="button" value="Adicionar" onclick="inserirLinhaTabelaChapas(larg.value, altura.value, qtd.value, contador.value,minhaTabela.id)">
            <table id="minhaTabela" border="1">
                <tr>
                    <th>QUANTIDADE</th>
                    <th>LARGURA</th>
                </tr>


            </table>
            <label>Total de Chapas <input id="contador" type="text" value="0" readonly="true" name="qtChapasTotal"/></label><br/>
            <input type="submit" value="Avançar">


        </form>
            </div>


    </div>



    <!-- Site footer -->
    <footer class="footer">
        <p>&copy; 2017 Company, Inc.</p>
    </footer>

</div> <!-- /container -->



</body>
</html>

