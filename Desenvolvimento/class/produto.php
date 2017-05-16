<?php

class produto{
    private $codigo_produto;
    private $nome;
    private $cor_pred;
    private $espessura;

    public function setCodigo_produto($codigo_produto){
        $this->codigo_produto = $codigo_produto;
    }
    public function getCodigo_produto(){
        return $this->codigo_produto;
    }
    public function setNome($nome){
        $this->nome = $nome;
    }
    public function getNome(){
        return $this->nome;
    }
    public function setCor_pred($cor_pred){
        $this->cor_pred = $cor_pred;
    }
    public function getCor_pred(){
        return $this->cor_pred;
    }
    public function setEspessura($espessura){
        $this->espessura = $espessura;
    }
    public function getEspessura(){
        return $this->espessura;
    }
}
?>