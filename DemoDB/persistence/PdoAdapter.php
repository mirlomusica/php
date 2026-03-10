<?php

include_once __DIR__ . '/../exceptions/ServiceException.php';

class PdoAdapter {

    protected PDO $pdo;
    protected PDOStatement $stmt;
    protected string $host = 'localhost';
    protected string $db = 'infobooks';
    protected string $charset = 'utf8mb4';
    protected string $user = 'daw1';
    protected string $pass = 'M0485phpdaw@';
    protected array $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // Errores como excepciones
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, // fetch() devuelve arrays asociativos
        PDO::ATTR_EMULATE_PREPARES => false, // Usar prepared statements nativos si es posible
    ];

    public function __construct() {
        try {
            $dsn = "mysql:host=$this->host;dbname=$this->db;charset=$this->charset";
            $this->pdo = new PDO($dsn, $this->user, $this->pass, $this->options);
        } catch (PDOException $ex) {
            throw new ServiceException("DB Connection Failure: " . $ex->getMessage());
        }
    }

    public function read(string $query): array {
        try {
            $this->stmt = $this->pdo->query($query);
            return $this->stmt->fetchAll();
        } catch (PDOException $ex) {
            throw new ServiceException("Query Error: " . $ex->getMessage());
        }
    }

    public function write(string $query): int {
        try {
            return $this->pdo->exec($query);
        } catch (PDOException $ex) {
            throw new ServiceException("Query Error: " . $ex->getMessage());
        }
    }

    public function prepareStmt(string $query): void {
        try {
            $this->stmt = $this->pdo->prepare($query);
        } catch (PDOException $ex) {
            throw new ServiceException("Query Error: " . $ex->getMessage());
        }
    }

    public function execReadStmt(array $params): array {
        try {
            $this->stmt->execute($params);
            return $this->stmt->fetchAll();
        } catch (PDOException $ex) {
            throw new ServiceException("Query Error: " . $ex->getMessage());
        }
    }

    public function execWriteStmt(array $params): bool {
        try {
            return $this->stmt->execute($params);
        } catch (PDOException $ex) {
            throw new ServiceException("Query Error: " . $ex->getMessage());
        }
    }
}
