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
public class Bairro {
    private int codBairro;
    private String bairro;
    private Cidade cidade;

    public int getCodBairro() {
        return codBairro;
    }

    public void setCodBairro(int codBairro) {
        this.codBairro = codBairro;
    }

    public String getBairro() {
        return bairro;
    }

    public void setBairro(String bairro) {
        this.bairro = bairro;
    }

    public Cidade getCidade() {
        return cidade;
    }

    public void setCidade(Cidade cidade) {
        this.cidade = cidade;
    }
    
    
}
