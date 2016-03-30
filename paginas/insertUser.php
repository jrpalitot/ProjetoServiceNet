<?php
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
	# RECEPÇÃO DE DADOS
	echo $nome = $_POST['nome'];
?>