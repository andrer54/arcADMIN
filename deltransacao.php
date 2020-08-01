<h1>deletar transacao</h1>

<?php

//deletar registro
$conexao = new mysqli("localhost", "andre", "12345", "arcADMIN");
if ($conexao->connect_error){
    echo "Erro ao conectar no banco. Erro: ".$conexao->connect_error;
    exit();
}

if($_GET['idtransacao']){
    $queryDelete = "delete from transacao where idtransacao=".$_GET['idtransacao'];

    if($conexao->query($queryDelete) === TRUE){
        echo "deletado com sucesso";
        header("Location: index.php");
    } else {
        echo "houve um erro.";
    }
}