<?php
ini_set('display_errors', true);
error_reporting(E_ALL | E_STRICT);
require_once dirname(dirname(__FILE__)) . '/src/Rock/Core/AutoLoad.php';

new XmlGen_Front();
// new Rock_XmlGen_Front('Gera','handle','w3c');
