<?php
    include 'conexao.php';

    $value = $_REQUEST["q"];
    $del = "DELETE from escolas where cod_escolas=$value";
    $ans = mysqli_query($link,$del);

    /*if ($ans) {

    } else {

    }*/
    #nao tem como dar um refresh na pag nao
    header('location:../main/rel-escola.php');
    mysqli_close($link);
?>
