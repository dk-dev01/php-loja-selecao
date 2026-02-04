<?php
    if(isset($_GET["delete"])){
        require("database.php");

        $id=htmlentities($_GET["delete"]);

        $mysqli->query("delete from clientes where id='$id'");

        if($mysqli->error==""){
            echo "<p style='color:red'>EXCLUÍDO COM SUCESSO</p>";
            echo "<a href='clientes.php'><button>VOLTAR</button></a>";
        }
        
    }