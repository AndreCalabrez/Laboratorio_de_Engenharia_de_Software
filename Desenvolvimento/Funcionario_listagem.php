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
    $query = mysqli_query($con,"SELECT codFuncionario, nome FROM funcionario;");
?>
    <table  style="width: 260px; height: 80px" >
        <tr>
            <td>
                Código
            </td>
            <td>
                Funcionário
            </td>
            <td colspan="2">
                OPÇÕES
            </td>
        </tr>
    <?php while($prod = mysqli_fetch_array($query)) { ?>

        <tr>
            <td>
                <label><?php echo $prod['codFuncionario'] ?></label>
            </td>
            <td>
                <label><?php echo $prod['nome'] ?></label>
            </td>
            <td>
                <a href="Funcionario_deletar.php?id=<?php echo $prod['codFuncionario']?>">
                    <img src="_img/excluir.jpg" height="20" width="20" /></a>
            </td>
            <td>
                <a href="Funcionario_alterar.php?id=<?php echo $prod['codFuncionario']?>">
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
            <?php
            require_once("conexao/conexao.php");

            $query_bairro = mysqli_query($con,"SELECT codBairro, bairro FROM bairro;");

            ?>
            <form action="Funcionario_cadProc.php" method="POST">
                <table>
                    <tr>
                        <td class="tabelaCadastro"><label>Codigo: </label></td>
                        <td class="tabelaCadastro"><label></label></td>
                    </tr>
                    <tr>
                        <td class="tabelaCadastro"><label>Nome:</label></td>
                        <td class="tabelaCadastro"><input type="text" name="nome" required/></td>
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
                        <td class="tabelaCadastro"><label>Rua:</label></td>
                        <td class="tabelaCadastro"> <input type="text" name = "endereco" required/></td>
                    </tr>
                    <tr>
                        <td class="tabelaCadastro"><label>Numero: </label></td>
                        <td class="tabelaCadastro"><input type="text" name = "numero" required/></td>
                    </tr>
                    <tr>
                        <td class="tabelaCadastro"><label>Telefone: </label></td>
                        <td class="tabelaCadastro"><input type="text" name = "telefone" required/></td>
                    </tr>
                    <tr>
                        <td class="tabelaCadastro"><label>CPF: </label></td>
                        <td class="tabelaCadastro"><input type="text" name = "cpf" required/></td>
                    </tr>
                    <tr>
                        <td class="tabelaCadastro"><label>Login:</label></td>
                        <td class="tabelaCadastro"><input type="text" name="login" required/></td>
                    </tr>
                    <tr>
                        <td class="tabelaCadastro"><label>Senha:</label></td>
                        <td class="tabelaCadastro"><input type="password" name="senha" required/></td>
                    </tr>

                    <tr>
                        <td class="tabelaCadastro"><label>Função:</label></td>
                        <td class="tabelaCadastro"><input type="text" name="funcao" required/></td>
                    </tr>
                </table>
                <input type="submit" name="gravar" value="Gravar">

            </form>
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