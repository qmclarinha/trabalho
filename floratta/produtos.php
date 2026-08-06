<?php
if(!isset($_SESSION)) SESSION_START();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Produtos - Floratta</title>
    <link rel="stylesheet" href="estilo.css">
</head>

<body>

<header>

    <div class="logo">
        Floratta
    </div>

    <nav>

        <a href="index.php">Início</a>

        <?php

        if(isset($_SESSION['Logado']) && $_SESSION['Logado'] == 'ok'){
            echo "<a href='sair.php'>Sair</a>";
        }else{
            echo "<a href='login.php'>Login</a>";
            echo "<a href='cadastro1.php'>Cadastro</a>";
        }

        ?>

    </nav>

</header>

<section class="destaques">

    <h2>Nossas Plantas</h2>

    <div class="produtos">

        <div class="card">

            <img src="imagens/planta1.jpg">

            <h3>Suculenta mini</h3>

            <p class="descricao">Pequena e charmosa, ideal para decoração de mesas e ambientes compactos.</p>

            <p class="preco">R$ 14,90</p>

            <?php
            if(isset($_SESSION['Logado']) && $_SESSION['Logado'] == 'ok'){
                echo "
                <form action='confirmar.php' method='POST'>
                <input type='hidden' name='produto' value='Suculenta mini'>
                <input type='hidden' name='valor' value='14.90'>
                <input type='submit' value='Comprar' class='botao-form'>
                </form>
                ";
            }else{
                echo "<a href='login.php' class='botao'>Comprar</a>";
            }
            ?>

        </div>

        <div class="card">

            <img src="imagens/planta2.jpg">

            <h3>Monstera deliciosa</h3>

            <p class="descricao">Planta tropical com folhas grandes e recortadas, muito usada em decoração moderna.</p>

            <p class="preco">R$ 119,90</p>

            <?php
            if(isset($_SESSION['Logado']) && $_SESSION['Logado'] == 'ok'){
                echo "
                <form action='confirmar.php' method='POST'>
                <input type='hidden' name='produto' value='Monstera deliciosa'>
                <input type='hidden' name='valor' value='119.90'>
                <input type='submit' value='Comprar' class='botao-form'>
                </form>
                ";
            }else{
                echo "<a href='login.php' class='botao'>Comprar</a>";
            }
            ?>

        </div>

        <div class="card">

            <img src="imagens/planta3.jpg">

            <h3>Cacto decorativo</h3>

            <p class="descricao">Resistente e de baixa manutenção, perfeito para ambientes minimalistas.</p>

            <p class="preco">R$ 24,90</p>

            <?php
            if(isset($_SESSION['Logado']) && $_SESSION['Logado'] == 'ok'){
                echo "
                <form action='confirmar.php' method='POST'>
                <input type='hidden' name='produto' value='Cacto decorativo'>
                <input type='hidden' name='valor' value='24.90'>
                <input type='submit' value='Comprar' class='botao-form'>
                </form>
                ";
            }else{
                echo "<a href='login.php' class='botao'>Comprar</a>";
            }
            ?>

        </div>

        <div class="card">

            <img src="imagens/planta4.jpg">

            <h3>Jiboia verde</h3>

            <p class="descricao">Planta trepadeira fácil de cuidar, ótima para ambientes internos.</p>

            <p class="preco">R$ 39,90</p>

            <?php
            if(isset($_SESSION['Logado']) && $_SESSION['Logado'] == 'ok'){
                echo "
                <form action='confirmar.php' method='POST'>
                <input type='hidden' name='produto' value='Jiboia verde'>
                <input type='hidden' name='valor' value='39.90'>
                <input type='submit' value='Comprar' class='botao-form'>
                </form>
                ";
            }else{
                echo "<a href='login.php' class='botao'>Comprar</a>";
            }
            ?>

        </div>

        <div class="card">

            <img src="imagens/planta5.jpg">

            <h3>Samambaia americana</h3>

            <p class="descricao">Folhagem volumosa que traz frescor e vida para qualquer ambiente.</p>

            <p class="preco">R$ 59,90</p>

            <?php
            if(isset($_SESSION['Logado']) && $_SESSION['Logado'] == 'ok'){
                echo "
                <form action='confirmar.php' method='POST'>
                <input type='hidden' name='produto' value='Samambaia americana'>
                <input type='hidden' name='valor' value='59.90'>
                <input type='submit' value='Comprar' class='botao-form'>
                </form>
                ";
            }else{
                echo "<a href='login.php' class='botao'>Comprar</a>";
            }
            ?>

        </div>

        <div class="card">

            <img src="imagens/planta6.jpg">

            <h3>Espada-de-São-Jorge</h3>

            <p class="descricao">Muito resistente, ideal para interiores e purificação do ambiente.</p>

            <p class="preco">R$ 45,90</p>

            <?php
            if(isset($_SESSION['Logado']) && $_SESSION['Logado'] == 'ok'){
                echo "
                <form action='confirmar.php' method='POST'>
                <input type='hidden' name='produto' value='Espada-de-São-Jorge'>
                <input type='hidden' name='valor' value='45.90'>
                <input type='submit' value='Comprar' class='botao-form'>
                </form>
                ";
            }else{
                echo "<a href='login.php' class='botao'>Comprar</a>";
            }
            ?>

        </div>

        <div class="card">

            <img src="imagens/planta7.jpg">

            <h3>Lírio da paz</h3>

            <p class="descricao">Planta elegante com flores brancas, perfeita para decoração sofisticada.</p>

            <p class="preco">R$ 49,90</p>

            <?php
            if(isset($_SESSION['Logado']) && $_SESSION['Logado'] == 'ok'){
                echo "
                <form action='confirmar.php' method='POST'>
                <input type='hidden' name='produto' value='Lírio da paz'>
                <input type='hidden' name='valor' value='49.90'>
                <input type='submit' value='Comprar' class='botao-form'>
                </form>
                ";
            }else{
                echo "<a href='login.php' class='botao'>Comprar</a>";
            }
            ?>

        </div>

        <div class="card">

            <img src="imagens/planta8.jpg">

            <h3>Palmeira Ráfis</h3>

            <p class="descricao">Palmeira ornamental que traz um visual tropical e elegante.</p>

            <p class="preco">R$ 89,90</p>

            <?php
            if(isset($_SESSION['Logado']) && $_SESSION['Logado'] == 'ok'){
                echo "
                <form action='confirmar.php' method='POST'>
                <input type='hidden' name='produto' value='Palmeira Ráfis'>
                <input type='hidden' name='valor' value='89.90'>
                <input type='submit' value='Comprar' class='botao-form'>
                </form>
                ";
            }else{
                echo "<a href='login.php' class='botao'>Comprar</a>";
            }
            ?>

        </div>

        <div class="card">

            <img src="imagens/planta9.jpg">

            <h3>Antúrio vermelho</h3>

            <p class="descricao">Planta ornamental com flores vermelhas vibrantes e brilhantes.</p>

            <p class="preco">R$ 54,90</p>

            <?php
            if(isset($_SESSION['Logado']) && $_SESSION['Logado'] == 'ok'){
                echo "
                <form action='confirmar.php' method='POST'>
                <input type='hidden' name='produto' value='Antúrio vermelho'>
                <input type='hidden' name='valor' value='54.90'>
                <input type='submit' value='Comprar' class='botao-form'>
                </form>
                ";
            }else{
                echo "<a href='login.php' class='botao'>Comprar</a>";
            }
            ?>

        </div>

        <div class="card">

            <img src="imagens/planta10.jpg">

            <h3>Planta Jade</h3>

            <p class="descricao">Planta suculenta conhecida por simbolizar sorte e prosperidade.</p>

            <p class="preco">R$ 29,90</p>

            <?php
            if(isset($_SESSION['Logado']) && $_SESSION['Logado'] == 'ok'){
                echo "
                <form action='confirmar.php' method='POST'>
                <input type='hidden' name='produto' value='Planta Jade'>
                <input type='hidden' name='valor' value='29.90'>
                <input type='submit' value='Comprar' class='botao-form'>
                </form>
                ";
            }else{
                echo "<a href='login.php' class='botao'>Comprar</a>";
            }
            ?>

        </div>

    </div>

</section>

</body>
</html>