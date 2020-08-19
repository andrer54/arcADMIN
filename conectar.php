<?php

$conexao = new mysqli("localhost", "andre", "12345", "arcADMIN");
if ($conexao->connect_error){
    echo "Erro ao conectar no banco. Erro: ".$conexao->connect_error;
    exit();
}
