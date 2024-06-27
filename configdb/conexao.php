<?php

require_once 'database.php';  // Inclui o arquivo de configuração
include_once 'conexao.php';  // Inclui o arquivo com a lógica de conexão e mensagem

// ... Código do seu aplicativo ...

$conexao = Conexao::getInstance();

if ($conexao->getConexao()) {
    echo "Conexão com o banco de dados realizada com sucesso!";
} else {
    echo "Erro ao conectar ao banco de dados.";
}
