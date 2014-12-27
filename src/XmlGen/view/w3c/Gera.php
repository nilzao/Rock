<?php
$vl = Rock_Core_ViewLoader::getInstance();
$data = $vl->getvars();
$url = Rock_Core_ViewLoader::getUrl();
$proj = $data['proj'] . '.zip';
?>
<html>
<head></head>
<body>
	<br />
	<br /> Arquivo gerado:
	<br />
	<br />
	<a href='<?php echo $url; ?>XmlGen/out/<?php echo $proj;?>'><?php echo $proj;?></a>
	<br />
	<br />
	<br />
	<br />
</body>
</html>
