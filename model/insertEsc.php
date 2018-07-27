<?php

  include 'conexao.php';
  $email = $_POST["emailEsc"];
  $senha = $_POST["senhaEsc"];
  $bairro = $_POST["bairroEsc"];
  $rua = $_POST["logradouroEsc"];
  $user = $_POST["userEsc"];
  $nome = $_POST["nomeEsc"];
  $tel = $_POST["telEsc"];
  $cnpj = $_POST["cnpjEsc"];
  $num = $_POST["numeroEsc"];
  $codu = 2;
  $data = date ("Y-m-d");

  $sql = "INSERT INTO escolas (email_escolas, senha_escolas, bairro_escolas, rua_escolas, cod_escolas, nomeAcesso_escolas, nome_escolas, telefone_escolas, cnpj_escolas, cod_users, num_escolas, data_cadastro) VALUES ('$email', '$senha', '$bairro', '$rua', NULL, '$user', '$nome', '$tel', '$cnpj', '$codu','$num','$data')";

  $res = mysqli_query($link,$sql);

	if ($res) {
    header("location:../main/rel-escola.php");
    echo "<script>
    swal({
      title: 'Sucesso!',
      text: 'Escola cadastrada',
      icon: 'success',
    });</script>";

	} else {
		echo "<script>
    swal({
      title: 'Erro!',
      text: 'Não foi possível cadastrar essa pessoa. Por favor, tente novamente.',
      icon: 'error',
    });location.href=\"index.php\";</script>";
    header("location:../main/cadastro-escola.php");
	}
?>
