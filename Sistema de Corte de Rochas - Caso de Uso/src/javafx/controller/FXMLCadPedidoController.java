/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package javafx.controller;

import java.io.IOException;
import java.net.URL;
import java.sql.Connection;
import java.util.ArrayList;
import java.util.Arrays;
import java.util.Collections;
import java.util.Comparator;
import java.util.List;
import java.util.ResourceBundle;
import javafx.DAO.DiscoDAO;
import javafx.DAO.ItensDAO;
import javafx.DAO.PedidoCorteDAO;
import javafx.DAO.PedidoProdutoDAO;
import javafx.DAO.ProdutoDAO;
import javafx.collections.FXCollections;
import javafx.collections.ObservableList;
import javafx.domain.Cliente;
import javafx.domain.Disco;
import javafx.domain.Funcionario;
import javafx.domain.Itens;
import javafx.domain.PedidoDeCorte;
import javafx.domain.PedidoProduto;
import javafx.domain.Produto;
import javafx.fxml.FXML;
import javafx.fxml.FXMLLoader;
import javafx.fxml.Initializable;
import javafx.mascara.util.MaskTextField;
import javafx.model.database.Database;
import javafx.model.database.DatabaseFactory;
import javafx.scene.Group;
import javafx.scene.Scene;
import javafx.scene.control.Alert;
import javafx.scene.control.Button;
import javafx.scene.control.ComboBox;
import javafx.scene.control.DatePicker;
import javafx.scene.control.Label;
import javafx.scene.control.TableColumn;
import javafx.scene.control.TableView;
import javafx.scene.control.TextArea;
import javafx.scene.control.TextField;
import javafx.scene.control.cell.PropertyValueFactory;
import javafx.scene.layout.AnchorPane;
import javafx.scene.paint.Color;
import javafx.scene.shape.Rectangle;
import javafx.scene.text.Text;
import javafx.stage.Stage;

/**
 * FXML Controller class
 *
 * @author André
 */
public class FXMLCadPedidoController implements Initializable {

    @FXML
    private Label lbCodigo;
    @FXML
    private Button btBuscaCliente;
    @FXML
    private Button btCadItens;
    @FXML
    private Button btCadChapa;
    @FXML
    private Button btGerar;
    @FXML
    private Button btCancelar;
    @FXML
    private Button btExChapa;
    @FXML
    private Button btExItens;
    @FXML
    private TextField tfNomeCliente;
    @FXML
    private TextField tfCNPJ;
    @FXML
    private TextField tfEndereco;
    @FXML
    private TextField tfNumero;
    @FXML
    private TextField tfBairro;
    @FXML
    private TextField tfCidade;
    @FXML
    private TextField tfUF;
    @FXML
    private TextField tfTelefone;
    @FXML
    private TextField tfNomeItem;
    @FXML
    private MaskTextField tfQtd;
    @FXML
    private MaskTextField tfAltura;
    @FXML
    private MaskTextField tfLargura;

    @FXML
    private ComboBox<Produto> cbProduto;
    @FXML
    private ComboBox<Disco> cbDisco;
    @FXML
    private MaskTextField tfQtdP;
    @FXML
    private MaskTextField tfAlturaP;
    @FXML
    private MaskTextField tfLarguraP;

    @FXML
    private TableView<Itens> tableViewItens;
    @FXML
    private TableView<PedidoProduto> tableViewProdutos;
    @FXML
    private TableColumn<Itens, String> tableColumnNome;
    @FXML
    private TableColumn<Itens, String> tableColumnQtdItens;
    @FXML
    private TableColumn<Itens, String> tableColumnLargura;
    @FXML
    private TableColumn<Itens, String> tableColumnAltura;
    @FXML
    private TableColumn<PedidoProduto, String> tableColumnQtdChapas;
    @FXML
    private TableColumn<PedidoProduto, String> tableColumnProduto;
    @FXML
    private TableColumn<PedidoProduto, Float> tableColumnLarguraP;
    @FXML
    private TableColumn<PedidoProduto, Float> tableColumnAlturaP;

    Cliente cliente = new Cliente();
    Funcionario funcionario = new Funcionario();
    private boolean buttonConfirmarClicked = false;
    private Stage dialogStage;

    private List<Itens> listItens = new ArrayList<>();
    private ObservableList<Itens> observableListItens;

    private List<PedidoProduto> listPP = new ArrayList<>();
    private ObservableList<PedidoProduto> observableListPP;

    private List<Produto> listProduto = new ArrayList<>();
    private ObservableList<Produto> observableListProduto;

    private List<Disco> listDisco = new ArrayList<>();
    private ObservableList<Disco> observableListDisco;

    ProdutoDAO pDAO = new ProdutoDAO();
    DiscoDAO dDAO = new DiscoDAO();
    PedidoCorteDAO pcDAO = new PedidoCorteDAO();
    ItensDAO iDAO = new ItensDAO();
    PedidoProdutoDAO ppDAO = new PedidoProdutoDAO();

    private final Database database = DatabaseFactory.getDatabase("mysql");
    private final Connection connection = database.conectar();

    PedidoDeCorte pc = new PedidoDeCorte();
    float perdaM;
    float perdaP;
    float px_largura;
    float px_altura;

    @Override
    public void initialize(URL url, ResourceBundle rb) {
        tfQtdP.setMask("NNN");
        tfLarguraP.setMask("N.NN");
        tfAlturaP.setMask("N.NN");
        tfQtd.setMask("NNN");
        tfLargura.setMask("N.NN");
        tfAltura.setMask("N.NN");
        carregarComboBoxProdutos();
        carregarComboBoxDisco();
        pcDAO.setConnection(connection);
        lbCodigo.setText(String.valueOf(pcDAO.numeroPedido()));
    }

    public Stage getDialogStage() {
        return dialogStage;
    }

    public void setDialogStage(Stage dialogStage) {
        this.dialogStage = dialogStage;
        dialogStage.setResizable(false);

    }

    public Funcionario getFuncionario() {
        return funcionario;
    }

    public void setFuncionario(Funcionario funcionario) {
        this.funcionario = funcionario;
    }

    public boolean isButtonConfirmarClicked() {
        return buttonConfirmarClicked;
    }

    public void carregarTableViewItens() {
        tableColumnNome.setCellValueFactory(new PropertyValueFactory<>("nomePeca"));
        tableColumnQtdItens.setCellValueFactory(new PropertyValueFactory<>("qtd"));
        tableColumnLargura.setCellValueFactory(new PropertyValueFactory<>("largura"));
        tableColumnAltura.setCellValueFactory(new PropertyValueFactory<>("altura"));

        observableListItens = FXCollections.observableArrayList(listItens);
        tableViewItens.setItems(observableListItens);
    }

    public void carregarTableViewPedidoProduto() {
        tableColumnProduto.setCellValueFactory(new PropertyValueFactory<>("produto"));
        tableColumnQtdChapas.setCellValueFactory(new PropertyValueFactory<>("qtd"));
        tableColumnLarguraP.setCellValueFactory(new PropertyValueFactory<>("largura"));
        tableColumnAlturaP.setCellValueFactory(new PropertyValueFactory<>("altura"));

        observableListPP = FXCollections.observableArrayList(listPP);
        tableViewProdutos.setItems(observableListPP);
    }

    public void carregarComboBoxProdutos() {

        pDAO.setConnection(connection);
        listProduto = pDAO.carregarProdutos();

        observableListProduto = FXCollections.observableArrayList(listProduto);
        cbProduto.setItems(observableListProduto);
    }

    public void carregarComboBoxDisco() {

        dDAO.setConnection(connection);
        listDisco = dDAO.carregarDisco();

        observableListDisco = FXCollections.observableArrayList(listDisco);
        cbDisco.setItems(observableListDisco);
    }

    @FXML
    public void handleBuscaCliente() throws IOException {

        boolean buttonConfirmar0 = showFXMLAnchorPaneBuscaCliente(cliente);

        if (buttonConfirmar0) {

            tfNomeCliente.setText(cliente.getNome());
            tfCNPJ.setText(cliente.getCpfCnpj());
            tfTelefone.setText(cliente.getTelefone());
            tfEndereco.setText(cliente.getRua());
            tfNumero.setText(String.valueOf(cliente.getNumero()));
            tfBairro.setText(cliente.getBairro().getBairro());
            tfCidade.setText(cliente.getBairro().getCidade().getCidade());
            tfUF.setText(cliente.getBairro().getCidade().getUf().getSigla());

        }

    }

    public boolean showFXMLAnchorPaneBuscaCliente(Cliente cliente) throws IOException {
        FXMLLoader loader = new FXMLLoader();
        loader.setLocation(FXMLBuscaClienteController.class.getResource("/javafx/view/FXMLBuscaCliente.fxml"));
        AnchorPane page = (AnchorPane) loader.load();
        // Criando um Estágio de Diálogo (Stage Dialog)
        Stage dialogStage = new Stage();
        dialogStage.setTitle("Filtro Cliente");
        Scene scene = new Scene(page);
        dialogStage.setScene(scene);
        // Setando o cliente no Controller.
        FXMLBuscaClienteController controller = loader.getController();
        controller.setDialogStage(dialogStage);
        controller.setcliente(cliente);

        // Mostra o Dialog e espera até que o usuário o feche
        dialogStage.showAndWait();
        return controller.isButtonConfirmarClicked0();

    }

    @FXML
    public void handleAddItem() throws IOException {
        if (validarCamposItem()) {
            Itens item = new Itens();

            item.setNomePeca(tfNomeItem.getText());
            item.setAltura(Float.parseFloat(tfAltura.getText()));
            item.setLargura(Float.parseFloat(tfLargura.getText()));
            item.setQtd(Integer.parseInt(tfQtd.getText()));

            listItens.add(item);

            carregarTableViewItens();

            tfNomeItem.setText("");
            tfAltura.setText("");
            tfLargura.setText("");
            tfQtd.setText("");

        }
    }

    @FXML
    public void handleEXItem() throws IOException {
        Itens i = tableViewItens.getSelectionModel().getSelectedItem();
        if (i != null) {
            listItens.remove(i);
            carregarTableViewItens();
        } else {
            Alert alert = new Alert(Alert.AlertType.ERROR);
            alert.setContentText("Por favor, escolha um Item!");
            alert.show();
        }
    }

    @FXML
    public void handleAddProduto() throws IOException {

        if (validarCamposProduto()) {

            PedidoProduto pp = new PedidoProduto();

            pp.setProduto(cbProduto.getValue());
            pp.setAltura(Float.parseFloat(tfAlturaP.getText()));
            pp.setLargura(Float.parseFloat(tfLarguraP.getText()));
            pp.setQtd(tfQtdP.getText());

            listPP.add(pp);

            carregarTableViewPedidoProduto();
            cbProduto.setValue(null);
            tfAlturaP.setText("");
            tfLarguraP.setText("");
            tfQtdP.setText("");

        }
    }

    @FXML
    public void handleEXProduto() throws IOException {
        PedidoProduto pp = tableViewProdutos.getSelectionModel().getSelectedItem();
        if (pp != null) {
            listPP.remove(pp);
            carregarTableViewPedidoProduto();
        } else {
            Alert alert = new Alert(Alert.AlertType.ERROR);
            alert.setContentText("Por favor, escolha um Produto!");
            alert.show();
        }
    }

    @FXML
    public void handleButtonCancelar() {
        getDialogStage().close();
    }

    @FXML
    public void handleButtonConfirmar() throws IOException {
        int aux = 0;

        if (validar()) {
            pc.setCliente(cliente);
            pc.setDisco(cbDisco.getValue());
            pc.setFuncionario(funcionario);
            pc.setQtdPerdaM(0);
            pc.setQtdPerdaP(0);
            pc.setResultado("");
            pc.setAlterado(false);
            pc.setSituacao("");
            pc.setCodPedido(Integer.valueOf(lbCodigo.getText()));

            pcDAO.setConnection(connection);
              pcDAO.GravarPedido(pc);

            iDAO.setConnection(connection);
            for (Itens i : listItens) {
                i.setPedidoCorte(pc);
                      iDAO.GravarItens(i);
            }
            ppDAO.setConnection(connection);
            for (PedidoProduto pp : listPP) {
                pp.setPedidoDeCorte(pc);
                      ppDAO.GravarPedidoProduto(pp);
            }

               buttonConfirmarClicked = true;
                this.dialogStage.close();
            showFXMLAnchorPaneDistribuicao();
        }
    }

    public void showFXMLAnchorPaneDistribuicao() throws IOException {
        FXMLLoader loader = new FXMLLoader();
        loader.setLocation(FXMLDistribuicaoController.class.getResource("/javafx/view/FXMLDistribuicao.fxml"));
        AnchorPane page = (AnchorPane) loader.load();
        // Criando um Estágio de Diálogo (Stage Dialog)

        Stage dialogStage = new Stage();

        dialogStage.setTitle("Limpar Dados");
        Scene scene = new Scene(page);

        scene = start();
        if (scene != null) {
            dialogStage.setScene(scene);

            // Setando o cliente no Controller.
            FXMLDistribuicaoController controller = loader.getController();
            controller.setDialogStage(dialogStage);

            // Mostra o Dialog e espera até que o usuário o feche
            dialogStage.showAndWait();
        }
    }

    public Scene start() {

        List<Itens> itemDistribuicao = new ArrayList<>(); // list atualizado com medidas em PX
        List<Rectangle> listPecas = new ArrayList<>();
        float areaChapa = listPP.get(0).getLargura() * listPP.get(0).getAltura();
        double x = 0;
        double y = 0;
        double aux_y = 0;
        int qtdPecasNaoPosicionadas = 0;
        int qtdPecasPosicionadas = 0;
        float areaOcupada = 0;
        //conversão de medidas para PX

        px_largura = 600;
        px_altura = (600 * listPP.get(0).getAltura() / listPP.get(0).getLargura());

        System.out.println("LAGURA PX -" + px_largura);
        System.out.println("ALTURA PX -" + px_altura);

        for (Itens i : listItens) {
            int auxiliarQtdItem = 0;
            while (auxiliarQtdItem < i.getQtd()) {
                Itens it = new Itens();
                it.setLargura((px_largura/*total px do local da chapa*/ * i.getLargura()) / listPP.get(0).getLargura());

                it.setAltura((px_altura/*total px do local da chapa*/ * i.getAltura()) / listPP.get(0).getAltura());
                it.setNomePeca(i.getNomePeca());

                itemDistribuicao.add(it);

                auxiliarQtdItem++;
            }
        }

        Collections.sort(itemDistribuicao, new Comparator() {
            public int compare(Object o1, Object o2) {
                Itens p1 = (Itens) o1;
                Itens p2 = (Itens) o2;
                return p1.getAltura() < p2.getAltura() ? +1 : (p1.getAltura() > p2.getAltura() ? -1 : 0);
            }
        });
        Rectangle retangulo1 = new Rectangle(px_largura, px_altura); // 5  
        retangulo1.setTranslateX(x);
        retangulo1.setTranslateY(y);
        retangulo1.setFill(Color.LIGHTGRAY); // 6   
        for (Itens it : itemDistribuicao) {
            Rectangle retangulo = null;
            if (it.getLargura() <= px_largura) {
                if (it.getAltura() <= px_altura) {
                    if (x + it.getLargura() + 1 <= px_largura) {
                        if (aux_y == 0 || x == 0) {
                            aux_y = y + it.getAltura() + 1;
                        }

                        retangulo = new Rectangle(it.getLargura(), it.getAltura()); // 5                        
                        retangulo.setTranslateX(x);
                        retangulo.setTranslateY(y);
                        retangulo.setFill(Color.GREEN); // 6                              
                        x = x + it.getLargura() + 1;
                        qtdPecasPosicionadas++;

                        areaOcupada = areaOcupada + (calculoPXMT(it.getAltura()) * calculoPXMT(it.getLargura()));
                        listPecas.add(retangulo);

                    } else {

                        if (aux_y + it.getAltura() + 1 <= px_altura) {
                            y = aux_y;
                            x = 0;
                            retangulo = new Rectangle(it.getLargura(), it.getAltura()); // 5                        
                            retangulo.setTranslateX(x);
                            retangulo.setTranslateY(y);
                            retangulo.setFill(Color.GREEN); // 6                            
                            if (y == aux_y) {
                                aux_y = aux_y + it.getAltura() + 1;
                                x = x + it.getLargura() + 1;
                            }
                            qtdPecasPosicionadas++;
                            areaOcupada = areaOcupada + (calculoPXMT(it.getAltura()) * calculoPXMT(it.getLargura()));
                            listPecas.add(retangulo);
                        } else {
                            qtdPecasNaoPosicionadas++;
                        }
                    }
                } else {
                    qtdPecasNaoPosicionadas++;
                }
            } else {
                qtdPecasNaoPosicionadas++;
            }

        }
        if (qtdPecasNaoPosicionadas > 0) {
            Alert alert = new Alert(Alert.AlertType.ERROR);
            alert.setTitle("Erro na Distribuição");
            alert.setHeaderText(qtdPecasNaoPosicionadas + " Peças não foram posicionadas por problemas de tamanho");
            alert.showAndWait();
        }
        if (qtdPecasPosicionadas > 0) {

            perdaM = areaChapa - areaOcupada;
            perdaP = (perdaM * 100) / areaChapa;

            Text textoAreaChapa = new Text("Area da Chapa " + areaChapa + "M");
            textoAreaChapa.setTranslateX(5);
            textoAreaChapa.setTranslateY(px_altura + 25);
            Text textoPerdaM = new Text("Perda de " + perdaM + " m²");
            textoPerdaM.setTranslateX(5);
            textoPerdaM.setTranslateY(px_altura + 50);
            Text textoPerdaP = new Text("Perda de " + perdaP + " %");
            textoPerdaP.setTranslateX(5);
            textoPerdaP.setTranslateY(px_altura + 75);

            Button bt = new Button("Salvar");

            bt.setTranslateX(px_largura / 2);
            bt.setTranslateY(px_altura + 80);

            Group componentes = new Group(); // 9
            componentes.getChildren().addAll(retangulo1); // 10
            componentes.getChildren().addAll(listPecas);
            componentes.getChildren().addAll(textoAreaChapa, textoPerdaM, textoPerdaP);
            componentes.getChildren().addAll(bt);
            Scene cena = new Scene(componentes, px_largura, px_altura + 100);
            return cena;
        } else {
            Alert alert = new Alert(Alert.AlertType.ERROR);
            alert.setTitle("Erro na Distribuição");
            alert.setHeaderText("Não ouve peças encaixadas");
            alert.showAndWait();
        }

        return null;
    }

    public float calculoPXMT(float valorPeca) {
        float x;
        System.out.println("VALOR PECA L:" + valorPeca);
        System.out.println("VALOR chapa L:" + listPP.get(0).getLargura());
        System.out.println("chapa PX L:" + px_largura);
        x = (valorPeca * listPP.get(0).getLargura()) / px_largura;

        return x;
    }

    private boolean validarCamposProduto() {

        String errorMessage = "";
        if (cbProduto.getValue() == null) {
            errorMessage += "Campo Nome do Produto Invalido!\n";
        }
        if (tfAlturaP.getText().equals("")) {
            errorMessage += "Campo Altura do Produto Invalido!\n";
        }
        if (tfLarguraP.getText().equals("")) {
            errorMessage += "Campo Largura do Produto Invalido!\n";
        }
        if (tfQtdP.getText().equals("")) {
            errorMessage += "Campo Quantidade do Produto Invalido!\n";
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

    private boolean validarCamposItem() {

        String errorMessage = "";
        if (tfNomeItem.getText().equals("")) {
            errorMessage += "Campo Nome do Item Invalido!\n";
        }
        if (tfAltura.getText().equals("")) {
            errorMessage += "Campo Altura do Item Invalido!\n";
        }
        if (tfLargura.getText().equals("")) {
            errorMessage += "Campo Largura do Item Invalido!\n";
        }
        if (tfQtd.getText().equals("")) {
            errorMessage += "Campo Quantidade de Itens Invalido!\n";
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

    private boolean validar() {

        String errorMessage = "";
        if (tfNomeCliente.getText().equals("")) {
            errorMessage += "Campo Nome Invalido!\n";
        }
        if (tableViewItens.getItems().isEmpty()) {
            errorMessage += "Tabela Itens Vazia !\n";
        }
        if (tableViewProdutos.getItems().isEmpty()) {
            errorMessage += "Tabela Produto Vazia !\n";
        }
        if (cbDisco.getValue() == null) {
            errorMessage += "Disco Vazia !\n";
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
