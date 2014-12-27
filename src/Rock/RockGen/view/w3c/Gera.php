<?php
$vl = Rock_Core_ViewLoader::getInstance();
$data = $vl->getvars();
$url = Rock_Core_ViewLoader::getUrl();
$vendor = $data['vendor'] . '.zip';
?>
<html>
<head></head>
<body>
	<br />
	<br /> Arquivo gerado:
	<br />
	<br />
	<a href='<?php echo $url; ?>RockGen/out/<?php echo $vendor;?>'><?php echo $vendor;?></a>
	<br />
	<br />
	<br />
	<br />
</body>
</html>
