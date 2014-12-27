<?php

class Rock_Fmt_Acentos
{

    private $stringSuja;

    private $stringLimpa;

    private function utf8_strtr($str, $from, $to)
    {
        $keys = array();
        $values = array();
        preg_match_all('/./u', $from, $keys);
        preg_match_all('/./u', $to, $values);
        $mapping = array_combine($keys[0], $values[0]);
        return strtr($str, $mapping);
    }

    public function __construct($string)
    {
        $this->stringSuja = $string;
        $string = $this->utf8_strtr($string, "¦©¬µ·»¼¾ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝßàáâãäåæçèéêëìíîïðñòóôõöøùúûüýÿ", "SOZsozYYuAAAAAAACEEEEIIIIDNOOOOOOUUUUYsaaaaaaaceeeeiiiionoooooouuuuyy");
        $this->stringLimpa = $string;
    }

    public function getStringSuja()
    {
        return $this->stringSuja;
    }

    public function getStringLimpa()
    {
        return $this->stringLimpa;
    }
}
