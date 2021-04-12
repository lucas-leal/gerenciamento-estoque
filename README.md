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