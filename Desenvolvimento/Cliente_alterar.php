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
<H4>ALTERAR</H4>
<?php
if($_GET){

$id = $_GET['id'];
require_once("conexao/conexao.php");


$query_bairro = mysqli_query($con,"SELECT codBairro, bairro FROM bairro;");

$query = mysqli_query($con,"SELECT codCliente, nome, rua, numero, telefone, tipo, cpfCnpj FROM cliente;");

$dados = mysqli_fetch_array($query);

?>

        <form action="Cliente_altProc.php" method="get">
        <table >
            <tr>
                <td class="tabelaCadastro"><label>Codigo:</label></td>
                <td class="tabelaCadastro"><input type="text" name = "id" required readonly value="<?php echo $dados['codCliente'] ?>"></td>
            </tr>
            <tr>
                <td class="tabelaCadastro"><label>Nome: </label></td>
                <td class="tabelaCadastro"><input type="text" name="nome" required="true" value="<?php echo $dados['nome'] ?>"/></td>
            </tr>
            <tr>
                <td class="tabelaCadastro"><label>UF:</label></td>
                <td class="tabelaCadastro"> <select name="cb_estado" id="cb_estado">
                        <option selected id="cb_estado_selecione">Selecione</option>
                    </select></td>
            </tr>
            <tr>
                <td class="tabelaCadastro"><label>Cidade: </label></td>
                <td class="tabelaCadastro"> <select name="cb_cidade" id="cb_cidade" >
                    </select></td>
            </tr>
            <tr>
                <td class="tabelaCadastro"><label>Bairro: </label></td>
                <td class="tabelaCadastro"><select name="bairro">
                        <?php while($prod = mysqli_fetch_array($query_bairro)) { ?>
                            <option value="<?php echo $prod['codBairro'] ?>"><?php echo $prod['bairro'] ?></option>
                        <?php } ?>
                    </select></td>
            </tr>
            <tr>
                <td class="tabelaCadastro"> <label>Rua:</label></td>
                <td class="tabelaCadastro"> <input type="text" name = "endereco" required value="<?php echo $dados['rua'] ?>"/></td>
            </tr>
            <tr>
                <td class="tabelaCadastro"><label>Numero: </label></td>
                <td class="tabelaCadastro"><input type="text" name = "numero" required value="<?php echo $dados['numero'] ?>"/></td>
            </tr>
            <tr>
                <td class="tabelaCadastro"><label>Telefone:</label></td>
                <td class="tabelaCadastro"><input type="text" name = "telefone" required value="<?php echo $dados['telefone'] ?>"></td>
            </tr>
            <tr>
                <td class="tabelaCadastro"><label>Tipo Cliente: </label></td>
                <td class="tabelaCadastro"><select name="tipo">
                        <option value="ps" <?php if( $dados['tipo'] == "ps"){echo "selected";} ?>>Pessoa Fisica</option>
                        <option value="pj" <?php if( $dados['tipo'] == "pj"){echo "selected";} ?>>Pessoa Juridica</option>
                    </select></td>
            </tr>
            <tr>
                <td class="tabelaCadastro"><label>CPF / CNPJ:</label></td>
                <td class="tabelaCadastro"><input type="text" name = "cpf" required value="<?php echo $dados['cpfCnpj'] ?>"></td>
            </tr>
        </table>
            <input type="submit" name="gravar" value="Gravar">
        </form>
<?php } ?>

    <!-- Site footer -->
</body>
<script src="dist/js/jquery-2.1.1.min.js"></script>
<script>
    $(document).ready(function(e) {
        $.ajax({"url":"conexao/comboboxDataSource.php"}).done(
            function(data){
                for(var i =0;i<data.Estados.length;i++)
                {
                    $('select[name="cb_estado"]').append("<option value=\""+data.Estados[i].id+"\">"+data.Estados[i].nome+"</option>");
                }
            });
    });
    $('select[name="cb_estado"]').change(
        function(){
            var estadoValor = $("select option:selected").val();
            var cb_cidade = $('select[name="cb_cidade"]');
            var cb_estado = $(this);
            $.ajax({"url":"conexao/comboboxDataSource.php?id="+estadoValor}).done(
                function(data){
                    var nCidade = data.Cidades.length;
                    cb_cidade.show(200);
                    cb_cidade.empty();
                    cb_estado.find("option:contains('Selecione')").remove();
                    $("#corpo").width(250);
                    for(var i =0;i<nCidade;i++)
                    {
                        cb_cidade.append("<option value=\""+data.Cidades[i].id+"\">"+data.Cidades[i].nome+"</option>");
                    }
                }
            );
        });

</script>
</html>

