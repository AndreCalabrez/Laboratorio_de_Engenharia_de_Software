/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package javafx.DAO;

import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.SQLException;
import java.util.logging.Level;
import java.util.logging.Logger;
import javafx.domain.Itens;
import javafx.domain.PedidoProduto;

/**
 *
 * @author André
 */
public class PedidoProdutoDAO {

    private Connection connection;

    public Connection getConnection() {
        return connection;
    }

    public void setConnection(Connection connection) {
        this.connection = connection;
    }

    public boolean GravarPedidoProduto(PedidoProduto pp) {
        String sql = "INSERT INTO pedidoproduto (codPedido, codProduto, "
                + "largura, altura, qtdChapas)"
                + "  VALUES (?,?,?,?,?)";

        try {
            PreparedStatement stmt = connection.prepareStatement(sql);
            stmt.setInt(1, pp.getPedidoDeCorte().getCodPedido());
            stmt.setInt(2, pp.getProduto().getCodProduto());
            stmt.setFloat(3, pp.getLargura());
            stmt.setFloat(4, pp.getAltura());
            stmt.setInt(5, Integer.parseInt(pp.getQtd()));

            stmt.execute();
            return true;
        } catch (SQLException ex) {
            Logger.getLogger(PedidoCorteDAO.class.getName()).log(Level.SEVERE, null, ex);

            return false;
        }

    }
}
