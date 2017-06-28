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


/**
 *
 * @author André
 */
public class ItensDAO {

    private Connection connection;

    public Connection getConnection() {
        return connection;
    }

    public void setConnection(Connection connection) {
        this.connection = connection;
    }

    public boolean GravarItens(Itens i) {
        String sql = "INSERT INTO itens (nomePeca, largura,altura,qtd,codPedidoDeCorte) "
                + "  VALUES (?,?,?,?,?)";

        try {
            PreparedStatement stmt = connection.prepareStatement(sql);
            stmt.setString(1, i.getNomePeca());
            stmt.setFloat(2, i.getLargura());
            stmt.setFloat(3, i.getAltura());
            stmt.setInt(4, i.getQtd());
            stmt.setInt(5, i.getPedidoCorte().getCodPedido());
            

            stmt.execute();
            return true;
        } catch (SQLException ex) {
            Logger.getLogger(PedidoCorteDAO.class.getName()).log(Level.SEVERE, null, ex);

            return false;
        }

    }
}
