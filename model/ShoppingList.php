<?php

require_once __DIR__ . '/../lib/database.php';

// Shopping list model
class ShoppingList {
    // Properties
    private $db;
    private $table = 'shopping_list';

    // Constructor
    public function __construct() {
        $this->db = new Database;
    }

    // Get all shopping list items
    public function getItems() {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE is_deleted = FALSE ORDER BY created_at DESC');
        return $this->db->resultSet();
    }

    // Add shopping list item
    public function addItem($data) {
        $this->db->query('INSERT INTO ' . $this->table . ' (product_title) VALUES (:product_title)');
        $this->db->bind(':product_title', $data['product_title']);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // Edit shopping list item
    public function editItemTitle($data) {
        $this->db->query('UPDATE ' . $this->table . ' SET product_title = :product_title WHERE id = :id');
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':product_title', $data['product_title']);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // Toggle shopping list item checked status
    public function toggleCheckedItem($data) {
        $this->db->query('UPDATE ' . $this->table . ' SET is_checked = :is_checked WHERE id = :id');
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':is_checked', $data['is_checked']);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    // Delete shopping list item
    public function deleteItem($id) {
        $this->db->query('DELETE FROM ' . $this->table . ' WHERE id = :id');
        $this->db->bind(':id', $id);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}