<?php

class DatabaseConfig {
    protected $dbh;

    protected function __construct() {
        $this->dbh =  new PDO('mysql:host=localhost;dbname=yellowpegasus','root', '');
        $this->createUsersTable();
        $this->createProductsTable();
        $this->createShoppingcartTable();
    }

    private function createUsersTable () {
        $this->dbh->exec('CREATE TABLE IF NOT EXISTS users (
                nome VARCHAR(255) NOT NULL,
                sobrenome VARCHAR(255) NOT NULL,
                cpf CHAR(14) NOT NULL,
                genero VARCHAR(2) NOT NULL,
                email VARCHAR(255) NOT NULL,
                senha VARCHAR(255) NOT NULL,
                cep CHAR(9) NOT NULL,
                cidade VARCHAR(255) NOT NULL,
                endereco VARCHAR(255) NOT NULL,
                numeroDaCasa VARCHAR(5) NOT NULL,
                bairro VARCHAR(255) NOT NULL,
                status VARCHAR(7) NOT NULL DEFAULT "user",
                PRIMARY KEY (email)
            )');
    }

    private function createProductsTable() {
        $this->dbh->exec('CREATE TABLE IF NOT EXISTS products (
            id INT PRIMARY KEY AUTO_INCREMENT,
            name VARCHAR(1000) NOT NULL,
            value DECIMAL(10, 2) NOT NULL,
            description VARCHAR(65000),
            quantity INT NOT NULL,
            image VARCHAR(500) NOT NULL
        )');
    }
    
    private function createShoppingcartTable() {
        // Entidade/Relação Fraca -> falta da PK
        $this->dbh->exec('CREATE TABLE IF NOT EXISTS shoppingcart (
            product_id INT NOT NULL,
            user_email VARCHAR(255) NOT NULL,
            FOREIGN KEY(product_id) REFERENCES Products(id),
            FOREIGN KEY(user_email) REFERENCES Users(email) 
        )');
    }
}