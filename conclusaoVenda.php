<?php 
session_start();

require("database.php"); // conexão com o banco

// PEGAR DADOS DAS SESSÕES
$nome = $_SESSION["nome"] ?? '';
$telefone = $_SESSION["telefone"] ?? '';
$email = $_SESSION["email"] ?? '';
$camiseta1 = $_SESSION["camiseta1"] ?? '';
$quantidade1 = $_SESSION["quantidade1"] ?? 0;
$camiseta2 = $_SESSION["camiseta2"] ?? '';
$quantidade2 = $_SESSION["quantidade2"] ?? 0;
$camiseta3 = $_SESSION["complemento"] ?? '';
$quantidade3 = $_SESSION["quantidade3"] ?? 0;
$frete = $_SESSION["frete"] ?? '';
$msg = "";

// CALCULAR TOTAL
$total = 0;

// Camiseta 1
if ($camiseta1 != "" && $camiseta1 != "0") {
    $total += (300 * $quantidade1);
}

// Camiseta 2
if ($camiseta2 != "" && $camiseta2 != "0") {
    $total += (300 * $quantidade2);
}

// Bola / Camiseta 3
if ($camiseta3 != "" && $camiseta3 != "0") {
    $total += (200 * $quantidade3);
}

// Frete
switch ($frete) {
    case "1": $total += 5; break;
    case "2": $total += 10; break;
    case "3": $total += 25; break;
}

// GRAVAR NO BANCO
if (isset($_POST["next"])) {

    $nome = htmlentities($_POST["nome"]);
    $telefone = htmlentities($_POST["telefone"]);
    $email = htmlentities($_POST["email"]);
    $camiseta1 = htmlentities($_POST["camiseta1"]);
    $camiseta2 = htmlentities($_POST["camiseta2"]);
    $camiseta3 = htmlentities($_POST["camiseta3"]);
    $quantidade1 = htmlentities($_POST["quantidade1"]);
    $quantidade2 = htmlentities($_POST["quantidade2"]);
    $quantidade3 = htmlentities($_POST["quantidade3"]);
    $frete = htmlentities($_POST["frete"]);

    // Corrigido: tabela e aspas
    $sql = "INSERT INTO vendas VALUES ('$nome', '$telefone', '$email', '$camiseta1', '$quantidade1', '$camiseta2', '$quantidade2', '$camiseta3', '$quantidade3', '$frete', '$total')";
    
    $mysqli->query($sql);

    if ($mysqli->error == "") {
        $msg = "<p style='color:green'>VENDA REGISTRADA COM SUCESSO!</p><br>
                <a href='clientes.php'><button>VOLTAR</button></a>";
    } else {
        $msg = "<p style='color:red'>ERRO AO GRAVAR: ".$mysqli->error."</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Conclusão da Venda</title>
</head>
<body>
    <h1>CONCLUSÃO DA VENDA</h1><br>
    <?php echo $msg; ?><br>

    <form method="POST" action="">
    <fieldset style="width: 50%">
        <legend><h2>DADOS PESSOAIS</h2></legend>
        <strong>Nome:</strong> <?php echo $nome; ?><br>
        <input type="hidden" name="nome" value="<?php echo $nome; ?>">
        <strong>Telefone:</strong> <?php echo $telefone; ?><br>
        <input type="hidden" name="telefone" value="<?php echo $telefone; ?>">
        <strong>E-mail:</strong> <?php echo $email; ?><br>
        <input type="hidden" name="email" value="<?php echo $email; ?>">
    </fieldset>
    <br>

    <fieldset style="width: 50%">
        <legend><h2>PRODUTOS ESCOLHIDOS</h2></legend>

        <strong>Camiseta Principal:</strong> 
        <?php 
        switch($camiseta1) {
            case "1": echo "Seleção Brasil - Principal"; break;
            case "2": echo "Seleção Brasil - Secundária"; break;
            case "3": echo "Seleção Portugal - Oficial"; break;
            case "4": echo "Seleção Japão - Oficial"; break;
            default: echo "Nenhuma";
        }
        ?>
        <input type="hidden" name="camiseta1" value="<?php echo $camiseta1; ?>">
        <br><strong>Quantidade:</strong> <?php echo $quantidade1; ?><br>
        <input type="hidden" name="quantidade1" value="<?php echo $quantidade1; ?>">
        <strong>Valor total:</strong> R$<?php echo number_format($quantidade1 * 300, 2, ',', '.'); ?><br><br>

        <strong>Camiseta Secundária:</strong> 
        <?php 
        switch($camiseta2) {
            case "1": echo "Seleção Argentina - Oficial"; break;
            case "2": echo "Seleção Alemanha - Oficial"; break;
            case "3": echo "Seleção Itália - Oficial"; break;
            default: echo "Nenhuma";
        }
        ?>
        <input type="hidden" name="camiseta2" value="<?php echo $camiseta2; ?>">
        <br><strong>Quantidade:</strong> <?php echo $quantidade2; ?><br>
        <input type="hidden" name="quantidade2" value="<?php echo $quantidade2; ?>">
        <strong>Valor total:</strong> R$<?php echo number_format($quantidade2 * 300, 2, ',', '.'); ?><br><br>

        <strong>Complemento:</strong> 
        <?php 
        switch($camiseta3) {
            case "1": echo "Bola - WorldCup 2014"; break;
            case "2": echo "Bola - WorldCup 2022"; break;
            case "3": echo "Bola - Champions League"; break;
            case "4": echo "Bola - Brasileirão"; break;
            default: echo "Nenhum";
        }
        ?>
        <input type="hidden" name="camiseta3" value="<?php echo $camiseta3; ?>">
        <br><strong>Quantidade:</strong> <?php echo $quantidade3; ?><br>
        <input type="hidden" name="quantidade3" value="<?php echo $quantidade3; ?>">
        <strong>Valor total:</strong> R$<?php echo number_format($quantidade3 * 200, 2, ',', '.'); ?><br><br>
    </fieldset>

    <br>
    <fieldset style="width: 50%">
        <legend><h2>ENTREGA</h2></legend>
        <?php 
        switch($frete) {
            case "1": echo "Frete Básico - R$5,00"; break;
            case "2": echo "Frete Rápido - R$10,00"; break;
            case "3": echo "Frete Premium - R$25,00"; break;
            default: echo "Não selecionado";
        }
        ?>
        <input type="hidden" name="frete" value="<?php echo $frete; ?>">
    </fieldset>

    <br><br>
    <fieldset style="width: 50%">
        <legend><h2>TOTAL GERAL</h2></legend>
        <h3 style="color:green;">R$<?php echo number_format($total, 2, ',', '.'); ?></h3>
        <input type="hidden" name="total" value="<?php echo $total; ?>">
    </fieldset>

    <br><br>
    <input type="submit" name="next" value="CONFIRMAR">
    </form>
</body>
</html>
