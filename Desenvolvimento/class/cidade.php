<?php

class cidade{
    private $codigo;
    private $cidade;
    private $uf;

    public function setCodigo($codigo){
        $this->codigo = $codigo;
    }
    public function getCodigo(){
        return $this->codigo;
    }
    public function setCidade($cidade){
        $this->cidade = $cidade;
    }
    public function getCidade(){
        return $this->cidade;
    }
    public function setUf($UF){
        $this->uf = $UF;
    }
    public function getUf(){
        return $this->uf;
    }
}
?>