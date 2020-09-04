<?php

include 'conectar.php';

$query = "SELECT nome, senha 
            FROM users WHERE nome=".$_POST['user']."";

$arrayResultado = $conexao->query($query);
var_dump($arrayResultado);
/*
foreach ($arrayResultado as $resultado){


} 



if(senha_digitada == senha_cadastrada_no_banco){
    session_start();
$_SESSION['logado']=$usuario;
}else{
mostra o erro ao usuário.
}


*/