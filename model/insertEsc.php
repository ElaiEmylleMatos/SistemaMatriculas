<?php

  include 'conexao.php';
  $email = $_POST['emailEsc'];
  $senha = $_POST['senhaEsc'];
  $bairro = $_POST['bairroEsc'];
  $rua = $_POST['logradouroEsc'];
  $user = $_POST['userEsc'];
  $nome = $_POST['nomeEsc'];
  $tel = $_POST['telEsc'];
  $cnpj = $_POST['cnpjEsc'];
  $codu = 2;

  $sql = "INSERT INTO escolas (email_escolas, senha_escolas, bairro_escolas, rua_escolas, cod_escolas, nomeAcesso_escolas, nome_escolas, telefone_escolas, cnpj, cod_users) VALUES ,('$email', '$senha', '$bairro', '$rua', NULL, '$user', '$nome', '$tel', '$cnpj', '$codu')";

  $res = mysqli_query($link,$ins);

	if ($res) {
		header("location:../main/rel-est.html");
	} else {
		echo "Não foi possível cadastrar essa pessoa. Por favor, tente novamente.";
	}

?>
