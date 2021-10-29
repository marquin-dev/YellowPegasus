<?php
// require_once('/www/assets/php/autoload.php');
spl_autoload_register(function($className) {
    require_once(__DIR__ . "\\{$className}.php");
});

class UsersController extends DatabaseConfig {
    public function __construct() {
        parent::__construct();
    }
    
    
    public function getAllUserData($email) {
        $sql = 'SELECT * FROM users WHERE email=?';
        $stmt = $this->dbh->prepare($sql);
        $stmt->bindValue(1, $email, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function insertNewUser($data) {
        $sql = 'INSERT INTO users (nome, sobrenome, cpf, genero, email, senha, cep, cidade, endereco, numeroDaCasa, bairro, status) 
        VALUES (?,?,?,?,?,?,?,?,?,?,?,?)';
        $stmt = $this->dbh->prepare($sql);
        foreach($data as $key => $value) {
            $stmt->bindValue(($key+1), $value[0], $value[1]);
        }
        return $stmt->execute();
    } 

    public function validateUser($email, $password) {
        $sql = 'SELECT nome, sobrenome, senha, status FROM users WHERE email=?';
        $stmt = $this->dbh->prepare($sql);
        $stmt->bindValue(1, $email, PDO::PARAM_STR);
        $stmt->execute();
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        if (password_verify($password, $data['senha'])) {
            return [
                'userEmail' => $email,
                'userfullName' => ucwords($data['nome']) . ' ' . ucwords($data['sobrenome']),
                'userStatus' => $data['status']
            ];
        } else {
            return false;
        }
    }

    public function UpdateUserData($data, $email) {
        $sql = 'UPDATE users SET 
        nome=?, sobrenome=?, cpf=?, genero=?, email=?, senha=IFNULL(?, senha), cep=?, cidade=?, endereco=?, numeroDaCasa=?, bairro=? 
        WHERE email=?';
        $stmt = $this->dbh->prepare($sql);
        foreach($data as $key => $value) {
            $stmt->bindValue(($key+1), $value[0], $value[1]);
        }
        $stmt->bindValue((count($data)+1), $email, PDO::PARAM_STR);
        return $stmt->execute();
    }

}
