<?php
if(!isset($_SESSION)) SESSION_START();

include "cons.php";
require_once "DLL.php";

$consulta = "SELECT * FROM produtos";

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

            <div class="card">
                <img src="imagens/planta3.jpg" alt="Planta">
                <h3>Cacto decorativo</h3>
                <p class="descricao">
                    Resistente e de baixa manutenção, perfeito para ambientes minimalistas.
                </p>
                <p class="preco">
                    R$ 24,90
                </p>
                <a href="login.php" class="botao">
                    Comprar
                </a>
            </div>

            <div class="card">
                <img src="imagens/planta6.jpg" alt="Planta">
                <h3>Espada-de-São-Jorge</h3>
                <p class="descricao">
                    Muito resistente, ideal para interiores e purificação do ambiente.
                </p>
                <p class="preco">
                    R$ 45,90
                </p>

                <a href="login.php" class="botao">
                    Comprar
                </a>
            </div>


            <div class="card">
                <img src="imagens/planta10.jpg" alt="Planta">
                <h3>Antúrio vermelho</h3>
                <p class="descricao">
                    Planta ornamental comm flores vermelhas vibrantes e brilhantes.
                </p>
                <p class="preco">
                    R$ 54,90
                </p>
                <a href="login.php" class="botao">
                    Comprar
                </a>
            </div>

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
