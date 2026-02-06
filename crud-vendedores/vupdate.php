<?php
require("../database.php");
        $id="";
        $cpf_cnpj="";
        $nome="";
        $empresa="";

        if(isset($_GET["update"])){
            $id=htmlentities($_GET["update"]);
            $query=$mysqli->query("select*from vendedores where id_vendedor='$id'");

            $table=$query->fetch_assoc();
            $cpf_cnpj=$table["cpf_cnpj"];		
            $nome=$table["nome"];
            $empresa=$table["empresa"];
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
    <form method="POST" action="vupdate.php">
        <input type="hidden" name="id" value="<?php echo $id ?>">
        NOME: <input type="text" name="nome"><br>
        CPF / CNPJ: <input type="text" name="cpf_cnpj" maxlength="14"><br>
        EMPRESA: <input type="text" name="empresa"><br>
        <input type="submit" name="next" value="ALTERAR">
</form>
    <?php
    if(isset($_POST["next"])){
        $id=htmlentities($_POST["id"]);
        $cpf_cnpj=htmlentities($_POST["cpf_cnpj"]);
        $nome=htmlentities($_POST["nome"]);
        $empresa=htmlentities($_POST["empresa"]);

        $mysqli->query("update vendedores set cpf_cnpj='$cpf_cnpj', nome='$nome', empresa='$empresa' where id_vendedor='$id'");

        if($mysqli->error == ""){
            echo "<p style='color:green'>ALTERADO COM SUCESSO</p><br>";
            echo "<a href='../vendedores.php'><button>VOLTAR</button></a>";   
        }
    }
    ?>
</body>
</html>