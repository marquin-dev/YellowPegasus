<?php
    spl_autoload_register(function($className) {
        require_once(__DIR__ . "\\{$className}.php");
    });

    class ProductsController extends DatabaseConfig {
        public function __construct() {
            parent::__construct();
        }

        public function getProducts() {
            $sql = 'SELECT * FROM products';
            $stmt = $this->dbh->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function getProduct($id) {
            $sql = 'SELECT * FROM products WHERE id=:id';
            $stmt = $this->dbh->prepare($sql);
            $stmt->bindValue(':id', $id, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }

        public function insertNewProduct($data) {
            $sql = 'INSERT INTO products (name, value, description, quantity, image) VALUES (?, ?, ?, ?, ?)';
            $stmt = $this->dbh->prepare($sql);
            foreach($data as $key => $value) {
                $stmt->bindValue(($key+1), $value[0], $value[1]);
            }
            $stmt->bindValue((count($data)+1), $id, PDO::PARAM_STR);
            return $stmt->execute();
        }

        public function UpdateProductData($data, $id) {
            $sql = 'UPDATE products SET name=?, value=?, description=?, quantity=?, image=?';
            $stmt = $this->dbh->prepare($sql);
            foreach($data as $key => $value) {
                $stmt->bindValue(($key+1), $value[0], $value[1]);
            }
            $stmt->bindValue((count($data)+1), $id, PDO::PARAM_STR);
            return $stmt->execute();
        }
    }