<?php
if(!isset($_SESSION)) session_start();

include "cons.php";
require_once "dll.php";

$consulta = "SELECT * FROM produtos LIMIT 3";
$resultado = banco($server, $user, $password, $db, $consulta);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Floratta</title>

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

            <?php
            if(isset($_SESSION['Logado']) && $_SESSION['Logado'] == 'ok'){
                echo "<a href='carrinho.php'>Carrinho</a>";
                echo "<a href='sair.php'>Sair</a>";
            } else {
                echo "<a href='login.php'>Login</a>";
                echo "<a href='cadastro1.php'>Cadastro</a>";
            }
            ?>
        </nav>

    </header>

    <section class="banner">
        <img src="imagens/banner.jpeg" alt="Banner Floratta">
        <div class="texto-banner">
            <h1>Transforme seu ambiente com plantas</h1>
            <p>
                Plantas lindas para decorar sua casa com vida,
                elegância e natureza.
            </p>
            <a href="produtos.php" class="botao-banner">
                Ver Plantas
            </a>
        </div>
    </section>

    <section class="destaques">

        <h2>Plantas em destaque</h2>

        <div class="produtos">

            <?php
            while($linha = $resultado->fetch_assoc()){
                echo "<div class='card'>";
                echo "<img src='imagens/".$linha['imagem']."' alt='".$linha['nome']."'>";
                echo "<h3>".$linha['nome']."</h3>";
                echo "<p class='descricao'>".$linha['descricao']."</p>";
                echo "<p class='preco'>R$ ".number_format($linha['preco'], 2, ',', '.')."</p>";
                echo "<a href='produtos.php' class='botao'>Comprar</a>";
                echo "</div>";
            }
            ?>

        </div>

    </section>

    <footer>
        <p>
            © 2026 Floratta - Todos os direitos reservados<br>
            Por Maria Clara e Mirelle - EI31
        </p>

    </footer>
</body>
</html>
