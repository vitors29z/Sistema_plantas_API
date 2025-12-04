# Sistema Plantas - Gestao de Cuidados

## Sobre o Projeto

O **Sistema Plantas** e uma aplicacao web desenvolvida em **PHP** com arquitetura **MVC (Model-View-Controller)** e roteamento customizado. Seu principal objetivo e gerenciar tres entidades chave: **Usuarios**, **Plantas** e o **Relacionamento de Cuidados** associados a eles, permitindo operacoes **CRUD (Create, Read, Update, Delete)** em todos os modulos.

A aplicacao utiliza o padrao **Singleton** para a conexao com o banco de dados **MySQL** e um sistema de autenticacao via **JWT (JSON Web Tokens)**.

***

## Requisitos e Configuracao Local

Para rodar o projeto localmente, voce precisara de:

1.  **Servidor Web:** Apache ou Nginx (Recomendado o uso de pacotes como XAMPP, WAMP ou MAMP).
2.  **PHP:** Versao 7x ou superior.
3.  **Banco de Dados:** MySQL.
4.  **Extensoes PHP:** Necessario ter a extensao `pdo_mysql` e as bibliotecas JWT configuradas.

### 1. Configuracao do Banco de Dados

O projeto utiliza um banco de dados chamado `sistema_plantas`. As credenciais de conexao sao definidas no `MysqlSingleton.php`:


Endpoints da Aplicacao (CRUD)
O sistema suporta todas as operacoes CRUD (Create, Read, Update, Delete) atraves dos endpoints definidos na classe Rotas.php.

### 1. Modulo Usuarios

| Funcionalidade | Metodo HTTP | URL Completa (Exemplo) | Parametros de Entrada | Acao do Controller |
| :--- | :--- | :--- | :--- | :--- |
| **Criar/Inserir** | `POST` | `/sistema_plantas/usuarios` | `nome` (string), `email` (string) | `Usuarios::inserir()` |
| **Listar Todos** | `GET` | `/sistema_plantas/usuarios` | Nenhum | `Usuarios::listar()` |
| **Alterar/Update** | `POST` | `/sistema_plantas/usuarios/alterar` | `id` (int), `nome` (string), `email` (string) | `Usuarios::alterar()` |
| **Excluir** | `GET` | `/sistema_plantas/usuarios/excluir?id={id}` | `id` (via Query String) | `Usuarios::excluir()` |
| **Formulario** | `GET` | `/sistema_plantas/usuarios/formulario` | Nenhum/`id` (para Alteracao) | `Usuarios::formulario()`/`formularioalterar()` |

### 2. Modulo Plantas

| Funcionalidade | Metodo HTTP | URL Completa (Exemplo) | Parametros de Entrada | Acao do Controller |
| :--- | :--- | :--- | :--- | :--- |
| **Criar/Inserir** | `POST` | `/sistema_plantas/plantas` | `nome_cientifico` (string), `nome_popular` (string) | `Plantas::inserir()` |
| **Listar Todos** | `GET` | `/sistema_plantas/plantas` | Nenhum | `Plantas::listar()` |
| **Alterar/Update** | `POST` | `/sistema_plantas/plantas/alterar` | `id` (int), `nome_cientifico` (string), `nome_popular` (string) | `Plantas::alterar()` |
| **Excluir** | `GET` | `/sistema_plantas/plantas/excluir?id={id}` | `id` (via Query String) | `Plantas::excluir()` |
| **Formulario** | `GET` | `/sistema_plantas/plantas/formulario` | Nenhum/`id` (para Alteracao) | `Plantas::formulario()`/`formularioalterar()` |

### 3. Modulo Cuidados

| Funcionalidade | Metodo HTTP | URL Completa (Exemplo) | Parametros de Entrada | Acao do Controller |
| :--- | :--- | :--- | :--- | :--- |
| **Criar/Inserir** | `POST` | `/sistema_plantas/cuidados/inserir` | `usuario_id` (int), `planta_id` (int), `tipo_cuidado` (string), `frequencia` (string) | `Cuidados::inserir()` |
| **Listar Todos** | `GET` | `/sistema_plantas/cuidados/lista` | Nenhum | `Cuidados::listar()` |
| **Alterar/Update** | `POST` | `/sistema_plantas/cuidados/alterar` | `id` (int), `usuario_id` (int), `planta_id` (int), `tipo_cuidado` (string), `frequencia` (string) | `Cuidados::alterar()` |
| **Excluir** | `GET` | `/sistema_plantas/cuidados/excluir?id={id}` | `id` (via Query String) | `Cuidados::excluir()` |
| **Formulario** | `GET` | `/sistema_plantas/cuidados/formulario` | Nenhum/`id` (para Alteracao) | `Cuidados::formulario()`/`alterarForm()` |

***

```php
// Arquivo: generic/MysqlSingleton.php
private $dsn = 'mysql:host=localhost;dbname=sistema_plantas';
private $usuario = 'root';
private $senha = '';

