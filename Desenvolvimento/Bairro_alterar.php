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

    $query = mysqli_query($con,"SELECT b.codBairro, b.bairro, c.cidade 
                                               FROM bairro b,
                                                    cidade c,
                                                    UF u
                                              WHERE c.codCidade = b.codCidade
                                                AND c.siglaUF = u.siglaUf
                                                AND b.codBairro = $id ;");
    $prod = mysqli_fetch_array($query);
    ?>
            <H4>ALTERAR</H4>
            <form action="Bairro_altProc.php" method="get">
                <table>
                    <tr>
                        <td class="tabelaCadastro"><label >Codigo: </label></td>
                        <td class="tabelaCadastro"><label><input name="idBairro" type="text" readonly value="<?php echo $id;?>"> </label></td>
                    </tr>
                        <td class="tabelaCadastro"><label>UF:</label></td>
                        <td class="tabelaCadastro"> <select name="cb_estado" id="cb_estado" >
                                <option selected id="cb_estado_selecione">Selecione</option>
                            </select></td>
                    </tr>
                    <tr>
                        <td class="tabelaCadastro"><label>Cidade: </label></td>
                        <td class="tabelaCadastro"> <select name="cb_cidade" id="cb_cidade" >
                            </select></td>
                    </tr>
                    <tr>
                        <td class="tabelaCadastro"><label>Bairro:</label></td>
                        <td class="tabelaCadastro"><input type="text" name = "bairro" required value="<?php echo $prod['bairro']?>"></td>
                    </tr>
                </table>
                <input type="submit" name="gravar" value="Gravar">
            </form>
        <?php } ?>
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
