<?php
$url = Rock_Core_ViewLoader::getUrl();
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
</head>
<body>
	<br />
	<br />
	<br />
	<form action="<?php echo $url;?>dbtgen.php/Gera/">
		<table>
			<tr>
				<td>Nome diretorio projeto:</td>
				<td><input name="dbproj" type="text" value="MeuDb" /></td>
			</tr>
			<tr>
				<td>Servidor:</td>
				<td><input name="host" type="text" value="127.0.0.1" /></td>
			</tr>
			<tr>
				<td>Banco:</td>
				<td><input name="db" type="text" value="nome_do_banco" /></td>
			</tr>
			<tr>
				<td>Usuario:</td>
				<td><input name="user" type="text" value="root" /></td>
			</tr>
			<tr>
				<td>Senha:</td>
				<td><input name="pass" type="text" value="123" /></td>
			</tr>
			<tr>
				<td>Driver:</td>
				<td><select name="driver">
						<option value="MySql">MySql</option>
						<option value="Sqlite">Sqlite</option>
						<option value="PgSql">PostgreSql</option>
						<option value="Oci8">Oracle</option>
						<option value="MsSql">MsSql</option>
						<option value="Fb">Firebird</option>
				</select></td>
			</tr>
			<tr>
				<td>Manter Case das Tabelas:</td>
				<td><input name="keppCase" type="checkbox" value="1" /></td>
			</tr>
		</table>
		<input type="submit" value="Gerar">
	</form>
</body>
</html>
