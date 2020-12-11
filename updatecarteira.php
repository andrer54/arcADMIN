<?php

if($_POST){
    $msqli = new mysqli("localhost", "andre", "12345", "arcADMIN");

    //testar conexao
    if($msqli->connect_error){
        echo "erro ao conectar. ERRO: ".$msqli->connect_error;
        exit();
    }
    
    $query = "UPDATE carteira SET nomecarteira = '".$_POST['nomecarteira']."', idusuario = 1, valorcarteira = '".$_POST['valorcarteira']."' WHERE idcarteira = '".$_POST['idcarteira']."'";
    
    if($msqli->query($query) === TRUE){
        echo "alterado com sucesso";
        header("Location: carteiras.php");
    } else {
        echo "houve um erro.";
    }
}
var_dump($_POST);
/*


*/

?>