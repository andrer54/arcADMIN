<?php

//deletar registro
$conexao = new mysqli("localhost", "andre", "12345", "arcADMIN");
if ($conexao->connect_error){
    echo "Erro ao conectar no banco. Erro: ".$conexao->connect_error;
    exit();
}

if($_GET['idcarteira']){
    $queryDelete = "delete from carteira where idcarteira=".$_GET['idcarteira'];

    if($conexao->query($queryDelete) === TRUE){
        echo "deletado com sucesso";
        header("Location: carteiras.php");
    } else {
        echo "houve um erro.";
    }
}
