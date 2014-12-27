<?php

class Rock_Cert_IcpBrasil
{

    private $razaoSocial;

    private $cpfCnpj;

    public function __construct($razaoSocial, $cpfCnpj)
    {
        $this->razaoSocial = $razaoSocial;
        $this->cpfCnpj = $cpfCnpj;
    }

    public function getRazaoSocial()
    {
        return $this->razaoSocial;
    }

    public function getCpfCnpj()
    {
        return $this->cpfCnpj;
    }
}