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
    <style>
        div.chapa{
            background-color:aquamarine ;
            width: 300px;
            height: 300px;

        }
        div.obj1{
            background-color:#61bd8c;
            width: 50px;
            height: 50px;
            position: absolute;
        }
    </style>

</head>

<body>
<?php
// pegando os dados do input
//para pegar o valor do input nome
$nome = $_POST['nomePeca'];
$largura = $_POST['largPeca'];
$altura = $_POST['altPeca'];
$qtd = $_POST['qtdPeca'];

$altChapa = 2;
$largChapa = 2;
$altura_tema = 144;
$largura_tema = 173;
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
        <div class="chapa"   style=" width: 600px; height: 300px;" />
        <div class="obj1" style="width: <?php echo ($largura/$largChapa); ?>px; height:<?php echo ($altura/$altChapa); ?>px; top: <?php echo($altura_tema);?>px;">
        </div>
        <div class="obj1" style="width: <?php echo ($largura/$largChapa); ?>px; height:<?php echo ($altura/$altChapa); ?>px; left: <?php echo(($largura/$largChapa)+$largura_tema+1);?>px;">
        </div>
        <div class="obj1" style="width: <?php echo ($largura/$largChapa); ?>px; height:<?php echo ($altura/$altChapa); ?>px; left: <?php echo(($largura/$largChapa)+($largura/$largChapa)+$largura_tema+2);?>px;">
        </div>
        <div class="obj1" style="width: <?php echo (($largura/$largChapa)/2); ?>px; height:<?php echo (($altura/$altChapa)/3); ?>px; left: <?php echo(($largura/$largChapa)+(($largura/$largChapa)+($largura/$largChapa)+$largura_tema+3));?>px;">
        </div>

</div>
    <input type="button" value="Salvar"/>
</div>



    <!-- Site footer -->
    <footer class="footer">
        <p>&copy; 2017 Company, Inc.</p>
    </footer>

</div> <!-- /container -->



</body>
</html>
