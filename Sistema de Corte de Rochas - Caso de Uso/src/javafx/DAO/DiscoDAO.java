/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package javafx.DAO;

import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.ArrayList;
import java.util.List;
import java.util.logging.Level;
import java.util.logging.Logger;
import javafx.domain.Disco;
import javafx.domain.Produto;

/**
 *
 * @author André
 */
public class DiscoDAO {

    private Connection connection;

    public Connection getConnection() {
        return connection;
    }

    public void setConnection(Connection connection) {
        this.connection = connection;
    }

    public List<Disco> carregarDisco() {

        String sql = "SELECT codDisco,"
                + "          marca,"
                + "          modelo,"
                + "          espessura,"
                + "          diametro,"
                + "          tempoTrabalho"
                + "    FROM disco";
        List<Disco> retorno = new ArrayList<>();
        try {
            PreparedStatement stmt = connection.prepareStatement(sql);

            ResultSet resultado = stmt.executeQuery();
            while (resultado.next()) {

                Disco d = new Disco();

                d.setCodDisco(resultado.getInt("codDisco"));
                d.setMarca(resultado.getString("marca"));
                d.setModelo(resultado.getString("modelo"));
                d.setEspessura(resultado.getInt("espessura"));
                d.setDiametro(resultado.getInt("diametro"));
                d.setTempoTrabalho(resultado.getDouble("tempoTrabalho"));

                retorno.add(d);

            }
        } catch (SQLException ex) {
            Logger.getLogger(ProdutoDAO.class.getName()).log(Level.SEVERE, null, ex);

        }

        return retorno;
    }

}
