<?php

class Rock_Xmlt_ObjToXml
{

    private function toArray()
    {
        $arrTmp = get_object_vars($this);
        $this->toArrayRecursive($arrTmp);
        return $arrTmp;
    }

    private function toArrayRecursive(array &$array)
    {
        foreach ($array as &$v) {
            if (is_object($v) && method_exists($v, 'toArray')) {
                $v = $v->toArray();
            } else 
                if (is_object($v)) {
                    $v = get_object_vars($v);
                } else 
                    if (is_array($v)) {
                        $this->toArrayRecursive($v);
                    }
        }
    }

    public function toXml($nodeName = 'root')
    {
        $arrTmp = $this->toArray();
        $domXMl = Rock_Xmlt_ArrayToXML::createXML($nodeName, $arrTmp);
        return $domXMl->saveXML();
    }
}
