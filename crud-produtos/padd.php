<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADD</title>
</head>
<body>
    <h1>ADICIONAR PRODUTO</h1><br>
    <form method="POST" action="padd.php">
        NOME: <input type="text" name="nome"><br>
        PREÇO: <input type="text" name="preco"><br>
        DESCRIÇÃO: <input type="text" name="descricao"><br>
        <input type="submit" name="next" value="ADICIONAR">
</form>
    <?php
    if(isset($_POST["next"])){
        require("database.php");

        $nome=htmlentities($_POST["nome"]);
        $preco=htmlentities($_POST["preco"]);
        $descricao=htmlentities($_POST["descricao"]);

        $mysqli->query("insert into produtos values ('', '$nome', '$preco', '$descricao')");

        if($mysqli->error == ""){
            echo "<p style='color:green'>ADICIONADO COM SUCESSO</p><br>";
            echo "<a href='produtos.php'><button>VOLTAR</button></a";
        }
    }
    ?>
</body>
</html>