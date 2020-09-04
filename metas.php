<div>
            <h3>META: Previsão mensal</h3>

            <table>
                <tr>
                    <th>Mês</th> <th>ganhos</th> <th>gastos</th> <th>Saldo</td> <th>Acumulado</th>
                </tr>
                
                <?php


include 'conectar.php';
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
<hr>
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
</div>