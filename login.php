<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>LOGIN - INICIAR SESSÃO</h1><br>
    <form method="POST" action="login.php">
        USUÁRIO: <input type="text" name="usuario" placeholder="Digite seu usuário"><br>
        SENHA: <input type="password" name="senha" placeholder="Digite sua senha"><br><br>
        <input type="submit" name="next" value="ENTRAR">
</form>
    <?php
        if(isset($_POST["next"])){
            require("database.php");
            $usuario=$_POST["usuario"];
            $senha=$_POST["senha"];

            try{
                $stmt = $mysqli->prepare("SELECT * FROM login WHERE usuario = ? AND senha = ?");
                $stmt->bind_param("ss", $usuario, $senha); //prepara uma consulta SQL com espaços reservados para dois valores de string
                $stmt->execute(); //executar a declaração preparada no PHP
                $stmt->store_result(); //recebo o "valor" da consulta

                if ($stmt->num_rows > 0){
                    header("Location: cadastro.php");
                    exit; //garantir que o script pare de ser executado após o redirecionamento
                }
                else{
                    echo "Usuário ou senha inválidos";
                }
            }   
            catch(Throwable $e){
                echo "Erro: ".$e->getMessage();
            }
        }
    ?>
</body>
</html>