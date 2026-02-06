<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SELECT</title>
</head>
<body>
    <form method="POST" action="pselect.php">
        PRODUTO:<input type="text" name="nome" placeholder="Informe o nome do produto">&nbsp;&nbsp;&nbsp;
        <input type="submit" name="next" value="PESQUISAR" style="color:blue">
    </form>

    <?php
        if(isset($_POST["next"])){
            require("../database.php");

            $nome=htmlentities($_POST["nome"]);

            $query= $mysqli->query("select*from produtos where nome like '%$nome%'");

            echo "<br>
            <table border='1' width='300'>
                    <tr>
                        <th>ID</th>
                        <th>NOME / CNPJ</th>
                        <th>PREÇO</th>
                        <th>DESCRIÇÃO</th>
                    </tr>";
            
            while($table = $query->fetch_assoc()){
                echo "
                    <tr>
                        <td>$table[id_produto]</td>
                        <td>$table[nome]</td>
                        <td>$table[preco]</td>
                        <td>$table[descricao]</td>
                    </tr>
                ";
            }
            echo "</table>";
        }
?>
    <a href='../produtos.php'><button>VOLTAR</button></a>
</body>
</html>