<?php
  include_once '../../model/conexao.php';
  if($_REQUEST['empid']) {
    $sql = "SELECT * FROM escolas WHERE cod_escolas=".$_REQUEST['empid'];
  	$resultset = mysqli_query($link, $sql) or die("database error:". mysqli_error($link));
  	$data = array();
  	while( $row = mysqli_fetch_assoc($resultset) ) {
  		$data = $row;
  	}
  	echo json_encode($data);
  } else {
  	echo 0;
  }
?>
