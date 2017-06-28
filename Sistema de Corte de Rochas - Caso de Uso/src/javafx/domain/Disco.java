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
public class Disco {

    private int codDisco;
    private String marca;
    private String modelo;
    private int espessura;
    private int diametro;
    private Double tempoTrabalho;

    public int getCodDisco() {
        return codDisco;
    }

    public void setCodDisco(int codDisco) {
        this.codDisco = codDisco;
    }

    public String getMarca() {
        return marca;
    }

    public void setMarca(String marca) {
        this.marca = marca;
    }

    public String getModelo() {
        return modelo;
    }

    public void setModelo(String modelo) {
        this.modelo = modelo;
    }

    public int getEspessura() {
        return espessura;
    }

    public void setEspessura(int espessura) {
        this.espessura = espessura;
    }

    public int getDiametro() {
        return diametro;
    }

    public void setDiametro(int diametro) {
        this.diametro = diametro;
    }

    public Double getTempoTrabalho() {
        return tempoTrabalho;
    }

    public void setTempoTrabalho(Double tempoTrabalho) {
        this.tempoTrabalho = tempoTrabalho;
    }

    @Override
    public String toString() {
        return this.marca+" - "+this.modelo;
    }

}
