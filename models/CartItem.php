<?php
// CartItem.php

class CartItem {
    private $id;
    private $productId;
    private $quantity;

    // Construtor
    public function __construct($productId, $quantity) {
        $this->productId = $productId;
        $this->quantity = $quantity;
    }

    // Getters e setters
    public function getId() {
        return $this->id;
    }

    public function getProductId() {
        return $this->productId;
    }

    public function getQuantity() {
        return $this->quantity;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setProductId($productId) {
        $this->productId = $productId;
    }

    public function setQuantity($quantity) {
        $this->quantity = $quantity;
    }
}