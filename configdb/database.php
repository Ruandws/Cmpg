<?php

class Conexao {

    private static $instance = null;  // Instância única da classe
    private $pdo;                    // Objeto PDO para conexão com o banco

    private function __construct() {  // Construtor privado para evitar instâncias diretas
        try {
            $this->pdo = new PDO('mysql:host=localhost;dbname=dbcamping', 'root', 'senac');
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Erro ao conectar ao banco de dados: " . $e->getMessage();  // Mensagem de erro
            exit;
        }
    }

    public static function getInstance() {  // Método estático para obter instância única
        if (self::$instance === null) {
            self::$instance = new Conexao();
        }
        return self::$instance;
    }

    public function getConexao() {  // Retorna o objeto PDO para uso em consultas
        return $this->pdo;
    }

    public function __destruct() {  // Destrutor fecha a conexão ao terminar
        $this->pdo = null;
    }
}
