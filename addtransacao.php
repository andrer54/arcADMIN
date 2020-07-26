<?php

if($_POST){
    $msqli = new mysqli("localhost", "andre", "12345", "arcADMIN");

    //testar conexao
    if($msqli->connect_error){
        echo "erro ao conectar. ERRO: ".$msqli->connect_error;
        exit();
    }
    
    $query = "INSERT INTO transacoes (descricao, idcategoria, idusuario, idcarteira, valor)
    VALUES ('".$_POST['descricao']."', 'idcategoria', '1', 'idcarteira', '".$_POST['valor']."')";
    
    if($msqli->query($query) === TRUE){
        echo "adicionado com sucesso";
        header("Location: index.php");
    } else {
        echo "houve um erro.";
    }
}
var_dump($_POST);
/*


*/

?>