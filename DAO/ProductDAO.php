<?php
// ProductDAO.php
require_once 'Database.php';
require_once 'Product.php';

class ProductDAO {
    private $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    // Método para obter todos os produtos
    public function getAllProducts() {
        $sql = "SELECT * FROM products";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Método para obter detalhes de um produto por ID
    public function getProductById($productId) {
        $sql = "SELECT * FROM products WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $productId);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Método para adicionar um produto
    public function addProduct($name, $description, $price, $image) {
        $sql = "INSERT INTO products (name, description, price, image) VALUES (:name, :description, :price, :image)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':image', $image);
        return $stmt->execute();
    }

    // Método para atualizar um produto
    public function updateProduct($id, $name, $description, $price, $image) {
        $sql = "UPDATE products SET name = :name, description = :description, price = :price, image = :image WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':image', $image);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    // Método para deletar um produto
    public function deleteProduct($id) {
        $sql = "DELETE FROM products WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}
