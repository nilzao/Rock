<?php

class Rock_Fmt_Cpf extends Rock_Fmt_Mask
{

    public function __construct($cpf, $valida = true)
    {
        $this->val = $cpf;
        $this->mask = '###.###.###-##';
        $this->soNumeros();
        if ($valida) {
            $this->valida();
        }
    }

    private function valida()
    {
        // throw new Exception('Erro no Cpf');
    }
}
