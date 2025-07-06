<!DOCTYPE html>
<?php
    // inicia a sessão
    session_start();
?>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Favicon-->
    <link rel="shortcut icon" href="favicon.ico/favicon.ico" type="image/x-icon">
    <!--Estilo-->
    <link rel="stylesheet" href="css/style.css">
    <title>Página de login</title>
</head>
<body class="pagina-login">

    <!--Insere o cabeçalho-->
    <?php include_once 'includes/cabecalho.php'; ?>

    <div class="login-container"">
        <div class="login-imagem"></div>
        <!--formulário de login via post que leva a página principal-->
        <form class="login-formulario" action="includes/pagina_principal.php" method="post">
            <h2>Faça o login:</h2>
            <input type="text" name="usuario" id="usuario" placeholder="Usuário" required>
            <input type="password" name="senha" id="senha" placeholder="Senha" required>
            <button type="submit" name="submit">Entrar</button>
            <!--este php exibe a mensagem de erro em caso de erro no usuário ou senha-->
            <?php 
                if (isset($_SESSION['erro_login']) && $_SESSION['erro_login'] === true) {
                    echo "<p style='color: red;'>Usuário ou senha incorretos!</p>";
                    unset($_SESSION['erro_login']);
                }
            ?>
        </form>
    </div>

    <!--Insere o rodapé-->
    <?php include_once 'includes/rodape.php'; ?>
</body>