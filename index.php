<!DOCTYPE html>
<html>
<head>
	<title>Projeto ServiceNET</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
	<script src="https://code.jquery.com/jquery-2.2.2.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
		<div class="page-header">
			<h1><img src="img/logo.png"> CRUDE User System</h1>
		</div>
		<ul class="nav nav-tabs">
			<?php
				$pg = @$_GET['pagina'];
			?>
			<li role="presentation" <?php echo ($pg == null) ? "class='active' " :  "" ?> >
				<a href="?pagina=">Página Inicial</a>
			</li>
			<li role="presentation" <?php echo ($pg == "CadastrarUsuario") ? "class='active' " :  "" ?> >
				<a href="?pagina=CadastrarUsuario">Cadastrar Usuário</a>
			</li>
			<li role="presentation" <?php echo ($pg == "ListarUsuarios") ? "class='active' " :  "" ?> >
				<a href="?pagina=ListarUsuarios">Listar Usuários</a>
			</li>
		</ul>
		<?php
			# GERENCIAMENTO DE PÁGINAS
			include('config/gerenciaPaginas.php');
		?>
	</div>
</body>
</html>