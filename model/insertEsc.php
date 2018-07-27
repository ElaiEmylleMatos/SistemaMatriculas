<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
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
  $codu = 2;
  $data = date ("Y-m-d");


if (!($email==""&&$senha==""&&$bairro==""&&$rua==""&&$user==""&&$nome==""&&$tel==""&&$cnpj==""&&$num==""))) {

  $sql = "INSERT INTO escolas (email_escolas, senha_escolas, bairro_escolas, rua_escolas, cod_escolas, nomeAcesso_escolas, nome_escolas, telefone_escolas, cnpj_escolas, cod_users, num_escolas, data_cadastro) VALUES ('$email', '$senha', '$bairro', '$rua', NULL, '$user', '$nome', '$tel', '$cnpj', '$codu','$num','$data')";

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
