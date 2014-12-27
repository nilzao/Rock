<?php

class Rock_RockGen_Ctr_Gera implements Rock_Core_IController
{

    private $dirOut = '';

    private $dirTemplate = '';

    private $vendor = '';

    public function __construct()
    {
        $this->dirOut = 'RockGen/out';
        $this->dirTemplate = 'RockGen/template';
    }

    public function handle()
    {
        Rock_Fst_Deltree::cleanDir($this->dirOut);
        $input = Rock_Core_Input::getInstance();
        $this->vendor = $input->getRequest('vendor');
        $this->vendor = ucfirst($this->vendor);
        Rock_Fst_CopyRecursive::copy($this->dirTemplate, $this->dirOut);
        $this->replace($this->dirOut);
        rename($this->dirOut . '/RockGen', $this->dirOut . '/' . $this->vendor);
        rename($this->dirOut . '/rockgen.php', $this->dirOut . '/' . strtolower($this->vendor) . '.php');
        new Rock_Fst_Zip($this->dirOut, $this->dirOut . '/' . $this->vendor . '.zip');
        $vl = Rock_Core_ViewLoader::getInstance();
        $vl->load('Gera', array(
            'vendor' => $this->vendor
        ));
    }

    private function replace($from)
    {
        $files = array_diff(scandir($from), array(
            '.',
            '..'
        ));
        foreach ($files as $file) {
            $filename = "$from/$file";
            if (is_dir($filename)) {
                $this->replace($filename);
            } else {
                $strFile = file_get_contents($filename);
                $strFile = str_replace('RockGen', $this->vendor, $strFile);
                file_put_contents($filename, $strFile);
                // echo $filename . "<br/>";
            }
        }
    }
}
