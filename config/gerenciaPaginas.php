<?php
#----------------------------------------------------------------
#	GERENCIAMENTO DE MENSAGENS
#----------------------------------------------------------------
	switch (@$_GET['msg']) {
		case '1':
			# SUCESSO DE CADASTRO
			echo "<br><div class='alert alert-success' role='alert'>Usuário cadastrado com Sucesso!</div>" ;
			break;
		case '2':
			# SUCESSO NA EDIÇÃO DE USUÁRIO
			echo "<br><div class='alert alert-success' role='alert'>Dados de Usuário atualizados com Sucesso!</div>" ;
			break;
		case '3':
			# ERRO AO EDITAR SENHA DE USUÁRIO
			echo "<br><div class='alert alert-danger' role='alert'>Senha inválida!</div>" ;
			break;
		case '4':
			# ERRO AO EDITAR USUÁRIO
			echo "<br><div class='alert alert-danger' role='alert'>Matricula inválida!</div>" ;
			break;


		case '5':
			# SUCESSO NA EXCLUSÃO DE USUÁRIO
			echo "<br><div class='alert alert-success' role='alert'>Usuário removido com Sucesso!</div>" ;
			break;
			
	}

#----------------------------------------------------------------
#	GERENCIAMENTO DE PÁGINAS
#----------------------------------------------------------------
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
		case 'EditarUsuario':
			# PÁGINA DE LISTAGEM DE USUÁRIOS
			include('paginas/editarUsuario.php');
			break;
		case 'ExcluirUsuario':
			# PÁGINA DE VALIDAÇÃO E INSERÇÃO DE USUÁRIO
			include('paginas/deletarUsuario.php'); 
			break;
		
		

		# PÁGINAS DE SISTEMA
		case 'insertUser':
			# PÁGINA DE VALIDAÇÃO E INSERÇÃO DE USUÁRIO
			include('paginas/insertUser.php'); 
			break;
		case 'editUser':
			# PÁGINA DE VALIDAÇÃO E INSERÇÃO DE USUÁRIO
			include('paginas/editUser.php'); 
			break;
		case 'alterarSenha':
			# PÁGINA DE VALIDAÇÃO E INSERÇÃO DE USUÁRIO
			include('paginas/alterarSenhaUser.php'); 
			break;

		# PÁGINA PADRÃO
		default:
			include('paginas/inicio.php');
			break;
	}
?>