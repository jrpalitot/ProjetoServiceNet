
<?php 
	# Idade Mínima para cadastrar um usuário
	$idadeMinima = 16; 
	$dataMinima = date("Y-m-d", strtotime("-".$idadeMinima." Years"));
?>


<h2>Cadastro de Usuários</h2>

<hr>

<div class="col-sm-offset-4 col-sm-4">
	<p>Idade mínima: <b><?=$idadeMinima?> anos</b></p>
	<form method="post" action="?pagina=insertUser">
		<div class="form-group">
			<label for="nome">Nome:</label>
			<input onkeyup="desbloquearBotao()" type="text" class="form-control" id="nome" name="nome">
		</div>
		<div class="form-group">
			<label for="dataNasc">Data de Nascimento:</label>
			<input max="<?=$dataMinima?>" onchange="desbloquearBotao()" type="date" class="form-control" id="dataNasc" name="dataNasc">
		</div>
		<div class="form-group">
			<label for="email">Email:</label>
			<input onkeyup="desbloquearBotao()" type="email" class="form-control" id="email" name="email">
		</div>
		<div class="form-group">
			<label for="pwd">Senha:</label>
			<input onkeyup="desbloquearBotao()" type="password" class="form-control" id="pwd" name="pwd">
		</div>
		<div class="form-group">
			<label for="repwd">Digite a senha novamente:</label>
			<input onkeyup="desbloquearBotao()" type="password" class="form-control" id="repwd" name="repwd">
		</div>
		
		<p id="preencha" class="bg-warning"></p>
		<button id="botao" type="submit" class="btn btn-success btn-block">Cadastrar</button>

	</form>


	<br>
</div>
<script type="text/javascript">
	var input
	var botao = document.getElementById('botao');
	var preencha = document.getElementById('preencha');
	preencha.innerHTML = "*Todos os campos são obrigatórios"
	botao.style.display = 'none'; 

	function desbloquearBotao(){
		var nome = document.getElementById('nome');
		var email = document.getElementById('email');
		var dataNasc = document.getElementById('dataNasc');
		var pwd = document.getElementById('pwd');
		var repwd = document.getElementById('repwd');
		if((nome.value != "") && (email.value != "") && (dataNasc.value != "") && (pwd.value != "") && (pwd.value == repwd.value)){
			botao.style.display = 'block';
			preencha.style.display = 'none';
		}else if(pwd.value != repwd.value){
			preencha.innerHTML = "**As senhas não conferem"
			botao.style.display = 'none'; 
			preencha.style.display = 'block';
		}else{
			preencha.innerHTML = "*Todos os campos são obrigatórios"
			botao.style.display = 'none'; 
			preencha.style.display = 'block';
		}
	}
</script>