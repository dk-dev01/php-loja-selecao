<?php 
session_start();

//declarar variavel
$enome = "";
$etel = "";
$eemail = "";
$ecamiseta1 = "";
$ecamiseta2 = "";
$ecomplemento = "";
$equantidade1 = "";
$equantidade2 = "";
$equantidade3 = "";
$efrete = "";
$erro = 0;

if (isset($_POST["next"])) {
    //salvar variavel
    $_SESSION["nome"] = $_POST["nome"] ?? '';
    $_SESSION["telefone"] = $_POST["telefone"] ?? '';
    $_SESSION["email"] = $_POST["email"] ?? '';
    $_SESSION["camiseta1"] = $_POST["camiseta1"] ?? '';
    $_SESSION["camiseta2"] = $_POST["camiseta2"] ?? '';
    $_SESSION["complemento"] = $_POST["complemento"] ?? '';
    $_SESSION["quantidade1"] = $_POST["quantidade1"] ?? '0';
    $_SESSION["quantidade2"] = $_POST["quantidade2"] ?? '0';
    $_SESSION["quantidade3"] = $_POST["quantidade3"] ?? '0';
    $_SESSION["frete"]  = $_POST["frete"] ?? '';

    //validar
    if ($_SESSION["nome"] == ""){
        $enome = "<span style='color:red'>Digite seu nome</span>";
        $erro++;
    }

    if ($_SESSION["telefone"] == ""){
        $etel = "<span style='color:red'>Informe seu telefone</span>";
        $erro++;
    }

    if ($_SESSION["email"] == ""){
        $eemail = "<span style='color:red'>Digite seu e-mail</span>";
        $erro++;
    }

    if ($_SESSION["camiseta1"] == ""){
        $ecamiseta1 = "<span style='color:orange'>Escolha uma camiseta principal!</span>";
        $erro++;
    }

    if ($_SESSION["camiseta2"] != "0" && $_SESSION["quantidade2"] == "0"){
        $equantidade2 = "<span style='color:red'>Selecione a quantidade!</span>";
        $erro++;
    }

    if ($_SESSION["complemento"] == ""){
        $ecomplemento = "<span style='color:blue'>Escolha uma bola!</span>";
        $erro++;
    }

    if ($_SESSION["complemento"] != "0" && $_SESSION["quantidade3"] == "0"){
        $equantidade3 = "<span style='color:red'>Selecione a quantidade!</span>";
        $erro++;
    }

    if ($_SESSION["frete"] == ""){
        $efrete = "<span style='color:red'>Selecione o tipo de frete!</span>";
        $erro++;
    }

    //verificacao
    if ($erro == 0){
        header("Location: conclusaoVenda.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Venda</title>
</head>
<body>
<form method="POST" action="vendas.php">
    <h1>DADOS VENDA</h1><br>

    <fieldset style="width: 50%">
        <legend><h2>PREENCHER DADOS PESSOAIS</h2></legend>

        NOME: <input placeholder="Ex: Irineu Pinto" type="text" name="nome" size="50" maxlength="45"
        value="<?php echo $_SESSION["nome"] ?? ''; ?>">
        <?php echo $enome ?>
        <br><br>

        TELEFONE/CELULAR: <input placeholder="Ex: (14) 99999-9999" type="text" name="telefone" size="25" maxlength="20"
        value="<?php echo $_SESSION["telefone"] ?? ''; ?>">
        <?php echo $etel ?>
        <br><br>

        E-MAIL: <input placeholder="Ex: neda123@gmail.com" type="email" name="email" size="35" maxlength="30"
        value="<?php echo $_SESSION["email"] ?? ''; ?>">
        <?php echo $eemail ?>
        <br><br>
    </fieldset>

    <fieldset style="width: 50%">
        <legend><h2>ESCOLHER PRODUTOS</h2></legend>

        <h3>Camiseta Principal - R$149,99</h3>
        <select name="camiseta1">
            <option value="">Selecione uma camiseta</option>
            <option value="1">Seleção Brasil - Principal</option>
            <option value="2">Seleção Brasil - Secundária</option>
            <option value="3">Seleção Portugal - Oficial</option>
            <option value="4">Seleção Japão - Oficial</option>
        </select>
        <?php echo $ecamiseta1 ?>
        <br><strong>QUANTIDADE:</strong>            
        <select name="quantidade1">
            <option value="0"> - </option>
            <option value="1"> 1 </option>
            <option value="2"> 2 </option>
            <option value="3"> 3 </option>
        </select>
        <?php echo $equantidade1 ?>

        <br><br>            
        <h3>Camiseta Secundária - R$129,99</h3>
        <select name="camiseta2">
            <option value="0">Nenhum</option>
            <option value="1">Seleção Argentina - Oficial</option>
            <option value="2">Seleção Alemanha - Oficial</option>
            <option value="3">Seleção Itália - Oficial</option>
        </select>
        <br><strong>QUANTIDADE:</strong>            
        <select name="quantidade2">
            <option value="0"> - </option>
            <option value="1"> 1 </option>
            <option value="2"> 2 </option>
            <option value="3"> 3 </option>
        </select>
        <?php echo $equantidade2 ?>

        <br><br>  
        <h3>Complemento Opcional - A partir de R$100,00</h3>
        <select name="complemento">
            <option value="">Selecione uma bola</option>
            <option value="1">Bola - WorldCup 2014</option>
            <option value="2">Bola - WorldCup 2022</option>
            <option value="3">Bola - Champions League</option>
            <option value="4">Bola - Brasileirão</option>
        </select>
        <?php echo $ecomplemento ?>

        <br><strong>QUANTIDADE:</strong>            
        <select name="quantidade3">
            <option value="0"> - </option>
            <option value="1"> 1 </option>
            <option value="2"> 2 </option>
            <option value="3"> 3 </option>
        </select>
        <?php echo $equantidade3 ?>

        <br><br>
        <h3>ENTREGA</h3>
        <input type="radio" name="frete" value="1"> Frete Básico - R$5,00 <br>
        <input type="radio" name="frete" value="2"> Frete Rápido - R$10,00 <br>
        <input type="radio" name="frete" value="3"> Frete Premium - R$25,00 <br>
        <?php echo $efrete ?>

        <br><br>
        <button type="submit" name="next">CONTINUAR</button>
    </fieldset>
</form>
</body>
</html>
