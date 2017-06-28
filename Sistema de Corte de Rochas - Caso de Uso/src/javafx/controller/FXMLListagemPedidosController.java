/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package javafx.controller;

import java.net.URL;
import java.sql.Connection;
import java.util.ArrayList;
import java.util.List;
import java.util.ResourceBundle;
import javafx.DAO.PedidoCorteDAO;
import javafx.collections.FXCollections;
import javafx.collections.ObservableList;
import javafx.domain.PedidoDeCorte;
import javafx.fxml.FXML;
import javafx.fxml.Initializable;
import javafx.model.database.Database;
import javafx.model.database.DatabaseFactory;
import javafx.scene.control.Button;
import javafx.scene.control.TableColumn;
import javafx.scene.control.TableView;
import javafx.scene.control.cell.PropertyValueFactory;

/**
 * FXML Controller class
 *
 * @author André
 */
public class FXMLListagemPedidosController implements Initializable {

    @FXML
    private Button btVisualizar;
    @FXML
    private TableView<PedidoDeCorte> tbListagemPedido;
    @FXML
    private TableColumn<PedidoDeCorte, String> columCodigo;
    @FXML
    private TableColumn<PedidoDeCorte, String> columNome;    
    @FXML
    private TableColumn<PedidoDeCorte, String> columPerda;

    private List<PedidoDeCorte> listPedido = new ArrayList<>();
    private ObservableList<PedidoDeCorte> observableListPedido;

    private final Database database = DatabaseFactory.getDatabase("mysql");
    private final Connection connection = database.conectar();
    PedidoCorteDAO pDAO = new PedidoCorteDAO();

    @FXML
    @Override
    public void initialize(URL url, ResourceBundle rb) {
        carregarTableViewPedido();
    }

    public void carregarTableViewPedido() {

        pDAO.setConnection(connection);
        listPedido = pDAO.listarPedidos();
        columCodigo.setCellValueFactory(new PropertyValueFactory<>("codPedido"));
        columNome.setCellValueFactory(new PropertyValueFactory<>("nome"));        
        columPerda.setCellValueFactory(new PropertyValueFactory<>("qtdPerdaM"));        

        observableListPedido = FXCollections.observableArrayList(listPedido);
        tbListagemPedido.setItems(observableListPedido);
    }
}
