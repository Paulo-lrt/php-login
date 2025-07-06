<?php
// Incluindo a conexão com o banco de dados
include_once 'banco.php';

// fazendo o processo de login
$usuario = $_POST['usuario'] ?? null;
$senha = $_POST['senha'] ?? null;

if ($usuario && $senha) { 
    $query = "SELECT usuario, nome, senha, tipo FROM usuarios WHERE usuario = '$usuario' LIMIT 1";
    $busca = $conexao->query($query);

    if (!$busca) {
        echo "<p style='color: red;'>Erro de conexão! </p>" . $conexao->error;
    } else {
        if ($busca->num_rows > 0) {
            $reg = $busca->fetch_object();
            if (testarHash($senha, $reg->senha)) {
                $_SESSION['user'] = $reg->usuario;
                $_SESSION['nome'] = $reg->nome;
                $_SESSION['tipo'] = $reg->tipo;
                header('Location: ./pagina_principal.php');
                exit;
            } else {
                $_SESSION['erro_login'] = true;
                header('Location: ./index.php');
                exit;
            }
        }
    }
}

// função que criptografa a senha
function cripto($senha) {
    $c = '';
    for($pos = 0; $pos < strlen($senha); $pos++) {
        $letra = ord($senha[$pos]) + 1;
        $c .= chr($letra);
    }
    return $c;
}

// função que gera a senha
function gerarHash($senha) {
    $txt = cripto($senha);
    $hash = password_hash($txt, PASSWORD_DEFAULT);
    return $hash;
}

// função que testa a senha
function testarHash($senha, $hash) {
    $ok = password_verify(cripto($senha), $hash);
    return $ok;
}

// verifica se o usuário é admin (usuário com poderes de admin)
function is_admin() {
    $tipo = $_SESSION['tipo'] ?? null;
    if (is_null($tipo)) {
        return false;
    } else {
        if ($tipo == 'admin') {
            return true;
        } else {
            return false;
        }
    }
}

// função que verifica se o usuário é cliente (usuário comum)
function is_cliente() {
    $tipo = $_SESSION['tipo'] ?? null;
    if (is_null($tipo)) {
        return false;
    } else {
        if ($tipo == 'cliente') {
            return true;
        } else {
            return false;
        }
    }
}

// função que verifica se o usuário é cliente (usuário comum)
function is_outro() {
    $tipo = $_SESSION['tipo'] ?? null;
    if (is_null($tipo)) {
        return false;
    } else {
        if ($tipo == 'outro') {
            return true;
        } else {
            return false;
        }
    }
}

// função que verifica se o usuário está logado
if (!isset($_SESSION['user'])) {
    header('Location: index.php'); // Redireciona para o login se não estiver logado
    exit;
}

// limita o tempo da sessão para 15 minutos
$tempoLimite = 15 * 60;

// faz o logout após o tempo de inatividade
if (isset($_SESSION['ultimo_acesso'])) {
    $inatividade = time() - $_SESSION['ultimo_acesso'];
    if ($inatividade > $tempoLimite) {
        session_unset();
        session_destroy();
        header("Location: index.php");
        exit();
    }
}
$_SESSION['ultimo_acesso'] = time();

?>

