<?php

if($_GET) {
    $conectar = new mysqli("localhost", "andre", "12345", "arcADMIN");
    if ($conectar->connect_error) {
        echo "erro em conectar. erro: " . $conectar->connect_error;
        exit();
    }
    //buscar o registro no banco
    $query = "select * from carteira where idcarteira = " . $_GET['idcarteira'];
    //enviar query
    $meuarray = $conectar->query($query);


        //listar o registro
        foreach ($meuarray as $result) {
            echo "id: ".$result['idcarteira']." nomecarteira: ".$result['nomecarteira']." valor: ".$result['valorcarteira']."<br>";
            echo "<form action='updatecarteira.php' method='post'>";
            echo "<input type='hidden' name='idcarteira' value='".$result['idcarteira']."'>";
            echo "nome da carteira: <input type=text name=nomecarteira value=".$result['nomecarteira']."><br>";
            echo "valor: <input type='number' name=valorcarteira value=".$result['valorcarteira']."><br>";
            echo "<button type=submit>Salvar</button></form>";

        }

}else{
    echo "erro: dados não encontrados. :-)";
}