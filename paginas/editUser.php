<?php
	echo "<br><div class='alert alert-danger' role='alert'>";
		# VALIDA PREENCHIMENTO DOS CAMPOS
		if (@$_POST['nome'] == null) {
			echo "Erro: Preencha campo nome!";
			exit();
		}
		if (@$_POST['dataNasc'] == null) {
			echo "Erro: Preencha campo Data de Nascimento!";
			exit();
		}
		if (@$_POST['email'] == null) {
			echo "Erro: Preencha campo E-mail!";
			exit();
		}
		if ((@$_GET['mat'] == "") || (@$_GET['mat'] == null)) {
			header("location: ?pagina=ListarUsuarios&msg=4");
			exit();
		}
	echo "</div>";

	# RECEPÇÃO DE DADOS
	$nome = $_POST['nome'];
	$dataNasc = $_POST['dataNasc'];
	$email = $_POST['email'];

	# OBTENDO MATRICULA DO GET
	$matricula = $_GET['mat'];

	# INSERIR NO BANCO
	$bd = BDConecta();
	# PREPARE
	$usr = $bd->prepare("UPDATE usuario SET nome = :nome, dataNasc = :dataNasc, email = :email WHERE matricula = :matricula");
	
	# BIND PARAMATERS
	$usr->bindParam(':matricula', $matricula, PDO::PARAM_STR);
	$usr->bindParam(':nome', $nome, PDO::PARAM_STR);
	$usr->bindParam(':dataNasc', $dataNasc, PDO::PARAM_STR);
	$usr->bindParam(':email', $email, PDO::PARAM_STR);

	# EXECUTE
	$usr->execute();
	
	$bd = BDDesconecta();
	
	header("location: ?pagina=ListarUsuarios&msg=2");
?>