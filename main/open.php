<?php


	require('conexao.php');
	session_start();

	  $user = $_POST['user'];
	  $senha = $_POST['senha'];


		$sql = "SELECT nomeAcesso_escolas, senha_escolas FROM escolas WHERE nomeAcesso_escolas = '$user' AND senha_escolas = '$senha'";

	  $resultado = mysqli_query($link, $sql);

	  if(mysqli_num_rows($resultado) > 0){

			$_SESSION['user'] = $user;
			$_SESSION['senha'] = $senha;
			if((!isset ($_SESSION['user']) == true) and (!isset ($_SESSION['senha']) == true))
				{

				unset($_SESSION['user']);
				unset($_SESSION['senha']);

			}

			$logado = $_SESSION['user'];
			header('Location:cadastro-escola.php');
			}

		else{
		    unset($_SESSION['user']);
		    unset($_SESSION['senha']);
				$_SESSION['msg'] = "Usuário e/ou senha incorretos!";
		    header('Location:index.php');
    	}

 ?>
