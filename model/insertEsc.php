<?php
  date_default_timezone_set('America/Sao_Paulo');
  include 'conexao.php';

  $senha = mysqli_real_escape_string($link,$_POST["senhaEsc"]);
  $user = mysqli_real_escape_string($link,$_POST["userEsc"]);
  $email = mysqli_real_escape_string($link,$_POST["emailEsc"]);
  $bairro = mysqli_real_escape_string($link,$_POST["bairroEsc"]);
  $rua = mysqli_real_escape_string($link,$_POST["logradouroEsc"]);
  $nome = mysqli_real_escape_string($link,$_REQUEST["nomeEsc"]);
  $tel = mysqli_real_escape_string($link,$_POST["telEsc"]);
  $cnpj = mysqli_real_escape_string($link,$_POST["cnpjEsc"]);
  $num = mysqli_real_escape_string($link,$_POST["numeroEsc"]);
  $uf = mysqli_real_escape_string($link,$_POST["ufEsc"]);
  $cidade = mysqli_real_escape_string($link,$_POST["cidadeEsc"]);
  $cep = mysqli_real_escape_string($link,$_POST["cepEsc"]);
  $sig = mysqli_real_escape_string($link,$_POST["siglaEsc"]);
  $codu = 2;
  $data = date ("Y-m-d");

  if ($num == "") {
    $num = "s/n";
  }

if (!($email==""&&$senha==""&&$bairro==""&&$rua==""&&$user==""&&$nome==""&&$tel==""&&$cnpj==""&&$uf==""&&$cidade==""&&$cep=="")) {
$sql="INSERT INTO escolas (email_escolas, senha_escolas, bairro_escolas, rua_escolas, cod_escolas, nomeAcesso_escolas, nome_escolas, telefone_escolas, cnpj_escolas, cod_users, num_escolas, data_cadastro, uf_escolas, cidade_escolas, cep_escolas,sigla_escolas)VALUES('$email','$senha','$bairro','$rua',NULL,'$user','$nome','$tel','$cnpj',$codu,'$num','$data',upper('$uf'),'$cidade','$cep',upper('$sig'))";
  $res = mysqli_query($link,$sql);
}

	if ($res) {
    header("location:../main/rel-escola.php");
    #mailto:email
	} else {
    header("location:../main/cadastro-escola.php");
	}
  mysqli_close($link);
?>
