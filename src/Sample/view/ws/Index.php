<?php
$pathRock = Rock_Core_ViewLoader::getPathRock();
require_once $pathRock . 'PhpWsdl/class.phpwsdl.php';
PhpWsdl::RunQuickMode($pathRock . 'Sample/Ctr/Index.php');
