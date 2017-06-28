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
import java.util.logging.Level;
import java.util.logging.Logger;
import javafx.domain.Funcionario;

/**
 *
 * @author ALPES
 */
public class FuncionarioDAO {

    private Connection connection;

    public Connection getConnection() {
        return connection;
    }

    public void setConnection(Connection connection) {
        this.connection = connection;
    }

    public Funcionario AutenticarUsuario(Funcionario f) {
        
        String sql = "SELECT *"
                + "  FROM funcionario"
                + "  WHERE login = ?"
                + "    AND senha = ?";
        try {
            PreparedStatement stmt = connection.prepareStatement(sql);

            stmt.setString(1, f.getLogin());
            stmt.setString(2, f.getSenha());

            ResultSet resultado = stmt.executeQuery();
            while (resultado.next()) {

                f.setCodFuncionario(resultado.getInt("codFuncionario"));
                f.setNome(resultado.getString("nome"));
                f.setRua(resultado.getString("rua"));
                f.setNumero(resultado.getInt("numero"));
                f.setTelefone(resultado.getString("telefone"));
                f.setFuncao("funcao");
                
            }            
            return f;
        } catch (SQLException ex) {
            Logger.getLogger(FuncionarioDAO.class
                    .getName()).log(Level.SEVERE, null, ex);
            return null;
        }
    }

}
