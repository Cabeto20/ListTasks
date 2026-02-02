# 📝 Lista de Tarefas - PHP 8

App minimalista de lista de tarefas usando PHP 8 e SQLite.

## 🚀 Como Rodar

### Requisitos
- PHP 8.0+ com extensão SQLite habilitada
- Servidor web (Apache/Nginx) ou PHP built-in server

### Habilitar SQLite
```bash
# Windows - Se não tiver php.ini configurado
# Crie um arquivo php.ini na pasta do projeto com:
extension=pdo_sqlite
extension=sqlite3

# Ou edite o php.ini global descomentando:
# extension=pdo_sqlite
# extension=sqlite3

# Linux/Mac
sudo apt-get install php-sqlite3 php-pdo-sqlite
```

### Instalação
```bash
# Clone ou baixe o projeto
cd ListaPhp

# Servidor built-in do PHP (com php.ini local)
php -c php.ini -S localhost:8000 -t public

# Ou servidor padrão
php -S localhost:8000 -t public

# Ou configure no Apache/Nginx apontando para a pasta public/
```

### Acesso
- **Local**: http://localhost:8000
- **Apache**: http://localhost/ListaPhp

## 📱 Como Usar

1. **Adicionar tarefa**: Digite no campo e clique "Adicionar"
2. **Marcar concluída**: Clique no ✅ 
3. **Desmarcar**: Clique no ↩️
4. **Remover**: Clique no 🗑️

## 🛠️ Recursos PHP 8

- Typed properties
- Match expressions
- Return type declarations
- Null coalescing operator

## 📁 Estrutura

```
ListaPhp/
├── public/
│   ├── css/style.css
│   └── index.php
├── database.php
├── .htaccess
├── lista.db
├── php.ini
├── README.md
└── teste_sqlite.php
```

## 💾 Banco de Dados

SQLite criado automaticamente em `lista.db` na primeira execução.
