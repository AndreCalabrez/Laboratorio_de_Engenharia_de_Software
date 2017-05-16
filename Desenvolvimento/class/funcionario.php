<?php


class funcionario{
    private $cod_funcionario;
    private $nome;
    private $rua;
    private $numero;
    private $bairro;
    private $telefone;
    private $login;
    private $senha;
    private $cpf;

    public function setCod_funcionario($cod_funcionario){
        $this->cod_funcionario = $cod_funcionario;
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
    public function setCpf($cpf){
        $this->cpf = $cpf;
    }
    public function getCpf(){
        return $this->cpf;
    }
    public function setLogin($login){
        $this->login = $login;
    }
    public function getLogin(){
        return $this->login;
    }
    public function setSenha($senha){
        $this->senha = $senha;
    }
    public function getSenha(){
        return $this->senha;
    }

}