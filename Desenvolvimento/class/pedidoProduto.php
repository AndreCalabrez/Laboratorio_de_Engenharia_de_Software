<?php

/**
 * Created by PhpStorm.
 * User: André
 * Date: 27/04/2017
 * Time: 21:32
 */
class pedidoProduto{
    private $produto;
    private $pedidoCorte;
    private $largura;
    private $altura;
    private $qtd_chapas;

    public function setProduto($produto){
        $this->produto = $produto;
    }
    public function getProduto(){
        return $this->produto;
    }
    public function setPedidoCorte($pedidoCorte){
        $this->pedidoCorte = $pedidoCorte;
    }
    public function getPedidoCorte(){
        return $this->pedidoCorte;
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
    public function setQtd_chapas($qtd_chapas){
        $this->qtd_chapas = $qtd_chapas;
    }
    public function getQtd_chapas(){
        return $this->qtd_chapas;
    }
}