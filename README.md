## Instalação

ToDS-Bookstore tem como requerimento [Laravel](https://laravel.com/docs/8.x) v8+  para rodar normalmente.

Instale as dependencias e inicie o server.

```sh
git clone https://github.com/vverardO/tods-bookstore.git
cd tods-bookstore
composer install
php artisan key:generate
php artisan migrate --seed
php artisan serve
```

## Acesso
Para acesso direto basta buscar qualquer token na tabela de usuários (users).

A autenticação se da por meio de Bearer Token.