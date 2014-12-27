<?php

class Rock_Fmt_Cnpj extends Rock_Fmt_Mask
{

    public function __construct($cnpj, $valida = true)
    {
        $this->val = $cnpj;
        $this->mask = '##.###.###/####-##';
        $this->soNumeros();
        if ($valida) {
            $this->valida();
        }
    }

    private function valida()
    {
        // throw new Exception('Erro no Cnpj');
    }
}
