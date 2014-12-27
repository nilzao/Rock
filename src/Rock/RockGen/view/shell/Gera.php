<?php
$vl = Rock_Core_ViewLoader::getInstance();
$data = $vl->getvars();
$vendor = $data['vendor'] . '.zip';
echo "\nArquivo gerado:\n";
echo "  " . getcwd() . "/RockGen/out/$vendor\n\n";
