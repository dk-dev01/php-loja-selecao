<?php
require("../database.php");
        $id="";
        $cpf="";
        $nome="";

        if(isset($_GET["update"])){
            $id=htmlentities($_GET["update"]);
            $query=$mysqli->query("select*from clientes where id_cliente='$id'");

            $table=$query->fetch_assoc();
            $cpf=$table["cpf"];		
            $nome=$table["nome"];
        }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UPDATE</title>
</head>
<body>
    <h1>ALTERAR  CLIENTE</h1><br>
    <form method="POST" action="clupdate.php">
        <input type="hidden" name="id" value="<?php echo $id ?>">
        NOME: <input type="text" name="nome"><br>
        CPF: <input type="text" name="cpf" maxlength="11"><br>
        <input type="submit" name="next" value="ALTERAR">
</form>
    <?php
    if(isset($_POST["next"])){
        $id=htmlentities($_POST["id"]);
        $cpf=htmlentities($_POST["cpf"]);
        $nome=htmlentities($_POST["nome"]);

        $mysqli->query("update clientes set cpf='$cpf', nome='$nome' where id_cliente='$id'");

        if($mysqli->error == ""){
            echo "<p style='color:green'>ALTERADO COM SUCESSO</p><br>";
            echo "<a href='../clientes.php'><button>VOLTAR</button></a>";   
        }
    }
    ?>
</body>
</html>