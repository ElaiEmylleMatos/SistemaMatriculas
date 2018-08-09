<?php
  date_default_timezone_set('America/Sao_Paulo');
  include 'conexao.php';

  $email = addslashes($_POST["emailEsc"]);
  $senha = addslashes($_POST["senhaEsc"]);
  $bairro = addslashes($_POST["bairroEsc"]);
  $rua = addslashes($_POST["logradouroEsc"]);
  $user = addslashes($_POST["userEsc"]);
  $nome = addslashes($_POST["nomeEsc"]);
  $tel = addslashes($_POST["telEsc"]);
  $cnpj = addslashes($_POST["cnpjEsc"]);
  $num = addslashes($_POST["numeroEsc"]);
  $uf = addslashes($_POST["ufEsc"]);
  $cidade = addslashes($_POST["cidadeEsc"]);
  $cep = addslashes($_POST["cepEsc"]);
  $sig = addslashes($_POST["siglaEsc"]);
  $codu = 2;
  $data = date ("Y-m-d");

  if ($num == "") {
    $num = "s/n";
  }

if (!($email==""&&$senha==""&&$bairro==""&&$rua==""&&$user==""&&$nome==""&&$tel==""&&$cnpj==""&&$uf==""&&$cidade==""&&$cep=="")) {
$sql="INSERT INTO escolas (email_escolas, senha_escolas, bairro_escolas, rua_escolas, cod_escolas, nomeAcesso_escolas, nome_escolas, telefone_escolas, cnpj_escolas, cod_users, num_escolas, data_cadastro, uf_escolas, cidade_escolas, cep_escolas,sigla_escolas)VALUES('$email','$senha','$bairro','$rua',NULL,'$user','$nome','$tel','$cnpj',$codu,'$num','$data','$uf','$cidade','$cep','$sig')";
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
    #mailto:email
	} else {
		echo "<script>
    swal({
      title: 'Erro!',
      text: 'Não foi possível cadastrar essa pessoa. Por favor, tente novamente.',
      icon: 'error',
    });</script>";
    header("location:../main/cadastro-escola.php");
	}
  mysqli_close($link);
?>
