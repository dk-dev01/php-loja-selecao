<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADD</title>
</head>
<body>
    <h1>ADICIONAR VENDEDOR</h1><br>
    <form method="POST" action="vadd.php">
        CPF / CNPJ: <input type="text" name="cpf_cnpj" maxlength="14"><br>
        NOME: <input type="text" name="nome"><br>
        EMPRESA: <input type="text" name="empresa"><br>
        <input type="submit" name="next" value="ADICIONAR">
</form>
    <?php
    if(isset($_POST["next"])){
        require("../database.php");

        $cpf_cnpj=htmlentities($_POST["cpf_cnpj"]);
        $nome=htmlentities($_POST["nome"]);
        $empresa=htmlentities($_POST["empresa"]);

        $mysqli->query("insert into vendedores values ('', '$cpf_cnpj', '$nome', '$empresa')");

        if($mysqli->error == ""){
            echo "<p style='color:green'>ADICIONADO COM SUCESSO</p><br>";
            echo "<a href='../vendedores.php'><button>VOLTAR</button></a";
        }
    }
    ?>
</body>
</html>