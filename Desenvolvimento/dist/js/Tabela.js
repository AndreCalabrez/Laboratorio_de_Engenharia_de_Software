// Função responsável por inserir linhas na tabela
function inserirLinhaTabelaChapas(largura, altura, qtd, contador, tabela) {

    if (largura == "" || altura == "" || qtd == "") {
        alert("Cadastro Invalido - Largura, Altura e Quantidade Obrigatorio");
    } else{
        document.getElementById("contador").value = parseInt(qtd) + parseInt(contador);

    // Captura a referência da tabela com id “minhaTabela”
        var table = document.getElementById(tabela);
    // Captura a quantidade de linhas já existentes na tabela
        var numOfRows = table.rows.length;
    // Captura a quantidade de colunas da última linha da tabela
        var numOfCols = table.rows[numOfRows - 1].cells.length;

    // Insere uma linha no fim da tabela.
        var newRow = table.insertRow(numOfRows);

    // Faz um loop para criar as colunas
        for (var j = 0; j < numOfCols; j++) {
        // Insere uma coluna na nova linha
            newCell = newRow.insertCell(j);
        // Insere um conteúdo na coluna
            if (j == 0) {
                newCell.innerHTML = qtd;
            } else if (j == 1) {
                newCell.innerHTML = String(largura + " X " + altura);
            }
        }
    }
}
function inserirLinhaTabelaItens(nome, largura, altura, qtd, tabela) {

    if (largura == "" || altura == "" || qtd == "" || nome == "") {
        alert("Cadastro Invalido - Nome, Largura, Altura e Quantidade Obrigatorio");
    } else{
        // Captura a referência da tabela com id “minhaTabela”
        var table = document.getElementById(tabela);
        // Captura a quantidade de linhas já existentes na tabela
        var numOfRows = table.rows.length;
        // Captura a quantidade de colunas da última linha da tabela
        var numOfCols = table.rows[numOfRows - 1].cells.length;
        // Insere uma linha no fim da tabela.
        var newRow = table.insertRow(numOfRows);

        // Faz um loop para criar as colunas
        for (var j = 0; j < numOfCols; j++) {
            // Insere uma coluna na nova linha
            newCell = newRow.insertCell(j);
            // Insere um conteúdo na coluna
            if (j == 0) {
                newCell.innerHTML = nome;
            } else if (j == 1) {
                newCell.innerHTML = qtd;
            } else if (j == 2) {
                newCell.innerHTML = String(largura +" X "+altura);
            }
        }
    }
}

(function($) {
    AddTableRow = function() {

        var newRow = $("<tr>");
        var cols = "";

        cols += '<td>&nbsp;</td>';
        cols += '<td>&nbsp;</td>';
        cols += '<td>&nbsp;</td>';
        cols += '<td>';
        cols += '<button onclick="RemoveTableRow(this)" type="button">Remover</button>';
        cols += '</td>';

        newRow.append(cols);
        $("#products-table").append(newRow);

        return false;
    };
})(jQuery);


