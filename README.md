
# Setup Docker Laravel 10 com PHP 8.1


### Passo a passo
Clone Repositório
```sh
git clone 
```
```sh
cd projeto
```


Crie o Arquivo .env
```sh
cp .env.example .env
```


Atualize as variáveis de ambiente do arquivo .env
```dosini
APP_NAME=sinpges
APP_URL=http://localhost

DB_CONNECTION=pqsql
DB_HOST=db
DB_PORT=5432
DB_DATABASE=nome_que_desejar_db
DB_USERNAME=nome_usuario
DB_PASSWORD=senha_aqui

CACHE_DRIVER=redis
QUEUE_CONNECTION=redis
SESSION_DRIVER=redis

REDIS_HOST=redis
REDIS_PASSWORD=null
REDIS_PORT=6379
```


Suba os containers do projeto
```sh
docker-compose up -d
```


Acesse o container app
```sh
docker-compose exec site bash
```


Instale as dependências do projeto
```sh
composer install
```

Instalar o vite e as dependencias Node JS
```sh
npm install 

npm run dev
```

Gere a key do projeto Laravel
```sh
php artisan key:generate
```



Acesse o projeto
[http://localhost](http://localhost)
