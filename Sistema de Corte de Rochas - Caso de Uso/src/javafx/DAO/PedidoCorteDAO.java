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
import java.text.SimpleDateFormat;
import java.util.ArrayList;
import java.util.List;
import java.util.logging.Level;
import java.util.logging.Logger;
import javafx.domain.Cliente;
import javafx.domain.PedidoDeCorte;

/**
 *
 * @author André
 */
public class PedidoCorteDAO {
    
    private Connection connection;
    
    public Connection getConnection() {
        return connection;
    }
    
    public void setConnection(Connection connection) {
        this.connection = connection;
    }
    
    public int numeroPedido() {
        int codigo = 0;
        String sql = "select MAX(codPedido) AS controle"
                + "   from pedidodecorte;";
        try {
            PreparedStatement stmt = connection.prepareStatement(sql);
            ResultSet resultado = stmt.executeQuery();
            while (resultado.next()) {
                codigo = resultado.getInt("controle") + 1;
            }
        } catch (SQLException ex) {
            Logger.getLogger(PedidoCorteDAO.class.getName()).log(Level.SEVERE, null, ex);
        }
        return codigo;
    }
    
    public boolean GravarPedido(PedidoDeCorte pc) {
        String sql = "INSERT INTO pedidodecorte (qtdPerdaP, qtdPerdaM, resultado, "
                + "alterado, codCliente, codFuncionario, codDisco, situacao) "
                + "VALUES (?,?,?,?,?,?,?,?)";
        
        try {
            PreparedStatement stmt = connection.prepareStatement(sql);
            stmt.setFloat(1, pc.getQtdPerdaP());
            stmt.setFloat(2, pc.getQtdPerdaM());
            stmt.setString(3, pc.getResultado());
            stmt.setBoolean(4, pc.getAlterado());
            stmt.setInt(5, pc.getCliente().getCodCliente());
            stmt.setInt(6, pc.getFuncionario().getCodFuncionario());
            stmt.setInt(7, pc.getDisco().getCodDisco());
            stmt.setString(8, pc.getSituacao());
            
            stmt.execute();
            return true;
        } catch (SQLException ex) {
            Logger.getLogger(PedidoCorteDAO.class.getName()).log(Level.SEVERE, null, ex);
            
            return false;
        }
        
    }
    
    public List<PedidoDeCorte> listarPedidos() {
        
        String sql = "SELECT *"
                + "  FROM pedidodecorte PC,"
                + "       cliente C"
                + "  WHERE PC.codCliente = C.codCliente";
        List<PedidoDeCorte> retorno = new ArrayList<>();
        try {
            PreparedStatement stmt = connection.prepareStatement(sql);
            
            ResultSet result = stmt.executeQuery();
            while (result.next()) {
                
                PedidoDeCorte p = new PedidoDeCorte();
                Cliente c = new Cliente();
                
                c.setNome(result.getString("nome"));
                p.setCodPedido(result.getInt("codPedido"));
                p.setQtdPerdaM(result.getFloat("qtdPerdaM"));
                
                p.setCliente(c);
                
                retorno.add(p);
                
            }
        } catch (SQLException ex) {
            Logger.getLogger(PedidoCorteDAO.class
                    .getName()).log(Level.SEVERE, null, ex);
        }
        return retorno;
    }
    
}
