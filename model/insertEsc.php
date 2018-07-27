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

  function validaCNPJ($cnpj = null) {
  	// Verifica se um número foi informado
  	if(empty($cnpj)) {
  		return false;
  	}

  	// Elimina possivel mascara
  	$cnpj = preg_replace("/[^0-9]/", "", $cnpj);
  	$cnpj = str_pad($cnpj, 14, '0', STR_PAD_LEFT);

  	// Verifica se o numero de digitos informados é igual a 11
  	if (strlen($cnpj) != 14) {
  		return false;
  	}

  	// Verifica se nenhuma das sequências invalidas abaixo
  	// foi digitada. Caso afirmativo, retorna falso
  	else if ($cnpj == '00000000000000' ||
    		$cnpj == '11111111111111' ||
    		$cnpj == '22222222222222' ||
    		$cnpj == '33333333333333' ||
    		$cnpj == '44444444444444' ||
    		$cnpj == '55555555555555' ||
    		$cnpj == '66666666666666' ||
    		$cnpj == '77777777777777' ||
    		$cnpj == '88888888888888' ||
    		$cnpj == '99999999999999') {
    		return false;
  	 } else {
    		$j = 5;
    		$k = 6;
    		$soma1 = "";
    		$soma2 = "";

  		for ($i = 0; $i < 13; $i++) {
  			$j = $j == 1 ? 9 : $j;
  			$k = $k == 1 ? 9 : $k;

  			$soma2 += ($cnpj{$i} * $k);
  			if ($i < 12) {
  				$soma1 += ($cnpj{$i} * $j);
  			}
  			$k--;
  			$j--;
  		}
  		$digito1 = $soma1 % 11 < 2 ? 0 : 11 - $soma1 % 11;
  		$digito2 = $soma2 % 11 < 2 ? 0 : 11 - $soma2 % 11;

  		return (($cnpj{12} == $digito1) and ($cnpj{13} == $digito2));

  	}
}

if (validaCNPJ($cnpj)) {

  $sql = "INSERT INTO escolas (email_escolas, senha_escolas, bairro_escolas, rua_escolas, cod_escolas, nomeAcesso_escolas, nome_escolas, telefone_escolas, cnpj_escolas, cod_users, num_escolas, data_cadastro) VALUES ('$email', '$senha', '$bairro', '$rua', NULL, '$user', '$nome', '$tel', '$cnpj', '$codu','$num','$data')";

  $res = mysqli_query($link,$sql);
} else {
  echo "<script>
  swal({
    title: 'Erro!',
    text: 'CNPJ inválido. Por favor, tente novamente.',
    icon: 'error',
  });</script>";
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
