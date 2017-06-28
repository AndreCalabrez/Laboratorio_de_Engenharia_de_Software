/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package javafx.controller;

import java.net.URL;
import java.sql.Connection;
import java.util.List;
import java.util.ResourceBundle;
import javafx.DAO.ClienteDAO;
import javafx.collections.FXCollections;
import javafx.collections.ObservableList;
import javafx.domain.Cliente;
import javafx.fxml.FXML;
import javafx.fxml.Initializable;
import javafx.model.database.Database;
import javafx.model.database.DatabaseFactory;
import javafx.scene.control.Alert;
import javafx.scene.control.Button;
import javafx.scene.control.Label;
import javafx.scene.control.ListView;
import javafx.scene.control.TextField;
import javafx.stage.Stage;

/**
 * FXML Controller class
 *
 * @author ALPES
 */
public class FXMLBuscaClienteController implements Initializable {

    @FXML
    private ListView<Cliente> lvCliente;
    @FXML
    private Button btSelecionar;
    @FXML
    private Label labelTitulo;
    @FXML
    private Button btBusca;
    @FXML
    private TextField tfBusca;

    private List<Cliente> listCliente;
    private ObservableList<Cliente> observableListCliente;

    private final Database database = DatabaseFactory.getDatabase("mysql");
    private final Connection connection = database.conectar();

    private Stage dialogStageBusca;
    private boolean buttonConfirmarClicked0 = false;

    ClienteDAO clienteDAO = new ClienteDAO();
    Cliente cliente = new Cliente();

    @Override
    public void initialize(URL url, ResourceBundle rb) {

    }

    public Cliente getcliente() {
        return this.cliente;
    }

    public void setcliente(Cliente c) {
        this.cliente = c;
    }

    public Stage getDialogStage() {
        return dialogStageBusca;
    }

    public void setDialogStage(Stage dialogStage) {
        this.dialogStageBusca = dialogStage;
        this.dialogStageBusca.setResizable(false);
        carregarListCliente();

    }

    public boolean isButtonConfirmarClicked0() {

        return buttonConfirmarClicked0;

    }

    @FXML
    public void handleButtonConfirmar() {
        if (lvCliente.getSelectionModel().getSelectedIndex() > -1) {
            if (lvCliente.getSelectionModel().getSelectedIndex() > -1) {
                System.out.println("");
                cliente.setCodCliente(lvCliente.getSelectionModel().getSelectedItem().getCodCliente());
                cliente.setNome(lvCliente.getSelectionModel().getSelectedItem().getNome());
                cliente.setRua(lvCliente.getSelectionModel().getSelectedItem().getRua());
                cliente.setNumero(lvCliente.getSelectionModel().getSelectedItem().getNumero());
                cliente.setTelefone(lvCliente.getSelectionModel().getSelectedItem().getTelefone());
                cliente.setTipo(lvCliente.getSelectionModel().getSelectedItem().getTipo());
                cliente.setCpfCnpj(lvCliente.getSelectionModel().getSelectedItem().getCpfCnpj());
                cliente.setBairro(lvCliente.getSelectionModel().getSelectedItem().getBairro());

                buttonConfirmarClicked0 = true;
                this.dialogStageBusca.close();
                buttonConfirmarClicked0 = true;
                this.dialogStageBusca.close();
            } else {
                Alert alert = new Alert(Alert.AlertType.ERROR);
                alert.setTitle("Erro!!");
                alert.setHeaderText("Selecione um Cliente");
                alert.show();
            }

        }
    }

    public void carregarListFiltro() {
        String busca = ("%").concat(tfBusca.getText()).concat("%");
        clienteDAO.setConnection(connection);

        listCliente = clienteDAO.listarClienteFiltro(busca);

        observableListCliente = FXCollections.observableArrayList(listCliente);
        lvCliente.setItems(observableListCliente);
    }

    public void carregarListCliente() {

        clienteDAO.setConnection(connection);
        listCliente = clienteDAO.listarCliente();
        observableListCliente = FXCollections.observableArrayList(listCliente);
        lvCliente.setItems(observableListCliente);
    }

}
