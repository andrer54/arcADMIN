<head>
<title>ArcADMIN</title>
<link href="estilos/estilo.css" rel="stylesheet">
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
<h2>Gastos</h2>


<table>
                <tr>
                    <th>Budget</th>
                    <th>Feito</th>
                    <th>Estimado</th>
                    <th>Resta</th>
                </tr>
        <?php

include 'conectar.php';
$query = "SELECT nomebudget, valorbudget, consolidado 
            FROM budgets";
$arrayResultado = $conexao->query($query);
$totalbudget = 0;
$totalConsolidado = 0;
$saldo = 0;

foreach ($arrayResultado as $resultado){

    $saldo = $resultado['valorbudget']-$resultado['consolidado'];

echo "<tr><td>".$resultado['nomebudget']."</td>
        <td>".$resultado['consolidado']."</td>
        <td>".$resultado['valorbudget']."</td>
        <td>".$saldo."</td></tr>";
$totalbudget += $resultado['valorbudget'];
$totalConsolidado += $resultado['consolidado'];

$saldoTotal= $totalbudget-$totalConsolidado;

}

echo "<tr><td><b>Total</td><td><b>".$totalConsolidado."</td><td><b>".$totalbudget."</td><td><b>".$saldoTotal."</td></tr>";
?>

</table>
<hr>
    </div>
<div>
<h2>Metas</h2>


<table>
                <tr>
                    <th>Meta</th>
                    <th>Feito</th>
                    <th>Estimado</th>
                    <th>Falta</th>
                </tr>
        <?php



$query = "SELECT nomedameta, valormeta, consolidado 
            FROM metas";
$arrayResultado = $conexao->query($query);
$totalmeta = 0;
$totconsolidado = 0;

foreach ($arrayResultado as $resultado){
    $faltam = $resultado['valormeta']-$resultado['consolidado'];
echo "<tr><td>".$resultado['nomedameta']."</td>
            <td>".$resultado['consolidado']."</td>
            <td>".$resultado['valormeta']."</td>
            <td>".$faltam."</td></tr>";
$totalmeta += $resultado['valormeta'];
$totconsolidado += $resultado['consolidado'];
}
$restam = $totalmeta-$totconsolidado;
echo "<tr><td><b>Total</td><td>".$totconsolidado."</td><td><b>".$totalmeta."</td><td>".$restam."</td></tr>";
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


$query = "SELECT c.receitaoudespesa, c.nomecategoria, t.descricao, t.valor, t.data, t.idusuario, t.idtransacao
            FROM transacao t inner join categoria c 
            on t.idcategoria = c.idcategoria";
$arrayResultado = $conexao->query($query);


foreach ($arrayResultado as $resultado){

echo "<tr><td>".$resultado['receitaoudespesa']."</td><td>".$resultado['descricao']."</td><td>".$resultado['nomecategoria']."</td><td>".$resultado['valor']."</td><td>".$resultado['data']."</td>";
    echo "<td><a href=\"edittransacao.php?idtransacao=".$resultado['idtransacao']."\">Editar</a></td>";
    echo "<td><a href=\"deltransacao.php?idtransacao=".$resultado['idtransacao']."\">Deletar</a><br></td></tr>";

}
?>
</table>
<hr>
<form action="addtransacao.php" method="POST">
<label for="tipotransacao">Tipo de transação:</label>
<select name="tipotransacao" id="tipotransacao">
    <option value="saab">Receita</option>
  <option value="volvo">Despesa</option>
  <option value="mercedes">Transferencia</option>
  </select>
Descrição: <input type="text" name="descricao" id="">
Valor: <input type="text" name="valor" id="">

<label for="carteira">Conta:</label>
<select name="idcarteira" id="carteira">
  <option value="7">Caixa</option>
  <option value="8">Inter</option>
  <option value="9">PagSeguro</option>
  <option value="13">Carteira</option>
</select><br>

<label for="categoria">Categoria:</label>
<select name="categoria" id="categoria">
  <option value="volvo">Diaria</option>
  <option value="saab">Tradução</option>
  <option value="mercedes">Alimentação</option>
  <option value="audi">Vícios</option>
</select>
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



$query = "SELECT nomecarteira, valorcarteira 
            FROM carteira";
$arrayResultado = $conexao->query($query);
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
    <li>ligar despesa a alguma carteira</li>
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



$query = "SELECT mes, ganhos, gastos, acumulado
            FROM previsaomensal";
$arrayResultado = $conexao->query($query);



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



$query = "SELECT ano, valor 
            FROM previsaoanual";
$arrayResultado = $conexao->query($query);

$contagem = -2;
foreach ($arrayResultado as $resultado){

echo "<tr><td>".$resultado['ano']."</td><td>".$resultado['valor']."</td><td>".$contagem."</td></tr>";
$contagem++;

}

echo "<tr><td><b>Total</td><td><b>".$resultado['valor']."</td></tr>";
?>

</table>
             
       
        </div>
        




    </footer>
</body>

