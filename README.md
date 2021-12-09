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

## Informações

O seguinte projeto tem como finalidade a contrução de três entidades com três maneiras distintas de estrutura.

A primeira conta com a entidade de Autenticação, contando com Login, Register e Logout. Nesta foram utilizados single action controllers com toda as estruturas necessárias centralizadas nos mesmos, sejam elas request, validator, model e response.

A segunda conta com a entidade de Books, a mesma possui as rotas definidas como Api Resource, ou seja, conta com os métodos index, store, show, update e destroy. Neste desenvolvimento foi utilizado o padrão do larave, contando com controller, form request, model e api resource para response.

Por fim, contamos com a entidade BookStatusses, também possui as rotas definidas como Api Resource, porém como diferença é a questão de apresentar controller, service, contract, repository, repository interface, form request e api resource para response.
