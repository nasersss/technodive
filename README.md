<p align="center"><img src="logo.jpg" width="400"></a></p>

# Technodive




## Basic installation steps 
Before you start the installation process you need to have **installed composer**

1. Clone the project
2. Navigate to the project root directory using command line
3. Run `composer install or `
4. Copy `.env.example` into `.env` file
5. Adjust `DB_*` parameters.<br> 
   If you want to use Mysql, make sure you have mysql server up and running. <br>
   If you want to use sqlite: 
   1. you can just delete all `DB_*` parameters except `DB_CONNECTION` and set its value to `sqlite`
   2. Then create file `database/database.sqlite`
6. Run `php artisan key:generate --ansi`
7. Run `php artisan migrate`
