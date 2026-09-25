<?php
if(!isset($_SESSION)) session_start();

include "cons.php";
require_once "dll.php";

$consulta = "SELECT * FROM produtos";
$resultado = banco($server, $user, $password, $db, $consulta);
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
            echo "<a href='carrinho.php'>Carrinho</a>";
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

        <?php
        while($linha = $resultado->fetch_assoc()){
            echo "<div class='card'>";
            echo "<img src='imagens/".$linha['imagem']."' alt='".$linha['nome']."'>";
            echo "<h3>".$linha['nome']."</h3>";
            echo "<p class='descricao'>".$linha['descricao']."</p>";
            echo "<p class='preco'>R$ ".number_format($linha['preco'], 2, ',', '.')."</p>";

            if(isset($_SESSION['Logado']) && $_SESSION['Logado'] == 'ok'){
                echo "
                <form action='banco.php' method='POST'>
                <input type='hidden' name='id_produto' value='".$linha['id']."'>
                <label>Qtd:</label>
                <input type='number' name='quantidade' value='1' min='1' style='width:50px;'>
                <input type='submit' value='Adicionar ao carrinho' name='B5' class='botao-form'>
                </form>
                ";
            }else{
                echo "<a href='login.php' class='botao'>Comprar</a>";
            }

            echo "</div>";
        }
        ?>

    </div>

</section>

</body>
</html>
