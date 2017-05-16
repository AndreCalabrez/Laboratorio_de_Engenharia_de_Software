<?php

class uf{
    private $sigla_uf;
    private $estado;

    public function setSiglaUf($sigla_uf){
        $this->sigla_uf = $sigla_uf;
    }
    public function getSiglaUf(){
        return $this->sigla_uf;
    }
    public function setEstado($estado){
        $this->estado = $estado;
    }
    public function getEstado(){
        return $this->estado;
    }
}
?>