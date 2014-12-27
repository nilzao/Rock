<?php
$action = Rock_Core_ViewLoader::getFormUrl('Gera');
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>XmlGen</title>
</head>
<body>
	<form method="post" action="<?php echo $action;?>">
		Nome Projeto: <br /> <input type="text" name="proj" value="MeuProj" /><br />
		Xml: <br />
		<textarea name="xml" cols="100" rows="40"><?php
echo '<xml>
<exemplo></exemplo>
<algo></algo>
</xml>';
?></textarea>
		<br /> <input type="submit" value="Gerar" />
	</form>
</body>
</html>
