<?php

class Rock_Fst_Zip
{

    private $replaceDir;

    private $zip;

    public function __construct($dir, $filename)
    {
        $this->replaceDir = $dir . '/';
        if (is_file($filename)) {
            unlink($filename);
        }
        $this->zip = new ZipArchive();
        $this->zip->open($filename, ZipArchive::CREATE);
        if (is_dir("$dir")) {
            $this->recursive($dir);
        }
    }

    private function recursive($dir)
    {
        $files = array_diff(scandir($dir), array(
            '.',
            '..'
        ));
        foreach ($files as $file) {
            if (is_dir("$dir/$file")) {
                $this->recursive("$dir/$file");
            } else {
                $pregExp = preg_quote($this->replaceDir, '/');
                $filename = preg_replace('/' . $pregExp . '/', '', "$dir/$file", 1);
                $this->zip->addFile("$dir/$file", $filename);
            }
        }
    }
}
