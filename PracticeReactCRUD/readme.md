

# Laravel 12 + React + Inertia CRUD Quick Guide

## 1. Create Project
```
laravel new PracticeReactCRUD
```

## 2. Install Starter Kit
- Choose: React
- Auth: Laravel's built-in authentication
- Testing: Pest

## 3. Install NPM dependencies
Run when prompted:
```
npm install
```

## 4. Generate Key
```
php artisan key:generate
```

## 5. Link Storage
```
php artisan storage:link
```

## 6. Configure Database
Edit `.env`:
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=practicereactcrud
DB_USERNAME=root
DB_PASSWORD=
```

## 7. Migrate & Seed
```
php artisan migrate:fresh --seed
```

## 8. Start Dev Server
```
composer run dev
# or
php artisan serve
```

## 9. Useful Commands
- `php artisan migrate` — Run migrations
- `php artisan db:seed` — Seed database
- `php artisan make:model ModelName` — New model
- `php artisan make:controller` — New controller
- `npm run dev` — Start Vite
- `php artisan test` or `pest` — Run tests

## 10. Resources
- React code: `resources/js/`
- Tailwind CSS: [tailwindcss.com](https://tailwindcss.com/)
- Icons: [lucide.dev](https://lucide.dev/)
- UI: [shadcn/ui](https://ui.shadcn.com/)
- Inertia: [inertiajs.com](https://inertiajs.com/)
- Laravel: [laravel.com/docs](https://laravel.com/docs)


---
Start building your CRUD features!
