<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro - Produtos</title>
</head>
<body>
    <a href="padd.php"><button>ADICIONAR</button></a>
    <a href="pselect.php"><button>PESQUISAR</button></a>&nbsp&nbsp&nbsp&nbsp;
    <a href="cadastro.php"><button style='color:orange'>VOLTAR</button></a>
<br><br>
    <table border="1" width="1500">
        <tr align='center'>
            <th colspan="5">TABELA PRODUTOS</th>
        <tr>
            <th>ID</th>
            <th>NOME</th>
            <th>PREÇO</th>
            <th>DESCRIÇÃO</th>
            <th>AÇÃO</th>
        </tr>
    <?php
        require("database.php");

        $query = $mysqli->query("select*from produtos");

        while($table = $query->fetch_assoc()){
            echo "
                <tr>
                    <td align='center' width='50'>$table[id]</td>
                    <td align='center' width='250'>$table[nome]</td>
                    <td align='center' width='75'>$table[preco]</td>
                    <td align='center' width='500'>$table[descricao]</td>

                    <td align='center' width='250'>
                        <a href='pupdate.php?update= $table[id]' style='color:green'>[UPDATE]&nbsp&nbsp&nbsp&nbsp;
                        <a href='pdelete.php?delete= $table[id]' style='color:red'>[DELETE]
                    </td>
                </tr>
            ";
        }
    ?>
</body>
</html>