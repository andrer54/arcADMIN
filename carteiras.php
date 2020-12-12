<h1>Carteiras</h1>
<table>
                <tr>
                    <th>idcarteira</th>
                    <th>nome da carteira</th>
                    <th>idusuário</th>
                    <th>Valor</th>
                    <th>Editar</th>
                    <th>Deletar</th>
                </tr>
        <?php

include 'conectar.php';

$query = "SELECT * FROM carteira";
$arrayResultado = $conexao->query($query);


foreach ($arrayResultado as $resultado){

echo "<tr><td>".$resultado['idcarteira']."</td><td>".$resultado['nomecarteira']."</td><td>".$resultado['idusuario']."</td><td>".$resultado['valorcarteira']."</td>";
    echo "<td><a href=\"editcarteira.php?idcarteira=".$resultado['idcarteira']."\">Editar</a></td>";
    echo "<td><a href=\"delcarteira.php?idcarteira=".$resultado['idcarteira']."\">Deletar</a><br></td></tr>";

}
?>
</table>

<form action="addcarteira.php" method="POST">
Carteira <input type="text" name="nomecarteira">
Valor <input type="number" name="valorcarteira">
<button type="submit">ADICIONAR CARTEIRA</button>
</form>

<a href="index.php"> Voltar para index</a>