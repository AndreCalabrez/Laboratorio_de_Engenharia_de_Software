/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package javafx.controller;

import java.io.IOException;
import java.net.URL;
import java.sql.Connection;
import java.util.ResourceBundle;
import javafx.domain.Funcionario;
import javafx.fxml.FXML;
import javafx.fxml.FXMLLoader;
import javafx.fxml.Initializable;
import javafx.model.database.Database;
import javafx.model.database.DatabaseFactory;
import javafx.scene.Group;
import javafx.scene.Scene;
import javafx.scene.control.Alert;
import javafx.scene.control.Button;
import javafx.scene.control.Label;
import javafx.scene.control.Menu;
import javafx.scene.control.MenuItem;
import javafx.scene.layout.AnchorPane;
import javafx.scene.paint.Color;
import javafx.scene.shape.Rectangle;
import javafx.stage.Stage;

/**
 * FXML Controller class
 *
 * @author André - ALPES
 */
public class FXMLMainController implements Initializable {

    @FXML
    private AnchorPane anchorPane;
    @FXML
    private Label apresentacao;
    @FXML
    private MenuItem menuItemCliente;
    @FXML
    private MenuItem menuItemFuncionario;
    @FXML
    private MenuItem menuItemProduto;
    @FXML
    private MenuItem menuItemDisco;
    @FXML
    private MenuItem menuItemCidade;
    @FXML
    private MenuItem menuItemBairro;
    @FXML
    private MenuItem itemPedidoCad;
    @FXML
    private MenuItem itemPedidoListar;
    @FXML
    private MenuItem menuItemUF;

    @Override
    public void initialize(URL url, ResourceBundle rb) {
    }

    public boolean showFXMLAnchorPaneCadPedido(Funcionario f) throws IOException {
        FXMLLoader loader = new FXMLLoader();
        loader.setLocation(FXMLCadPedidoController.class.getResource("/javafx/view/FXMLCadPedido.fxml"));
        AnchorPane page = (AnchorPane) loader.load();
        // Criando um Estágio de Diálogo (Stage Dialog)
        Stage dialogStage = new Stage();
        dialogStage.setTitle("Cadastro de Pedido");
        Scene scene = new Scene(page);
        dialogStage.setScene(scene);
        // Setando o cliente no Controller.
        FXMLCadPedidoController controller = loader.getController();
        controller.setDialogStage(dialogStage);
        controller.setFuncionario(f);
        // Mostra o Dialog e espera até que o usuário o feche
        dialogStage.showAndWait();
        return controller.isButtonConfirmarClicked();
    }
    @FXML
    public void ShowListagemPedido() throws IOException {
        AnchorPane ap = (AnchorPane) FXMLLoader.load(getClass().getResource("/javafx/view/FXMLListagemPedidos.fxml"));
        anchorPane.getChildren().setAll(ap);
    }

    @FXML
    public void handleLogin() throws IOException {
        Funcionario funcionario = new Funcionario();
        //   boolean buttonConfirmarClicked1 = showFXMLAnchorPaneLogin(funcionario);
        //  if (buttonConfirmarClicked1) {            
        showFXMLAnchorPaneCadPedido(funcionario);
        // }
    }

    public boolean showFXMLAnchorPaneLogin(Funcionario funcionario) throws IOException {
        FXMLLoader loader = new FXMLLoader();
        loader.setLocation(FXMLLoginController.class.getResource("/javafx/view/FXMLLogin.fxml"));
        AnchorPane page = (AnchorPane) loader.load();
        // Criando um Estágio de Diálogo (Stage Dialog)
        Stage dialogStage = new Stage();
        dialogStage.setTitle("AUTENTICAÇÃO");
        Scene scene = new Scene(page);
        dialogStage.setScene(scene);
        // Setando o cliente no Controller.
        FXMLLoginController controller = loader.getController();
        controller.setF(funcionario);
        controller.setDialogStage(dialogStage);

        // Mostra o Dialog e espera até que o usuário o feche
        dialogStage.showAndWait();
        return controller.isButtonConfirmarClicked();
    }

}
