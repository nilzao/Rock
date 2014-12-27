<?php

class Rock_Fmt_DataBr extends Rock_Fmt_Mask
{

    public function __construct(Datet_DateObj $dateObj)
    {
        $this->val = $dateObj->getDate('%d%m%Y');
        $this->mask = '##/##/####';
    }
}
