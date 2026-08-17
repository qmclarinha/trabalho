//mudar
<?php
if(!isset($_SESSION)) SESSION_START();

$produto   = $_POST['produto'];
$valor     = $_POST['valor'];
$pagamento = $_POST['pagamento'];

$numero = rand(1000,9999);

$data = date('d/m/Y');
$hora = date('H:i');

$arquivo = "vendas/venda".$numero.".dat";

$dados  = "Venda: ".$numero."\n";
$dados .= "Usuario: ".$_SESSION['Login']."\n";
$dados .= "CPF: ".$_SESSION['Cpf']."\n";
$dados .= "Produto: ".$produto."\n";
$dados .= "Valor: R$ ".$valor."\n";
$dados .= "Data: ".$data."\n";
$dados .= "Hora: ".$hora."\n";
$dados .= "Pagamento: ".$pagamento;

$arq = fopen($arquivo,"w");
fwrite($arq,$dados);
fclose($arq);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Compra Finalizada</title>
    <link rel="stylesheet" href="estilo.css">
</head>

<body>

<section class="destaques">

    <h2>Compra realizada com sucesso!</h2>

    <div class="formulario">

        <p><b>Número da venda:</b> <?php echo $numero; ?></p>

        <br>

        <p><b>Produto:</b> <?php echo $produto; ?></p>

        <br>

        <p><b>Valor:</b> R$ <?php echo $valor; ?></p>

        <br>

        <a href="index.php" class="botao">
            Voltar para o início
        </a>

    </div>

</section>
</body>
</html>
