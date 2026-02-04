<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro - Vendedores</title>
</head>
<body>
    <a href="vadd.php"><button>ADICIONAR</button></a>
    <a href="vselect.php"><button>PESQUISAR</button></a>&nbsp&nbsp&nbsp&nbsp;
    <a href="cadastro.php"><button style='color:orange'>VOLTAR</button></a>
<br><br>
    <table border="1" width="1000">
        <tr align='center'>
            <th colspan="5">TABELA VENDEDORES</th>
        <tr>
            <th>ID</th>
            <th>CPF / CNPJ</th>
            <th>NOME</th>
            <th>EMPRESA</th>
            <th>AÇÃO</th>
        </tr>
    <?php
        require("database.php");

        $query = $mysqli->query("select*from vendedores");

        while($table = $query->fetch_assoc()){
            echo "
                <tr>
                    <td align='center'>$table[id]</td>
                    <td align='center'>$table[cpf_cnpj]</td>
                    <td align='center' width='250'>$table[nome]</td>
                    <td align='center' width='300'>$table[empresa]</td>

                    <td align='center' width='250'>
                        <a href='vupdate.php?update= $table[id]' style='color:green'>[UPDATE]&nbsp&nbsp&nbsp&nbsp;
                        <a href='vdelete.php?delete= $table[id]' style='color:red'>[DELETE]
                    </td>
                </tr>
            ";
        }
    ?>
</body>
</html>