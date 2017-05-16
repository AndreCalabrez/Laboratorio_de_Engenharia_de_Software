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
    <script type="text/javascript" src="dist/js/Tabela.js"></script>
</head>

<body>

<?php
// pegando os dados do input
//para pegar o valor do input nome
    $cliente = $_POST['cliente'];
    $produto = $_POST['produto'];
    $qtdChapas = $_POST['qtChapasTotal'];
    $disco = $_POST['disco'];


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
        <form action="resultado.php" method="POST" class="formulario">

            <div class="jumbotron">
                <ul class="nav nav-justified">
                    <li class="active" >
                        <div>
                            <label>Cliente: <?php echo $cliente?> </label><br />
                            <label>Chapa: <?php echo $produto?></label><br />
                            <label>Quantidade: <?php echo $qtdChapas?></label><br />
                            <label>Disco: <?php echo $disco?></label><br />
                        </div>
                    </li>
                    <li class="active">  <div><label>Nome da Peça :<input type="text" name="nomePeca"/></label></div>
                        <div><label>Largura da Peça :<input type="text" name="largPeca"/></label></div>
                        <div><label>Altura da Peça :<input type="text" name="altPeca"/></label></div>
                        <div><label>Quantidade de Peças :<input type="text" name="qtdPeca"/></label></div>

                        <input type="button" value="Adicionar" onclick="inserirLinhaTabelaItens(nomePeca.value, largPeca.value, altPeca.value, qtdPeca.value,
                tabelaItens.id)"/>
                        <div class="centralizar" >
                            <table border="1px" class="centralizar" id="tabelaItens">
                                <tr>
                                    <td>NOME</td>
                                    <td>QUANTIDADE</td>
                                    <td>MEDIDAS</td>
                                </tr>
                            </table>
                        </div>
                        <div>
                            <input type="submit" value="Gerar Layout"/>
                        </div>
        </form>
                        <div id="conteudo"></div>
                    </li>
                </ul>
            </div>



    </div>



    <!-- Site footer -->
    <footer class="footer">
        <p>&copy; 2017 Company, Inc.</p>
    </footer>

</div> <!-- /container -->



</body>
</html>
