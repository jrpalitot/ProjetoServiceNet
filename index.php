<!DOCTYPE html>
<html>
<head>
	<title>TesteHash</title>
</head>
<body>
<?php
	$dados = "Senha";
	echo hash("sha512", $dados);
 ?>
</body>
</html>