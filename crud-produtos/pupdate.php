<?php
require("database.php");
        $id="";
        $nome="";
        $preco="";
        $descricao="";

        if(isset($_GET["update"])){
            $id=htmlentities($_GET["update"]);
            $query=$mysqli->query("select*from produtos where id='$id'");

            $table=$query->fetch_assoc();
            $preco=$table["preco"];		
            $nome=$table["nome"];
            $descricao=$table["descricao"];
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
    <h1>ALTERAR  PRODUTO</h1><br>
    <form method="POST" action="pupdate.php">
        <input type="hidden" name="id" value="<?php echo $id ?>">
        NOME: <input type="text" name="nome"><br>
        PREÇO: <input type="text" name="preco"><br>
        DESCRIÇÃO: <input type="text" name="descricao"><br>
        <input type="submit" name="next" value="ALTERAR">
</form>
    <?php
    if(isset($_POST["next"])){
        $id=htmlentities($_POST["id"]);
        $preco=htmlentities($_POST["preco"]);
        $nome=htmlentities($_POST["nome"]);
        $descricao=htmlentities($_POST["descricao"]);

        $mysqli->query("update produtos set preco='$preco', nome='$nome', descricao='$descricao' where id='$id'");

        if($mysqli->error == ""){
            echo "<p style='color:green'>ALTERADO COM SUCESSO</p><br>";
            echo "<a href='produtos.php'><button>VOLTAR</button></a>";   
        }
    }
    ?>
</body>
</html>