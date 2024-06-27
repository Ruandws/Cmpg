<?php
// index.php

//classes chamadas pelo index.php
require_once '/model/User.php';
require_once '/controllers/UserController.php';
require_once '/model/Product.php';
require_once '/controllers/ProductController.php';



// Função para sanitizar entradas e evitar XSS
function sanitize($data) {
    return htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
}

// Determina o controlador e a ação com base nos parâmetros da URL
$controller = isset($_GET['controller']) ? sanitize($_GET['controller']) : 'ProductController'; // Controlador padrão é 'ProductController'
$action = isset($_GET['action']) ? sanitize($_GET['action']) : 'listProducts'; // Ação padrão é 'listProducts'

// Switch para escolher qual controlador usar e qual ação executar
switch ($controller) {
    case 'UserController':
        $userController = new UserController(); // Instancia o controlador de usuários
        switch ($action) {
            case 'showLoginForm':
                $userController->showLoginForm(); // Exibe o formulário de login
                break;
            case 'showRegisterForm':
                $userController->showRegisterForm(); // Exibe o formulário de registro
                break;
            case 'register':
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $username = sanitize($_POST['username']);
                    $password = sanitize($_POST['password']);
                    $email = sanitize($_POST['email']);
                    $userController->registerUser($username, $password, $email); // Chama a função para registrar usuário
                }
                break;
            case 'login':
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $username = sanitize($_POST['username']);
                    $password = sanitize($_POST['password']);
                    $userController->authenticateUser($username, $password); // Chama a função para autenticar usuário
                }
                break;
            // Adicione outras ações conforme necessário
        }
        break;

    case 'ProductController':
        $productController = new ProductController(); // Instancia o controlador de produtos
        switch ($action) {
            case 'listProducts':
                $products = $productController->listProducts(); // Obtém a lista de produtos
                include 'app/views/product/list.php'; // Inclui a visualização da lista de produtos
                break;
            case 'viewProduct':
                if (isset($_GET['id'])) {
                    $id = sanitize($_GET['id']);
                    $product = $productController->viewProduct($id); // Obtém detalhes de um produto específico
                    include 'app/views/product/detail.php'; // Inclui a visualização dos detalhes do produto
                }
                break;
            // Adicione outras ações conforme necessário
        }
        break;

    case 'CartController':
        $cartController = new CartController(); // Instancia o controlador de carrinho
        switch ($action) {
            case 'addToCart':
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $productId = sanitize($_POST['productId']);
                    $quantity = sanitize($_POST['quantity']);
                    $cartController->addToCart($productId, $quantity); // Chama a função para adicionar produto ao carrinho
                }
                break;
            case 'viewCart':
                $cartItems = $cartController->viewCart(); // Obtém os itens do carrinho
                include 'app/views/cart/view.php'; // Inclui a visualização do carrinho
                break;
            // Adicione outras ações conforme necessário
        }
        break;

    default:
        // Página inicial ou página de erro
        include 'app/views/home.php'; // Inclui a visualização da página inicial
        break;
}
?>
