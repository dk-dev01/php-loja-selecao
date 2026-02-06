# 🏆 Football Store – Sistema CRUD em PHP + MySQL

Este projeto consiste em um **sistema web CRUD** desenvolvido com **PHP**, **MySQL**, **HTML** e **CSS**, utilizando **XAMPP** como ambiente local.
O sistema conta com **autenticação de login** e permite o gerenciamento completo de **clientes, produtos e vendedores**, aplicando as operações de **Create, Read, Update e Delete**.

O objetivo principal do projeto é **praticar desenvolvimento back-end**, integração com banco de dados e organização de aplicações web.

---

## 🔧 Requisitos

Antes de iniciar, certifique-se de possuir:

* Sistema operacional **Windows**
* Navegador web (Chrome, Edge ou Firefox)
* **XAMPP** (Apache + MySQL)

---

## 📥 1. Instalação do XAMPP

1. Acesse o site oficial: [https://www.apachefriends.org](https://www.apachefriends.org)
2. Baixe o **XAMPP**
3. Instale normalmente (pode manter todas as opções padrão)

---

## 📁 2. Configuração do Projeto

1. Acesse a pasta onde o XAMPP foi instalado

   Exemplo:

   ```
   C:\xampp
   ```

2. Entre na pasta:

   ```
   htdocs
   ```

3. Apague **todos os arquivos** que estiverem dentro da pasta `htdocs`

4. Copie **todos os arquivos do projeto** e cole dentro da pasta `htdocs`

---

## ▶️ 3. Iniciando o Servidor

1. Abra o **XAMPP Control Panel**
2. Clique em **Start** nos serviços:

   * Apache
   * MySQL
3. Clique em **Admin**:

   * Apache → abre o site no navegador (se quiser pesquise diretamente por 'localhost')
   * MySQL → abre o phpMyAdmin

---

## 🌐 4. Acessando o Projeto

Após iniciar o Apache, no navegador você verá o projeto rodando com:

* HTML
* CSS
* PHP

---

## 🗄️ 5. Criação do Banco de Dados

1. No **phpMyAdmin**, clique na aba **SQL**
2. Execute **um comando por vez**, clicando em **Executar** após cada um:

```sql
create database football_store;
```

```sql
use football_store;
```

---

## 🔐 6. Criação da Tabela de Login

No phpMyAdmin → aba **SQL**, execute:

```sql
create table login (
    usuario varchar(30),
    senha varchar(30)
);
```

```sql
insert into login values ("root", "");
```

```sql
select*from login;
```

---

## 🔑 7. Acesso ao Sistema

1. Volte ao site do projeto
2. Clique em **Cadastro / Login**
3. Informe:

   * **Usuário:** root
   * **Senha:** (em branco)
4. Clique em **Entrar**

Após o login, você terá acesso às áreas do sistema.

---

## 📊 8. Criação das Tabelas do CRUD

⚠️ **Essas tabelas precisam ser criadas antes de utilizar as funcionalidades CRUD**

No phpMyAdmin → aba **SQL**, execute os comandos abaixo.

### 👤 Clientes

```sql
create table clientes (
    id_cliente int auto_incremet primary key,
    cpf varchar(11),
    nome varchar(50)
);
```

### 📦 Produtos

```sql
create table produtos (
    id_produto int auto_incremet primary key,
    nome varchar(50),
    preco DECIMAL(10,2),
    descricao varchar(100)
);
```

### 🧑‍💼 Vendedores

```sql
create table vendedores (
    id_vendedor int auto_incremet primary key,
    cpf_cnpj varchar(18),
    nome varchar(50),
    empresa varchar(50)
);
```

Clique em **Executar** após cada comando.

---

## 🔄 9. Funcionalidades do Sistema (CRUD)

Após a criação das tabelas, o sistema permite:

* ✅ Adicionar clientes, produtos e vendedores
* 🔍 Pesquisar registros
* ✏️ Atualizar informações
* 🗑️ Excluir registros
* 📋 Visualizar dados cadastrados

---

## ⛔ 10. Encerrando o Projeto (Importante)

Ao finalizar o uso do sistema:

1. Abra o **XAMPP Control Panel**
2. Clique em **Stop** nos serviços:

   * Apache
   * MySQL
3. Feche o XAMPP

👉 Isso evita:

* Sobrecarga do banco de dados
* Consumo desnecessário de recursos
* Problemas de segurança

---

## 📌 Observações Técnicas

* Projeto executado em **localhost**
* Banco de dados gerenciado via **phpMyAdmin**
* Utilização de **Prepared Statements** para login
* Ideal para estudos de:

  * PHP
  * MySQL
  * CRUD
  * Autenticação de usuários

---

## 👨‍💻 Autor

**Derick Hatakeyama Magalhães**
Desenvolvedor em formação – PHP | MySQL | HTML | CSS

---

## 🚀 Considerações Finais

Este projeto representa a aplicação prática de conceitos fundamentais de desenvolvimento web, reforçando a importância de organização, boas práticas e integração entre front-end e back-end.

O código e a estrutura foram desenvolvidos com foco em aprendizado, clareza e evolução técnica.
