<?php
	# IDADE MÍNIMA PARA SE CADASTRAR
	$idadeMinima = 0; // em anos 
	$dataMinima = date("Y-m-d", strtotime("-".$idadeMinima." Years - 2 day"));

	# CONEXÃO COM O BANCO
	function BDconecta(){
		try{
			$host = "127.0.0.1";
			$dbname = "servicenet";
			$user = "root";
			$password = "";
			$bd = new PDO("mysql:host=$host;dbname=$dbname", "$user", "$password");
		}catch(PDOException $e){
			echo "ERROR: " . $e->getmessenger();
			die();
		}
		return $bd;
	}

	function BDdesconecta(){
		return NULL;
	}


	function gerarMatricula(){
		$bd = BDconecta(); // Variável de conexão com banco

		$q = $bd->prepare("SELECT matricula FROM usuario ORDER BY matricula DESC LIMIT 1");
		$q->execute();
		$q2 = $q->fetch();
		$ultimamatricula = $q2['0'];

		if ( substr($ultimamatricula, 0, 6) == date('Ym')) {
			$novamatricula = $ultimamatricula+1;
		}else{
			$novamatricula = date('Ym')."0001";
		}

		BDdesconecta();
		
		return $novamatricula;
	}
	function antiInject($sql){
		$sql = @mysql_real_escape_string($sql);
		return $sql;
	}
?>