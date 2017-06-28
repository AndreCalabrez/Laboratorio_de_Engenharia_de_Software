package javafx;

import javafx.application.Application;
import static javafx.application.Application.launch;
import javafx.fxml.FXMLLoader;
import javafx.scene.Parent;
import javafx.scene.Scene;
import javafx.stage.Screen;
import javafx.stage.Stage;

public class Main extends Application {

    @Override
    public void start(Stage stage) throws Exception {
        Parent root = FXMLLoader.load(getClass().getResource("view/FXMLMain.fxml"));

        Scene scene = new Scene(root);

        stage.setScene(scene);
        stage.setTitle("Sistema de Corte de Rochas");

        stage.centerOnScreen();
        stage.setResizable(false);
        //stage.setHeight(Screen.getPrimary().getVisualBounds().getHeight());
        //stage.setWidth(Screen.getPrimary().getVisualBounds().getWidth());
        
        stage.show();
    }

    public static void main(String[] args) {
        launch(args);
    }

}
