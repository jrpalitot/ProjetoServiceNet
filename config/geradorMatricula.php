<?php
	echo "Ultima Matricula no Banco: " . $ultimamatricula = null . "<br>";

	if ( substr($ultimamatricula, 0, 6) == date('Ym')) {
		$novamatricula = $ultimamatricula+1;
	}else{
		$novamatricula = date('Ym')."0001";
	}
	echo "<br>".$novamatricula;
?>