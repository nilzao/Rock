<?php

class Rock_Xmlt_ArrayToClass
{

    private $fields = array();

    private $phpClass = "";

    private $className = '';

    public function __construct($className = 'DefaultArrayXml', array $array)
    {
        $this->className = $className;
        foreach ($array as $k => $v) {
            if (is_array($v)) {
                $this->genArray($k, $v);
            } else {
                $this->fields[$k] = '';
            }
        }
        $this->genClass();
    }

    private function genAttr()
    {
        foreach ($this->fields as $k => $v) {
            if (empty($v)) {
                $this->phpClass .= "    protected \$$k; \n";
            } else 
                if ($v === 'list') {
                    $this->phpClass .= "    protected \$$k = array(); \n";
                } else {
                    $this->phpClass .= "    protected \$$k = null; \n";
                }
        }
    }

    private function getter($campo)
    {
        $this->phpClass .= "\n    public function get" . ucfirst($campo) . "()\n";
        $this->phpClass .= "    {\n";
        $this->phpClass .= "        return \$this->$campo;\n";
        $this->phpClass .= "    }\n";
    }

    private function setter($campo)
    {
        $this->phpClass .= "\n    public function set" . ucfirst($campo) . "(\$$campo)\n";
        $this->phpClass .= "    {\n";
        $this->phpClass .= "        \$this->$campo = \$$campo;\n";
        $this->phpClass .= "        return \$this;\n";
        $this->phpClass .= "    }\n";
    }

    private function setterList($campo)
    {
        $this->phpClass .= "\n    public function add" . ucfirst($campo) . "(\$$campo)\n";
        $this->phpClass .= "    {\n";
        $this->phpClass .= "        \$this->" . $campo . "[] = \$$campo;\n";
        $this->phpClass .= "        return \$this;\n";
        $this->phpClass .= "    }\n";
    }

    private function genGetSet()
    {
        foreach ($this->fields as $k => $v) {
            $this->getter($k);
            if ($v === 'list') {
                $this->setterList($k);
            } else {
                $this->setter($k);
            }
        }
    }

    private function genClass()
    {
        $this->phpClass = "<?php\n\n";
        $this->phpClass .= "class " . $this->className . " extends Rock_Xmlt_ObjToXml \n{\n";
        $this->genAttr();
        $this->genGetSet();
        $this->phpClass .= "}\n\n\n";
    }

    public static function checkArrayIntChild(array $array)
    {
        $keys = array_keys($array);
        foreach ($keys as $k) {
            if (is_int($k)) {
                return true;
            }
        }
        return false;
    }

    private function genArray($varName, array $array)
    {
        if (is_int($varName)) {
            $keys = array_keys($array);
            foreach ($keys as $k) {
                $this->fields[$k] = false;
            }
        } else 
            if ($this->checkArrayIntChild($array)) {
                $this->fields[$varName] = 'list';
            } else {
                $this->fields[$varName] = true;
            }
    }

    public function getPhpClass()
    {
        return $this->phpClass;
    }
}
