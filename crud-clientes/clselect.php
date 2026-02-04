<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SELECT</title>
</head>
<body>
    <form method="POST" action="clselect.php">
        CPF:<input type="text" name="cpf" placeholder="Informe o CPF">&nbsp;&nbsp;&nbsp;
        <input type="submit" name="next" value="PESQUISAR" style="color:blue">
    </form>

    <?php
        if(isset($_POST["next"])){
            require("database.php");

            $cpf=htmlentities($_POST["cpf"]);

            $query= $mysqli->query("select*from clientes where cpf like '%$cpf%'");

            echo "<br>
            <table border='1' width='300'>
                    <tr>
                        <th>ID</th>
                        <th>CPF</th>
                        <th>NOME</th>
                    </tr>";
            
            while($table = $query->fetch_assoc()){
                echo "
                    <tr>
                        <td>$table[id]</td>
                        <td>$table[cpf]</td>
                        <td>$table[nome]</td>
                    </tr>
                ";
            }
            echo "</table>";
        }
?>
    <a href='clientes.php'><button>VOLTAR</button></a>
</body>
</html>