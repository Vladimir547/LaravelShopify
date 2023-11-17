

## Установка



1. git clone https://github.com/Vladimir547/LaravelShopify.git
2. composer install
3. npm install
4. Создать .env из файла .env.example 
4. php artisan key:generate
5.  bash ./vendor/laravel/sail/bin/sail up (./vendor/bin/sail up);
6.  php artisan migrate:fresh --seed
7.  php artisan schedule:run
8.  Создать в планировщике заданий задачу ("C:\Program Files\php-8.2.12\php.exe" "E:\LaravelShopify\artisan" schedule:run),с тем интервалом который необходи для обновления бд, в моём случае 5минут(для виндовс)
9.  php artisan serve

Laravel is accessible, powerful, and provides tools required for large, robust applications.

