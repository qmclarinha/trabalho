<?php
if(!isset($_SESSION)) session_start();

include "cons.php";
require_once "dll.php";

if(!isset($_SESSION['Logado']) || $_SESSION['Logado'] != 'ok'){
    header('Location: login.php');
    exit;
}

$id_usuario = $_SESSION['IdUsuario'];

$consulta = "SELECT carrinho.id AS id_carrinho, carrinho.quantidade, produtos.nome, produtos.preco
             FROM carrinho
             INNER JOIN produtos ON carrinho.id_produto = produtos.id
             WHERE carrinho.id_usuario = '$id_usuario'";
$resultado = banco($server, $user, $password, $db, $consulta);

$total = 0;
$itens = [];
while($linha = $resultado->fetch_assoc()){
    $itens[] = $linha;
    $total += $linha['preco'] * $linha['quantidade'];
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
        if(count($itens) > 0){

            foreach($itens as $item){
                echo "<p>";
                echo $item['nome']." — Qtd: ".$item['quantidade']." — R$ ".number_format($item['preco'] * $item['quantidade'], 2, ',', '.');
                echo "</p>";
                echo "
                <form action='banco.php' method='POST' style='display:inline;'>
                <input type='hidden' name='id_carrinho' value='".$item['id_carrinho']."'>
                <input type='submit' value='Remover' name='B6' class='botao-form'>
                </form>
                ";
                echo "<br>";
            }

            echo "<h3>Total: R$ ".number_format($total, 2, ',', '.')."</h3>";
            echo "<br>";
            echo "<a href='finalizar.php' class='botao'>Finalizar Compra</a>";

        }else{
            echo "<p>Carrinho vazio</p>";
        }
        ?>

    </div>
</section>
</body>
</html>
