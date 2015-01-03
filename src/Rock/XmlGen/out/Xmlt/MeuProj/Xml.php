<?php

class Rock_Xmlt_MeuProj_Xml extends Rock_Xmlt_ObjToXml 
{
    protected $exemplo; 
    protected $algo; 

    public function getExemplo()
    {
        return $this->exemplo;
    }

    public function setExemplo($exemplo)
    {
        $this->exemplo = $exemplo;
        return $this;
    }

    public function getAlgo()
    {
        return $this->algo;
    }

    public function setAlgo($algo)
    {
        $this->algo = $algo;
        return $this;
    }
}


