/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package javafx.controller;

import java.net.URL;
import java.sql.Connection;

import java.util.ResourceBundle;
import javafx.DAO.FuncionarioDAO;

import javafx.domain.Funcionario;
import javafx.fxml.FXML;
import javafx.fxml.Initializable;
import javafx.model.database.Database;
import javafx.model.database.DatabaseFactory;

import javafx.scene.control.Alert;
import javafx.scene.control.Button;
import javafx.scene.control.PasswordField;
import javafx.scene.control.TextField;

import javafx.stage.Stage;

/**
 * FXML Controller class
 *
 * @author André
 */
public class FXMLLoginController implements Initializable {

    @FXML
    private TextField tfLogin;
    @FXML
    private PasswordField pwSenha;
    @FXML
    private Button btConfirmar;
    @FXML
    private Button btCancelar;

    private Stage dialogStage;
    
    Funcionario f = new Funcionario();

    private final Database database = DatabaseFactory.getDatabase("mysql");
    private final Connection connection = database.conectar();

    private boolean buttonConfirmarClicked = false;
    FuncionarioDAO fDAO = new FuncionarioDAO();

    @Override

    public void initialize(URL url, ResourceBundle rb) {
        // TODO
    }

    public Stage getDialogStage() {
        return dialogStage;
    }

    public void setDialogStage(Stage dialogStage) {
        this.dialogStage = dialogStage;
        dialogStage.setResizable(false);
    }

    public boolean isButtonConfirmarClicked() {
        return buttonConfirmarClicked;
    }

    public Funcionario getF() {
        return f;
    }

    public void setF(Funcionario f) {
        this.f = f;
    }

    
    
    @FXML
    public void handleButtonCancelar() {
        getDialogStage().close();
    }

    @FXML
    public void handleButtonConfirmar() {
        
        if (validarCampos()) {
            f.setLogin(tfLogin.getText());
            f.setSenha(pwSenha.getText());

            fDAO.setConnection(connection);
            f = fDAO.AutenticarUsuario(f);
            if (f.getNome() != null) {
                System.out.println("VALIDO ");
                buttonConfirmarClicked = true;
                this.dialogStage.close();
            } else {
                Alert alert = new Alert(Alert.AlertType.ERROR);
                alert.setContentText("Login Invalido");
                alert.showAndWait();
            }
        }
    }

    private boolean validarCampos() {

        String errorMessage = "";
        if (tfLogin.getText().equals("")) {
            errorMessage += "Campo Login Invalido!\n";
        }
        if (pwSenha.getText().equals("")) {
            errorMessage += "Campo Senha Invalido!\n";
        }

        if (errorMessage.length() == 0) {
            return true;
        } else {
// Mostrando a mensagem de erro
            Alert alert = new Alert(Alert.AlertType.ERROR);
            alert.setTitle("Erro no cadastro");
            alert.setHeaderText("Campos inválidos, por favor, corrija...");
            alert.setContentText(errorMessage);
            alert.show();
            return false;
        }

    }

}
