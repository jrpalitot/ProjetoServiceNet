<?php
	echo "<div class='alert alert-danger' role='alert'>";
		# VALIDA PREENCHIMENTO DOS CAMPOS
		if ($_POST['nome'] == null) {
			echo "Erro: Preencha campo nome!";
			exit();
		}
		if ($_POST['dataNasc'] == null) {
			echo "Erro: Preencha campo Data de Nascimento!";
			exit();
		}
		if ($_POST['email'] == null) {
			echo "Erro: Preencha campo E-mail!";
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
	echo "</div>";

	# RECEPÇÃO DE DADOS
	$nome = $_POST['nome'];
	$dataNasc = $_POST['dataNasc'];
	$email = $_POST['email'];
	$senha = hash("sha512", $_POST['pwd']); // GERA O HASH DA SENHA

	# GERANDO MATRICULA
	$matricula = gerarMatricula();

	# INSERIR NO BANCO
	$bd = BDConecta();
	# PREPARE
	$usr = $bd->prepare("INSERT INTO usuario (matricula, nome, dataNasc, email, senha) VALUES (:matricula, :nome, :dataNasc, :email, :senha)");
	
	# BIND PARAMATERS
	$usr->bindParam(':matricula', $matricula, PDO::PARAM_STR);
	$usr->bindParam(':nome', $nome, PDO::PARAM_STR);
	$usr->bindParam(':dataNasc', $dataNasc, PDO::PARAM_STR);
	$usr->bindParam(':email', $email, PDO::PARAM_STR);
	$usr->bindParam(':senha', $senha, PDO::PARAM_STR);

	# EXECUTE
	$usr->execute();
	
	$bd = BDDesconecta();
	
	header("location: ?pagina=ListarUsuarios&msg=1");
?>