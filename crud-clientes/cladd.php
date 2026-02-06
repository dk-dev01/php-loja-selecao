<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADD</title>
</head>
<body>
    <h1>ADICIONAR CLIENTE</h1><br>
    <form method="POST" action="cladd.php">
        NOME: <input type="text" name="nome"><br>
        CPF: <input type="text" name="cpf" maxlength="11"><br>
        <input type="submit" name="next" value="ADICIONAR">
</form>
    <?php
    if(isset($_POST["next"])){
        require("../database.php");

        $cpf=htmlentities($_POST["cpf"]);
        $nome=htmlentities($_POST["nome"]);

        $mysqli->query("insert into clientes values ('', '$cpf', '$nome')");

        if($mysqli->error == ""){
            echo "<p style='color:green'>ADICIONADO COM SUCESSO</p><br>";
            echo "<a href='../clientes.php'><button>VOLTAR</button></a";
        }
    }
    ?>
</body>
</html>
