<?php

class Rock_XmlGen_Ctr_Gera implements Rock_Core_IController
{

    private $phpClass = "<?php\n\n";

    private $phpSubClasses = array();

    private $projClassPrefix = "";

    private $proj = "";

    private $dirOut = "";

    public function handle()
    {
        $input = Rock_Core_Input::getInstance();
        $xml = $input->getRequest('xml');
        $this->proj = $input->getRequest('proj');
        $this->proj = preg_replace('[^A-z0-9]', '', $this->proj);
        $this->proj = ucfirst($this->proj);
        $this->dirOut = dirname(dirname( __FILE__)).'/out';
        $this->projClassPrefix = 'Rock_Xmlt_' . $this->proj . '_';
        Rock_Fst_Deltree::cleanDir($this->dirOut);
        $this->preparaDir();
        $arrayXml = Rock_Xmlt_XmlToArray::createArray($xml);
        $this->recursive($arrayXml);
        new Rock_Fst_Zip($this->dirOut, $this->dirOut . '/Rock_Xmlt_' . $this->proj . '.zip');
        $vl = Rock_Core_ViewLoader::getInstance();
        $vl->load('Gera', array(
            'proj' => 'Rock_Xmlt_' . $this->proj
        ));
    }

    private function preparaDir()
    {
        $path = $this->dirOut . '/Xmlt/' . $this->proj;
        $this->createDir($path);
    }

    private function createDir($path)
    {
        if (! is_dir($path)) {
            mkdir($path, 0777, true);
        }
    }

    private function recursive(array $array, $className = '')
    {
        foreach ($array as $k => $v) {
            if (is_array($v)) {
                if (Rock_Xmlt_ArrayToClass::checkArrayIntChild($v)) {
                    $className = $this->projClassPrefix . ucfirst($k);
                    $arrayTmp = array(
                        $k => $v[0]
                    );
                    $this->recursive($arrayTmp, $className);
                } else {
                    $className = $this->projClassPrefix . ucfirst($k);
                    $this->writeClass(ucfirst($k), $v);
                    $this->recursive($v, $className);
                }
            }
        }
    }

    private function writeClass($fileName, array $array)
    {
        $arrayToClass = new Rock_Xmlt_ArrayToClass($this->projClassPrefix . $fileName, $array);
        $path = $this->dirOut . '/Xmlt/' . $this->proj . '/';
        $filename = $path . $fileName . '.php';
        file_put_contents($filename, $arrayToClass->getPhpClass());
    }
}
