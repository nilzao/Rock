<?php

class Rock_Fst_CopyRecursive
{

    public static function copy($from, $to)
    {
        $files = array_diff(scandir($from), array(
            '.',
            '..'
        ));
        foreach ($files as $file) {
            if (is_dir("$from/$file")) {
                mkdir("$to/$file");
                self::copy("$from/$file", "$to/$file");
            } else {
                copy("$from/$file", "$to/$file");
            }
        }
    }
}
