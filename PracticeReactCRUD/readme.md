
# Laravel 12 + ReactJS CRUD Application

>This project demonstrates how to build a **CRUD (Create, Read, Update, Delete)** application using **Laravel 12** as the backend and **ReactJS** as the frontend. It includes authentication, database setup, and testing with Pest. This guide is beginner-friendly and walks you through every step.



## 🚀 Quick Start

### 1. Create a New Laravel Project

```bash
laravel new PracticeReactCRUD
```

### 2. Install Starter Kit

When prompted, choose the following options:

- **Starter Kit:** `React`
- **Authentication Provider:** `Laravel's built-in authentication`
- **Testing Framework:** `Pest`

### 3. Install NPM Dependencies

When asked:

```
Would you like to run npm install? (Yes)
```
Select **Yes** to install all frontend dependencies.

### 4. Generate Application Key

```bash
php artisan key:generate
```

### 5. Link Storage

```bash
php artisan storage:link
```

### 6. Configure Database

Open your `.env` file and update the following lines:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=practicereactcrud
DB_USERNAME=root
DB_PASSWORD=
```

> **Tip:** Make sure you have a MySQL database created with the name `practicereactcrud`.

### 7. Run Migrations and Seeders

```bash
php artisan migrate:fresh --seed
```

### 8. Start the Development Server

You can use either of the following commands:

```bash
composer run dev
# or
php artisan serve
```



## 🎉 What You Get

- A fresh Laravel 12 application
- ReactJS frontend (with Vite)
- Authentication (login, register, etc.)
- Pest for testing
- Database configured and seeded
- Storage linked
- All npm packages installed



## 📚 Useful Commands

| Command                           | Description                        |
|-----------------------------------|------------------------------------|
| `php artisan migrate`             | Run database migrations             |
| `php artisan db:seed`             | Seed the database                   |
| `php artisan make:model ModelName`| Create a new Eloquent model         |
| `php artisan make:controller`     | Create a new controller             |
| `npm run dev`                     | Start Vite development server       |
| `php artisan test` or `pest`      | Run tests                           |



## 📝 Notes for Beginners

- **Laravel Docs:** [https://laravel.com/docs](https://laravel.com/docs)
- **React Docs:** [https://react.dev/learn](https://react.dev/learn)
- **Pest Docs:** [https://pestphp.com/docs/](https://pestphp.com/docs/)
- If you get stuck, check the official documentation or search online for solutions.



## 💡 Next Steps

- Start building your CRUD features!
- Explore how Laravel and ReactJS work together.
- Try customizing authentication, adding new models, or improving the UI.



Happy coding! 🚀

9. Reasources -> js ->
