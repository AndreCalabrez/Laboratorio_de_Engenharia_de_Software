<?php


class cliente{
    private $cod_cliente;
    private $nome;
    private $rua;
    private $numero;
    private $bairro;
    private $telefone;
    private $tipo;
    private $cpf_cnpj;
    private $inscricao_estadual;

    public function setCod_cliente($cod_cliente){
        $this->cod_cliente = $cod_cliente;
    }
    public function getCod_cliente(){
        return $this->cod_cliente;
    }
    public function setNome($nome){
        $this->nome = $nome;
    }
    public function getNome(){
        return $this->nome;
    }
    public function setRua($rua){
        $this->rua = $rua;
    }
    public function getRua(){
        return $this->rua;
    }
    public function setNumero($numero){
        $this->numero = $numero;
    }
    public function getNumero(){
        return $this->numero;
    }
    public function setBairro($bairro){
        $this->bairro = $bairro;
    }
    public function getBairro(){
        return $this->bairro;
    }
    public function setTelefone($telefone){
        $this->telefone = $telefone;
    }
    public function getTelefone(){
        return $this->telefone;
    }
    public function setTipo($tipo){
        $this->tipo = $tipo;
    }
    public function getTipo(){
        return $this->tipo;
    }
    public function setCpf_Cnpj($cpf_cnpj){
        $this->cpf_cnpj = $cpf_cnpj;
    }
    public function getCpf_Cnpj(){
        return $this->cpf_cnpj;
    }
    public function setInscricao_estadual($inscricao_estadual){
        $this->inscricao_estadual = $inscricao_estadual;
    }
    public function getInscricao_estadual(){
        return $this->inscricao_estadual;
    }

}