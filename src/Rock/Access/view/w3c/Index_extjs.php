<!DOCTYPE html>
<html>
<head>
<?php
$url = Rock_Core_ViewLoader::getUrl();
$urlFile = Rock_Core_ViewLoader::getUrl(true);
?>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css"
	href="<?php echo $url;?>extjs/resources/css/ext-all-neptune.css">
<script type="text/javascript" src="<?php echo $url;?>extjs/ext-all.js"></script>
<script type="text/javascript"
	src="<?php echo $url;?>extjs/packages/ext-theme-neptune/build/ext-theme-neptune.js"></script>
<script type="text/javascript"
	src="<?php echo $url;?>extjs/locale/ext-lang-pt_BR.js"></script>
<script type="text/javascript">
var __url = '<?php echo $url;?>';
var __urlFile = '<?php echo $urlFile;?>';
</script>
<script type="text/javascript"
	src="<?php echo $url;?>Access/view/w3c/js/index.js"></script>
<title>Access</title>
</head>
<body>
</body>
</html>