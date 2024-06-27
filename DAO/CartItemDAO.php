<?php
// CartItemDAO.php
require_once 'Database.php';
require_once 'CartItem.php';

class CartItemDAO {
    private $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    // Método para adicionar item ao carrinho
    public function addItem($productId, $quantity) {
        $sql = "INSERT INTO cart_items (product_id, quantity) VALUES (:product_id, :quantity)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':product_id', $productId);
        $stmt->bindParam(':quantity', $quantity);
        return $stmt->execute();
    }

    // Método para remover item do carrinho
    public function removeItem($itemId) {
        $sql = "DELETE FROM cart_items WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $itemId);
        return $stmt->execute();
    }

    // Método para obter todos os itens do carrinho
    public function getCartItems() {
        $sql = "SELECT * FROM cart_items";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}