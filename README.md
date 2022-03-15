# Painel Administrativo

## Clonar projeto
git clone git@github.com:Dudalara/administrative-panel.git

## Configurar ambiente
```bash
cd administrative-panel
cp .env-example .env
```
## Configurar .env
```bash
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=dbname
DB_USERNAME=root
DB_PASSWORD=root
```
## Rodar aplicação
```bash
docker-compose build
docker-compose up -d
npm install 
npm run dev 
```

## Gerar chave
docker-comoose exec app bash
php artisan key:generate 

## Gerar migrate e seeders
php artisan migrate
php artisan db:seed

> ### [Click Here](http://localhost:8989)

login: admin
password: 123456
