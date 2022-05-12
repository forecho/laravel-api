# Laravel Api

## Install

```shell
composer install
php artisan key:generate
php artisan queue:table
php artisan migrate
```

## Queue

```shell
php artisan queue:work
```

## Dev

Serve

```shell
php artisan serve
```

http://localhost:8000/

Fix code style

```shell
vendor/bin/php-cs-fixer fix --config=.php-cs-fixer.dist.php
// or
composer fix-style
```
