# Gerenciamento de estoque

## Tecnologias utilizadas

O sistema foi desenvolvido utilizando a arquitetura MVC e as seguintes tecnologias:

- PHP 8.0.1
- Laravel 8.0
- MySQL 8.0

## Configuração em ambiente Microsoft Windows

Recursos necessários:

- PHP 8.0.1
- Composer 2.0.8
- MySQL 8.0

Passos para instalação: 

- Criar um novo banco de dados no mysql com o nome de `gerenciamento_estoque`
- Clonar repositório
- Duplicar o arquivo `.env.example` e renomear a cópia para `.env`
- Alterar os dados de conexão do arquivo `.env` de acordo com o banco de dados instalado
- Executar o comando `composer install`
- Executar o comando `php artisan key:generate`
- Criar as tabelas e popular o banco com o comando `php artisan migrate --seed`
- Executar o comando `php artisan serve` para levantar o sistema
- O sistema estará disponível no endereço `http://localhost:8000`

Execução dos testes automatizados:
- No diretório raiz do projeto executar o comando `php artisan test --testsuite=Feature`
- OBS: É feito um refresh no banco de dados após cada teste

## Instruções para utilização da api:

A api contém uma rota para realização do login e que retorna um token para ser utilizado nas requisições de movimentação de estoque.

Exemplo de uma requisição para a rota de login. Note que é necessário a passagem do cabeçalho `Accept: application/json` para o funcionamento correto.
```
POST /api/login HTTP/1.1
Host: localhost:8000
User-Agent: insomnia/2021.2.2
Content-Type: application/json
Accept: application/json
Content-Length: 60

{
    "email": "usuario@usuario.com",
    "password": "password"
}
```

Exemplo da resposta do login.
```
{
  "token": "1|veOV1k9FUmKLl0bx0D7voUyL5xUC1JwQUXGDHpxx"
}
```

Para utilização das rotas de movimentação de estoque é necessário passar no cabeçalho da requisição o token obtido pela rota de login.

Exemplo de uma requisição para movimentação de estoque. Note como o token é utilizado no cabeçalho `Authorization`.
```
PATCH /api/adicionar-produtos HTTP/1.1
Host: localhost:8000
User-Agent: insomnia/2021.2.2
Content-Type: application/json
Accept: application/json
Authorization: Bearer 1|veOV1k9FUmKLl0bx0D7voUyL5xUC1JwQUXGDHpxx
Content-Length: 39

{
 	"sku": "PLGTX5050",
 	"amount": 200
}
```

Todas as rotas da API retornam o status `200` caso haja sucesso na operação e em caso de erro é retornado um status diferente de `200` de acordo com o erro.
