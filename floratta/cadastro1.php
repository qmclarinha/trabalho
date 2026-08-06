<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Cadastro - Floratta</title>
    <link rel="stylesheet" href="estilo.css">
</head>

<body>

    <header>

        <div class="logo">
            Floratta
        </div>
        <nav>
            <a href="index.php">Início</a>
            <a href="login.php">Login</a>
        </nav>

    </header>

    <section class="destaques">

        <h2>Cadastro de Usuário</h2>

        <form action="salvar_usuario.php" method="POST" class="formulario">

            <input type="text" name="nome" placeholder="Nome completo" required>
            <input type="text" name="cpf" placeholder="CPF" required>
            <input type="text" name="endereco" placeholder="Endereço" required>
            <input type="text" name="bairro" placeholder="Bairro" required>
            <input type="text" name="cidade" placeholder="Cidade" required>
            <input type="text" name="estado" placeholder="Estado" required>
            <input type="text" name="cep" placeholder="CEP" required>
            <input type="submit" value="Continuar" class="botao-form">

        </form>
    </section>
</body>
</html>