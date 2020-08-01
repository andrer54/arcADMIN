<?php

if($_POST){
    $msqli = new mysqli("localhost", "andre", "12345", "arcADMIN");

    //testar conexao
    if($msqli->connect_error){
        echo "erro ao conectar. ERRO: ".$msqli->connect_error;
        exit();
    }
    
    $query = "INSERT INTO transacao (descricao, idcategoria, idusuario, idcarteira, valor)
    VALUES ('".$_POST['descricao']."', '1', '1', '1', '".$_POST['valor']."')";
    
    if($msqli->query($query) === TRUE){
        echo "adicionado com sucesso";
        header("Location: index.php");
    } else {
        echo "houve um erro:".$msqli->error;
    }
}
var_dump($_POST);
/*


*/

?>