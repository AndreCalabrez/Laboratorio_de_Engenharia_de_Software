/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package javafx.domain;

/**
 *
 * @author André
 */
public class PedidoDeCorte {
    private int codPedido;
    private float qtdPerdaP;
    private float qtdPerdaM;
    private String situacao;
    private String resultado;
    private Boolean alterado;
    private Funcionario funcionario;
    private Cliente cliente;
    private Disco disco;

    public Funcionario getFuncionario() {
        return funcionario;
    }

    public void setFuncionario(Funcionario funcionario) {
        this.funcionario = funcionario;
    }

    public Cliente getCliente() {
        return cliente;
    }

    public void setCliente(Cliente cliente) {
        this.cliente = cliente;
    }

    public Disco getDisco() {
        return disco;
    }

    public void setDisco(Disco disco) {
        this.disco = disco;
    }
    
    

    public int getCodPedido() {
        return codPedido;
    }

    public void setCodPedido(int codPedido) {
        this.codPedido = codPedido;
    }

    public float getQtdPerdaP() {
        return qtdPerdaP;
    }

    public void setQtdPerdaP(float qtdPerdaP) {
        this.qtdPerdaP = qtdPerdaP;
    }

    public float getQtdPerdaM() {
        return qtdPerdaM;
    }

    public void setQtdPerdaM(float qtdPerdaM) {
        this.qtdPerdaM = qtdPerdaM;
    }

    public String getSituacao() {
        return situacao;
    }

    public void setSituacao(String situacao) {
        this.situacao = situacao;
    }

    public String getResultado() {
        return resultado;
    }

    public void setResultado(String resultado) {
        this.resultado = resultado;
    }

    public Boolean getAlterado() {
        return alterado;
    }

    public void setAlterado(Boolean alterado) {
        this.alterado = alterado;
    }
    
    
}
