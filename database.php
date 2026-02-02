<?php
class Database {
    private PDO $pdo;
    
    public function __construct() {
        $this->pdo = new PDO('sqlite:' . __DIR__ . '/lista.db');
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->createTable();
    }
    
    private function createTable(): void {
        $this->pdo->exec("
            CREATE TABLE IF NOT EXISTS items (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                texto TEXT NOT NULL,
                concluido BOOLEAN DEFAULT 0,
                criado_em DATETIME DEFAULT CURRENT_TIMESTAMP
            )
        ");
    }
    
    public function adicionarItem(string $texto): bool {
        $stmt = $this->pdo->prepare("INSERT INTO items (texto) VALUES (?)");
        return $stmt->execute([$texto]);
    }
    
    public function listarItems(): array {
        $stmt = $this->pdo->query("SELECT * FROM items ORDER BY criado_em DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function toggleItem(int $id): bool {
        $stmt = $this->pdo->prepare("UPDATE items SET concluido = NOT concluido WHERE id = ?");
        return $stmt->execute([$id]);
    }
    
    public function removerItem(int $id): bool {
        $stmt = $this->pdo->prepare("DELETE FROM items WHERE id = ?");
        return $stmt->execute([$id]);
    }
}