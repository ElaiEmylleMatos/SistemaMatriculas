<?php

	require('../model/conexao.php');
	session_start();

	  $user = $_POST['user'];
	  $senha = $_POST['senha'];

		$sql = "SELECT nomeAcesso_escolas, senha_escolas FROM escolas WHERE nomeAcesso_escolas = '$user' AND senha_escolas = '$senha'";
		$adm = "SELECT nomeAcesso_adm, senha_adm FROM adm WHERE nomeAcesso_adm = '$user' AND senha_adm = '$senha'";

	  $resultado = mysqli_query($link, $sql);
		$fim = mysqli_query($link, $adm);

		if(mysqli_num_rows($resultado) > 0){

			$_SESSION['user'] = $user;
			$_SESSION['senha'] = $senha;

			echo "  <script>
			    alert('Usuario\n".$_SESSION['user']."');
			  </script>";
			if((!isset ($_SESSION['user']) == true) and (!isset ($_SESSION['senha']) == true))
				{

				unset($_SESSION['user']);
				unset($_SESSION['senha']);

			}

			$logado = $_SESSION['user'];

			header('Location:rel-est.php');
			}
			//Adm
			elseif(mysqli_num_rows($fim) > 0){

				$_SESSION['user'] = $user;
				$_SESSION['senha'] = $senha;

				echo "  <script>
						alert('Usuario\n".$_SESSION['user']."');
					</script>";
				if((!isset ($_SESSION['user']) == true) and (!isset ($_SESSION['senha']) == true))
					{

					unset($_SESSION['user']);
					unset($_SESSION['senha']);
				}

				$logado = $_SESSION['user'];

				header('Location:rel-escola.php');
				}


		else{
		    unset($_SESSION['user']);
		    unset($_SESSION['senha']);
				$_SESSION['msg'] = "Usuário e/ou senha incorretos!";
		    header('Location:index.php');
    	}

 ?>
