<?php

class disco{
    private $cod_disco;
    private $marca;
    private $modelo;
    private $espessura;
    private $diametro;
    private $tempo_trabalho;

    public function setCod_disco($cod_disco){
        $this->cod_disco = $cod_disco;
    }
    public function getCod_disco(){
        return $this->cod_disco;
    }
    public function setMarca($marca){
        $this->marca = $marca;
    }
    public function getMarca(){
        return $this->marca;
    }
    public function setModelo($modelo){
        $this->modelo = $modelo;
    }
    public function getModelo(){
        return $this->modelo;
    }
    public function setEspessura($espessura){
        $this->espessura = $espessura;
    }
    public function getEspessura(){
        return $this->espessura;
    }
    public function setDiametro($diamentro){
        $this->diametro = $diamentro;
    }
    public function getDiamentro(){
        return $this->diametro;
    }
    public function setTempo_trabalho($tempo_trabalho){
        $this->tempo_trabalho = $tempo_trabalho;
    }
    public function getTempo_trabalho(){
        return $this->tempo_trabalho;
    }
}

?>