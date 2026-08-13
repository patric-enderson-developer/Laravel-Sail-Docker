API Laravel + Angular NewsLatter + Adm Blog - Painel Filament  

## Tecnologias

- [Laravel](https://laravel.com/) - Backend / API REST
- [Livewire](https://livewire.laravel.com/) - BLOG 
- [Filament](https://filamentphp.com/) - Painel Administrativo (TALL Stack)
- [Angular](https://angular.dev/) - Frontend SPA
- [Docker](https://www.docker.com/) + [Laravel Sail](https://laravel.com/docs/sail) - Ambiente containerizado
- [MySQL](https://www.mysql.com/) - Banco de dados


# API Laravel + Angular Newsletter + Blog + Filament

Projeto desenvolvido para explorar a integração de diferentes tecnologias do ecossistema Laravel em uma aplicação única, utilizando cada stack de acordo com uma responsabilidade específica.

A aplicação combina **Laravel, Livewire, Filament, Angular, Docker, Laravel Sail e MySQL**, criando um pequeno ecossistema com **Blog, painel administrativo e Newsletter**.

## Arquitetura

O projeto foi dividido em diferentes responsabilidades:

```text
              ┌──────────────────┐        ┌──────────────────┐
              │     Livewire     │        │     Filament     │
              │       Blog       │        │ Painel Admin     │
              └────────┬─────────┘        └────────┬─────────┘
                       │                           │
                       └─────────────┬─────────────┘
                                     │
                                     ▼
                            ┌─────────────────┐
                            │     Laravel     │
                            │     Backend     │
                            │                 │
                            │   Controller    │
                            │       ↓         │
                            │    Eloquent     │
                            └────────┬────────┘
                                     │
                                     ▼
                                ┌─────────┐
                                │  MySQL  │
                                └─────────┘


                            ┌─────────────────┐
                            │     Angular     │
                            │    Newsletter   │
                            └────────┬────────┘
                                     │
                                    HTTP
                                     │
                                     ▼
                            ┌─────────────────┐
                            │   Laravel API   │
                            │   Controller    |
                            |   Service       |
                            |   Repository    |
                            │       ↓         │
                            │    Eloquent     │
                            └────────┬────────┘
                                     │
                                     ▼
                                ┌─────────┐
                                │  MySQL  │
                                └─────────┘
```

### Blog

O projeto possui um Blog desenvolvido com **Laravel + Livewire**, utilizando uma interface reativa para apresentação dos conteúdos.

Os posts são gerenciados através de um painel administrativo desenvolvido com Filament.

### Painel Administrativo

O **Filament** é utilizado como painel administrativo da aplicação, permitindo o gerenciamento dos conteúdos do Blog.

Entre as operações disponíveis:

* Cadastro de posts.
* Edição de posts.
* Exclusão de posts.
* Listagem dos conteúdos.
* Gerenciamento dos dados através de uma interface administrativa.

### Newsletter

A Newsletter possui um frontend desenvolvido em **Angular**, responsável pela interface de cadastro dos interessados.

Os dados preenchidos no formulário são enviados através de requisições HTTP para a **API Laravel**.

Fluxo:

```text
Angular
   ↓
HTTP Request
   ↓
Laravel API
   ↓
Validation
   ↓
Service
   ↓
Repository
   ↓
Eloquent
   ↓
MySQL
```

A API também disponibiliza os dados cadastrados para consulta pelo frontend.

## Tecnologias

* **Laravel** — Backend, API REST, regras de negócio e acesso aos dados.
* **Livewire** — Interface reativa utilizada no Blog.
* **Filament** — Painel administrativo para gerenciamento dos posts.
* **Angular** — Frontend da Newsletter.
* **MySQL** — Banco de dados.
* **Docker** — Containerização do ambiente.
* **Laravel Sail** — Ambiente de desenvolvimento baseado em Docker.
* **Tailwind CSS** — Estilização das interfaces.

## Integração entre as Tecnologias

A proposta principal do projeto foi utilizar cada tecnologia em uma função específica, simulando uma arquitetura onde diferentes aplicações e interfaces consomem o mesmo backend.

### Blog

```text
Filament
   ↓
Laravel / Eloquent
   ↓
MySQL
   ↓
Livewire
   ↓
Blog
```

### Newsletter

```text
Angular
   ↓
Laravel API
   ↓
Eloquent
   ↓
MySQL
```

Dessa forma, o projeto demonstra a integração entre **frontend SPA, aplicações server-side reativas, painel administrativo e API REST** dentro do mesmo ecossistema.

## Ambiente de Desenvolvimento

O projeto utiliza **Docker + Laravel Sail** para padronizar o ambiente de desenvolvimento.

Os principais serviços utilizados são:

```text
Laravel
MySQL
Docker
Laravel Sail
```

Isso permite executar a aplicação sem depender de uma configuração manual de PHP, MySQL e demais serviços diretamente no sistema operacional.

## Objetivo do Projeto

Este projeto foi desenvolvido como um laboratório prático para demonstrar a utilização de diferentes tecnologias e stacks em conjunto.

A ideia foi além de simplesmente criar um ecossistema, utilizando diferentes abordagens:

* **Livewire** para o Blog.
* **Filament** para administração dos conteúdos.
* **Angular** para a Newsletter.
* **Laravel API** para comunicação entre frontend e backend.
* **MySQL** para persistência dos dados.
* **Docker/Sail** para infraestrutura do ambiente.

O resultado é uma aplicação que demonstra diferentes formas de construção de interfaces e comunicação com um backend Laravel.
