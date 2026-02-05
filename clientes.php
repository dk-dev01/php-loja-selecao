<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro - Cliente</title>
</head>
<body>
    <a href="crud-clientes/cladd.php"><button>ADICIONAR</button></a>
    <a href="crud-clientes/clselect.php"><button>PESQUISAR</button></a>&nbsp&nbsp&nbsp&nbsp;
    <a href="cadastro.php"><button style='color:orange'>VOLTAR</button></a>
<br><br>
    <table border="1" width="700">
        <tr align='center'>
            <th colspan="4">TABELA CLIENTES</th>
        <tr>
            <th>ID</th>
            <th>CPF</th>
            <th>NOME</th>
            <th>AÇÃO</th>
        </tr>
    <?php
        require("database.php");

        $query = $mysqli->query("select*from clientes");

        while($table = $query->fetch_assoc()){
            echo "
                <tr>
                    <td align='center'>$table[id_cliente]</td>
                    <td align='center'>$table[cpf]</td>
                    <td align='center'  width='250'>$table[nome]</td>

                    <td align='center' width='250'>
                        <a href='crud-clientes/clupdate.php?update= $table[id_cliente]' style='color:green'>[UPDATE]&nbsp&nbsp&nbsp&nbsp;
                        <a href='crud-clientes/cldelete.php?delete= $table[id_cliente]' style='color:red'>[DELETE]
                    </td>
                </tr>
            ";
        }
    ?>
</body>
</html>