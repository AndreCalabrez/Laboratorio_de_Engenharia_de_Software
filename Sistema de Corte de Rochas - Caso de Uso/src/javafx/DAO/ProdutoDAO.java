/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package javafx.DAO;

import java.sql.Connection;
import java.sql.Date;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.ArrayList;
import java.util.List;
import java.util.logging.Level;
import java.util.logging.Logger;
import javafx.domain.Produto;

/**
 *
 * @author ALPES
 */
public class ProdutoDAO {

    private Connection connection;

    public Connection getConnection() {
        return connection;
    }

    public void setConnection(Connection connection) {
        this.connection = connection;
    }

    public List<Produto> carregarProdutos() {

        String sql = "SELECT codProduto,"
                + "          nome,"
                + "          corPred,"
                + "          espessura"
                + "    FROM produto";
        List<Produto> retorno = new ArrayList<>();
        try {
            PreparedStatement stmt = connection.prepareStatement(sql);

            ResultSet resultado = stmt.executeQuery();
            while (resultado.next()) {

                Produto p = new Produto();
                
                p.setCodProduto(resultado.getInt("codproduto"));
                p.setNome(resultado.getString("nome"));
                p.setCorPred(resultado.getString("corPred"));
                p.setEspessura(resultado.getString("espessura"));

                retorno.add(p);

            }
        } catch (SQLException ex) {
            Logger.getLogger(ProdutoDAO.class.getName()).log(Level.SEVERE, null, ex);

        }

        return retorno;
    }

}
