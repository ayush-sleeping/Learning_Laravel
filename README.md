# Learning_Laravel
> "I've been learning and using Laravel a lot for my internship as a FullStack Developer. To keep everything organized, I made a special collection of important code and notes. This collection is like a big container that holds all the things I've learned about Laravel, starting from the basics to the more advanced stuff. .... "

<br>

### Important Commands

| No. | Questions |
|---- | ---------
|1 | [How to Install Laravel](#Install-Laravel)|
|2 | [Creating a New Project](#New-Project)|
|3 | [Running Your Project in the Browser](#Run-your-Project-in-browser)|
|4 | [Updating Composer](#Update-Composer)|
|5 | [Making a Model in Laravel](#Making-a-Model-in-Laravel)|
|6 | [Creating a Migration File & Migrate the migration file](#Creating-a-Migration-File)|
|7 | [Generating a Controller File](#Generating-a-Controller-File)|
|8 | [Understanding Route Lists](#Understanding-Route-Lists)|
|9 | [Migrating & Seed Your Database](#Migrating-&-Seed-Your-Database)|
|10| [Generating an Application Key](#Generating-an-Application-Key)|
|11| [Creating a Storage Link](#Creating-a-Storage-Link)|
|12| [Refreshing Laravel's Memory](#Refreshing-Laravel's-Memory)|
|13| [Understanding CRUD Project Flow](#Understanding-CRUD-Project-Flow)|
|14| [Laravel Request Lifecycle](#Laravel-Request-LifeCycle)|
|15| [Overview of Laravel Versions in recent years](#Laravel-versions-lately)|
|16| [Artisan Console](#Artisan-Console)|
|17| [Difference between Composer.json vs Composoer.lock](#Difference-between-Composer.json-vs-Composoer.lock)|
|18| [Default Route Files](#Default-Route-Files-in-Laravel)|
|19| [What is Middleware](#What-is-Middleware)|
|20| [Gates vs Policies](#Gates-vs-Policies)|
|21| [Eloquent vs Query Builder](#Eloquent-vs-Query-Builder-in-Laravel)|
|22| [Migrate fresh vs Migrate refresh](#Migrate-fresh-vs-Migrate-refresh)|
|23| [Factories vs Seeders](#Factories-vs-Seeders)|
|24| [Databases Laravel Support](#Databases-Laravel-Support)|
|25| [Soft Deletes](#Soft-Deletes)|




<br>

1. ### Install Laravel
    
    You can install Laravel globally as
    ```cmd
   composer global require laravel/installer
    ```
    This command installs Laravel globally on your system. It allows you to create new Laravel projects using the laravel new command.


  **[⬆ Back to Top](#Important-Commands)**
  

---
---


2. ### New Project
    
    To make a New project  of Laravel 
    ```cmd
   laravel new app_name
    ```
    This command creates a new Laravel project with the specified name (app_name). It sets up the basic structure and necessary files for a Laravel application.


  **[⬆ Back to Top](#Important-Commands)**
    

---
---


3. ### Run your Project in  browser
    
    * To your project  of Laravel in browser
    ```cmd
   php artisan serve
    ```
    * And if you want to run your project in different port
   ```cmd
   php artisan serve --port=8080
   ```
   This command starts the development server, allowing you to access your Laravel application in the browser at http://localhost:8000/. You can specify a different port using --port.



  **[⬆ Back to Top](#Important-Commands)**
    

---
---


4. ###  Update Composer 
    
    * To your update composer of project
    ```cmd
   composer update
    ```
    This command starts the development server, allowing you to access your Laravel application in the browser at http://localhost:8000/. You can specify a different port using --port.


    * Ignoring Some Requirements during Update
   ```cmd
   composer update --ignore-platform-reqs
   ```
   In some cases, you might need to update without considering platform requirements. This command allows you to update without checking PHP and extension versions.


  **[⬆ Back to Top](#Important-Commands)**
   

---
---


5. ###  Making a Model in Laravel
    
    * To make a Model file
    ```cmd
   php artisan make:model modelNAME
    ```
    This command generates a new Eloquent model in the app/Models directory. Models represent database tables and encapsulate business logic related to data.
   
    * Creating a Migration File with Model
   ```cmd
   php artisan make:model modelNAME -m
   ```
   This command not only creates a model but also generates a corresponding database migration file. Migrations define the structure of your database tables.



  **[⬆ Back to Top](#Important-Commands)**  


---
---

6. ###  Creating a Migration File
    
    * To Create a Migration File
    ```cmd
   php artisan make:migration create_contacts_table
    ```
    This command generates a new migration file in the database/migrations directory. Migration files define changes to your database schema.
   
    * Migrate the migration file 
    ```cmd
   php artisan migrate
    ```
    This command applies pending migrations, updating your database schema to match the changes defined in the migration files.
   
   * Migrate fresh the migration file 
    ```cmd
   php artisan migrate:fresh
    ```
    Use this command to rollback all migrations and start fresh. It re-runs all migrations, effectively resetting your database.



  **[⬆ Back to Top](#Important-Commands)**
  

---
---

7. ###  Generating a Controller File
    
    Generate a Controller File
    ```cmd
   php artisan make:controller nameofController --resource
    ```
    This command creates a new controller with resourceful methods (index, create, store, show, edit, update, destroy). Controllers handle user requests, process data, and interact with models.


  **[⬆ Back to Top](#Important-Commands)**
   

---
---

8. ###  Understanding Route Lists
    
    Generate a Route List
    ```cmd
   php artisan route:list
    ```
    This command displays a list of all registered routes for your application. It shows the HTTP methods, URI, controller, and middleware for each route.


  **[⬆ Back to Top](#Important-Commands)**
   

---
---

9. ###  Migrating & Seed Your Database
    
    * Migrate Your Database
    ```cmd
   php artisan migrate --seed
    ```
    `migrate --seed` applies migrations and seeds the database with sample data.
   
    * Migrate fresh your Database
   ```cmd
   php artisan migrate:fresh --seed
   ```
   `migrate:fresh --seed` resets the database, then applies migrations and seeds.
   
    * Seed your Database
   ```cmd
   php artisan db:seed
   ```
   `db:seed` seeds the database without running migrations.


  **[⬆ Back to Top](#Important-Commands)**
    

---
---
 
10. ###  Generating an Application Key
    
    Generate an Application Key
    ```cmd
    php artisan key:generate
    ```
    This command generates a new application key used for encryption and other security-related features in Laravel.


  **[⬆ Back to Top](#Important-Commands)**
 
   

---
---
    
11. ###  Creating a Storage Link
    
    Create a Storage Link
    ```cmd
    php artisan storage:link
    ```
    This command creates a symbolic link from the public/storage directory to the storage/app/public directory. It is used to make file uploads publicly accessible.


  **[⬆ Back to Top](#Important-Commands)**
  

---
---

       
12. ###  Refreshing Laravel's Memory
    
    * Optimize Project
    ```cmd
    php artisan optimize:clear
    ```
    clears the compiled classes and services from the cache.
    
    * Clear cache Project
    ```cmd
    php artisan cache:clear
    ```
    clears the application cache.
          
    * Refresh route Project
    ```cmd
    php artisan route:clear
    ```
    clears the route cache.
        
    * Clear view Project
    ```cmd
    php artisan view:clear
    ```
    clears the view cache.
          
    * Clear config Project
    ```cmd
    php artisan config:clear
    ```
    clears the configuration cache.


  **[⬆ Back to Top](#Important-Commands)**


---
---

       
13. ###  Understanding CRUD Project Flow
    
> In a typical CRUD (Create, Read, Update, Delete)
application built with Laravel, the various components are distributed
across different files and directories. Here's a breakdown of the key
files and their responsibilities:



* Migrations: database/migrations :
  
  Define the structure of the database tables and handle schema modifications using PHP code. Migrations allow you to create, modify, and delete database tables and their columns.

* Models: app/Models :
  
  Represent the data entities of your application. They interact with the database and encapsulate the business logic of the application.

* Views: resources/views :
  
  Contain the presentation layer of your application. They define the structure and layout of the HTML pages that are served to the user.

* Controllers: app/Http/Controllers :
  
  Handle incoming requests, process data, and return the appropriate responses. They orchestrate the application's logic and interact with models.

* Routes: routes/web.php or routes/api.php :
  
  Responsible for defining the routes that map HTTP requests to controller actions.

* Middleware: app/Http/Middleware :
  
  Enable you to filter HTTP requests entering your application. They can perform tasks like authentication, logging, session handling, etc.

* Requests: app/Http/Requests :
  
  Validate incoming HTTP requests before they reach the controller. They ensure that the data sent by the user is valid and meets the specified criteria.

* Database Seeders: database/seeders :
  
  Populate the database with dummy data for testing and development purposes.

* Configuration: config :
  
  Contains various configuration files for the application, including database configuration, cache configuration, and more.

* Views Partials and Layouts: resources/views/partials and resources/views/layouts :
  
  Include reusable view components and layout templates that can be used across multiple views.



  **[⬆ Back to Top](#Important-Commands)**
  

---
---


       
14. ###  Laravel Request LifeCycle

In short : 

🧩 1. User sends a request <br>
* Someone opens your website or sends an API call.


 <br>

 
🛣 2. Request hits index.php <br>
Laravel starts from public/index.php, which:

* Loads Laravel system
* Creates the app


 <br>

 
⚙️ 3. Laravel sets up the app <br>
* Loads core settings
* Runs global middleware (like checking maintenance mode)
* Loads all important services (like database, routing, auth)


 <br>

 
🧭 4. Laravel finds the matching route <br>
* Checks ```routes/web.php``` or ```routes/api.php```
* Finds which controller or function should run


 <br>

 
🚧 5. Middleware checks the request <br>
* If the route has any extra checks (like auth), Laravel runs them here


 <br>

 
🧠 6. Controller runs <br>
* Laravel runs your controller or function
* It does the main work (DB query, logic, etc.)
* It prepares a response (like a webpage or JSON)


 <br>

 
📤 7. Response goes back <br>
* Laravel sends the response back through middleware
* Then returns it to the browser or client


 <br>
 
<b> Summary (Flow) </b> 


 <br>

 

```

[User Request]
   ↓
public/index.php (entry point) :
Loads Composer autoload and bootstrap/app.php
   ↓
bootstrap/app.php :
Creates Laravel application instance (service container)
   ↓
App\Http\Kernel (for HTTP requests) or App\Console\Kernel (for CLI commands)
   ↓
Run Global Middleware :
Handles things like maintenance mode, sessions, CSRF protection
   ↓
Register & Boot Service Providers :
Loads core services like DB, routing, auth from config/app.php['providers']
   ↓
Find Matching Route :
Checks routes/web.php or routes/api.php to match URL and method
   ↓
Run Route-specific Middleware :
Handles auth, rate limiting, etc.
   ↓
Execute Controller or Closure :
Runs logic, queries DB, returns a response
   ↓
Response Travels Back Through Middleware :
Response may be modified before sending
   ↓
Kernel → App → Response::send() :
Final response is sent to the user
   ↓
[User gets the final response]


```

0. Lets Understand this topic more :  <br>

🧠 Laravel handles each HTTP request → response cycle in several structured steps.

🔹 1. Entry Point → public/index.php  <br>
* Every web request first hits public/index.php.  <br>
This file:  <br>
* Loads Composer autoload ```vendor/autoload.php```  <br>
* Loads Laravel’s core using ```bootstrap/app.php```  <br>
* Creates the application instance  <br>

 </br>

🔹 2. Application Instance / Service Container  <br>
* Laravel creates the service container, which is the core of the app.  <br>
* It manages bindings, dependencies, facades, configs, services, etc.  <br>

 </br>


🔹 3. HTTP Kernel (```App\Http\Kernel```) <br>
* Laravel sends request to the HTTP Kernel.
Kernel responsibilities:
* Run bootstrappers (error handler, environment setup, etc.)
* Handle global middleware (like TrimStrings, VerifyCsrfToken)
* Load service providers

 </br>


🔹 4. Service Providers <br>
🧠 "Heart of Laravel's bootstrapping"
* Service providers register + boot Laravel components (DB, Routing, Queue, etc.)
Found in:
* Core: ```Illuminate\...```
* App-level: ```app/Providers/...```
Two key methods:
*  ```register()``` → Bind things into the container
*  ```boot()``` → Run logic after all services are registered

 </br>


🔹 5. Routing Phase (```routes/web.php or routes/api.php```) <br>
* Laravel checks the incoming URL and matches it to a route.
Route can be:
* A closure
* A controller method
* Route-specific middleware are also applied here.
  
  <br>
  
✅ Example: <br>
```Route::get('/users', [UserController::class, 'index']);```

 </br>


🔹 6. Middleware Execution <br>
* Middleware filters or modifies the request before reaching the controller.
* Global (from Kernel) and route-specific (from routes).
Examples:
* ```auth``` (check login)
* ```VerifyCsrfToken```
* ```PreventRequestsDuringMaintenance```

 </br>


🔹 7. Controller Execution <br>
* If middleware allows, Laravel calls the targeted controller method.
The controller performs:
* Business logic
* DB queries
* Data formatting
Returns a response (```HTML/JSON/Redirect```)

 </br>


🔹 8. Response Traversal (Reverse Middleware) <br>
* The response travels back through the middleware chain.
* Final modifications (like headers, cookies) can happen here.

 </br>


🔹 9. Send Response to Browser <br>
* The response is sent back to HTTP Kernel
* Kernel gives it to Application instance
* Finally, ```response->send()``` sends it to user’s browser or frontend client (e.g., React, Postman)

<br>

📌 Key Concepts to Remember ( Concept	Summary )  <br>

* Entry File :	```index.php``` is Laravel's entry for all HTTP requests <br>
* Service Container :	Core of Laravel – manages dependencies and bindings <br>
* Kernel :	Manages middleware and bootstrapping <br>
* Middleware :	Filters requests before they hit routes/controllers <br>
* Service Providers :	Bootstrap every Laravel feature (DB, routing, mail, etc.) <br>
* Routing : Maps URL + Method → Controller or Closure <br>
* Controller :	Executes app logic + returns a Response <br>
* Response :	Travels backward through middleware → then sent to browser <br>




  **[⬆ Back to Top](#Important-Commands)**
    


---
---

       
15. ###  Laravel versions lately

“So, Laravel has evolved toward cleaner, faster development, with type safety, better scaffolding, simplified structure, and support for modern PHP. Each version improved developer experience and made Laravel more scalable and team-friendly.” <br>

🔸 Laravel 8 (Sep 2020) <br>
* Factory Classes (New Style): Instead of old closures, factories now use class-based structure (UserFactory). <br>
* Model Directory Change: Models moved from app/Models by default instead of staying in app/. <br>
* Laravel Jetstream: New authentication scaffolding (Livewire or Inertia.js). <br>
* Job batching, dynamic Blade components, and route caching improvements. <br>
📌 Common things : class-based factories and Jetstream to handle auth & team features. <br>

 </br>



🔸 Laravel 9 (Feb 2022) <br>
* PHP 8 minimum, with Symfony v6 components. <br>
* Anonymous Migrations: Prevent class name collisions in migration files. <br>
* Query Builder Interface: Better auto-complete & IDE support. <br>
* Flysystem v3: Improved file uploads. <br>
* Moved to Symfony Mailer (from deprecated SwiftMailer). <br>
📌 Common things : anonymous migrations in a team project to avoid merge conflicts and took advantage of type-safe queries in large DB systems. <br>

 </br>



🔸 Laravel 10 (Feb 2023) <br>
* PHP 8.1 minimum required. <br>
* All core code now fully typed: Method arguments and return types added across the framework. <br>
* New Blade Component System (BladeX). <br>
* Improved route caching, more expressive route definitions. <br>
* Artisan test coverage, --coverage flag for php artisan test. <br>
📌 Common things : better auto-completion & static analysis due to full typing, especially in large controller/service-based apps. <br>

 </br>



🔸 Laravel 11 (Feb 2024) <br>
* Simplified default structure: No AppServiceProvider, RouteServiceProvider, ExceptionHandler by default – all handled behind the scenes, but customizable. <br>
* Minimal Boilerplate: Less clutter for fresh installs – more readable and cleaner. <br>
* SQLite by default for faster prototyping in local development. <br>
* WorkOS Starter Kits: For SSO, OAuth, and passkeys with Jetstream/Breeze. <br>
📌 Common things : Cleaner Middleware & Route definitions. <br>

 </br>





  **[⬆ Back to Top](#Important-Commands)**
    


---
---



       
16. ###  Artisan Console 

What is Artisan? <br>
* Artisan is Laravel’s built-in Command Line Interface (CLI) tool that helps developers perform repetitive and common tasks more efficiently. <br>
* Built on top of the Symfony Console component, so it's robust and extensible. <br>


 </br>

Viewing & Running Commands <br>
* ```php artisan list```             # lists all commands <br>
* ```php artisan help migrate```     # shows usage, arguments, options <br>
* ```php artisan --version```        # current Laravel version <br>

 </br>

Creating Custom Commands <br>
```php artisan make:command MyCommand``` # stub created in app/Console/Commands/MyCommand.php <br>
 <br>
 
* Define properties: <br>
* protected $signature = 'name {arg} {--opt}' <br>
* protected $description = '...'; <br>
* public function handle() { /* logic */ } <br>

 </br>

Scheduling & Calling Commands <br>
* Use schedule in Console/Kernel: ```$schedule->command('emails:send')->daily();``` <br>
* Call other commands from inside: ```$this->call('command:name', ['arg'=>'foo','--opt'=>'bar']);``` <br>

 </br>


Testing Console Commands <br>
```
$this->artisan('inspire')
     ->expectsQuestion('What is your name?', 'Taylor')
     ->expectsOutput('...')
     ->assertExitCode(0);
```

 </br>


Arguments <br>
* These are required or optional values passed without flags when running the command.<br>

Syntax in Signature: <br>
```protected $signature = 'greet {name}';```  <br>

 </br>




Options <br>
* These are named flags, usually start with -- and are optional. <br>

Syntax: <br>
```protected $signature = 'send:email {--queue=}';``` <br>

 </br>


```

[ Signature ]
    Arguments:     {user}, {user?}, {user=Ayush}, {user*}
    Options:       {--force}, {--queue=}, {--Q|queue=}, {--id=*}

[ Input in handle() ]
    $this->argument('user')         // gets argument
    $this->option('queue')          // gets option

[ Output Methods ]
    $this->info(), $this->error()
    $this->ask(), $this->confirm()

[ Locking ]
    use Isolatable
    php artisan my:command --isolated


```

### ✅ Artisan Command Summary

| Category             | Common Artisan Commands                               | Purpose                                      |
|----------------------|--------------------------------------------------------|----------------------------------------------|
| 🔧 Project Setup     | `php artisan serve`, `php artisan key:generate`        | Run dev server, generate app key             |
| 🛠 Migrations        | `php artisan make:migration`, `php artisan migrate`    | Create and apply DB schema changes           |
| 🧪 Testing           | `php artisan test`                                     | Run automated tests                          |
| 📂 File Generation   | `php artisan make:model`, `make:controller`, `make:command` | Generate boilerplate code files         |
| 📄 Routes/View Cache | `php artisan route:cache`, `view:clear`                | Cache and clear routes, views, config etc.   |
| 🔄 Queue/Jobs        | `php artisan queue:work`, `queue:listen`               | Manage background jobs                       |
| 🔐 Authentication    | `php artisan make:auth`, `ui`, `breeze:install`        | Scaffold auth system (via packages)          |
| ⚙️ Custom Commands   | `php artisan make:command`                             | Create your own CLI commands                 |


  **[⬆ Back to Top](#Important-Commands)**
    

---
---


     
17. ###  Difference between Composer.json vs Composoer.lock

| File              | Description                                                                 |
|-------------------|-----------------------------------------------------------------------------|
| `composer.json`   | - Lists the dependencies **you want** in your project. <br> - You manually edit this file to require packages and define version constraints. <br> - Acts like a **wishlist** or blueprint of dependencies. |
| `composer.lock`   | - Lists the **exact versions** of dependencies installed at the time of running `composer install`. <br> - Automatically generated and updated by Composer. <br> - Ensures consistent installs for everyone using your project. |


### 🔍 Key Differences

- **Purpose**:
  - `composer.json` defines what you need.
  - `composer.lock` locks down what you actually have.

- **Manual vs Auto**:
  - You edit `composer.json`.
  - Composer updates `composer.lock`.

- **Team Usage**:
  - `composer.lock` ensures all team members install the **same versions**, avoiding "it works on my machine" issues.



### 🛠️ Typical Workflow

1. You run:
   ```bash
   composer require package-name
   ```
   → This updates `composer.json` and creates/updates `composer.lock`

2. Others run:
   ```bash
   composer install
   ```
   → This uses the `composer.lock` file to install **exact versions**.



### ✅ Best Practice
- **Commit both** `composer.json` and `composer.lock` to your version control system (like Git) for consistent builds.



> Think of `composer.json` as your recipe, and `composer.lock` as the actual groceries you bought!






  **[⬆ Back to Top](#Important-Commands)**
    



---
---


     
18. ### Default Route Files in Laravel

Laravel organizes its routing files inside the `routes/` directory. Each file is responsible for handling a specific type of routing:

| Route File         | Description                                                                 |
|--------------------|-----------------------------------------------------------------------------|
| `web.php`          | Handles **web routes**. These routes use the `web` middleware group, which includes session state, CSRF protection, and cookie encryption. Typically used for browser-based apps. |
| `api.php`          | Handles **API routes**. These routes are stateless and use the `api` middleware group. Typically prefixed with `/api`. |
| `console.php`      | Contains route definitions for **Artisan console commands**. Not accessed via HTTP. |
| `channels.php`     | Registers **broadcasting channels** used for Laravel Echo and WebSockets. |



### ✅ Loaded By: 
`App\Providers\RouteServiceProvider`

All these files are automatically loaded by Laravel’s `RouteServiceProvider`. You don't need to include them manually.



### 🛠 Example Usage

```php
// routes/web.php
Route::get('/', function () {
    return view('welcome');
});

// routes/api.php
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

```



  **[⬆ Back to Top](#Important-Commands)**
  


---
---


     
19. ### What is Middleware 

* 📖 Definition
Middleware in Laravel acts as a **filter** for HTTP requests entering your application. It **examines**, **modifies**, or **rejects** requests before they reach your routes or controllers.

Think of middleware as a **checkpoint** that sits between the user request and the application logic.



## 🧠 Common Use Cases
| Middleware Type           | Purpose                                                      |
|---------------------------|--------------------------------------------------------------|
| `auth`                    | Ensure the user is authenticated before accessing a route    |
| `guest`                   | Redirect authenticated users away from guest-only pages      |
| `csrf`                    | Verify the request has a valid CSRF token                    |
| `throttle`                | Limit the number of requests per user (rate limiting)        |
| `encrypt_cookies`         | Encrypt cookie data                                          |
| `trim_strings`            | Automatically trim incoming string inputs                    |
| Custom Middleware         | Create your own to check user roles, log requests, etc.      |



* ⚙️ How Middleware Works (Flow)

```plaintext
[User Request]
   ↓
Run Global Middleware (defined in Kernel.php)
   ↓
Run Route-specific Middleware
   ↓
→ Route or Controller
   ↓
Return Response
   ↓
→ Back through Middleware
   ↓
[Response Sent to User]
```

* 🛠️ Creating Custom Middleware

  
```
php artisan make:middleware CheckUserRole
```

Example :
```
// app/Http/Middleware/CheckUserRole.php

public function handle($request, Closure $next)
{
    if ($request->user()->role !== 'admin') {
        return redirect('no-access');
    }

    return $next($request);
}
```

Register it in app/Http/Kernel.php:
```
protected $routeMiddleware = [
    'check.role' => \App\Http\Middleware\CheckUserRole::class,
];
```
Use in routes:
```
Route::get('/admin', function () {
    // Only accessible to admin users
})->middleware('check.role');
```

📝 Summary

* Middleware filters or processes incoming HTTP requests.
* Can be global (for all routes) or route-specific.
* Built-in examples: auth, csrf, throttle, etc.
* You can easily create and apply your own custom middleware.

<br>
In short: Middleware gives you control over the request before it reaches your application and before the response is sent back.


  **[⬆ Back to Top](#Important-Commands)**
  



---
---


     
20. ### Gates vs Policies


* Laravel provides two main ways to authorize actions: **Gates** and **Policies**. Both are part of Laravel’s Authorization system.


* 🔸 What are Gates?
Gates are **closures** that determine if a user is authorized to perform a given action. They are ideal for **simple, one-off authorization logic**.

* 🔧 Define a Gate
You define Gates in `App\Providers\AuthServiceProvider.php` using the `Gate::define` method:

```php
use Illuminate\Support\Facades\Gate;

Gate::define('edit-post', function ($user, $post) {
    return $user->id === $post->user_id;
});
```

* 🧪 Use a Gate
```php
if (Gate::allows('edit-post', $post)) {
    // The user can edit the post
}

if (Gate::denies('edit-post', $post)) {
    // Access denied
}
```

* 📜 Policies

* 🔸 What are Policies?
Policies are classes that organize authorization logic around a particular model or resource. Ideal for complex or resource-specific logic.

* 🛠 Generate Policy
```
php artisan make:policy PostPolicy --model=Post
```
This creates a PostPolicy class in app/Policies.

* ✏️ Define Methods
```
public function update(User $user, Post $post)
{
    return $user->id === $post->user_id;
}
```

* 🔗 Register the Policy
Register it in AuthServiceProvider.php:
```
protected $policies = [
    \App\Models\Post::class => \App\Policies\PostPolicy::class,
];
```

* ✅ Use a Policy
```
$this->authorize('update', $post);

// OR

if (Auth::user()->can('update', $post)) {
    // Authorized
}
```

* 🆚 Gates vs Policies
  
| Feature       | Gates                          | Policies                               |
| ------------- | ------------------------------ | -------------------------------------- |
| Structure     | Closures (defined in provider) | Classes (organized by model)           |
| Use Case      | Simple, one-off checks         | Complex, resource-based authorization  |
| Location      | `AuthServiceProvider`          | `app/Policies/ModelPolicy.php`         |
| Maintenance   | Harder to scale with size      | Easier to manage and extend            |
| Model Binding | Manual                         | Automatic with methods like `update()` |


📝 Summary

* Use Gates for quick checks or when authorization is not tied to a model.
* Use Policies when you need to group authorization logic around a specific Eloquent model.
💡 Good Practice: For larger applications, prefer Policies for clean, maintainable, and scalable code.

  **[⬆ Back to Top](#Important-Commands)**
  



---
---


     
21. ### Eloquent vs Query Builder in Laravel


Laravel provides two powerful ways to interact with databases:

- **Eloquent ORM**: Object-Relational Mapper
- **Query Builder**: Fluent, chainable query interface

📦 1. Eloquent ORM (Object-Relational Mapping)

<br>

* ✅ What is Eloquent?
Eloquent is Laravel’s built-in ORM that allows you to interact with your database using **PHP objects and classes** (models). It represents **each table as a model**, and each row as an instance of that model.

🧾 Example:

```php
// Get all users
$users = User::all();

// Get a single user
$user = User::find(1);

// Create a new user
User::create([
    'name' => 'John',
    'email' => 'john@example.com',
]);

// Relationships
$posts = User::find(1)->posts;
```

🔧 2. Query Builder

<br>


* ✅ What is Query Builder? <br>
Query Builder is Laravel’s more manual and flexible way to write database queries. It gives you control without writing raw SQL, using a chainable, fluent interface.


🧾 Example:
```
// Get all users
$users = DB::table('users')->get();

// Insert data
DB::table('users')->insert([
    'name' => 'Jane',
    'email' => 'jane@example.com',
]);

// Get users with a condition
$users = DB::table('users')->where('active', 1)->get();
```

* 🆚 Eloquent vs Query Builder (Comparison Table)

| Feature       | Eloquent ORM                             | Query Builder                              |
| ------------- | ---------------------------------------- | ------------------------------------------ |
| Type          | Object-oriented (uses models)            | Fluent SQL query builder                   |
| Use Case      | CRUD, relationships, business logic      | Complex joins, performance-focused queries |
| Syntax        | Clean and expressive                     | Closer to raw SQL but still elegant        |
| Relationships | Built-in support (hasOne, hasMany, etc.) | Manual joins required                      |
| Performance   | Slightly heavier due to abstraction      | Generally faster and lightweight           |
| Customization | Easy model-based events, observers, etc. | More control at SQL level                  |
| Best For      | Rapid development, data relationships    | Performance-critical or complex joins      |


🔍 When to Use What? <br>

 <br>

Use Eloquent When: <br>
* You are working with models and relationships.
* You want clean, readable, and expressive syntax.
* You’re building apps with standard CRUD operations.
* You want to use Laravel features like events, accessors, mutators. <br>

 <br>

Use Query Builder When: <br>
* You need to write complex joins, subqueries, or unions.
* You want raw performance and control over the SQL.
* You are working with large datasets and need optimized queries.
* You don’t need full model-related features. <br>

 <br>

 
📝 Summary  <br>

* Eloquent = Elegant, object-oriented, quick for CRUD + relationships.
* Query Builder = Manual, SQL-like, better for complex or high-performance needs.
* 💡 Pro Tip: You can mix both! Use Eloquent for most of your app, and switch to Query Builder when you need more control or optimization.

  **[⬆ Back to Top](#Important-Commands)**
  



---
---

     
22. ### Migrate fresh vs Migrate refresh
    
In Laravel, both `migrate:fresh` and `migrate:refresh` are used to reset and re-run your database migrations — but they behave **differently** and serve different purposes.


```php artisan migrate:fresh```

✅ What It Does:
- **Drops all tables** from the database.
- **Re-runs all migrations** from scratch.

📌 Use Case:
- When you want a completely clean database with **no data at all**.
- Commonly used in **early development** when schema/data isn’t important yet.

⚠️ Data Loss:
- **All existing data is deleted**.
- Does **not** run `down()` methods — just drops tables directly.

### 🧾 Example:
```bash
php artisan migrate:fresh
```


<br>

♻️ php artisan migrate:refresh

<br>

✅ What It Does:
- Rolls back all migrations using down() methods.
- Then re-runs all migrations using up() methods.refresh

<br>



📌 Use Case:
- When you want to reset your database but retain some control over rollback behavior.
- Useful when you're testing migration rollback + migration flow.refresh

<br>



⚠️ Data Loss:
- Also deletes data, but runs the down() logic defined in each migration.
- May preserve some structures depending on how down() methods are written.refresh

<br>



🧾 Example:
```
php artisan migrate:refresh
```
You can also refresh with seeders:
```
php artisan migrate:refresh --seed
```

 <br>

🆚 Key Differences :
| Feature             | `migrate:fresh`                   | `migrate:refresh`                      |
| ------------------- | --------------------------------- | -------------------------------------- |
| Table Drop Method   | Directly drops all tables         | Uses migration `down()` methods        |
| Re-run Migrations   | ✅ Yes                             | ✅ Yes                                  |
| Runs `down()` logic | ❌ No                              | ✅ Yes                                  |
| Data Preservation   | ❌ No (all lost)                   | ❌ No (unless rollback logic preserves) |
| Seeder Compatible   | ✅ `--seed` supported              | ✅ `--seed` supported                   |
| Speed               | ⚡ Faster                          | 🐢 Slightly Slower due to rollback     |
| Best Use            | Clean slate, testing from scratch | Testing rollback behavior, full reset  |


📝 Summary <br>

- Use migrate:fresh when you want a completely new schema, quickly.
- Use migrate:refresh when you want to simulate rollback + migration cycle or test down() logic. <br>
🧠 Pro Tip: Use --seed with either command if you want to re-run seeders along with migrations. <br>

  **[⬆ Back to Top](#Important-Commands)**
  



---
---

     
23. ### Factories vs Seeders

In Laravel, **Factories** and **Seeders** are both used to generate and populate data in the database — especially useful during development and testing. However, they serve **different roles**.


* 🧪 What is a Factory?

✅ Purpose:
- Used to **define how a model should look with fake data**.
- Creates **dummy data** for models using **Faker**.
- Not responsible for inserting the data into the database by itself.

📌 Use Case:
- When you want to create multiple instances of a model with **random test data**.
- Often used within Seeders, tests, or tinker to quickly create model instances.

🧾 Example:

```bash
php artisan make:factory UserFactory --model=User
```

<br>

```
// database/factories/UserFactory.php
public function definition()
{
    return [
        'name' => $this->faker->name(),
        'email' => $this->faker->unique()->safeEmail(),
        'password' => bcrypt('password'),
    ];
}
```

▶️ Usage:

```
// Create one user
User::factory()->create();

// Create 10 users
User::factory()->count(10)->create();
```

🌱 What is a Seeder?

✅ Purpose:
- Used to insert data into the database.
- Calls factories or manual insert code to seed tables.
- Acts like a controller to populate tables with either random or specific data.


📌 Use Case:
- When you want to populate your database with default data (like admin users, roles).
- To run factories and other logic as a part of the seeding process.

  
🧾 Example:
```
php artisan make:seeder UserSeeder
```

<br>

```
// database/seeders/UserSeeder.php
public function run()
{
    // Create 10 users using the factory
    \App\Models\User::factory()->count(10)->create();

    // Or insert a specific user manually
    \App\Models\User::create([
        'name' => 'Admin',
        'email' => 'admin@example.com',
        'password' => bcrypt('admin'),
    ]);
}
```

🚀 Running Seeders

You can run a seeder individually:
```
php artisan db:seed --class=UserSeeder
```


Or run all registered seeders from DatabaseSeeder.php:
```
php artisan db:seed
```

Also, combine with migration:
```
php artisan migrate:fresh --seed
```


🆚 Key Differences
| Feature         | Factory                        | Seeder                               |
| --------------- | ------------------------------ | ------------------------------------ |
| Purpose         | Define fake data structure     | Insert data into database            |
| Role            | Blueprint / model generator    | Controller / data populator          |
| Usage           | In tests, tinker, and seeders  | Run manually or as part of migration |
| Runs by itself? | ❌ No (used inside seeder/test) | ✅ Yes                                |
| CLI Command     | `make:factory`                 | `make:seeder`                        |
| Default Path    | `database/factories/`          | `database/seeders/`                  |


📝 Summary

- Factory = Blueprint for fake data for a model.
- Seeder = Inserts data into the DB (can call factories).
- Use both together: Factory defines, Seeder executes. <br>
💡 Pro Tip: Always register custom seeders inside DatabaseSeeder.php if you want to run all seeders together.

```
// database/seeders/DatabaseSeeder.php
public function run()
{
    $this->call([
        UserSeeder::class,
        ProductSeeder::class,
    ]);
}
```



  **[⬆ Back to Top](#Important-Commands)**
  



---
---



     
24. ### Databases Laravel Support

Laravel supports **multiple database systems** out-of-the-box through its Eloquent ORM and Query Builder.



 🛠️ Officially Supported Database Systems

| Database System    | Driver Name       | Notes |
|--------------------|-------------------|-------|
| MySQL              | `mysql`           | Most commonly used with Laravel |
| PostgreSQL         | `pgsql`           | Open-source, advanced features |
| SQLite             | `sqlite`          | Lightweight, file-based database |
| SQL Server         | `sqlsrv`          | Microsoft SQL Server |



 🔌 Other Database Drivers (Community Packages)

Laravel can also work with other databases through **community packages** or third-party drivers:

- MongoDB (via `jenssegers/laravel-mongodb`)
- Oracle (via `yajra/laravel-oci8`)
- MariaDB (compatible with `mysql` driver)
- Firebase (via custom APIs)
- Redis (used as a key-value store, not a relational DB — supported via `predis` or native `phpredis`)



## 🧰 Configure in `.env` File

Example:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_db
DB_USERNAME=root
DB_PASSWORD=
```

📝 Summary

- ✅ Laravel officially supports: MySQL, PostgreSQL, SQLite, SQL Server.
- ✅ You can also use NoSQL or other DBs via third-party drivers.
- ✅ Configuration is easy using .env + config/database.php.
💡 Choose the database based on your project needs, performance, and deployment environment.


  **[⬆ Back to Top](#Important-Commands)**
  



---
---



     
25. ### Soft Deletes

Laravel provides a convenient **soft delete** feature, allowing you to "delete" records without permanently removing them from the database.

<br>

🧾 What is Soft Delete?

Instead of actually deleting the record from the database, Laravel sets a `deleted_at` timestamp column.  
This way, the record **still exists in the database**, but is **excluded from query results** unless explicitly asked for.

<br>

🛠️ How to Enable Soft Deletes

1. Add `deleted_at` column in your migration:

```php
Schema::table('users', function (Blueprint $table) {
    $table->softDeletes(); // Adds deleted_at column
});
```

OR during table creation:
```$table->softDeletes();```

Then run:
```php artisan migrate```


2. Use SoftDeletes trait in your model:
```
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Model
{
    use SoftDeletes;
}
```

📦 Basic Soft Delete Operations

- ➕ Soft Delete (Mark as deleted)
```User::find(1)->delete();  // Sets deleted_at instead of deleting```


- 🔎 Retrieve Only Non-Deleted Records (Default Behavior)
```$users = User::all();  // excludes soft deleted records```


- ♻️ Retrieve Including Soft Deleted Records
```$users = User::withTrashed()->get();```


- 🔄 Retrieve Only Soft Deleted Records
```$trashed = User::onlyTrashed()->get();```


- ♻️ Restore a Soft Deleted Record
```User::withTrashed()->find(1)->restore();```


- ❌ Force Delete (Permanently Remove)
```User::withTrashed()->find(1)->forceDelete();```


🔐 Benefits of Soft Deletes

- Prevent accidental data loss
- Helpful for trash bins / undo feature
- Audit and history tracking
- Easy restore of deleted data

  
📝 Summary

| Action              | Method / Usage                              |
| ------------------- | ------------------------------------------- |
| Enable Soft Deletes | `use SoftDeletes` + `$table->softDeletes()` |
| Soft Delete         | `$model->delete()`                          |
| Restore             | `$model->restore()`                         |
| Force Delete        | `$model->forceDelete()`                     |
| Get All Records     | `Model::withTrashed()`                      |
| Get Only Deleted    | `Model::onlyTrashed()`                      |

💡 Always check if you need to keep records for safety or compliance — soft deletes are perfect for that!


  **[⬆ Back to Top](#Important-Commands)**
  



---
---
