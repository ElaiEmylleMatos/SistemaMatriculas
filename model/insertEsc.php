<?php
  date_default_timezone_set('America/Sao_Paulo');
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
  $uf = $_POST["ufEsc"];
  $cidade = $_POST["cidadeEsc"];
  $cep = $_POST["cepEsc"];
  $codu = 2;
  $data = date ("Y-m-d");


if (!($email==""&&$senha==""&&$bairro==""&&$rua==""&&$user==""&&$nome==""&&$tel==""&&$cnpj==""&&$num==""&&$uf==""&&$cidade==""&&$cep==""))) {

  $sql = "INSERT INTO escolas (email_escolas, senha_escolas, bairro_escolas, rua_escolas, cod_escolas, nomeAcesso_escolas, nome_escolas, telefone_escolas, cnpj_escolas, cod_users, num_escolas, data_cadastro, uf_escolas, cidade_escolas, cep_escolas) VALUES ('$email', '$senha', '$bairro', '$rua', NULL, '$user', '$nome', '$tel', '$cnpj', '$codu','$num','$data','$uf','$cidade','$cep')";

  $res = mysqli_query($link,$sql);
}

	if ($res) {
    echo "<script>
    swal({
      title: 'Sucesso!',
      text: 'Escola cadastrada',
      icon: 'success',
    });</script>";
    header("location:../main/rel-escola.php");
	} else {
		echo "<script>
    swal({
      title: 'Erro!',
      text: 'Não foi possível cadastrar essa pessoa. Por favor, tente novamente.',
      icon: 'error',
    });</script>";
    header("location:../main/cadastro-escola.php");
	}
?>
