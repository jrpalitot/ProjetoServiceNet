
<?php 
	# Idade Mínima para cadastrar um usuário
	$idadeMinima = 0; // em anos
	$dataMinima = date("Y-m-d", strtotime("-".$idadeMinima." Years"));
?>


<h2>Editar Usuário - 2016050001</h2>

<hr>

<div class="col-xs-6">
	<h4>
		<span class="glyphicon glyphicon-user btn-sm" aria-hidden="true"></span>
		Dados Pessoais</h4>
	<hr>
	<form method="post" action="?pagina=editUser">
		<div class="form-group">
			<label for="nome">Nome:</label>
			<input onkeyup="desbloquearBotao()" type="text" class="form-control" id="nome" name="nome" value="Nome">
		</div>
		<div class="form-group">
			<label for="dataNasc">Data de Nascimento:</label>
			<input max="<?=$dataMinima?>" onchange="desbloquearBotao()" type="date" class="form-control" id="dataNasc" name="dataNasc" value="1995-08-24">
		</div>
		<div class="form-group">
			<label for="email">Email:</label>
			<input onkeyup="desbloquearBotao()" type="email" class="form-control" id="email" name="email" value="email@email.com.br">
		</div>
		<div id="preencha" class="alert alert-warning" role="alert"></div>

		<button id="botao" type="submit" class="btn btn-success">Atualizar dados</button>
	</form>
</div>
<div class="col-xs-6">
	<h4>
		<span class="glyphicon glyphicon-lock btn-sm" aria-hidden="true"></span>
		Mudar senha</h4>
	<hr>
		<div class="form-group">
			<label for="pwd">Senha antiga:</label>
			<input onkeyup="desbloquearBotao()" type="password" class="form-control" id="pwd" name="pwd">
		</div>
		<div class="form-group">
			<label for="pwd">Nova senha:</label>
			<input onkeyup="desbloquearBotao()" type="password" class="form-control" id="pwd" name="pwd">
		</div>
		<div class="form-group">
			<label for="repwd">Digite a senha novamente:</label>
			<input onkeyup="desbloquearBotao()" type="password" class="form-control" id="repwd" name="repwd"x>
		</div>
		<button id="botaoSenha" type="submit" class="btn btn-success">Alterar senha</button>
</div>

<script type="text/javascript">
	var input
	var botao = document.getElementById('botao');
	var preencha = document.getElementById('preencha');
	preencha.innerHTML = "*Todos os campos são obrigatórios"
	botao.style.display = 'none'; 
	desbloquearBotao();

	function desbloquearBotao(){
		var nome = document.getElementById('nome');
		var email = document.getElementById('email');
		var dataNasc = document.getElementById('dataNasc');
		if((nome.value != "") && (email.value != "") && (dataNasc.value != "")){
			botao.style.display = 'block';
			preencha.style.display = 'none';
		}else{
			preencha.innerHTML = "*Todos os campos são obrigatórios"
			botao.style.display = 'none'; 
			preencha.style.display = 'block';
		}
	}
</script>