<?php
if(!isset($_SESSION)) session_start();

include "cons.php";
require_once "dll.php";

if(!isset($_SESSION['Logado']) || $_SESSION['Logado'] != 'ok'){
    header('Location: login.php');
    exit;
}

$id_usuario = $_SESSION['IdUsuario'];

$consulta = "SELECT carrinho.quantidade, produtos.nome, produtos.preco
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
    <title>Finalizar Compra - Floratta</title>
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
    <h2>Finalizar Compra</h2>

    <div class="formulario">

        <?php
        if(count($itens) == 0){
            echo "<p>Seu carrinho está vazio.</p>";
            echo "<a href='produtos.php' class='botao'>Ver plantas</a>";
        }else{
            echo "<h3>Resumo do pedido</h3><br>";
            foreach($itens as $item){
                echo "<p>".$item['nome']." — Qtd: ".$item['quantidade']." — R$ ".number_format($item['preco'] * $item['quantidade'], 2, ',', '.')."</p>";
            }
            echo "<h3>Total: R$ ".number_format($total, 2, ',', '.')."</h3><br>";

            echo "
            <form action='banco.php' method='POST'>
                <input type='text' name='pagamento' placeholder='Forma de pagamento' required>
                <br><br>
                <input type='submit' name='B4' value='Confirmar Compra' class='botao-form'>
            </form>
            ";
        }
        ?>

    </div>

</section>
</body>
</html>
