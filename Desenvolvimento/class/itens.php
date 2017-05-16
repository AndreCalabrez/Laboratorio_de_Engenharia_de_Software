<?php

class itens {

    private $cod_itens;
    private $nome_peca;
    private $largura;
    private $altura;
    private $qtde;

    public function setCod_itens($cod_itens){
        $this->cod_itens = $cod_itens;
    }
    public function getCod_itens(){
        return $this->cod_itens;
    }
    public function setNome_peca($nome_peca){
        $this->nome_peca = $nome_peca;
    }
    public function getNome_peca(){
        return $this->nome_peca;
    }
    public function setLargura($largura){
        $this->largura = $largura;
    }
    public function getLargura(){
        return $this->largura;
    }
    public function setAltura($altura){
        $this->altura = $altura;
    }
    public function getAltura(){
        return $this->altura;
    }
    public function setQtde($qtde){
        $this->qtde = $qtde;
    }
    public function getQtde(){
        return $this->qtde;
    }
}
?>