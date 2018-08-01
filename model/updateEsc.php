<?php
  date_default_timezone_set('America/Sao_Paulo');
  include 'conexao.php';

  $value = $_REQUEST["q"];

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
  $codu = 2;
  $data = date ("Y-m-d");


  if (!($email==""&&$senha==""&&$bairro==""&&$rua==""&&$user==""&&$nome==""&&$tel==""&&$cnpj==""&&$num==""&&$uf==""&&$cidade==""&&$cep=="")) {
$sql="UPDATE escolas SET email_escolas='$email',senha_escolas='$senha',bairro_escolas='$bairro',rua_escolas='$rua',nomeAcesso_escolas='$user',nome_escolas='$nome',telefone_escolas='$tel',cnpj_escolas='$cnpj',num_escolas='$num',data_cadastro='$data',cep_escolas='$cep',cidade_escolas='$cidade',uf_escolas='$uf' WHERE cod_escolas=$value";
    $res = mysqli_query($link,$sql);
  }

if ($res) {
  echo "<script>swal('Sucesso', 'Suas informações foram alteradas.', 'success');</script>";
  header('location:../main/rel-escola.php');
}

#Como alterar um elemento html por php, tipo um valor pra um input
#Como fazer o header funcionar em AJAX, tipo, não atualiza a tabela quando exclui
#Como funciona a função submit do jQuery

  mysqli_close($link);
?>
