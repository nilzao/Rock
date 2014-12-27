<!DOCTYPE html>
<html>
<head>
<?php
$url = Rock_Core_ViewLoader::getUrl();
$urlFile = Rock_Core_ViewLoader::getUrl(true);
$vl = Rock_Core_ViewLoader::getInstance();
?>
<script
	src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script type="text/javascript">
function loginAjax(){
	var url = '<?php echo $url;?>access.php/Login/handle/json/';
	var urlFile = '<?php echo $urlFile; ?>';
	var email = $('#email').val();
	var passwd = $('#passwd').val();
	var vendor = $('#vendor').val();
	var controller = $('#ctr').val();
	var method = $('#method').val();
	$.ajax({
        type: "POST",
        dataType: "json",
        url: url,
        data: { 
            email: email, 
            passwd: passwd, 
            vendor: vendor, 
            ctr: controller , 
            method: method , 
            ajax: 1 }
    }).done(function(msg) {
        if(msg.success === true){
            alert("Login ok");
        	alert("vendor: [" + msg.vendor 
                	+ "] controller:  ["+ msg.ctr 
                	+ "] method:  [" + msg.method + "]" );
        	urlFinal = urlFile + "/" + msg.ctr 
        	+ "/" + msg.method +"/";
        	alert("Url window.location: " + urlFinal );
        	window.location = urlFinal;
        } else {
            var msgErro = '';
            if(msg.vwError.email){
            	msgErro = 'Usuario Invalido';
            } else if(msg.vwError.inative){
            	msgErro = 'Usuario Inativo';
            } else if(msg.vwError.passwd){
            	msgErro = 'Senha Invalida';
            }
            alert("Erro Login " + msgErro);
        }
    })
    .fail(function() {
        alert( "error" );
    });
}
</script>
<meta charset="UTF-8">
<title>Access</title>
</head>
<body>
	<br />
<?php
$vendor = $vl->getVar('vendor');
$ctr = $vl->getVar('ctr');
$method = $vl->getVar('method');

$vwError = $vl->getVar('vwError');
if (! empty($vwError)) {
    if (! empty($vwError['email'])) {
        $msgErro = 'Usuario Invalido';
    } else 
        if (! empty($vwError['inative'])) {
            $msgErro = 'Usuario Inativo';
        } else 
            if (! empty($vwError['passwd'])) {
                $msgErro = 'Senha Invalida';
            }
}
if (! empty($msgErro)) {
    echo $msgErro;
}
?>
<br />
	<form action="<?php echo $url; ?>access.php/Login/" method="post">
		E-mail: <input type="text" id="email" name="email" /> <br /> Password:
		<input type="password" id="passwd" name="passwd" /> <input
			type="hidden" id="vendor" name="vendor" value="<?php echo $vendor;?>" />
		<input type="hidden" name="ctr" id="ctr" value="<?php echo $ctr;?>" />
		<input type="hidden" name="method" id="method"
			value="<?php echo $method;?>" /> <br /> <input type="submit"
			value="Login Submit Post" /><br /> <input type="button"
			value="Login Ajax" onclick="loginAjax();" />
	</form>
</body>
</html>
