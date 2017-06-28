/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package javafx.controller;

import java.net.URL;
import java.util.ArrayList;
import java.util.Collections;
import java.util.Comparator;
import java.util.List;
import java.util.ResourceBundle;
import javafx.domain.Itens;
import javafx.fxml.FXMLLoader;
import javafx.fxml.Initializable;
import javafx.scene.Group;
import javafx.scene.Scene;
import javafx.scene.control.Alert;
import javafx.scene.layout.AnchorPane;
import javafx.scene.paint.Color;
import javafx.scene.shape.Rectangle;
import javafx.stage.Stage;
import sun.plugin.javascript.navig.Anchor;

/**
 * FXML Controller class
 *
 * @author André
 */
public class FXMLDistribuicaoController implements Initializable {

    private Stage dialogStage;
    private AnchorPane anchorTeste;

    public AnchorPane getAnchorTeste() {
        return anchorTeste;
    }

    public void setAnchorTeste(AnchorPane anchorTeste) {
        this.anchorTeste = anchorTeste;
    }

    public Stage getDialogStage() {
        return dialogStage;
    }

    public void setDialogStage(Stage dialogStage) {
        this.dialogStage = dialogStage;
        dialogStage.setResizable(false);
    }

    /**
     * Initializes the controller class.
     */
    @Override
    public void initialize(URL url, ResourceBundle rb) {
     
    }

    

}
