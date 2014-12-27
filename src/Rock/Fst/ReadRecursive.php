<?php

class Rock_Fst_ReadRecursive
{

    private $files;

    private $hidden = false;

    private $iterator;

    private $pattern;

    public function __construct($path = '.', $pattern = "/.*/i", $hidden = false)
    {
        $this->hidden = $hidden;
        $this->pattern = $pattern;
        $this->files = new ArrayObject(array());
        $this->addFile($path);
        $this->iterator = $this->files->getIterator();
    }

    private function addFile($dir)
    {
        $files = array_diff(scandir($dir), array(
            '.',
            '..'
        ));
        foreach ($files as $file) {
            if (! $this->isHidden($file)) {
                $path = $dir . '/' . $file;
                if (is_dir("$path")) {
                    $this->addFile($path);
                } elseif ($this->isInPattern($file)) {
                    $this->files->append($path);
                }
            }
        }
    }

    private function isHidden($file)
    {
        if ($this->hidden === true) {
            return false;
        }
        if ($this->hidden === false) {
            if (substr($file, 0, 1) === '.') {
                return true;
            }
        }
        return false;
    }

    private function isInPattern($file)
    {
        if (preg_match($this->pattern, $file) === 1) {
            return true;
        }
        return false;
    }

    public function getNextFilePath()
    {
        if (! $this->iterator->valid()) {
            return false;
        }
        $path = $this->iterator->current();
        $this->iterator->next();
        return $path;
    }
}
