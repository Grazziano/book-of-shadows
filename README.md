# 📖 Book of Shadows 🕯️🎃

Um site temático de **Halloween** desenvolvido em **Laravel** com **Bootstrap**, que reúne **lendas, contos macabros** e permite que usuários publiquem suas próprias histórias assustadoras.  

Além disso, o projeto possui um **Boletim Macabro** com relatos enviados pela comunidade, e um **dashboard administrativo** para gerenciar postagens, categorias e tags.

---

## 🚀 Funcionalidades

- 📚 **Lendas e contos** – catálogo de histórias e mitos de terror.  
- ✍️ **Publicação de histórias** – usuários podem compartilhar seus próprios relatos.  
- 📰 **Boletim Macabro** – seção especial com relatos da comunidade.  
- 🛠️ **Dashboard administrativo**:  
  - Gerenciamento de posts.  
  - Gerenciamento de categorias.  
  - Gerenciamento de tags.  

---

## 🛠️ Tecnologias Utilizadas

- [Laravel 11.x](https://laravel.com/) – framework backend.  
- [Bootstrap 5](https://getbootstrap.com/) – estilização responsiva.  
- [MySQL/MariaDB](https://www.mysql.com/) – banco de dados relacional.  
- [Blade Templates](https://laravel.com/docs/blade) – sistema de views do Laravel.  
- [Composer](https://getcomposer.org/) – gerenciamento de dependências PHP.  
- [NPM](https://www.npmjs.com/) – gerenciamento de pacotes frontend.  

---

## 📂 Estrutura do Projeto

```

book-of-shadows/
├── app/                # Lógica da aplicação
├── bootstrap/          # Arquivos do bootstrap do Laravel
├── config/             # Configurações do sistema
├── database/           # Migrations, seeders e factories
├── public/             # Arquivos públicos (CSS, JS, imagens)
├── resources/
│   ├── views/          # Views Blade (frontend e dashboard)
│   └── sass/           # Arquivos de estilo
├── routes/             # Rotas (web.php, api.php)
├── tests/              # Testes automatizados
└── ...

````

---

## ⚙️ Instalação e Configuração

1. **Clonar o repositório:**
   ```bash
   git clone https://Grazziano@bitbucket.org/grazziano/book-of-shadows.git
   cd book-of-shadows
   ```

2. **Instalar dependências do PHP com Composer:**

   ```bash
   composer install
   ```

3. **Instalar dependências do frontend:**

   ```bash
   npm install && npm run dev
   ```

4. **Configurar o arquivo `.env`:**

   * Copiar o arquivo `.env.example` para `.env`
   * Configurar banco de dados e demais variáveis de ambiente

   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

5. **Rodar migrations e seeders:**

   ```bash
   php artisan migrate --seed
   ```

6. **Subir o servidor local:**

   ```bash
   php artisan serve
   ```

---

## 📊 Dashboard

O projeto inclui um **painel administrativo** acessível apenas para usuários autenticados, permitindo:

* Criar, editar e excluir **posts**.
* Organizar **categorias** e **tags**.
* Moderação de **histórias enviadas por usuários**.

---

## 🔮 Roadmap (Próximas Melhorias)

* ✅ Autenticação de usuários (login, registro, recuperação de senha).
* ✅ Upload de imagens para histórias e posts.
* ⬜ Sistema de comentários.
* ⬜ Área de perfil do usuário.
* ⬜ SEO otimizado para histórias e lendas.
* ⬜ Integração com redes sociais para compartilhamento de histórias.

---

## 🎃 Créditos

Desenvolvido por [Grazziano](https://github.com/grazziano) 👨‍💻

Inspirado no espírito do **Halloween**, para reunir contos, lendas e relatos que gelam a espinha!
