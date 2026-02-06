<?php
    if(isset($_GET["delete"])){
        require("../database.php");

        $id=htmlentities($_GET["delete"]);

        $mysqli->query("delete from vendedores where id_vendedor='$id'");

        if($mysqli->error==""){
            echo "<p style='color:red'>EXCLUÍDO COM SUCESSO</p>";
            echo "<a href='../vendedores.php'><button>VOLTAR</button></a>";
        }
        
    }