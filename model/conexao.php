<?php

$servidor = "localhost";
$banco = "matriculabanco";
$usuario = "root";
$senha = "";
$link = mysqli_connect($servidor, $usuario,$senha, $banco);

mysqli_query($link,"SET NAMES 'utf8'");
mysqli_query($link,"SET character_set_connection=utf8");
mysqli_query($link,"SET character_set_client=utf8");
mysqli_query($link,"SET character_set_results=utf8");

	if(!$link)
	{
	    echo "erro ao conectar ao banco de dados!";
	    exit();
	}
?>
