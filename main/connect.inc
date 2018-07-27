<?php
$servidor = "localhost";
$banco = "matriculabanco";
$usuario = "root";
$senha = "";
$link = mysqli_connect($servidor, $usuario,$senha, $banco);
#$db = mysqli::select_db($link,$link);
	if(!$link)
	{
	    echo "Erro ao conectar ao banco de dados!";
	    exit();
	} else {

		$SQL = "SELECT * FROM escolas";
		$RS = mysqli::query($SQL);
		while($RF = mysqli_fetch_array($RS))
		{
		    echo '<pre>';
		    print_r($RF);
		    echo '</pre>';
		}
	}


?>
