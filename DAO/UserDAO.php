<?php
// UserDAO.php
require_once 'Database.php';
include_once 'conexao.php';  // Inclui o arquivo com a lógica de conexão e mensagem
require_once 'User.php';

class UserDAO {
    private $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }
 // Método para registrar usuário
    public function register($username, $password, $email) {
        $sql = "INSERT INTO users (username, password, email) VALUES (:username, :password, :email)";
        $stmt = $this->conn->prepare($sql);

        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', password_hash($password, PASSWORD_BCRYPT));
        $stmt->bindParam(':email', $email);
        return $stmt->execute();
    }

    // Método para autenticar usuário
    public function authenticate($username, $password) {
        $sql = "SELECT * FROM users WHERE username = :username";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($user && password_verify($password, $user['password'])) {
            return $user;
        }
        return false;
    }
 
}