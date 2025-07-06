<!DOCTYPE html>
<?php
    // inicia a sessão
    session_start();
    // chama o arquivo de login
    require_once 'includes/login.php';
?>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Favicon-->
    <link rel="shortcut icon" href="favicon.ico/favicon.ico" type="image/x-icon">
    <!--Estilo-->
    <link rel="stylesheet" href="css/style.css">
    <title>Página principal</title>
</head>
<body>
    <!--Insere o cabeçalho-->
    <?php include_once 'includes/cabecalho.php'; ?>
    <!--Insere a barra de navegação-->
    <?php include_once 'includes/navbar.php'; ?>
    <!--Conteúdo principal-->
    <div class="conteudo-principal">
        <div class="container-conteudo">

            <!--Barra de navegação vertical-->
            <?php include_once 'includes/navbar_lateral.php'; ?>

            <!--Conteúdo principal-->
            <div class="conteudo">
                <?php
                    // Define a página padrão
                    $pagina = $_GET['pagina'] ?? 'home';

                    // Cria um caminho seguro para as páginas
                    $permitidas = ['home', 'noticias', 'contato', 'sobre', 'logout'];
                    if (in_array($pagina, $permitidas)) {
                        include "paginas/{$pagina}.php";
                    } else {
                        echo "<h1>Página não encontrada</h1>";
                    }
                ?>
            </div>
        </div>
    </div>
    <!--Insere o rodapé-->
    <?php include_once 'includes/rodape.php'; ?>
</body>
</html>

