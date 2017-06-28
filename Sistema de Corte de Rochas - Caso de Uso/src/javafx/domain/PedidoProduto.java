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
public class PedidoProduto {
    private PedidoDeCorte pedidoDeCorte;
    private Produto produto;
    private float largura;
    private float altura; 
    private String qtd;

    public PedidoDeCorte getPedidoDeCorte() {
        return pedidoDeCorte;
    }

    public void setPedidoDeCorte(PedidoDeCorte pedidoDeCorte) {
        this.pedidoDeCorte = pedidoDeCorte;
    }

    public Produto getProduto() {
        return produto;
    }

    public void setProduto(Produto produto) {
        this.produto = produto;
    }

    public float getLargura() {
        return largura;
    }

    public void setLargura(float largura) {
        this.largura = largura;
    }

    public float getAltura() {
        return altura;
    }

    public void setAltura(float altura) {
        this.altura = altura;
    }

    public String getQtd() {
        return qtd;
    }

    public void setQtd(String qtd) {
        this.qtd = qtd;
    }
    
    
}
