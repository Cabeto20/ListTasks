<?php
require_once '../database.php';

$db = new Database();

// Processar ações
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $acao = $_POST['acao'] ?? '';
    
    match($acao) {
        'adicionar' => $db->adicionarItem($_POST['texto'] ?? ''),
        'toggle' => $db->toggleItem((int)($_POST['id'] ?? 0)),
        'remover' => $db->removerItem((int)($_POST['id'] ?? 0)),
        default => null
    };
    
    header('Location: index.php');
    exit;
}

$items = $db->listarItems();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Tarefas</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <h1>📝 Lista de Tarefas</h1>
        
        <form method="POST" class="form-adicionar">
            <input type="hidden" name="acao" value="adicionar">
            <input type="text" name="texto" placeholder="Nova tarefa..." required>
            <button type="submit">Adicionar</button>
        </form>
        
        <div class="lista">
            <?php foreach ($items as $item): ?>
                <div class="item <?= $item['concluido'] ? 'concluido' : '' ?>">
                    <span class="texto"><?= htmlspecialchars($item['texto']) ?></span>
                    <div class="acoes">
                        <form method="POST" style="display: inline;">
                            <input type="hidden" name="acao" value="toggle">
                            <input type="hidden" name="id" value="<?= $item['id'] ?>">
                            <button type="submit" class="btn-toggle">
                                <?= $item['concluido'] ? '↩️' : '✅' ?>
                            </button>
                        </form>
                        <form method="POST" style="display: inline;">
                            <input type="hidden" name="acao" value="remover">
                            <input type="hidden" name="id" value="<?= $item['id'] ?>">
                            <button type="submit" class="btn-remover" onclick="return confirm('Remover item?')">🗑️</button>
                        </form>
                    </div>
                </div>
            <?php endforeach; ?>
            
            <?php if (empty($items)): ?>
                <p class="vazio">Nenhuma tarefa ainda. Adicione uma acima! 🎯</p>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>