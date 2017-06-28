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
import javafx.domain.Bairro;
import javafx.domain.Cidade;
import javafx.domain.Cliente;
import javafx.domain.UF;

/**
 *
 * @author ALPES
 */
public class ClienteDAO {

    private Connection connection;

    public Connection getConnection() {
        return connection;
    }

    public void setConnection(Connection connection) {
        this.connection = connection;
    }

    public List<Cliente> listarCliente() {
        String sql = "SELECT c.codCliente,"
                + "       c.nome,"
                + "       c.rua,"
                + "       c.numero,"
                + "       c.telefone,"
                + "       c.tipo,"
                + "       c.cpfCnpj,"
                + "       b.bairro,"
                + "       cid.cidade,"
                + "       cid.siglaUF"
                + "  FROM cliente c,"
                + "       bairro b,"
                + "       cidade cid"
                + "  WHERE c.codBairro = b.codBairro"
                + "    AND b.codCidade = cid.codCidade;";

        List<Cliente> retorno = new ArrayList<>();
        try {
            PreparedStatement stmt = connection.prepareStatement(sql);
            ResultSet resultado = stmt.executeQuery();
            while (resultado.next()) {
                Cliente cliente = new Cliente();
                Bairro b = new Bairro();
                Cidade c = new Cidade();
                UF uf = new UF();
                cliente.setCodCliente(resultado.getInt("codCliente"));
                cliente.setNome(resultado.getString("nome"));
                cliente.setRua(resultado.getString("rua"));
                cliente.setNumero(resultado.getInt("numero"));
                cliente.setTelefone(resultado.getString("telefone"));
                cliente.setTipo(resultado.getString("tipo"));
                cliente.setCpfCnpj(resultado.getString("cpfCnpj"));
                uf.setSigla(resultado.getString("siglaUF"));
                c.setUf(uf);
                c.setCidade(resultado.getString("cidade"));
                b.setCidade(c);
                b.setBairro(resultado.getString("bairro"));
                cliente.setBairro(b);

                retorno.add(cliente);
            }
        } catch (SQLException ex) {
            Logger.getLogger(ClienteDAO.class.getName()).log(Level.SEVERE, null, ex);
        }
        return retorno;
    }

    public List<Cliente> listarClienteFiltro(String busca) {
        String sql = "SELECT c.codCliente,"
                + "       c.nome,"
                + "       c.rua,"
                + "       c.numero,"
                + "       c.telefone,"
                + "       c.tipo,"
                + "       c.cpfCnpj,"
                + "       b.bairro,"
                + "       cid.cidade,"
                + "       cid.siglaUF"
                + "  FROM cliente c,"
                + "       bairro b,"
                + "       cidade cid"
                + "  WHERE c.codBairro = b.codBairro"
                + "    AND b.codCidade = cid.codCidade    "
                + "    AND c.nome LIKE ?";
        List<Cliente> retorno = new ArrayList<>();
        try {
            PreparedStatement stmt = connection.prepareStatement(sql);
            stmt.setString(1, busca);
            ResultSet resultado = stmt.executeQuery();
            while (resultado.next()) {
                Cliente cliente = new Cliente();
                Bairro b = new Bairro();
                Cidade c = new Cidade();
                UF uf = new UF();
                cliente.setCodCliente(resultado.getInt("codCliente"));
                cliente.setNome(resultado.getString("nome"));
                cliente.setRua(resultado.getString("rua"));
                cliente.setNumero(resultado.getInt("numero"));
                cliente.setTelefone(resultado.getString("telefone"));
                cliente.setTipo(resultado.getString("tipo"));
                cliente.setCpfCnpj(resultado.getString("cpfCnpj"));
                uf.setSigla(resultado.getString("siglaUF"));
                c.setUf(uf);
                c.setCidade(resultado.getString("cidade"));
                b.setCidade(c);
                b.setBairro(resultado.getString("bairro"));
                cliente.setBairro(b);

                retorno.add(cliente);
            }
        } catch (SQLException ex) {
            Logger.getLogger(ClienteDAO.class.getName()).log(Level.SEVERE, null, ex);
        }
        return retorno;
    }

}
