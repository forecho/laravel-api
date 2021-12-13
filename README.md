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
```

Make Swagger API documentation

```shell
php artisan openapi:generate
```

http://localhost:8000/api/documentation
