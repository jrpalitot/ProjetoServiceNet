<?php
	# VALIDANDO MATRICULA VAZIA

	if ((@$_GET['mat'] == "") || (@$_GET['mat'] == null)) {
		header("location: ?pagina=ListarUsuarios&msg=4");
		exit();
	}

	$matricula = @$_GET['mat'];
	$deletar = @$_GET['del'];

?>

<div class="col-sm-offset-3 col-sm-6">
	<h2>Tem certeza que deseja deletar Usuário com Matricula <?=$matricula?> ?</h2>
	<br><br>
	<a href="?pagina=ExcluirUsuario&mat=<?=$matricula?>&del=1" class="btn btn-danger btn-block">
		Excluir
	</a>
	<a href="?pagina=ListarUsuarios" class="btn btn-info btn-block">
		Cancelar
	</a>
</div>


<?php
	if($deletar == 1){

		# DELETAR NO BANCO
		$bd = BDConecta();
		# PREPARE
		$usr = $bd->prepare("DELETE FROM usuario WHERE matricula = :matricula");
		
		# BIND PARAMATERS
		$usr->bindParam(':matricula', $matricula, PDO::PARAM_STR);

		# EXECUTE
		$usr->execute();
		
		$bd = BDDesconecta();
		
		header("location: ?pagina=ListarUsuarios&msg=5");
	}
?>