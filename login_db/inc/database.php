<?php

class database {
    private $pdo;

    public function __construct() {
        try {
            $this->pdo = new PDO(
                'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME,
                DB_USER,
                DB_PASS
            );
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (\PDOException $e) {
            die('Erro de conexão com o banco de dados: ' . $e->getMessage());
        }
    }

    public function query($sql, $params = []) {
        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute($params);
            $results = $stmt->fetchAll(PDO::FETCH_OBJ);
            return [
                'status' => 'success',
                'data' => $results
            ];
        } catch (\PDOException $err) {
            return [
                'status' => 'error',
                'data' => $err->getMessage()
            ];
        }
    }
}
