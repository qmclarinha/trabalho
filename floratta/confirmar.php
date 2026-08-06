<?php
if(!isset($_SESSION)) SESSION_START();

if($_SESSION['Logado'] != 'ok'){
    header('Location: login.php');
    exit;
}

$produto = $_POST['produto'];
$valor   = $_POST['valor'];
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Confirmar Compra</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
<header>

    <div class="logo">
        Floratta
    </div>

    <nav>
        <a href="index.php">Início</a>
        <a href="produtos.php">Plantas</a>
        <a href="sair.php">Sair</a>
    </nav>

</header>

<section class="destaques">
    <h2>Confirmar Compra</h2>

    <div class="formulario">

        <h3>Dados da Compra</h3>

        <br>

        <?php
        echo "<p><b>Login:</b> ".$_SESSION['Login']."</p>";
        echo "<p><b>CPF:</b> ".$_SESSION['Cpf']."</p>";
        ?>

        <br>
        <p>
            <b>Produto:</b> <?php echo $produto; ?>
        </p>
        <p>
            <b>Valor:</b> R$ <?php echo $valor; ?>
        </p>
        <br>

        <form action="salvar_venda.php" method="POST">

            <input type="hidden" name="produto" value="<?php echo $produto; ?>">
            <input type="hidden" name="valor" value="<?php echo $valor; ?>">

            <input type="text" name="pagamento" placeholder="Forma de pagamento" required>

            <br><br>

            <input type="submit" value="Confirmar Compra" class="botao-form">

        </form>

    </div>

</section>
</body>
</html>