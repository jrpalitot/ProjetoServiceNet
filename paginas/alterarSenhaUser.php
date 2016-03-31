<?php
	echo "<br><div class='alert alert-danger' role='alert'>";
		# VALIDA PREENCHIMENTO DOS CAMPOS
		if ($_POST['oldpwd'] == null) {
			echo "Erro: Preencha campo de senha antiga!";
			exit();
		}
		if ($_POST['pwd'] == null) {
			echo "Erro: Preencha campo Senha!";
			exit();
		}
		if ($_POST['pwd'] != $_POST['repwd']) {
			echo "Erro: Preencha senhas não conferem!";
			exit();
		}
		if ((@$_GET['mat'] == "") || (@$_GET['mat'] == null)) {
			header("location: ?pagina=ListarUsuarios&msg=4");
			exit();
		}
	echo "</div>";

	# RECEPÇÃO DE DADOS
	$matricula = $_GET['mat'];
	$oldpwd = $_POST['oldpwd'];
	$pwd = $_POST['pwd'];
	$repwd = $_POST['repwd'];

	# VALIDANDO SE AS SENHAS CONFEREM
	if ($pwd != $repwd) {
		header("location: ?pagina=ListarUsuarios&msg=3");
		exit();
	}
	$oldpwd = hash("sha512", $oldpwd);
	$pwd = hash("sha512", $pwd);

	# VALIDANDO SE A SENHA DO USUÁRIO É A MESMA GUARDADA NO BANCO
	$bd = BDconecta();

	$q = $bd->prepare("SELECT senha FROM usuario WHERE matricula = '".$matricula."'  LIMIT 1");
	$q->execute();
	$q2 = $q->fetch();
	$senhaNoBanco = $q2['0'];

	if ($oldpwd != $senhaNoBanco) {
		header("location: ?pagina=ListarUsuarios&msg=3");
		exit();
	}

	# INSERIR NO BANCO
	$bd = BDConecta();
	# PREPARE
	$usr = $bd->prepare("UPDATE usuario SET senha = :senha WHERE matricula = :matricula");
	
	# BIND PARAMATERS
	$usr->bindParam(':matricula', $matricula, PDO::PARAM_STR);
	$usr->bindParam(':senha', $pwd, PDO::PARAM_STR);

	# EXECUTE
	$usr->execute();
	
	$bd = BDDesconecta();
	
	header("location: ?pagina=ListarUsuarios&msg=2");
?>