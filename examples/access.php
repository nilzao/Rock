<?php
error_reporting(E_ALL | E_STRICT);
ini_set('display_errors', true);
require_once dirname(dirname(__FILE__)) . '/src/Rock/Core/AutoLoad.php';

new Rock_Access_Front();
