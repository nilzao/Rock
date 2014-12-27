<?php

class Rock_Fmt_Im extends Rock_Fmt_Mask
{

    public function __construct($im)
    {
        $this->val = $im;
        $this->mask = '##.###.###-#';
        $this->zeroEsquerda();
    }
}
