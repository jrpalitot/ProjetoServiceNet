<?php
	switch (@$_GET['pagina']) {
		# PÁGINAS DE NAVEGAÇÃO
		case 'CadastrarUsuario':
			# PÁGINA DE FORMULÁRIO DE CADASTRO
			include('paginas/cadastroUsuario.php'); 
			break;
		case 'ListarUsuarios':
			# PÁGINA DE LISTAGEM DE USUÁRIOS
			include('paginas/listarUsuarios.php');
			break;
		

		# PÁGINAS DE SISTEMA
		case 'insertUser':
			# PÁGINA DE VALIDAÇÃO E INSERÇÃO DE USUÁRIO
			include('paginas/insertUser.php'); 
			break;
		
		# PÁGINA PADRÃO
		default:
			echo "Página Inicial";
			break;
	}
?>