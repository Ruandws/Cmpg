<?php
// UserController.php
require_once '../models/User.php';
require_once '../models/UserDAO.php';

class UserController {
    private $userDAO;

    public function __construct() {
        $this->userDAO = new UserDAO();
    }

    public function showLoginForm() {
        // Exibe o formulário de login
        include 'app/views/user/login.php';
    }

    public function showRegisterForm() {
        // Exibe o formulário de registro
        include 'app/views/user/register.php';
    }

    public function registerUser($username, $password, $email) {
        // Lógica de registro de usuário
        // Adicione validação e hashing de senha conforme necessário
        $this->userDAO->addUser($username, password_hash($password, PASSWORD_DEFAULT), $email);
        header('Location: index.php?controller=UserController&action=showLoginForm');
    }

    public function authenticateUser($username, $password) {
        // Lógica de autenticação de usuário
        $user = $this->userDAO->getUserByUsername($username);
        if ($user && password_verify($password, $user['password'])) {
            // Sucesso na autenticação, redireciona para a página inicial ou dashboard
            // Iniciar sessão, etc.
            session_start();
            $_SESSION['user'] = $user['username'];
            header('Location: index.php?controller=ProductController&action=listProducts');
        } else {
            // Falha na autenticação, redireciona de volta para o formulário de login
            header('Location: index.php?controller=UserController&action=showLoginForm');
        }
    }
}
