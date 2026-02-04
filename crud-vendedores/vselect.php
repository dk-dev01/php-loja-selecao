<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SELECT</title>
</head>
<body>
    <form method="POST" action="vselect.php">
        EMPRESA:<input type="text" name="empresa" placeholder="Informe a empresa">&nbsp;&nbsp;&nbsp;
        <input type="submit" name="next" value="PESQUISAR" style="color:blue">
    </form>

    <?php
        if(isset($_POST["next"])){
            require("database.php");

            $empresa=htmlentities($_POST["empresa"]);

            $query= $mysqli->query("select*from vendedores where empresa like '%$empresa%'");

            echo "<br>
            <table border='1' width='300'>
                    <tr>
                        <th>ID</th>
                        <th>CPF / CNPJ</th>
                        <th>NOME</th>
                        <th>EMPRESA</th>
                    </tr>";
            
            while($table = $query->fetch_assoc()){
                echo "
                    <tr>
                        <td>$table[id]</td>
                        <td>$table[cpf_cnpj]</td>
                        <td>$table[nome]</td>
                        <td>$table[empresa]</td>
                    </tr>
                ";
            }
            echo "</table>";
        }
?>
    <a href='vendedores.php'><button>VOLTAR</button></a>
</body>
</html>