# Supermarket Task Project

Simple supermarket app which offers on the user to buy products, add, update or delete.Also payment log page where the user can track all the purchased orders.

1. Framework - Laravel
2. Sail - Sail provides a Docker powered local development experience for Laravel that is compatible with macOS, Windows (WSL2), and Linux

## Getting Started

```bash
git clone https://github.com/egasimuse/supermarket.git
cd supermarket
git checkout master
composer install
./vendor/bin/sail up
```
Set up database.
1. Make sure that these variables are set in `.env` file and if you don't have .env file please copy `.env.example` file and create new `.env`
```angular2html
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=supermarket_app
DB_USERNAME=sail
DB_PASSWORD=password
```
it will be good to restart the sail container.
`./vendor/bin/sail restart`

2. Migrate all the tables into the database.
```angular2html
./vendor/bin/sail artisan migrate
```
3. You can populate the database with phpmyadmin which is located here:
```angular2html
http://localhost:8001/
```
or simply by running the app and adding them manually from here:
```angular2html
http://localhost/edit-products
```
#### Sail useful commands.
  * `./vendor/bin/sail artisan` - List of commands.
  * `./vendor/bin/sail up` - start all the containers
  * `./vendor/bin/sail down` - stop all the containers
  * `./vendor/bin/sail restart` - restart the containers

