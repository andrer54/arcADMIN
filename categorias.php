<h1>Categorias</h1>
<table>
                <tr>
                    <th>idcategoria</th>
                    <th>nome da categoria</th>
                    <th>receita ou despesa</th>
                    <th>idusuário</th>
                    <th>Editar</th>
                    <th>Deletar</th>
                </tr>
        <?php

include 'conectar.php';

$query = "SELECT * FROM categoria";
$arrayResultado = $conexao->query($query);


foreach ($arrayResultado as $resultado){
//var_dump($resultado);
    
echo "<tr><td>".$resultado['idcategoria']."</td>
        <td>".$resultado['nomecategoria']."</td>
        <td>".$resultado['receitaoudespesa']."</td>
        <td>".$resultado['idusuario']."</td>";
//array(4 ["receitaoudespesa"]
    echo "<td><a href=\"editcategoria.php?idcategoria=".$resultado['idcategoria']."\">Editar</a></td>";
    echo "<td><a href=\"delcategoria.php?idcategoria=".$resultado['idcategoria']."\">Deletar</a><br></td></tr>";

} 
?>
</table>

<form action="addcategoria.php" method="POST">
CATEGORIA <input type="text" name="nomecategoria">
receita ou despesa <input type="text" name="receitaoudespesa">
<button type="submit">ADICIONAR CATEGORIA</button>
</form>

<a href="index.php"> Voltar para index</a>
</html>