<head>
<title>ArcADMIN</title>

      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
     <!-- Compiled and minified CSS -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

<!-- Compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
        

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
 
<link href="estilos/estilo.css" rel="stylesheet">

</head>
<body>

    <header>

   
    <div class="navbar-fixed">
    <ul id="dropdown1" class="dropdown-content">
  <li><a href="#!">one</a></li>
  <li><a href="#!">two</a></li>
  <li class="divider"></li>
  <li><a href="#!">three</a></li>
</ul>
    <nav>
      <div class="nav-wrapper">
        <a href="#!" class="brand-logo">ArcADMIN</a>
        <ul class="right hide-on-med-and-down">
          <li><a href="carteiras.php">Carteiras</a></li>
          <li><a href="relatorios.php">Relatórios</a></li>
          <li><a href="metas.php">Metas</a></li>
          <!-- Dropdown Trigger -->
      <li><a class="dropdown-trigger" href="#!" data-target="dropdown1">Dropdown<i class="material-icons right">arrow_drop_down</i></a></li>
    
        </ul>
      </div>
    </nav>
  </div>

</header>





<main>
<div class="row">
    <div class="col s12 m4 l2">
      <h4>Carteiras</h4>
    <table>
                <tr>
                    <th>Carteira</th>
                    <th>Valor</th>
                </tr>
        <?php

include 'conectar.php';

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
   
</div>
<div class="col s12 m4 l8">
<h5>O que esperar deste mês:</h5>

  <div class="col s4"><h4>Setembro 2020 -></h4><img src="images/Finance-Graphic-1.png"></div>
  <div class="col s4" id="resumogas">
<h4>Gastos</h4>


<table>
                <tr>
                    <th>Budget</th>
                    <th>Feito</th>
                    <th>Estimado</th>
                    <th>Resta</th>
                </tr>
        <?php


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

</table></div>
  <div class="col s4" id="resumorec"><h4>Receita</h4>


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
<hr>


    <h4>Últimas transações:</h4>
    
    
    
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
    
    </div>



    
   
    
    <div class="col s12 m4 l2">
    


    <h4>Nova transação:</h4>

<div class="input-field col s12">
<form action="addtransacao.php" method="POST">
    <label for="tipotransacao">Tipo de transação:</label>
    <select name="tipotransacao">
        <option value="receita">Receita</option>
      <option value="despesa">Despesa</option>
      <option value="transferencia">Transferencia</option>
      </select>
    Descrição: <input type="text" name="descricao" id="">
    Valor: <input type="text" name="valor" id="">

   
        
    <select name="idcarteira" id="carteira">
    <option value="" disabled selected>Escolha a carteira</option>
      <option value="7">Caixa</option>
      <option value="8">Inter</option>
      <option value="9">PagSeguro</option>
      <option value="13">Carteira</option>
    </select>

    <div class="input-field col s12">
    <select>
      <option value="" disabled selected>Choose your option</option>
      <option value="1">Option 1</option>
      <option value="2">Option 2</option>
      <option value="3">Option 3</option>
    </select>
    <label>Materialize Select</label>
  </div>
    
    <label for="categoria">Categoria:</label>
    <select name="idcategoria" id="categoria">
      <option value="1">Trabalho</option>
      <option value="2">Tradução</option>
      <option value="3">Vícios</option>
      <option value="4">Aluguel</option>
    </select>
     
    <input type="datetime" name="data" id="" readonly=“true” disabled>
    <button type="submit">SALVAR</button>
    
    </form>
        
    
</div>
<hr>

<h4>próximos recursos</h4>
<ul>
    <li>listar categorias</li>
    <li>adicionar multiusuario</li>
    <li>adicionar cdn materialize</li>
    <li>ligar despesas a consumo de budget</li>
    <li><s>ligar despesa e receita a carteira</s></li>

    
</ul>
<hr>


</main>




   
   
    <footer>


       
        




    </footer>

      <!--JavaScript at end of body for optimized loading-->
      <script type="text/javascript" src="js/materialize.js"></script>    
      <script>
        M.AutoInit();
  document.addEventListener('DOMContentLoaded', function() {
    
    var elems = document.querySelectorAll('select');
    var instances = M.FormSelect.init(elems, options);
  });</script>
</body>

