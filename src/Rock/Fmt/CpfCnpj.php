<?php

class Rock_Fmt_CpfCnpj extends Rock_Fmt_Mask
{

    public function __construct($cpfCnpj, $valida = true)
    {
        $this->val = $cpfCnpj;
        $this->soNumeros();
        if (strlen($this->val) === 11) {
            $cpf = new Rock_Fmt_Cpf($this->val, $valida);
            $this->mask = $cpf->getMask();
        } elseif (strlen($this->val) === 14) {
            $cnpj = new Rock_Fmt_Cnpj($this->val, $valida);
            $this->mask = $cnpj->getMask();
        } else {
            throw new Exception('Tamanho de CPF/CNPJ incorreto');
        }
    }
}
