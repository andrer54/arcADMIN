<?php
/*  PARTE DO LOGIN
if (logado){
    entrar na pagina principal
} else {
    entrar na pagina de login
}
*/
?>
<head>
<title>ArcADMIN</title>
<style>
    body{
        border-style: solid;
        border-color: red;
      
    }
    header{
     
        border-style: solid;
    }
    header h1{
        margin-left: 1%;
    }
    nav{
        float: left;
        border-style: solid;
        border-color: red;
    }
    .barraNavegar{
        float: top;
        width: 95%;
        height: 30px;
        background-color: yellow;
        line-height: 30px;
        margin-left: 15px;
    }
    main{
        width: 50%;
        float: left;
        border-style: solid;
        border-color: red;
    }
    aside{
        float: left;
        border-style: solid;
        border-color: red;
    }
    footer{
        position: relative;
        margin-top: 500px;
        border-style: solid;
        border-color: red;
        
    }
    footer div {
        width: 21%;
        float: left;
        margin-right: 5%;
        
    }
    div{
       
        background-color: lightgray;
        padding: 3px 3px 3px 3px;
    }



</style>
</head>
<body>
    <header>
        <h1>ARCAdmin</h1>
    <nav class="barraNavegar">
        <a href="carteiras.php">Carteiras</a>
        <a href="categorias.php">Categorias</a>
        <a href="relatorios.php">Relatórios</a>
    </nav>
</header>

    <nav>
    <div>
<h2>Budgets</h2>


<table>
                <tr>
                    <th>Budget</th>
                    <th>Valor</th>
                </tr>
        <?php

$msqli = new mysqli("localhost", "andre", "12345", "arcADMIN");

//testar conexao
if($msqli->connect_error){
    echo "erro ao conectar. ERRO: ".$msqli->connect_error;
    exit();
}

$query = "SELECT nomebudget, valorbudget 
            FROM budgets";
$arrayResultado = $msqli->query($query);
$totalbudget = 0;

foreach ($arrayResultado as $resultado){

echo "<tr><td>".$resultado['nomebudget']."</td><td>".$resultado['valorbudget']."</td></tr>";
$totalbudget += $resultado['valorbudget'];

}

echo "<tr><td><b>Total</td><td><b>".$totalbudget."</td></tr>";
?>

</table>
<hr>
    </div>
<div>
<h2>Metas</h2>


<table>
                <tr>
                    <th>Meta</th>
                    <th>Valor</th>
                </tr>
        <?php

$msqli = new mysqli("localhost", "andre", "12345", "arcADMIN");

//testar conexao
if($msqli->connect_error){
    echo "erro ao conectar. ERRO: ".$msqli->connect_error;
    exit();
}

$query = "SELECT nomedameta, valormeta 
            FROM metas";
$arrayResultado = $msqli->query($query);
$totalmeta = 0;

foreach ($arrayResultado as $resultado){

echo "<tr><td>".$resultado['nomedameta']."</td><td>".$resultado['valormeta']."</td></tr>";
$totalmeta += $resultado['valormeta'];

}

echo "<tr><td><b>Total</td><td><b>".$totalmeta."</td></tr>";
?>

</table>


</div>
<h4>Saldo esperado <?php echo $totalmeta-$totalbudget; ?></h4>
    </nav>
    <main><div>
<h3>AGOSTO 2020 | RECEITA R$00,00/1.900,00  |  DESPESAS R$0,00/1.200,00</h3>
</div>

<div>
            <table>
                <tr>
                    <th>Tipo</th>
                    <th>descrição</th>
                    <th>categoria</th>
                    <th>Valor</th>
                <th>Data</th>
                <th>Editar</th>
                <th>Deletar</th>
                </tr>
        <?php

$msqli = new mysqli("localhost", "andre", "12345", "arcADMIN");

//testar conexao
if($msqli->connect_error){
    echo "erro de conexão. ERRO: ".$msqli->connect_error;
    exit();
}

$query = "SELECT c.receitaoudespesa, c.nomecategoria, t.descricao, t.valor, t.data, t.idusuario, t.idtransacao
            FROM transacao t inner join categoria c 
            on t.idcategoria = c.idcategoria";
$arrayResultado = $msqli->query($query);


foreach ($arrayResultado as $resultado){

echo "<tr><td>".$resultado['receitaoudespesa']."</td><td>".$resultado['descricao']."</td><td>".$resultado['nomecategoria']."</td><td>".$resultado['valor']."</td><td>".$resultado['data']."</td>";
    echo "<td><a href=\"edittransacao.php?idtransacao=".$resultado['idtransacao']."\">Editar</a></td>";
    echo "<td><a href=\"deltransacao.php?idtransacao=".$resultado['idtransacao']."\">Deletar</a><br></td></tr>";

}
?>
</table>
<hr>
<form action="addtransacao.php" method="POST">
Descrição: <input type="text" name="descricao" id="">
Valor: <input type="text" name="valor" id="">
Carteira <input type="text" name="carteira"><br>
Categoria: <input type="text" name="categoria" id="">
Data <input type="datetime" name="data" id="" readonly=“true” disabled>
<button type="submit">SALVAR</button>
</form>
    </div>
<hr>
<div>
    <h3>Objetivo</h3>
    <p>
    <b>Juntar 50 mil e faze-lo render 2% a.m" </b><br>
    "Atraves de programação, tradução <br> 
    empreendimentos, administração e investimentos<br> 
    </p>
    <p>
        trabalhar x-chapado de casa,<br> 
        3 naipes, <br>
        finanças crescenstes
    </p>

</div>

</main>
    <aside>


<div>



<table>
                <tr>
                    <th>Carteira</th>
                    <th>Valor</th>
                </tr>
        <?php

$msqli = new mysqli("localhost", "andre", "12345", "arcADMIN");

//testar conexao
if($msqli->connect_error){
    echo "erro ao conectar. ERRO: ".$msqli->connect_error;
    exit();
}

$query = "SELECT nomecarteira, valorcarteira 
            FROM carteira";
$arrayResultado = $msqli->query($query);
$totalcarteira = 0;

foreach ($arrayResultado as $resultado){

echo "<tr><td>".$resultado['nomecarteira']."</td><td>".$resultado['valorcarteira']."</td></tr>";
$totalcarteira += $resultado['valorcarteira'];

}

echo "<tr><td><b>Total</td><td><b>".$totalcarteira."</td></tr>";
?>

</table>
<hr>
<h4>próximos recursos</h4>
<ul>
    <li>criar tabela budgets/meta de recebimentos</li>
</ul>
</div>


</aside>
    <footer>

        <div>
            <h3>META: Previsão mensal</h3>

            <table>
                <tr>
                    <th>Mês</th> <th>ganhos</th> <th>gastos</th> <th>Saldo</td> <th>Acumulado</th>
                </tr>
                
                <?php

$msqli = new mysqli("localhost", "andre", "12345", "arcADMIN");

//testar conexao
if($msqli->connect_error){
    echo "erro ao conectar. ERRO: ".$msqli->connect_error;
    exit();
}

$query = "SELECT mes, ganhos, gastos, acumulado
            FROM previsaomensal";
$arrayResultado = $msqli->query($query);



foreach ($arrayResultado as $resultado){
$saldo = 0;
$saldo = $resultado['ganhos']-$resultado['gastos'];
$mesatual = "Agosto";
if($resultado['mes']==$mesatual){
    $resultado['mes']="<b>Agosto";
   $saldo = "<b>".$saldo;
    $resultado['ganhos'] = "<b>".$resultado['ganhos']; 
    $resultado['gastos'] = "<b>".$resultado['gastos'];
    $resultado['acumulado'] = "<b>".$resultado['acumulado'];
}
echo "<tr><td>".$resultado['mes']."</td><td>".$resultado['ganhos']."</td><td>".$resultado['gastos']."</td><td>".$saldo."</td><td>".$resultado['acumulado']."</td></tr>";


}

?>

</table>
                

        </div>

        <div>
        <h2>Previsão dos anos</h2>
            <table>
                <tr>
                    <th>Ano</th><th>valor</th><th>tempo</th>
                </tr>

                <?php

$msqli = new mysqli("localhost", "andre", "12345", "arcADMIN");

//testar conexao
if($msqli->connect_error){
    echo "erro ao conectar. ERRO: ".$msqli->connect_error;
    exit();
}

$query = "SELECT ano, valor 
            FROM previsaoanual";
$arrayResultado = $msqli->query($query);


foreach ($arrayResultado as $resultado){

echo "<tr><td>".$resultado['ano']."</td><td>".$resultado['valor']."</td></tr>";


}

echo "<tr><td><b>Total</td><td><b>".$resultado['valor']."</td></tr>";
?>

</table>
             
       
        </div>
        




    </footer>
</body>

