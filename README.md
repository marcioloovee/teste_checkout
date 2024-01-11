# Configurando ambiente


### Compilando a aplicação no Docker
```bash
docker-compose build
```

### Executando a aplicação em background
```bash
docker-compose up -d
```

### Instalando as dependências do aplicativo
```bash
docker-compose exec app composer install
```

### Gerando chave do app
```bash
docker-compose exec app php artisan key:generate
```

### Criando as tabelas no banco de dados
```bash
docker-compose exec app php artisan migrate
```

Acesse: http://localhost
