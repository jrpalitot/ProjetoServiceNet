<?php 
	$bd = BDConecta();

	$sql = "SELECT matricula, nome, email, dataNasc FROM usuario ";

	$pesquisa = antiInject(@$_GET['Pesquisa']);
	if ($pesquisa != "") {
		$sql .= "WHERE nome LIKE '%".$pesquisa."%'";
	}

	# ORDENANDO PESQUISA
	$order = @$_GET['OrderBy'];
	if ($order == 1) {
		$ordenar = "Ordenado pelo Nome";
		$sql .= "ORDER BY nome ASC";
	}elseif ($order == 2) {
		$ordenar = "Ordenado por Matricula";
		$sql .= "ORDER BY matricula ASC";
	}elseif ($order == 3) {
		$ordenar = "Ordenado por Data de Nascimento";
		$sql .= "ORDER BY dataNasc ASC";
	}else{
		$ordenar = "Ordenar";
	}
?>

<h2>
	Lista de Usuários
	<!-- BOTÃO DE ORDENAR -->
	<div class="btn-group navbar-right">
		<button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			<?=$ordenar?>  
			<span class="glyphicon glyphicon-sort-by-alphabet btn-xs" aria-hidden="true"></span> 
			<span class="caret"></span>
		</button>
		<ul class="dropdown-menu">
			<li><a href="?pagina=ListarUsuarios&Pesquisa=<?=$pesquisa?>&OrderBy=1">Nome</a></li>
			<li><a href="?pagina=ListarUsuarios&Pesquisa=<?=$pesquisa?>&OrderBy=2">Matricula</a></li>
			<li><a href="?pagina=ListarUsuarios&Pesquisa=<?=$pesquisa?>&OrderBy=3">Data de Nascimento</a></li>
		</ul>
	</div>

	<!-- BARRA DE PESQUISA -->
	<div class="col-lg-3 navbar-right">
		<form method="get" action="index.php">
			<div class="input-group">
				<input type="hidden" name="pagina" value="ListarUsuarios"/> 
				<input name="Pesquisa" type="text" class="form-control" placeholder="Pesquisar por nome" value="<?=$pesquisa?>">
				<input type="hidden" name="OrderBy" value="<?=$order+0?>"/> 
				<span class="input-group-btn">
					<button type="submit" class="btn btn-default" type="button">
						<span class="glyphicon glyphicon-search" aria-hidden="true"></span>
					</button>
				</span>
			</div>
		</form>
	</div>
</h2>
<hr>

<table class="table table-striped">
	<thead>
		<tr>
			<th>
				Matricula
				<?php echo ($order == 2) ? " <span class='glyphicon glyphicon-sort-by-order btn-xs' aria-hidden='true'></span>" : "" ; ?>
			</th>
			<th>
				Nome
				<?php echo ($order == 1) ? " <span class='glyphicon glyphicon-sort-by-alphabet btn-xs' aria-hidden='true'></span>" : "" ; ?>
			</th>
			<th>
				Data de Nascimento
				<?php echo ($order == 3) ? " <span class='glyphicon glyphicon-sort-by-order btn-xs' aria-hidden='true'></span>" : "" ; ?>
			</th>
			<th>Email</th>
			<th>Ações</th>
		</tr>
	</thead>
	<tbody>

	<?php 
	foreach ($bd->query($sql) as $usuario) { ?>
		<tr>
			<td><?=$usuario['matricula']?></td>
			<td><?=$usuario['nome']?></td>
			<td>
				<?php 
					$date = date_create($usuario['dataNasc']);
					echo date_format($date, "d/m/Y");
				?>
			</td>
			<td><?=$usuario['email']?></td>
			<td>
				<a href="?pagina=EditarUsuario&mat=<?=$usuario['matricula']?>" class="btn btn-info">
					<span class="glyphicon glyphicon-pencil btn-xs" aria-hidden="true"></span>
					Editar
				</a>
				<a href="?pagina=ExcluirUsuario&mat=<?=$usuario['matricula']?>" class="btn btn-danger">
					<span class="glyphicon glyphicon-remove btn-xs" aria-hidden="true"></span>
					Excluir
				</a>
			</td>
		</tr>
	 <?php }
	 	$bd = BDDesconecta();
	 ?>

	</tbody>
</table>