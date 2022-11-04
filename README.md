Install MySql
https://dev.mysql.com/downloads/mysql/


CREATE USER 'omar123'@'localhost' IDENTIFIED BY 'password123';
GRANT ALL PRIVILEGES ON *.* TO 'omar123'@'localhost' WITH GRANT OPTION;

create schema 'shop'


https://www.itsolutionstuff.com/post/laravel-8-crud-application-tutorial-for-beginnersexample.html
https://github.com/savanihd/Laravel-8-CRUD
Download and extract
- open with visual studio code
-rename .env.example to .env

change data in .env like this:
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=shop
DB_USERNAME=omar123
DB_PASSWORD=password123

Steps:

INSTALL:
composer install

MIGRATE AND SEED:
php artisan migrate

php artisan db:seed --class=userSeeder

php artisan key:generate

START:
php artisan serve

go to:
http://localhost:8000/login
