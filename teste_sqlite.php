<?php
// Teste SQLite
echo "Testando SQLite...\n";

// Verificar extensões
if (extension_loaded('pdo_sqlite')) {
    echo "✅ PDO SQLite: OK\n";
} else {
    echo "❌ PDO SQLite: NÃO CARREGADO\n";
}

if (extension_loaded('sqlite3')) {
    echo "✅ SQLite3: OK\n";
} else {
    echo "❌ SQLite3: NÃO CARREGADO\n";
}

// Testar conexão
try {
    $pdo = new PDO('sqlite::memory:');
    echo "✅ Conexão SQLite: OK\n";
} catch (Exception $e) {
    echo "❌ Erro na conexão: " . $e->getMessage() . "\n";
}

echo "\nVersão PHP: " . PHP_VERSION . "\n";
?>