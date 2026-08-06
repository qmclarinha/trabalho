<?php
if(!isset($_SESSION)) SESSION_START();

if($_SESSION['Logado'] != 'ok'){
    header('Location: login.php');
    exit;
}

if(isset($_GET['planta'])){
    $_SESSION['carrinho'][] = $_GET['planta'];
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Carrinho - Floratta</title>
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

    <h2>Seu Carrinho</h2>
    <div class="formulario">

        <?php

        if(isset($_SESSION['carrinho'])){

            foreach($_SESSION['carrinho'] as $planta){

                echo "<p>".$planta."</p>";
                echo "<br>";
            }

        }else{

            echo "<p>Carrinho vazio.</p>";
        }

        ?>

        <br>
        <a href="finalizar.php" class="botao">
            Finalizar Compra
        </a>

    </div>
</section>
</body>
</html>