<?php

if($_POST){
    $msqli = new mysqli("localhost", "andre", "12345", "arcADMIN");

    //testar conexao
    if($msqli->connect_error){
        echo "erro ao conectar no banco. ERRO: ".$msqli->connect_error;
        exit();
    }
    
    $query = "INSERT INTO transacao (descricao, idcategoria, idusuario, idcarteira, valor)
                    VALUES ('".$_POST['descricao']."', '".$_POST['idcategoria']."', '1', '".$_POST['idcarteira']."', '".$_POST['valor']."')";
    
    if($msqli->query($query) === TRUE){
        echo "adicionado com sucesso";
        } else {
        echo "1. houve um erro ao inserir a transação: ".$msqli->error;
        exit();
    }
if($_POST['tipotransacao'] == "receita"){
    $query = "UPDATE carteira SET valorcarteira = valorcarteira+".$_POST['valor']." 
WHERE idcarteira = ".$_POST['idcarteira'];
} else {
    $query = "UPDATE carteira SET valorcarteira = valorcarteira-".$_POST['valor']." 
WHERE idcarteira = ".$_POST['idcarteira'];
}
if($msqli->query($query) === TRUE){
echo "adicionado com sucesso";
header("Location: index.php");
} else {
echo "houve um erro em manipular carteiras:".$msqli->error;
}

}


?>