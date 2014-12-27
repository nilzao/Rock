<?php

class Rock_Fmt_Mask
{

    protected $mask;

    protected $val;

    protected function soNumeros()
    {
        $this->val = preg_replace('/[^0-9]/', '', $this->val);
    }

    protected function zeroEsquerda()
    {
        $valTmp = preg_replace('/[^0-9]/', '', $this->val);
        $maskTmp = preg_replace('/[^#]/', '', $this->mask);
        $this->val = str_pad($valTmp, strlen($maskTmp), '0', STR_PAD_LEFT);
    }

    protected function getMasked()
    {
        $maskared = '';
        $k = 0;
        for ($i = 0; $i <= strlen($this->mask) - 1; $i ++) {
            if ($this->mask[$i] == '#') {
                if (isset($this->val[$k]))
                    $maskared .= $this->val[$k ++];
            } else {
                if (isset($this->mask[$i]))
                    $maskared .= $this->mask[$i];
            }
        }
        return $maskared;
    }

    public function getMask()
    {
        return $this->mask;
    }

    public function getValue($formatado = true)
    {
        if (! $formatado) {
            return $this->val;
        }
        return $this->getMasked();
    }
}
