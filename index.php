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
        width: 90%;
        background-color: yellow;
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
       
        background-color: salmon;
        padding: 3px 3px 3px 3px;
    }



</style>
</head>
<body>
    <header><h1>ARCAdmin</h1></header>
    <nav class="barraNavegar">
        <a href="carteiras.php">Carteiras</a>
        <a href="categorias.php">Categorias</a>
    </nav>
    <nav>
    <div>
<h3>budgets</h3>
<li>Moradia: 600 [###############]</li>
<li>Comida: 200  [##########_____]</li>
<li>Vicios: 400  [#############__]</li>
<h4>total: 1200,00</h4>
ate agora tanto: 000
</div>

<div>
<h3>metas de recebimentos</h3>
<ul>
    <li>aux: 600</li>
    <li>  auxm: 300</li>
    <li>trad: 700</li>
    <li>trab: 400</li>
</ul>

<h4>total: 2000</h4>
ate agora tanto: 000

</div>
<h4>Saldo esperado +800</h4>
    </nav>
    <main><div>
<h3>JULHO 2020 | RECEITA R$00,00/1.900,00  |  DESPESAS R$0,00/1.200,00</h3>
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
    echo "erro ao conectar. ERRO: ".$msqli->connect_error;
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
                
                   <tr> <td>Maio</td><td>1800,00</td><td>800,00</td><td>1000,00</td><td>4000,00</td> </tr>
                   <tr> <td>Junho</td><td>2000,00</td><td>900,00</td><td>1100,00</td><td>5100,00</td> </tr>
                   <tr> <td><b>Julho</td><td><b>1900,00</td><td><b>1100,00</td><td><b>800,00</td><td><b>5900,00</td> </tr>
                   <tr> <td>Agosto</td><td>1500,00</td><td>900,00</td><td>600,00</td><td>6500,00</td> </tr>
                   <tr> <td>Setembro</td><td>2000,00</td><td>1000,00</td><td>1000,00</td><td>7500,00</td> </tr>
                   <tr> <td>Outubro</td><td>1600,00</td><td>1100,00</td><td>500,00</td><td>8000,00</td> </tr>
                   <tr> <td>Novembro</td><td>1600,00</td><td>1100,00</td><td>500,00</td><td>8500,00</td> </tr>
                   <tr> <td>Dezembro</td><td>1600,00</td><td>1100,00</td><td>500,00</td><td>9000,00</td> </tr>
                    <tr><th>2021</th></tr>
                   <tr> <td>Janeiro</td><td>1600,00</td><td>1100,00</td><td>500,00</td><td>9500,00</td> </tr>
                   <tr> <td>Fevereiro</td><td>1600,00</td><td>1100,00</td><td>500,00</td><td>10000,00</td> </tr>
                   <tr> <td>Março</td><td>1600,00</td><td>1100,00</td><td>500,00</td><td>10500,00</td> </tr>
                   <tr> <td>Abril</td><td>1600,00</td><td>1100,00</td><td>500,00</td><td>11000,00</td> </tr>

                
            </table>

            <h4>total: 9000</h4>
        </div>

        <div>
            <h3>previsao dos anos</h3>
            <table>
                <tr>
                    <th>Ano</th><th>valor</th><th>tempo</th>
                </tr>
                <tr><td>2018</td><td>0</td><td>-2</td></tr>
                <tr><td>2018</td><td>500</td><td>-1</td></tr>
                <tr><td>2019</td><td>2000</td><td>0</td></tr>
                <tr><td><b>2020</td><td><b>8000</td><td><b>1</td></tr>
                <tr><td>2021</td><td>14000</td><td>2</td></tr>
                <tr><td>2022</td><td>20000</td><td>3</td></tr>
                <tr><td>2023</td><td>26000</td><td>4</td></tr>
                <tr><td>2024</td><td>32000</td><td>5</td></tr>
                <tr><td>2025</td><td>38000</td><td>6</td></tr>
                <tr><td>2026</td><td>44000</td><td>7</td></tr>
                <tr><td>2027</td><td>50000</td><td>8</td></tr>
            </table>
           <h4>total: 50.000,00</h4>
        </div>

    </footer>
</body>

