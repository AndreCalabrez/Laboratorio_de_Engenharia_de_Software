<?php

/**
 * Created by PhpStorm.
 * User: André
 * Date: 27/04/2017
 * Time: 21:24
 */
class pedidoCorte{
    private $cod_pedido;
    private $qtd_perdaM;
    private $qtd_perdaP;
    private $situacao;
    private $resultado;
    private $alterado;

    public function setCod_pedido($cod_pedido){
        $this->cod_pedido = $cod_pedido;
    }
    public function getCod_pedido(){
        return $this->cod_pedido;
    }
    public function setQtd_perdaM($qtd_perdaM){
        $this->qtd_perdaM = $qtd_perdaM;
    }
    public function getQtd_perdaM(){
        return $this->qtd_perdaM;
    }
    public function setQtd_perdaP($qtd_perdaP){
        $this->qtd_perdaP = $qtd_perdaP;
    }
    public function getQtd_perdaP(){
        return $this->qtd_perdaP;
    }
    public function setSituacao($situacao){
        $this->situacao = $situacao;
    }
    public function getSituacao(){
        return $this->situacao;
    }
    public function setResultado($resultado){
        $this->resultado = $resultado;
    }
    public function getResultado(){
        return $this->resultado;
    }
    public function setAlterado($alterado){
        $this->alterado = $alterado;
    }
    public function getAlterado(){
        return $this->alterado;
    }
}