<?php

class Rock_Fst_Deltree
{

    public static function delTree($dir)
    {
        $arrayDir = array();
        if (is_dir($dir)) {
            $arrayDir = scandir($dir);
        }
        $files = array_diff($arrayDir, array(
            '.',
            '..'
        ));
        foreach ($files as $file) {
            (is_dir("$dir/$file")) ? self::delTree("$dir/$file") : unlink("$dir/$file");
        }
        if (is_dir($dir)) {
            return rmdir($dir);
        }
    }

    public static function cleanDir($dir)
    {
        $files = array_diff(scandir($dir), array(
            '.',
            '..'
        ));
        foreach ($files as $file) {
            (is_dir("$dir/$file")) ? self::delTree("$dir/$file") : unlink("$dir/$file");
        }
    }
}
