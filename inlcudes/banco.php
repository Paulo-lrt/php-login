<?php
    $conexao = new mysqli("localhost", "seu_usuario", "sua_senha", "nome_do_banco");
    if($conexao->connect_errno) {
        echo "<p>Erro no login: $conexao->errno --> $conexao->connect_error</p>";
            die();
    }

    $conexao->query("SET NAMES 'utf8'");
    $conexao->query("SET character_set_connection=utf8");
    $conexao->query("SET character_set_client=utf8");
    $conexao->query("SET character_set_results=utf8");
?>