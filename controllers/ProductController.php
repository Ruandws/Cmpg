<?php
// ProductController.php
require_once '../models/Product.php';
require_once '../models/ProductDAO.php';

class ProductController {
    
    // Exemplo de método para listar produtos
    public function listProducts() {
        $productDao = new ProductDAO();
        // Implementar lógica para buscar e retornar lista de produtos
        return $productDao->getAllProducts();
    }

    // Exemplo de método para exibir detalhes de um produto
    public function viewProduct($productId) {
        $productDao = new ProductDAO();
        // Implementar lógica para buscar e retornar detalhes de um produto
        return $productDao->getProductById($productId);
    }
}