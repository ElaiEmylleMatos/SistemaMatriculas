<?php
  date_default_timezone_set('America/Sao_Paulo');
  include_once 'conexao.php';

  $value = strip_tags($_POST["id"]);
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

  if (!($email==""&&$bairro==""&&$rua==""&&$nome==""&&$tel==""&&$cnpj==""&&$num==""&&$uf==""&&$cidade==""&&$cep=="")) {
    $sql="UPDATE escolas SET email_escolas='$email',bairro_escolas='$bairro',rua_escolas='$rua',nome_escolas='$nome',telefone_escolas='$tel',cnpj_escolas='$cnpj',num_escolas='$num',data_cadastro='$data',cep_escolas='$cep',cidade_escolas='$cidade',uf_escolas=upper('$uf'),sigla_escolas=upper('$sig') WHERE cod_escolas='$value'";
    $res = mysqli_query($link,$sql);
  }

  mysqli_close($link);

?>
